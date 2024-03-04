<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Edit a Job</title>
</head>
<body>
   <form action="{{ route('jobs.update', $job->id) }}" method="POST">
      @csrf
      @method('PATCH')

      <label for="title">Job Title: </label>
      <input type="text" name="title" id="title" value="{{$job->title}}">
      <br>

      <label for="description">Job Description: </label>
      <textarea name="description" id="desc" cols="30" rows="10">{{$job->description}}</textarea>
      <br>

      <button type="submit">Update Job</button>

   </form>
</body>
</html>