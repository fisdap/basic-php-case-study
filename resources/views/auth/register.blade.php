@extends('layout')

@section('content')
  <div class="auth" ng-app="auth" ng-controller="RegisterController as vm">
    <div class="container">
      <h1>Register</h1>

      <form ng-submit="vm.submit()">
        <div class="alert alert-danger" ng-show="vm.errors.length != 0">
          <ul>
            <li ng-repeat="error in vm.errors">@{{error}}</li>
          </ul>
        </div>
        <div class="form-group">
          <label for="">Email:</label>
          <input type="text" ng-model="vm.user.email" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Password:</label>
          <input type="password" ng-model="vm.user.password" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Confirm Password:</label>
          <input type="password" ng-model="vm.user.password_confirmation" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary pull-right">Register!</button>
        </div>
      </form>
    </div>
  </div>
@endsection
