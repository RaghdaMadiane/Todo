<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    $userId =Auth::id();
    $tasks = Task::where('user_id',$userId)->orderBy('created_at', 'asc')->get();
    return view('Task.index', [
        'tasks' => $tasks
    ]);
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
        $userId =Auth::id();
        $task = new Task;
        $task->name = $request->name;
        $task->user_id= $userId;
        $task->save();
        return redirect()->route('Task.index');

    }
    public function delete($id){
        $task=Task::find($id);
        $task->delete();
        return redirect()->route('Task.index');



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



}
