(function() {

  'use strict';

  angular
    .module('auth')
    .controller('RegisterController', RegisterController);

  RegisterController.$inject = ['$http'];
  function RegisterController($http) {
    var vm = this;

    // Holds form errors to be displayed
    vm.errors = [];

    vm.user = {};

    vm.submit = function() {
      $http.post('/api/v1/register', vm.user)
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
