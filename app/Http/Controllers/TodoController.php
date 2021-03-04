<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodolistRequest;
use App\Labels;
use App\todolist;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todolists = todolist::orderBy('label_id','asc')->get();
        return view('todo.index')->with('item',$todolists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $labels = Labels::all();
        return view('todo.create')->with('label',$labels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTodolistRequest $request)
    {
        //
        todolist::create($request->validated());
        return redirect()->route('todolist.index')->with('status','Succesfully added the list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(todolist $todolist)
    {
        //
        return view('todo.show')->with('items',$todolist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(todolist $todolist)
    {
        //
        $labels = Labels::all();
        return view('todo.edit')->with(compact('labels', 'todolist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, todolist $todolist)
    {
        //
        // dd($request);
        $todolist->name = $request->name;
        $todolist->label_id = $request->label_id;
        $todolist->save();

        $message = ($todolist->wasChanged()) ? 'Succesfully update: ' . $todolist->name : 'Nothing was change' ;
        return redirect()->route('todolist.index')->with('status', $message);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(todolist $todolist)
    {
        //
        $todolist->delete();
        return redirect()->route('todolist.index')->with('meassage','Successfully delete the list');
    }
}
