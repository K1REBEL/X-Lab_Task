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
   <title>Add an Employee</title>
</head>
<body>

   <h2>Add a new employee</h2>
   <form action="{{ route('employees.store') }}" method="POST">
      @csrf

      <label for="name">Name: </label>
      <input type="text" name="name" id="name">
      <br>

      <label for="email">E-mail: </label>
      <input type="email" name="email" id="email">
      <br>

      <label for="job">What job is this employee currently working on?</label>
      <select name="job" id="job">
         @foreach($jobs as $job)
            <option value="{{ $job->id }}">{{ $job->title }}</option>
         @endforeach
      </select>
      <br>

      <button type="submit">Add Employee</button>

   </form>
   
</body>
</html>