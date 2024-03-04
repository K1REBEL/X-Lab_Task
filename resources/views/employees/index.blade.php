<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Employee Index</title>
</head>
<body>
   <h2>Employee List:</h2>
   <table>
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>E-mail</th>
         <th>Current Job</th>
      </tr>
      @foreach($emps as $emp)
      <tr>
         <td>{{$emp->id}}</td>
         <td><a href="{{ route('employees.show', $emp->id) }}">{{$emp->name}}</a></td>
         <td>{{$emp->email}}</td>
         <td>{{$emp->job->title}}</td>
         <td>
            <a href="{{ route('employees.edit', $emp->id) }}"><button>Edit</button></a>
         </td>
         <td>   
            <form action="{{ route('employees.destroy', $emp->id) }}" method="POST">
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