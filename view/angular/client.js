var myApp = angular.module('clientApp', []);

myApp.controller('PostClientController', function($scope, $http){
  
  var message = document.getElementById("message");

  $scope.postClient = function () {
   
    var request =$http.post("rem/controller/ClientController.php", $scope.client);

    request.then(function(response) {
      if(response.data.tag =='erro'){
          message.textContent = response.data.msg;
      }
      else{
        window.location='./';
      }
    });
  }
  
});

myApp.controller('UpdateClientController', function($scope, $http){

  var message = document.getElementById("message");

  $scope.updateClient = function () {
    
    var request =$http.put("rem/controller/ClientController.php", $scope.client);

    request.then(function(response) {
       if(response.data.tag=='erro')
          message.textContent = response.data.msg;
        else
          window.location='./';
    });
  }
});

myApp.controller('DeleteClientController', function($scope, $http){

  var message = document.getElementById("message");

  $scope.deleteClient = function () {
    
    var request =$http.delete("rem/controller/ClientController.php", $scope.client);

    request.then(function(response) {
       if(response.data.tag=='erro')
          message.textContent = response.data.msg;
        else
          window.location='./';
    });
  }
});

myApp.controller('ClientsController', function($scope,$http){

  $scope.getClients = function () {
    $http.get("rem/controller/ClientController.php").then(

      function success(response){
        $scope.clients = angular.fromJson(response.data.result);
      },

      function error(response){
        console.log("Erro ao capturar Clientes");
      }
    )
  }

  $scope.getClients();
});


 