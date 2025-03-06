@extends('layout')
@section('content')
    <div class="container">
        <h2>View Task</h2>
        <div class="row">
            Title : {{$task->title}}
        </div>
        <div class="row">
            Date : {{date('jS M Y', strtotime($task->due_date)) }}
        </div>
        <div class="row">
            Info : {{$task->description}}
        </div>

        <div class="row">
            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit Task</a>
        </div>
        <div class="row">
            <a href="{{ route('tasks.destroy', ['id' => $task->id]) }}">Delete Task</a>
        </div>
    </div>
@endsection()
