<!DOCTYPE html>
<html>
    <head>
        <title>Bryan Ware Case Study</title>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/common.css">
        <link rel="stylesheet" href="/css/jquery-ui.min.css">
        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
    </head>
    <body ng-app="taskApp">
        <div class="full-container">
            <nav class="navbar navbar-default">
                <div class="container-fluid" ng-controller="addCtrl">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#">Bryan Ware Case Study</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" class="addTask" ng-click="addTask()"><i class="fa fa-plus-square"></i> Add Task</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-tasks loading-container">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            <div class="container-tasks" ng-controller="getCtrl">
                <div class="task-column" ng-repeat="status in statuses" data-column-type="{[{ status.id }]}">
                    <div class="task-header">
                        {[{ status.name }]}
                    </div>
                    <div class="task-content task-column-{[{ status.id }]}" ng-controller="getTaskCtrl" ng-init="getTasks(status.id)" id="sortableColumn{[{ status.id }]}" class="connectedSortable">

                    </div>
                </div>
            </div>
        </div>

        <div class="add-container" ng-controller="submitTaskCtrl" style="display:none">
            <div class="add-wrapper">
                <div class="close-wrapper" ng-click="closeAdd()"><i class="fa fa-times"></i></div>
                <div class="add-header">
                    Add Task
                </div>
                <div class="add-content">
                    <form id="addTaskForm">
                        <input type="hidden" class="edit-task" name="edit" value="" />
                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" name="task_name" class="form-control task-title-add" id="inputTitle" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="task-desc">Task List Type</label>
                            <select name="task_group" class="form-control">
                                <option ng-repeat="group in task_groups" value="{[{ group.id }]}">
                                    {[{ group.name }]}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="task-desc">Description</label>
                            <textarea class="form-control task-desc-add" name="task_description" id="task-desc" rows="3" placeholder="Description"></textarea>
                        </div>
                        <a class="btn btn-primary submit-task" ng-click="submitAdd()">Submit Task</a>
                        <a class="btn btn-default close-task" ng-click="closeAdd()">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
$(document).ready(function(){
    $('.container-tasks').height($(window).height() - $('.navbar').height());
});

var app = angular.module('taskApp', []);

app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{');
    $interpolateProvider.endSymbol('}]}');
});

app.controller('getCtrl', function($scope, $http) {

    $scope.statuses = {};

    $http.get("/status/")
    .then(function(response) {
        $('.loading-container').hide();

        $scope.statuses = response.data;
    });
});

app.controller('getTaskCtrl', function($scope, $http) {
    $scope.getTasks = function(type) {
        var type = type;
        $http.get("/task/" + type)
        .then(function(response) {
            $.each(response.data,function(key, value) {
                $('.task-column-' + type).append('<div class="task-list task-complete-' + value.id + '" style="background-color:' + value.color + '">' +
                        '<h5 class="title' + value.id + '">' + value.task_title + '</h5>' +
                        '<div class="tash-desc-list desc' + value.id + '">' + value.task_description + '</div>' +
                        '<div class="task-options"><div class="option-button edit-task" data-value="' + value.id + '"><i class="fa fa-pencil-square-o"></i></div><div class="option-button trash-button" data-value="' + value.id + '"><i class="fa fa-trash-o"></i></div>' +
                        '<div class="pull-right">' + 
                        '   <div class="option-button move" data-type="left" data-direction="' + value.status_id + '" data-value="' + value.id + '"><i class="fa fa-arrow-left"></i></div>' +
                        '   <div class="option-button move" data-type="right" data-direction="' + value.status_id + '" data-value="' + value.id + '"><i class="fa fa-arrow-right"></i></div></div>' +
                        '</div></div>');
            });
        });
    };
});

app.controller('addCtrl', function($scope, $http) {
    $scope.addTask = function()
    {
        $('.add-container').show();
    };
});

app.controller('submitTaskCtrl', function($scope, $http) {

    $scope.task_groups;

    $http.get("/task_group/")
    .then(function(response) {
        $scope.task_groups = response.data;
    });

    $scope.closeAdd = function()
    {
        $('.add-container').hide();
        $('.task-title-add').val('');
        $('.task-desc-add').val('');
    };

    $scope.submitAdd = function()
    {
        var formData = $('#addTaskForm').serialize();
        $('.form-control').val('');

        var dataURL = '/task';
        var methodType = 'post';
        var edit = false;

        if($('.edit-task').val())
        {
            edit = true;
            methodType = 'put';
            dataURL = '/task/' + $('.edit-task').val();
        }

        $('.edit-task').val('');

        var request = $http({
            method: methodType,
            url: dataURL,
            data: formData,
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        });

        request.success(function(response){
            value = response;
            if(edit)
            {
                console.log($('task-complete-' + value.id));

                $('.task-complete-' + value.id).html('<h5 class="title' + value.id + '">' + value.task_title + '</h5>' +
                        '<div class="tash-desc-list desc' + value.id + '">' + value.task_description + '</div>' +
                        '<div class="task-options"><div class="option-button edit-task" data-value="' + value.id + '"><i class="fa fa-pencil-square-o"></i></div><div class="option-button trash-button" data-value="' + value.id + '"><i class="fa fa-trash-o"></i></div>' +
                        '<div class="pull-right">' + 
                        '   <div class="option-button move" data-type="left" data-direction="' + value.status_id + '" data-value="' + value.id + '"><i class="fa fa-arrow-left"></i></div>' +
                        '   <div class="option-button move" data-type="right" data-direction="' + value.status_id + '" data-value="' + value.id + '"><i class="fa fa-arrow-right"></i></div></div>' +
                        '</div></div>');
            }
            else
            {
                $('.task-column-1').append('<div class="task-list task-complete-' + value.id + '" style="background-color:' + value.color + '">' +
                        '<h5 class="title' + value.id + '">' + value.task_title + '</h5>' +
                        '<div class="tash-desc-list desc' + value.id + '">' + value.task_description + '</div>' +
                        '<div class="task-options"><div class="option-button edit-task" data-value="' + value.id + '"><i class="fa fa-pencil-square-o"></i></div><div class="option-button trash-button" data-value="' + value.id + '"><i class="fa fa-trash-o"></i></div>' + 
                        '<div class="pull-right">' + 
                        '   <div class="option-button move" data-type="left" data-direction="' + value.status_id + '" data-value="' + value.id + '"><i class="fa fa-arrow-left"></i></div>' +
                        '   <div class="option-button move" data-type="right" data-direction="' + value.status_id + '" data-value="' + value.id + '"><i class="fa fa-arrow-right"></i></div></div>' +
                        '</div></div>');
            }

            $scope.closeAdd();
        });
    };
});

$(document).on('click', '.trash-button', function(){
    var id = $(this).attr('data-value');

    $.ajax({
        type: "DELETE",
        url: "/task/" + id,
        success: function(response)
        {
            $('.task-complete-' + id).fadeOut(1000);
        }
    });

    return false;
});

$(document).on('click', '.edit-task', function(){
    var id = $(this).attr('data-value');
    var title = $('.title' + id).text();
    var desc = $('.desc' + id).text();

    $('.add-container').show();
    $('.edit-task').val(id);

    $('.task-title-add').val(title);
    $('.task-desc-add').val(desc);
});

$(document).on('click', '.move', function(){
    var id = $(this).attr('data-value');
    var status_id = $(this).attr('data-direction');
    var direction = $(this).attr('data-type');

    var htmlData =  $('.task-complete-' + id);

    if(direction == 'left')
    {
        status_id--;
        if(status_id <= 0) status_id = 1;
    }
    else
    {
        status_id++;
        if(status_id >= 5) status_id = 5;
    }

    $('.task-complete-' + id).find(".move").attr('data-direction', status_id);

    $('.task-complete-' + id).remove();
    $('.task-column-' + status_id).append(htmlData);

    var formData = 'type=change_status&direction=' + status_id;

    $.ajax({
        type: "PUT",
        url: "/task/" + id,
        data: formData,
        success: function(response)
        {
        
        }
    });

    return false;
});


</script>