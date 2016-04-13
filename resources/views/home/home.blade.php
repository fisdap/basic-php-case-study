@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
                <div class="panel-body">
                    @if(Auth::guest())
                        Please login to create a new task list.
                    @else
                        <button class="btn btn-success" onclick="window.location='{{ route("taskList.create") }}'"><i class="fa fa-plus"></i> New List</button>
                    @endif
                </div>
            </div>
            <div class="row">
                @foreach($lists as $list)
                    <?php
                    $tasks = $list->tasks->count();
                    $complete = $list->completedTasks->count();

                    if($tasks > 0) {
                        $percent = number_format($complete/$tasks * 100);
                    } else {
                        $percent = 0;
                    }
                    ?>

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{$list->name}}</div>

                            <div class="panel-body">
                                <p>{{$list->description}}</p>
                                <hr/>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped {{($percent < 40?'progress-bar-danger':($percent < 80?'progress-bar-warning':'progress-bar-success'))}}"
                                         role="progressbar" aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}%">
                                        {{$percent}}%
                                    </div>
                                </div>
                                <hr/>
                                <table class="tasks-table table table-condensed table-bordered">
                                    <tr>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                    @foreach($list->tasks as $task)
                                        <tr>
                                            <td>{{$task->status}}</td>
                                            <td>{{$task->description}}</td>
                                            <td>
                                                <a href="{{route('task.delete', ['task_id' => $task->id])}}"><i class="edit-button fa fa-ban"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <button class="btn btn-success" onclick="window.location='{{ route("task.create", ['task_list_id' => $list->id]) }}'"><i class="fa fa-plus"></i> New Task</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
