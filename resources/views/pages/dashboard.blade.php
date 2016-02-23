@extends('layout')

@section('content')
  <div class="wrapper" ng-app="dashboard" ng-controller="DashboardController as vm">
    <div class="container">
      <h1 class="text-center">Your Lists</h1>

      <div class="no-lists" ng-show="vm.lists.length == 0">
        <h2>You don't have any lists, why not <a href="/new/list">make one</a></h2>
      </div>

      <div class="lists" ng-show="vm.lists.length != 0"></div>
    </div>
  </div>
@endsection
