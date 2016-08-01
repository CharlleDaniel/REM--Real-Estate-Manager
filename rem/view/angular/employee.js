var myApp = angular.module('employeeApp', []);

myApp.controller('PostEmployeeController', function($scope, $http){
  var message = document.getElementById("message2");
  
  $scope.postEmployee = function () {

   var request =$http.post("/controller/EmployeeController.php", $scope.employee);

    request.then(function(response) {
      if(response.data.tag == 'erro'){
        message.textContent = response.data.msg;
      }
      else{
        window.location='./';
      }
    });

  }
});

myApp.controller('UpdateEmployeeController', function($scope, $http){

  var message = document.getElementById("message2");

  $scope.updateEmployee = function () {

    var request =$http.put("../controller/EmployeeController.php", $scope.employee);

    request.then(function(response) {
       if(response.data.tag=='erro')
          message.textContent = response.data.msg;
        else
          window.location='./';
    });

  }
});


myApp.controller('DeleteEmployeeController', function($scope, $http){

  var message = document.getElementById("message2");

  $scope.deleteEmployee = function () {

    var request =$http.delete("../controller/EmployeeController.php", $scope.employee);

    request.then(function(response) {
       if(response.data.tag=='erro')
          message.textContent = response.data.msg;
        else
          window.location='./';
    });
  
  }
});
