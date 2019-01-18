@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
        <h1>Create new Todo</h1>
            <form method="POST" action="/admin">
                @csrf
                <div class="field">
                        <label class="label" for="User_id">User Id</label>
                            <div class="control">
                                <select name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                                </select>
                                {{--  <input type="number" name="user_id" required placeholder="user Id" value="{{old('title')}}" min="1">  --}}
                            </div>
                    </div>
                <div class="field">
                    <label class="label" for="title">Title</label>
                        <div class="control">
                            <input type="text" name="title" class="input{{$errors->has('title')? 'is-danger':''}}"placeholder="title" value="{{old('title')}}">
                        </div>
                </div>
                <div class="field">
                    <label class="label" for="title">Description</label>
                        <div class="control">
                            <textarea name="description" placeholder="Description" class="input{{$errors->has('title')? 'is-danger':''}}" value="{{old('description')}}"></textarea> 
                        </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                    <a class="btn btn-success" href="{{URL::previous()}}">Back</a>
                    <a class="btn btn-success" href="/todos">Home</a>
                </div>
                @include('error')
             </form>
@endsection
       