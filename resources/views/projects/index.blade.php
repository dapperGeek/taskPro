@extends('layout')
@section('content')
    <table>
        <thead>
        <tr>
            <th></th>
            <th>Title</th>
            <th>Desc.</th>
            <th>Due Date</th>
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
            </tr>
                <?php $r++ ?>
        @endforeach
        </tbody>
    </table>

@endsection
