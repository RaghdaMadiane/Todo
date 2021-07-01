<?php
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TasksController;
Auth::routes();
//show  tasks
Route::get('/', [TasksController::class, 'index'])->name('Task.index');
//add new task
Route::post('/task',[TasksController::class, 'store'])->name('Task.store');
Route::get('Task/newtask',[TasksController::class, 'create'])->name('Task.create');
//delete task by id
Route::delete('/Task/delete/{task}', [TasksController::class, 'delete'])->name('Task.delete');
//edit task by id
Route::get('/Task/{task}/edit', [TasksController::class, 'edit'])->name('Task.edit');
Route::put('/Task/{task}', [TasksController::class, 'update'])->name('Task.update');
