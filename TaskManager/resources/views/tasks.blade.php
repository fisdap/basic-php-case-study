@extends('layouts.app')

@section('content')

<!-- To display the task -->
<form action="{{ url('add') }}" method="GET">
{!! csrf_field() !!}
    <div class="tm-heading">Task Manager</div>
    <div>
        <button type="submit" class="tm-button">Add Task</button>
    </div>
</form>

@if ($increment = 1) @endif
<div class="tm-task">
    <table border="0">
        <thead>
            <th class="tm-small-row">No</th>
            <th>Name</th>
            <th>Status</th>
            <th>Assigned To</th>
            <th>Description</th>
            <th class="tm-small-row"></th>
            <th class="tm-small-row"></th>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td class="tm-small-row">{{ $increment++ }}</td>
                <td><a href="{{ url('views/'.$task->id) }}">{{ $task->task_name }}</a></td>
                <td>{{ $task->task_status }}</td>
                <td>{{ $task->task_assigned }}</td>
                <td>{{ $task->task_description }}</td>
                <td class="tm-small-row">
                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" class="tm-button">Delete</button>
                    </form>
                </td>
                <td class="tm-small-row">
                    <form action="{{ url('edit/'.$task->id) }}" method="GET">
                    {!! csrf_field() !!}
                    <i></i><button type="submit" class="tm-button">Edit</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
