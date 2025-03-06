@extends('layout')
@section('content')
    <div class="container">
        <h2>View Project</h2>
        <div class="row">
            Title : {{$project->title}}
        </div>
        <div class="row">
            Date : {{date('jS M Y', strtotime($project->due_date)) }}
        </div>
        <div class="row">
            Info : {{$project->description}}
        </div>

        <div class="row">
            <a href="{{ route('projects.edit', ['id' => $project->id]) }}">Edit Project</a>
        </div>
        <div class="row">
            <a href="{{ route('projects.destroy', ['id' => $project->id]) }}">Delete Project</a>
        </div>
    </div>
@endsection()
