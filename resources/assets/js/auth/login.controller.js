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

  }

})();
