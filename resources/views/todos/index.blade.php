@extends('layouts.app')
@section('content')
		<center>
		<h1 class="title">Todo list</h1>
		<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
		<table class="table">
			@foreach($todos as $todo)
			<tr>
				<td><a href="/todos/{{$todo->id}}">{{$todo->title}}</a></td>
				 <td><button class="btn btn-danger delete" onclick="return confirm('are you sure')" data-id="{{$todo->id}}">Delete</button></td>
			</tr>
			@endforeach
		</table>
			<p><a class="btn btn-secondary" href="/todos/create">Create new Todo List</a></p>
			@if(auth()->user()->id===1)
			<p><a class="btn btn-success" href="/admin">show all Users</a></p>
			@endif
		</center>	
@endsection



