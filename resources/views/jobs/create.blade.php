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
   <title>Create a Job</title>
</head>
<body>

   <form action="{{ route('jobs.store') }}" method="POST">
      @csrf

      <label for="title">Job Title: </label>
      <input type="text" name="title" id="title">
      <br>

      <label for="description">Job Description: </label>
      <textarea name="description" id="desc" cols="30" rows="10"></textarea>
      {{-- <input type="text" name="desc" id="desc"> --}}
      <br>

      <button type="submit">Create Job</button>

   </form>
   
</body>
</html>