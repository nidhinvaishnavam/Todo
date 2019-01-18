@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
        <h1>Create new Todo</h1>
            <form method="POST" action="/todos">
                @csrf
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
                </div>
                <a class="btn btn-success" href="{{URL::previous()}}">Back</a>
                @include('error')
             </form>
@endsection
       