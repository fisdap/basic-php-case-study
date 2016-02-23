(function() {

  'use strict';

  angular
    .module('dashboard')
    .controller('DashboardController', DashboardController);

  DashboardController.$inject = ['$http'];

  function DashboardController($http) {
    var vm = this;

    vm.lists = [];

    vm.getLists = function() {
      $http.get('/api/v1/lists')
        .then(function(response) {
          if (!response.data.status) {
            vm.lists = response.data;
          }
        });
    }
  }

})();
