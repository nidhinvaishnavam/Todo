@extends('layouts.app')
@section('content')
    
<center>
    <h1 class="title">{{$todo->title}}</h1>
    <h4>{{$todo->description}}</h4><br>
    <a class="btn btn-secondary" href="/todos/{{$todo->id}}/edit">edit</a>
    <a class="btn btn-success" href="{{URL::previous()}}">Back</a><br><br>  
</center>
@endsection