@extends('layout')

@section('content')
  <div class="wrapper" ng-app="dashboard" ng-controller="DashboardController as vm" ng-init="vm.getSeries()">
    <div class="container">
      <h1 class="text-center">Your Series (Lists)</h1>


      <div class="row">
        <div class="col-xs-12 col-sm-4 col-sm-offset-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="text-center panel-title">
                New Series
              </h3>
            </div>
            <div class="panel-body">
              <div class="alert alert-danger" ng-show="vm.newSeriesErrors.length != 0">
                <p ng-repeat="error in vm.newSeriesErrors">
                  @{{error}}
                </p>
              </div>
              <form ng-submit="vm.createSeries()">
                <div class="form-group">
                  <label for="">Series Name</label>
                  <input type="text" class="form-control" ng-model="vm.newSeries.name">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary pull-right">Create</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-4" ng-repeat="series in vm.series" ng-init="vm.newTask[series.id] = {}">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="text-center panel-title">
                @{{series.name}}
                <span class="pull-right">
                  <i class="fa fa-trash-o" ng-click="vm.deleteSeries(series.id)"></i>
                </span>
              </h3>
            </div>
            <div class="panel-body">
              <div class="alert alert-danger" ng-show="vm.newSeriesErrors.length != 0">
                <p ng-repeat="error in vm.newSeriesErrors">
                  @{{error}}
                </p>
              </div>
              <form class="clearfix" ng-submit="vm.createTask(series.id)" ng-init="vm.newTask[series.id].state = 'Open'; vm.newTask[series.id].errors = []">
                <div class="alert alert-danger" ng-show="vm.newTask[series.id].errors.length != 0">
                  <p ng-repeat="error in vm.newTask[series.id].errors">
                    @{{error}}
                  </p>
                </div>
                <div class="form-group">
                  <label for="">Task Name *</label>
                  <input type="text" class="form-control" ng-model="vm.newTask[series.id].name">
                </div>
                <div ng-show="vm.newTask[series.id].toggleMore" ng-init="vm.newTask[series.id].toggleMore = false">
                  <div class="form-group">
                    <label for="">Task Description</label>
                    <textarea class="form-control" ng-model="vm.newTask[series.id].description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">State</label>
                    <select class="form-control" ng-model="vm.newTask[series.id].state">
                      <option value="Open">Open</option>
                      <option value="Completed">Completed</option>
                      <option value="Todo">Todo</option>
                      <option value="Doing">Doing</option>
                      <option value="Done">Done</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <a href="#" ng-click="vm.newTask[series.id].toggleMore = !vm.newTask[series.id].toggleMore">
                    <span ng-show="vm.newTask[series.id].toggleMore">
                      Hide details
                    </span>
                    <span ng-show="!vm.newTask[series.id].toggleMore">
                      Show More Options
                    </span>
                  </a>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary pull-right">Add Task</button>
                </div>
              </form>

              <hr>

              <ul class="list-group">
                <li class="list-group-item" ng-repeat="task in vm.series[$index].tasks">
                  @{{task.name}}
                  <span class="pull-right">
                    <i class="fa fa-trash-o" ng-click="vm.deleteTask(task.id)"></i>
                  </span>

                  <div ng-show="task.description">
                    <br>
                    @{{task.description}}
                  </div>

                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
