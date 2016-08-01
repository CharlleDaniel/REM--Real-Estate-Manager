var myApp = angular.module('contractApp', []);

myApp.controller('ClientsController', function($scope,$http){

	$scope.getClients = function () {
		$http.get("../controller/ClientController.php").then(

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

