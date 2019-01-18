@extends('layouts.app')
@section('content')
		<center>
			<h1>Users</h1>
			@foreach($users as $person)
				<ul>
					<li><a href="/admin/{{$person->id}}">{{$person->name}}</a>
				</ul>
			@endforeach
			</ul>
			<br><p><a class="btn btn-secondary" href="/user">User Details</a></p><br>
			<a class="btn btn-primary" href="/admin/create">Create new Todo List for any User</a>
			<a class="btn btn-success" href="{{URL::previous()}}">Back</a>
			<a class="btn btn-success" href="/todos">Home</a>
		</center>	
@endsection
