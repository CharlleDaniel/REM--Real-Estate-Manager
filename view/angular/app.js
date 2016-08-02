var app = angular.module('app',['ngRoute']);

app.config(function($routeProvider, $locationProvider)
{
   $locationProvider.html5Mode(true);
   $routeProvider 
   //'/home', carregaremos o template home.html e o controller 'HomeCtrl'
      

   .when('/rem/home', {
      templateUrl : 'rem/view/pages/home.php',
      controller     : 'HomeCtrl',
   })
    
   .when('/rem/imoveis', {
      templateUrl : 'rem/view/pages/gerenciar_imoveis.php',
      controller     : 'GerImoCtrl',
   })

 
   // caso não seja nenhum desses, redirecione para a rota '/home'
   .otherwise ({ redirectTo: '/rem/home' });

   
});
