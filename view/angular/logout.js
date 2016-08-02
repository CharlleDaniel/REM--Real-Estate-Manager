var myApp = angular.module('logoutApp', []);

myApp.controller('LogoutController', function ($scope, $http) {
  var message = document.getElementById("message");
  $scope.sair = function () {

    var request =$http.post("rem/controller/LogoutSystemController.php");

    request.then(function(response) {
      window.location='/login';

    });
  }


});