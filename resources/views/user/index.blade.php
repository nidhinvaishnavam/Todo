@extends('layouts.app')
@section('content')
		<center>
			<h1 class="title">User Details</h1>
			<input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
			<table class="table">
			<tr>
				<th>Id</th>
				<th>Name</th>
                <th>Email</th>
                <th>Operation</th>
			</tr>
			@foreach ($user as $person)
			<tr>
				<td>{{$person->id}}</td>
				<td>{{$person->name}}</td>
                <td>{{$person->email}}</td>
                <td>@if($person->id!==1)
					<button class="btn btn-danger delete" onclick="return confirm('are you sure')" data-id="{{$person->id}}">Delete</button>
                    @endif</td>
			</tr>
			@endforeach
			
			</table>
			<br>
			<div class="content">
			<a class="btn btn-success" href="{{URL::previous()}}">Back</a>
			</div>
		</center>	
@endsection



