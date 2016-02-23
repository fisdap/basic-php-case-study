(function() {

  'use strict';

  angular
    .module('auth')
    .controller('LoginController', LoginController);

  LoginController.$inject = ['$http'];
  function LoginController($http) {
    var vm = this;

    // Holds form errors to be displayed
    vm.errors = [];

    vm.user = {};

    vm.submit = function() {
      $http.post('/api/v1/login', vm.user)
        .then(function(response) {
          if (response.data.status == 'success') {
            window.location.href = '/dashboard';
          } else {
            vm.errors = response.data.errors;
          }
        });
    }
  }

})();
