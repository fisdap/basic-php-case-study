@extends('layouts.app')
@section('content')

@foreach ($tasks as $task)

<div class="add-form">
<!-- Edit Task Form -->
<form action="{{ url('edit/'.$task->id) }}" method="POST">
{!! csrf_field() !!}

<!-- Edit Task Details -->
    <div class="tm-heading">
    	<label for="task">Edit Task Details</label>
    </div>
    
    <div class="tm-content">
        <!-- To Display Errors -->
        @if (count($errors) > 0)
        <div class="tm-control">
            <!-- Form Error List -->
            <span class="alert-error">
                <strong>Errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </span>
        </div>
        @endif
        <!-- End Of Display Errors -->
        <div class="tm-control">
            <p class="tm-label"><label for="Task Name">Task Name</label></p>
            <p class="tm-input">
                <input type="text" name="name" id="task-name" value={{$task->task_name}} class="tm-input-style" readonly>
            </p>
        </div>
        <div class="tm-control">
            <p class="tm-label"><label for="Status">Status</label></p>
            <p class="tm-input">
                <select name="status" id="task-status" class="tm-input-style">
                    <option @if ($task->task_status == 'Open') selected @endif value-"Open">Open</option>
                    <option @if ($task->task_status == 'Completed') selected @endif value="Open">Completed</option>
                </select>
            </p>
        </div>
        <div class="tm-control">
            <p class="tm-label"><label for="Assigned To">Assigned To</label></p>
            <p class="tm-input">
                <select multiple name="assigned[]" id="task-assigned" class="tm-input-style">
                    <option @if (strpos($task->task_assigned,"Manager") !== false) selected @endif value="Manager">Manager</option>
                    <option @if (strpos($task->task_assigned,"Developer") !== false) selected @endif value="Developer">Developer</option>
                    <option @if (strpos($task->task_assigned,"Analyst") !== false) selected @endif value="Analyst">Analyst</option>
                    <option @if (strpos($task->task_assigned,"Tester") !== false) selected @endif value="Tester">Tester</option>
                </select>
            </p>
        </div>
        <div class="tm-control">
            <p class="tm-label"><label for="Description">Description</label></p>
            <p class="tm-input">
                <textarea name="description" id="task-description" class="tm-input-style" rows="7" cols="10">{{$task->task_description}}</textarea>
            </p>
        </div>
        <!-- Update Task Button -->
        <div class="tm-control">
        	<button type="submit" class="tm-button">Update Task</button>
            <span class="tm-back"><a href="{{url('/')}}"><< Back To Task Manager</a></span>
        </div>
    </div>
</form>
</div>

@endforeach
@endsection