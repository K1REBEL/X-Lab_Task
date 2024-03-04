<?php

namespace App\Http\Controllers;

use App\Models\Job;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);
        
        if ($validator->fails()) {
            log::info('Validation Failure');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $title = $request->title;
        $desc = $request->description;
        // log::info([$title, $desc]);

        Job::create([
            'title' => $title,
            'description' => $desc
        ]);

        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::findorfail($id);
        // log::info($job);

        // if (!$job) { return "Job couldn't be found."; }
        // else { 
            return view('jobs.show', compact('job')); 
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findorfail($id);
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Job::findorfail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);
        
        if ($validator->fails()) {
            log::info('Validation Failure');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $job->title = $request->title;
        $job->description = $request->description;

        $job->save();
        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Job::where('id', $id)->delete();
        return redirect()->route('jobs.index');
    }
}
