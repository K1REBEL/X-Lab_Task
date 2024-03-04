<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emps = Employee::with('job')->get();
        log::info($emps);
        return view('employees.index', compact('emps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobs = Job::all();
        return view('employees.create', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:employees,email',
        ]);

        if ($validator->fails()) {
            log::info('Validation Failure');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->name;
        $email = $request->email;
        $jobID = $request->job;
        // log::info([$name, $email, $jobID]);

        Employee::create([
            'name' => $name,
            'email' => $email,
            'job_id' => $jobID
        ]);

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $employee = Employee::findorfail($id)->with('job');
        $emp = Employee::where('id', $id)->with('job')->get();
        $emp_json = $emp->toJson();

        return view('employees.show', compact('emp_json'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $emp = Employee::where('id', $id)->with('job')->get();
        $jobs = Job::all();
        log::info($emp);

        $emp_json = $emp->toJson();
        return view('employees.edit', compact('emp_json', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findorfail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
        ]);

        if ($validator->fails()) {
            log::info('Validation Failure');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->job_id = $request->job;

        $employee->save();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::where('id', $id)->delete();
        return redirect()->route('employees.index');
    }
}
