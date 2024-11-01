@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Title -->
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
    </div>

    <!-- Description -->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
    </div>

    <!-- Due Date -->
    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" value="{{ $task->due_date }}" class="form-control" required>
    </div>

    <!-- Priority -->
    <div class="form-group">
        <label for="priority">Priority</label>
        <select name="priority" class="form-control" required>
            <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
            <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
        </select>
    </div>

    <!-- Status -->
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    <div class="form-group">
        <label for="user_id">Assign to User</label>
        <select name="user_id" class="form-control" required>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($task) && $task->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
            @endforeach
        </select>
    </div>


    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
@endsection