@extends('layouts.app')
@section('content')
    
<center>
    <h1>Users Todo List</h1>
    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
     <table class="table">
			@foreach($todos as $todo)
			<tr>
                <td><a href="/admin/{{$todo->id}}/edit">{{$todo->title}}</a></td>
				 <td><button class="btn btn-danger delete" onclick="return confirm('are you sure')" data-id="{{$todo->id}}">Delete</button></td>
			</tr>
			@endforeach
	</table>
    <a class="btn btn-success" href="{{URL::previous()}}">Back</a>
    <a class="btn btn-success" href="/todos">Home</a>
</center>
@endsection