@extends('layouts.master')
@section('content')
<a href="{{route('index')}}" class="btn btn-primary w-24 mr-1 mb-2 " style="float:right">Back</a>
<form action="{{route('employe.update',$employe->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input  type="hidden" class="form-control" name="id" value="{{$employe->id}}">
<div> <label>Name</label>

<input  type="text" class="form-control" name="name" value="{{$employe->name}}">


<div> <label>Email</label> 
<input  type="text" class="form-control" name="email" value="{{$employe->email}}"> 

</div>
<div> <label>Destination</label> 
<input  type="text" class="form-control" name="destination" value="{{$employe->destination}}"> 

</div>

<br>
<div>
 <input type="file" name="old_img">
<img src="{{asset('upload/userimg/'.$employe->image)}}">
</div>
<br>
<br>
<button type="submit" class="btn btn-primary ml-3">update</button>
</foam>
@endsection