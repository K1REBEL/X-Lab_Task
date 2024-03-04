<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <style>
      body *{
         margin: 2px;
      }
   </style>
   <title>Update Employee</title>
</head>
<body>

   @php $emp = json_decode($emp_json); @endphp

   <form action="{{ route('employees.update', $emp[0]->id) }}" method="POST">
      @csrf
      @method('PATCH')

      <label for="name">Name: </label>
      <input type="text" name="name" id="name" value="{{$emp[0]->name}}">
      <br>

      <label for="email">E-mail: </label>
      <input type="email" name="email" id="email" value="{{$emp[0]->email}}">
      <br>

      <label for="job">What job is this employee currently working on?</label>
      <select name="job" id="job">
         @foreach($jobs as $job)
            @if($job->id == $emp[0]->job->id)
               <option value="{{ $job->id }}" selected>{{ $job->title }}</option>
            @else 
               <option value="{{ $job->id }}">{{ $job->title }}</option>
            @endif
         @endforeach
      </select>
      <br>

      <button type="submit">Add Employee</button>

   </form>
   
</body>
</html>