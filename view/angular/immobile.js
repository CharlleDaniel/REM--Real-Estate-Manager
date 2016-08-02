var myApp = angular.module('immobileApp', []);

myApp.controller('PostImmobileController', function($scope, $http){
  var message = document.getElementById("message3");

  $scope.postImmobile = function () {

    var request =$http.post("rem/controller/ImmobileController.php", $scope.immobile);

    request.then(function(response) {
      if(response.data.tag=='erro'){
        message.textContent = response.data.msg;
      }
      else{
        window.location='./';

      }  
    });  
  }
});

myApp.controller('UpdateImmobileController', function($scope, $http){

  var message = document.getElementById("messageUpdate");
  $scope.updateOwner = function (id) {
    $scope.owner=id;
  }

  $scope.updateImmobile = function () {   
    var data = {
      id: $scope.id,
      immobile: $scope.immobile,
      owner:$scope.owner,
      address: $scope.address,
      rentValue: $scope.rentValue,
      valuedValue: $scope.valuedValue,
      description: $scope.description,
    };
    var request =$http.put("rem/controller/ImmobileController.php", data);
    request.then(function(response) {

      if(response.data.tag=='erro')
        message.textContent = response.data.msg;
      else
        window.location='./';
    });     
  }

});

myApp.controller('DeleteImmobileController', function($scope, $http){
  var message = document.getElementById("message3");

  $scope.deleteImmobile = function (id) {
    var input = {
      id: id
    };

    var request =$http.delete("rem/controller/ImmobileController.php", {data: input});

    request.then(function(response) {
      if(response.data.tag=='erro')
        alert(response.data.msg);
      else
        getImmobiles();
    });  
  }
});

function setPageSelected(p){ 
  var d = document.getElementById('pagination').querySelectorAll('*');
  var id='#'+p+'';

  for(var i = 0; i<d.length;i++){ 
    var idSelected='#'+d[i].id+''; 
    if ( $(idSelected).hasClass('btn btn--basic current') ){
      $(idSelected).removeClass('btn btn--basic current');
      $(idSelected).addClass('btn btn--basic');
    }
  }  

  $(id).removeClass('btn btn--basic'); 
  $(id).addClass('btn btn--basic current');
}

var getImmobiles=null;
myApp.controller('GetImmobilesController', function($scope, $http){

  var message = document.getElementById("pagination");
  $scope.getImmobiles = function (page) {
      //Page default 1
      if(page == null){
        page = 1;
      }
      //Page parameter
      var data = {
        page: page
      };

      var config = {
       params: data,
     };

     $http.get("rem/controller/ImmobileController.php",config).then(
      function success(response){
        $scope.immobiles = angular.fromJson(response.data.result);
        $scope.qtdPages = response.data.qtdPages;
        $scope.pages = [];

        for(var cont = 1; cont <= $scope.qtdPages; cont++){
          $scope.pages.push(cont);
        };
        setPageSelected(page);

      },

      function error(response){
        console.log("Imóveis não capturados!");
      }      
      );
   }
    $scope.getImmobiles();
    getImmobiles=$scope.getImmobiles;

 });

myApp.controller('GetImmobileController', function($scope, $http){

 $scope.getImmobilesNoPage = function () {

   $http.get("rem/controller/ImmobileController.php").then(
    function success(response){
      $scope.immobiles = angular.fromJson(response.data.result);

    },

    function error(response){
      console.log("Imóveis não capturados!");
    }

    );
 }

 $scope.getImmobilesNoPage();
});
var result=null;
myApp.controller('GetImmobileIdController', function($scope, $http){

 $scope.getImmobileId = function (id) {
  var data = {
    id:id
  };

  var config = {
   params: data,
 };

 $http.get("rem/controller/ImmobileController.php", config).then(
  function success(response){
    result=response.data.result;
    getValues();

  },

  function error(response){
    console.log("Imóveis não capturados!");
  }

  );   
}


});

var getValues=null;
myApp.controller('GetImmobileValuesController', function($scope, $http){

  $scope.getValues = function () {
    $scope.immobile=result.immobile; 
    $scope.id=result.id;
    $scope.address=result.address;
    $scope.owner=result.owner;
    $scope.rentValue=result.rentValue;
    document.getElementById("rentValue").value=result.rentValue;
    $scope.valuedValue=result.valuedValue;
    document.getElementById("valuedValue").value=result.valuedValue;
    $scope.description=result.description;
  }

  getValues=$scope.getValues;

});



myApp.directive('immobile', function immobileDirective(){
  return{
    restrict: 'E',
    templateUrl: 'rem/view/pages/immobile.html',
    scope: {
      address: '=immobileAddress',
      description: '=immobileDescription',
      rentValue: '=immobileRent',
      id:'=immobileId',
    },
  };
});