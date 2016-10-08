(function(){

  var app = angular.module('fetchdb', ['angularUtils.directives.dirPagination']);

  function MyController($scope, $http) {
    $scope.currentPage = 1;
    $scope.pageSize = 2;

		$http.get("fetch.php")
    .then(function (response) {
      $scope.list = response.data;
    }, function () {
      console.log("theres an error");
    });

    $scope.orderByMe = function(x) {
      $scope.myOrderBy = x;
    };

    $scope.pageChangeHandler = function(num) {
      // console.log('meals page changed to ' + num);
    };
	}

  function OtherController($scope) {
    $scope.pageChangeHandler = function(num) {
      // console.log('going to page ' + num);
    };
  }

  app.controller('MyController', MyController);
  app.controller('OtherController', OtherController);

})();
