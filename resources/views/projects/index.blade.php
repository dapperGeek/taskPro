@extends('layout')
@section('content')
    <table>
        <thead>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Desc.</th>
            <th>Due Date</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <?php $r = 1 ?>
        @foreach($projects as $project)
            <tr>
                <td>{{$r}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->due_date}}</td>
                <td><a href="{{ route('projects.show', ['id' => $project->id]) }}">View</a></td>
            </tr>
                <?php $r++ ?>
        @endforeach
        </tbody>
    </table>

@endsection
