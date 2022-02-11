@extends("common")
@section("content")
<h1 align="center">Student List</h1>
<table class="table table-border">

    <tr>
        <th>name</th>
        <th>ID</th>
        <th>Date of Birth</th>
        
</tr>

@foreach($students as $student)
<tr>
    <td>{{$student->name}}</td>
    <td>{{$student->id}}</td>
    <td>{{$student->dob}}</td>
</tr> 
@endforeach

 </table>
@endsection 