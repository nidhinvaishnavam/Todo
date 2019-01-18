<?php

namespace App\Http\Controllers;

use App\Todo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TodoCreated;
use App\Mail\TodoDeleted;
use App\Http\Middleware;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $todos=auth()->user()->todos;
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Todo $todo)
    {
        $attributes=$request->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:3'],
         ]);
        $attributes['user_id']=auth()->id();
        $todos=$todo->create($attributes);
        Mail::to(auth()->user()->email)->queue(
            new TodoCreated($todos)
        );
        // $todo->create($request->all());
        // return response(null, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        $this->authorize('update', $todo);
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        $this->authorize('update', $todo);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $attributes=request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:3'],
         ]);
        $todo->update($attributes);
        return redirect('/todos')->with('success', 'data Updated');

        // $todo->update($request->all());
        // return response(null, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json([
            'success' => true,
            'msg' => 'The item has been deleted'
        ]);
    }
}
