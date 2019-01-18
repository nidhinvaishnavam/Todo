@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p style="width:100%; padding: 0 40%" >you Are Logged In <br>
                    <a class="btn btn-primary active" style="width: 100%" href="/todos">show Todo List</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
