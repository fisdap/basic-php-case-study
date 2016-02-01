@extends('layouts.app')

@section('content')

<div class="add-form">
<!-- New Task Form -->
<form action="{{ url('task') }}" method="POST">
{!! csrf_field() !!}

<!-- Task Name -->
    <div class="tm-heading">
    	<label for="task">Add Task</label>
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
        	<p class="tm-label"><label for="New Task">New Task</label></p>
            <p class="tm-input"><input type="text" name="name" id="task-name" class="tm-input-style" ></p>
        </div>
        <div class="tm-control">
        	<p class="tm-label"><label for="Status">Status</label></p>
            <p class="tm-input">
                <select name="status" id="task-status" class="tm-input-style">
            	   <option value="Open">Open</option>
            	   <option value="Completed">Completed</option>
                </select>
            </p>
        </div>
        <div class="tm-control">
            <p class="tm-label"><label for="Assigned To">Assigned To</label></p>
            <p class="tm-input">
                <select multiple name="assigned[]" id="task-assigned" class="tm-input-style" >
                    <option value="Manager">Manager</option>
                    <option value="Developer">Developer</option>
                    <option value="Analyst">Analyst</option>
                    <option value="Tester">Tester</option>
                </select>
            </p>
        </div>
        <div class="tm-control">
            <p class="tm-label"><label for="Description">Description</label></p>
        	<p class="tm-input">
                <textarea name="description" id="task-description" class="tm-input-style" rows="7" cols="10"></textarea>
            </p>
        </div>
        <!-- Add Task Button -->
        <div class="tm-control">
        	<button type="submit" class="tm-button">Add Task</button>
            <span class="tm-back"><a href="{{url('/')}}"><< Back To Task Manager</a></span>
        </div>
    </div>
</form>
</div>
@endsection