(function(){

  var app = angular.module('fetchdb', ['angularUtils.directives.dirPagination']);

  app.controller('MyController', function ($scope, $http) {
    $scope.currentPage = 1;
    $scope.pageSize = 5;
    $scope.btnName = 'ADD';

    $scope.insertData = function() {
      $http.post(
        "insert.php",
        {
          'name':$scope.name,
          'city':$scope.city,
          'country':$scope.country,
          'btnName':$scope.btnName,
          'id':$scope.id
        }
      ).success(function(data) {
        // console.log("success!");
        $scope.name = null;
        $scope.city = null;
        $scope.country = null;
        $scope.btnName = 'ADD';
        $scope.displayData();
      });
    };

    $scope.updateData = function(id, name, city, country) {
  		$scope.id = id;
      $scope.name = name;
      $scope.city = city;
      $scope.country = country;
      $scope.btnName = 'UPDATE';
      $scope.updateSelect = ($scope.updateSelect == $scope.id) ? null : $scope.id;
      if ($scope.updateSelect == null) {
        $scope.id = null;
        $scope.name = null;
        $scope.city = null;
        $scope.country = null;
        $scope.btnName = 'ADD';
      }
    };

    $scope.deleteData = function(id) {
      $scope.id = id;
      $scope.name = null;
      $scope.city = null;
      $scope.country = null;
      $scope.updateSelect = null;
      $scope.btnName = 'ADD';
      if (confirm("Are you sure you want to delete this data?")) {
        $http.post("delete.php", {'id':id} )
        .success(function(data) {
          alert(data);
          $scope.displayData();
        });
      } else {
        return false;
      }
      $scope.deleteSelect = ($scope.deleteSelect == $scope.id) ? null : $scope.id;
    };

    $scope.displayData = function() {
  		$http.get("fetch.php")
      .then(function (response) {
        $scope.lists = response.data;
        angular.forEach($scope.lists, function (x) {
          x.id = parseFloat(x.id);
        });
      }, function () {
        console.log("theres an error");
      });
    };
    $scope.displayData();

    $scope.orderByMe = function(x) {
      $scope.myOrderBy = x;
    };

    $scope.pageChangeHandler = function(num) {
      // console.log('meals page changed to ' + num);
    };
	});

  app.controller('OtherController', function ($scope) {
    $scope.pageChangeHandler = function(num) {
      // console.log('going to page ' + num);
    };
  });

})();
