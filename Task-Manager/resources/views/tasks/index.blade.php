@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="color: rgb(0, 0, 0); 
        font-size: 60px; 
        text-align: center;">Task List</h1>
        
        <!-- Button to create a new task -->
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>
        

        <!-- Display tasks in a table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>{{ ucfirst($task->priority) }}</td>
                        <td>{{ ucfirst($task->status) }}</td>
                        <td>{{ $task->user->name ?? 'Unassigned' }}</td>
                        <td>    <!-- View Task Button -->
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">View</a>
                            
                            <!-- Edit Task Button -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Task Form -->
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
