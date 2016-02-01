@extends('layouts.app')

@section('content')

<div class="add-form">
<!-- Task Details Page -->
<form action="{{ url('task') }}" method="POST">
{!! csrf_field() !!}

<!-- Task Details -->
    <div class="tm-heading">
    	<label for="task">Task Details</label>
    </div>
    @foreach ($tasks as $task)
    <div class="tm-content">
        <div class="tm-control">
            <p class="tm-label"><label for="Task Name">Task Name</label></p>
            <p class="tm-input">{{$task->task_name}}</p>
        </div>
        <div class="tm-control">
            <p class="tm-label"><label for="Status">Status</label></p>
            <p class="tm-input">{{$task->task_status}}</p>
        </div>
        <div class="tm-control">
            <p class="tm-label"><label for="Assigned To">Assigned To</label></p>
            <p class="tm-input">{{$task->task_assigned}}</p>
        </div>
        <div class="tm-control">
            <p class="tm-label"><label for="Description">Description</label></p>
            <p class="tm-input"><textarea class="tm-input-style" rows="7" cols="10" readonly>{{$task->task_description}}</textarea></p>
        </div>
        <div class="tm-control">
            <p class="tm-back"><a href="{{url('/')}}"><< Back To Task Manager</a></p>
        </div>
    </div>
    @endforeach
</form>
</div>
@endsection