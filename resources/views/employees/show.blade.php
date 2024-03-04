<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Employee Data</title>
</head>
<body>

   @php $emp = json_decode($emp_json); @endphp

   <h2>Name of Employee: {{$emp[0]->name}}</h2>
   <h2>Employee E-mail: {{$emp[0]->email}}</h2>

   <h2>Currently works on: {{$emp[0]->job->title}}</h2>

   <form action="{{ route('employees.destroy', $emp[0]->id) }}" method="POST">
      @csrf
      @method('delete')
      <button type="submit">Delete</button>
   </form>
   
   <h3>ID in DB: {{$emp[0]->id}}</h3>

</body>
</html>