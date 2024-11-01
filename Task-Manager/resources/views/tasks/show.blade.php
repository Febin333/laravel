@extends('layouts.app')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Due Date: {{ $task->due_date }}</p>
    <p>Priority: {{ ucfirst($task->priority) }}</p>
    <p>Status: {{ ucfirst($task->status) }}</p>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
@endsection
