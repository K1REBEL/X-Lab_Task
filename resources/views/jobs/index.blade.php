<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Job Index</title>
</head>
<body>
   <h2>Job List:</h2>
   <table>
      <tr>
         <th>ID</th>
         <th>Title</th>
         <th>Description</th>
      </tr>
      @foreach($jobs as $job)
      <tr>
         <td>{{$job->id}}</td>
         <td>{{$job->title}}</td>
         <td>{{$job->description}}</td>
         <td>
            <a href="{{ route('jobs.edit', $job->id) }}"><button>Edit</button></a>
         </td>
         <td>   
            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
               @csrf
               @method('delete')
               <button type="submit">Delete</button>
            </form>
         </td>
      </tr>
      @endforeach
   </table>
</body>
</html>