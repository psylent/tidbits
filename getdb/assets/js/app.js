(function(){

  var app = angular.module('fetchdb', []);

  app.controller('dbCtrl', function ($scope, $http) {
		$http.get("fetch.php")
    .then(function (response) {
      $scope.list = response.data;
    }, function () {
      console.log("theres an error");
    });
    $scope.orderByMe = function(x) {
      $scope.myOrderBy = x;
    }
	});

})();
