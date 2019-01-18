<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Todo;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Todo $todo)
    {
        $this->authorize('update', $todo);
        $users=User::all();
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Todo $todo)
    {
        $this->authorize('update', $todo);
        $users = User::all();
        return view('admin.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes=$request->validate([
            'user_id'=>['required'],
            'title'=>['required','min:3'],
            'description'=>['required','min:3'],
         ]);
        $todos=Todo::create($attributes);
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Todo $todo)
    {
        $this->authorize('update', $todo);
        $todos=User::find($id)->todos;
        return view('admin.show', compact('todos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Todo $todo)
    {
        $todo=Todo::find($id);
        $this->authorize('update', $todo);
        return view('admin.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes=request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:3'],
         ]);
        Todo::find($id)->update($attributes);
        return redirect('/admin')->with('success', 'data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::find($id)->delete();
        return response()->json([
            'success' => true,
            'msg' => 'The item has been deleted'
        ]);
    }
}
