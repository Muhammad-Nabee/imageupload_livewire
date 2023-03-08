@extends('layouts.master')
@section('content')
<a href="{{route('index')}}" class="btn btn-primary w-24 mr-1 mb-2 " style="float:right">Back</a>
<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div> <label>Name</label> 
<input  type="text" class="form-control" name="name" placeholder="name">
@error('name')
 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
 @enderror
</div>

<div> <label>Email</label> 
<input  type="text" class="form-control" name="email" placeholder="example@gmail.com"> 
@error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
</div>
<div> <label>Destination</label> 
<input  type="text" class="form-control" name="destination" placeholder="destination"> 
@error('destination')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
</div>
 <div> <label>Password</label> <input type="password" name="password" class="form-control" placeholder="secret"> 
 @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
</div>
<br>
<div>
 <input type="file" name="image">
 @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
</div>
<br>
<br>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</foam>
 @endsection