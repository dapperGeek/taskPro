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
            @foreach($tasks as $task)
                <tr>
                    <td>{{$r}}</td>
                    <td>{{$tasks->title}}</td>
                    <td>{{$task->description}}</td>
                    <td>{{$task->due_date}}</td>
                    <td><a href="{{ route('tasks.show', ['id' => $task->id]) }}">View</a></td>
                </tr>
                <?php $r++ ?>
            @endforeach
        </tbody>
    </table>

@endsection
