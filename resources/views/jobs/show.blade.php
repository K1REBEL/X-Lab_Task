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
   <title>Job no. {{$job->id}}</title>
</head>
<body>

   <h2>Job Title: {{$job->title}}</h2>
   <h2>Job Description: {{$job->description}}</h2>

   <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
      @csrf
      @method('delete')
      <button type="submit">Delete</button>
   </form>
   
   <h3>ID in DB: {{$job->id}}</h3>

</body>
</html>