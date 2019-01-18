@extends('layouts.app')
@section('content')
</script>
<h1>edit Todo</h1>
            <form method="POST" action="/todos/{{$todo->id}}">
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
                    <button type="submit" id="delete" class="btn btn-secondary">Submit</button>
                    <a class="btn btn-success" href="{{URL::previous()}}">Back</a>
                </div>
                @include('error')
             </form>
@endsection