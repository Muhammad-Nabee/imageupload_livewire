@extends('layouts.master')
@section('content')
<a href="{{route('index')}}" class="btn btn-primary w-24 mr-1 mb-2 " style="float:right">Back</a>
{{$employe->name}}
{{$employe->email}}
@endsection