@extends('layouts.app')
@section('content')
<h1>edit Todo</h1>
            <form method="POST" action="/admin/{{$todo->id}}">
                @method('PATCH')
                @csrf
                <div class="field">
                    <label class="label" for="title">Title</label>
                        <div class="control">
                            <input type="text" name="title" class="input{{$errors->has('title')? 'is-danger':''}}" value="{{$todo->title}}">
                        </div>
                </div>
                <div class="field">
                    <label class="label" for="title">Description</label>
                        <div class="control">
                            <textarea name="description" class="input{{$errors->has('description')? 'is-danger':''}}">{{$todo->description}}</textarea> 
                        </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </div>
                @include('error')
             </form>
<a class="btn btn-success" href="{{URL::previous()}}">Back</a>
@endsection