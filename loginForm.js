var myApp = angular.module('formsApp', []);

myApp.controller('FormsController', function ($scope, $http) {
    var message = document.getElementById("message");
    $scope.entrar = function () {
      var request =$http.post("controller/AccessSystemController.php", $scope.user);

    request.then(function(response) {
      if(response.data.tag=='erro'){
        message.textContent = response.data.msg;
      }else{
        window.location='./';
      }
         
    });
  }
  
      
});
