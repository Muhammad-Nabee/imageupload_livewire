@extends('layouts.master')
@section('content')

<a href="{{route('create')}}" class="btn btn-primary w-24 mr-1 mb-2 " style="float:right">Primary</a>
<br>
@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('update'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
<div class="overflow-x-auto">
     <table class="table">
         <thead>
             <tr>
                 <th class="whitespace-nowrap">#</th>
                 <th class="whitespace-nowrap">First Name</th>
              
                 <th class="whitespace-nowrap">Email</th>
                 <th class="whitespace-nowrap">Destination</th>
                 <th class="whitespace-nowrap">Profile</th>
                 <th class="whitespace-nowrap">Action</th>
             </tr>
         </thead>
         <tbody>
            @foreach($emploies as $key=>  $employe)
             <tr class="bg-primary text-white">
                 <td>{{++$key}}</td>
                 <td>{{$employe->name}}</td>
                 <td>{{$employe->email}}</td>
                 <td>{{$employe->destination}}</td>
                 <td><img src="{{asset('upload/userimg/'.$employe->image)}}" style="width:90px;height:90px"></td>
                 <td>  <a href="{{ route('employe.view',$employe->id) }}" class="btn btn-success ">view</a>
                 
                  <a href="{{ route('employe.edit',$employe->id) }}" class="btn btn-secondary">edit</a>
                  <a href="{{ route('employe.delete',$employe->id) }}" class="btn btn-danger ">Delete</a></td>
                </tr>
             @endforeach
         </tbody>
     </table>
 </div>

@endsection