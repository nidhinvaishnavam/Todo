@extends('layouts.app')
@section('content')
		<center>
			<h1 class="title">User Details</h1>
			<table class="table">
			<tr>
				<th>User Id</th>
				<th>User Name</th>
				<th>Email</th>
			</tr>
			@foreach ($user as $person)
			<tr>
					<td>{{$person->id}}</td>
					<td>{{$person->name}}</td>
					<td>{{$person->email}}</td>
				</tr>
			@endforeach
			
			</table>
			@if($user->id!==1)
			<form method="POST" action="/user/{{$user->id}}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('are you sure')" class="btn btn-danger">Delete</button>
             </form>
			@endif
			<br>
			<div class="content">
			<a class="btn btn-success" href="{{URL::previous()}}">Back</a>
			</div>
		</center>	
@endsection



