app.controller('HomeCtrl', function($rootScope, $location)
{
   $rootScope.activetab = $location.path();
});
 
app.controller('GerImoCtrl', function($rootScope, $location)
{
   $rootScope.activetab = $location.path();
});
