@extends("common")
@section("content")
<h1 >Create Studend</h1>
<form action = "{{route('studentCreate')}}" class ="from-group" method="post" >
    {{csrf_field ()}}

    <label for="">Name</label>
    <br>
    <input type= "text" name="id" value="{{old('name')}}" class="form-control">
    <br>

    <label for="">Id</label>
    <br>
    <input type= "text" name="id" value="{{old('id')}}" class="form-control">
    <br>

    <label for="">Dob</label>
    <br>
    <input type= "text" name="id" value="{{old('dob')}}" class="form-control">
    <br>

    <label for="">E-mail</label>
    <br>
    <input type= "text" name="id" value="{{old('email')}}" class="form-control">
    <br>

    <label for="">Phone</label>
    <br>
    <input type= "text" name="id" value="{{old('phone')}}" class="form-control">
    <br>
    
    <input type ="submit" class="btn btn-primary" value= "Add student"> 
</form>
    @endsection