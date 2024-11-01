<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use APP\Models\User;
use App\Notifications\TaskStatusNotification;
use Illuminate\Support\Facades\Auth;
use App\Events\TaskStatusUpdated;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all(); // Retrieve all tasks
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Task creation logic...
    $task = Task::create($request->all());
    broadcast(new TaskStatusUpdated($task, 'A new task has been assigned to you.'));
    return redirect()->route('tasks.index')->with('success', 'Task created and notification broadcasted.');
   
}

    /**
     * Display the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id); // Retrieve task by ID
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $users = User::all();
        return view('tasks.edit', compact('task', 'users'));
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Task update logic...
    $task = Task::findOrFail($id);
    $task->update($request->all());
    broadcast(new TaskStatusUpdated($task, 'The status of your task has been updated.'));
    return redirect()->route('tasks.index')->with('success', 'Task updated and notification broadcasted.');
   
}

    /**
     * Remove the specified task from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
