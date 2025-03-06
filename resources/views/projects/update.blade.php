@extends('layout')
@section('content')
    <div class="container-sm m-auto border-1">
        <h1>Update Project</h1>
        <form action="{{ route('projects.update') }}" method="POST">
            @csrf
            <input type="hidden" value="{{$project->id}}" name="id">
            <div class="mb-3">
                <label for="titleInput" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="titleInput" aria-describedby="" value="{{$project->title}}">
                @error('title')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dateInput" class="form-label">Due Date</label>
                <input name="due_date" type="date" class="form-control" id="dateInput" aria-describedby="">
                @error('due_date')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                @error('description')
                <div class="alert alert-danger mb-1">{{ $message }}</div>
                @enderror
                <label for="descInput" class="form-label">Description</label>
                <textarea name="description" type="text" class="form-control" id="descInput" aria-describedby="">{{$project->description}}</textarea>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection
