<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    public function index()
    {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('Task.index', [
        'tasks' => $tasks
    ]);
    }
    public function delete($id){
        $task=Task::find($id);
        $task->delete();
        return redirect('/');



    }
    public function edit($id){
        $task = Task::find($id);
        return view('Task.edit', [
            'task' => $task ,

        ]);

    }
    public function update($id, Request $request){
        $requestData= $request->all();
        $task= Task::find($id);
        $task->update($requestData);
        $task->save();
        return redirect()->route('Task.index')->with('success', "TODO updated successfully!");

    }
    public function create()
    {
        return view('Task.create', [
            'tasks' => Task::all()
        ]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
              return redirect()->route('Task.create')
              ->withInput()
              ->withErrors($validator);
        }


        $task = new Task;
        $task->name = $request->name;
        $z= $task->save();
        console.log($z);

        return redirect('/');

    }

}
