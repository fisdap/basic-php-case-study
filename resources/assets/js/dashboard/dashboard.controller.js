(function() {

  'use strict';

  angular
    .module('dashboard')
    .controller('DashboardController', DashboardController);

  DashboardController.$inject = ['$http'];

  function DashboardController($http) {
    var vm = this;

    vm.series = [];

    vm.newSeries = {};

    vm.newSeriesErrors = [];

    vm.newTask = {};

    vm.getSeries = function() {
      $http.get('/api/v1/series')
        .then(function(response) {
          if (!response.data.status) {
            vm.series = response.data;
          }
        });
    }

    vm.createSeries = function() {
      $http.post('/api/v1/series/new', vm.newSeries)
        .then(function(response) {
          if (response.data.status == 'success') {
            vm.newSeries.name = '';
            vm.newSeriesErrors = [];
            vm.getSeries();
          } else {
            vm.newSeriesErrors = response.data.errors;
          }
        });
    }

    vm.createTask = function(seriesId) {
      vm.newTask[seriesId].series_id = seriesId;
      $http.post('/api/v1/tasks/new', vm.newTask[seriesId])
        .then(function(response) {
          if (response.data.status == 'success') {
            vm.getSeries();
            vm.newTask[seriesId].name = '';
            vm.newTask[seriesId].description = '';
          } else {
            vm.newTask[seriesId].errors = response.data.errors;
          }
        });
    }

    vm.deleteTask = function(taskId) {
      if (confirm('Really delete this task?')) {
        $http.post('/api/v1/tasks/delete', {task_id: taskId})
          .then(function(response) {
            if (response.data.status == 'success') {
              vm.getSeries();
            }
          });
      }
    }

    vm.deleteSeries = function(seriesId) {
      if (confirm('Really delete this series?')) {
        $http.post('/api/v1/series/delete', {series_id: seriesId})
          .then(function(response) {
            if (response.data.status == 'success') {
              vm.getSeries();
            }
          });
      }
    }

    vm.updateTaskState = function(taskId) {
      $http.post('/api/v1/tasks/state', {task_id: taskId, state: vm.newTaskState[taskId].state})
        .then(function(response) {
          if (response.data.status == 'success') {
            vm.newTaskState[taskId].show = false;
            vm.getSeries();
          }
        });
    }

  }

})();
