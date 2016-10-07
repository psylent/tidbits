<!DOCTYPE html>
<html ng-app="fetchdb">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script type="text/javascript" src="assets/js/angular.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1>Search</h1>
          <div ng-controller="dbCtrl">
          <input type="text" ng-model="searchFilter" class="form-control">
      		<table class="table table-hover">
      			<thead>
      				<tr>
      					<th ng-click="orderByMe('id')">ID</th>
      					<th ng-click="orderByMe('name')">Name</th>
                <th ng-click="orderByMe('city')">City</th>
                <th ng-click="orderByMe('country')">Country</th>
      				</tr>
      			</thead>
      			<tbody>
      				<tr ng-repeat="x in list | filter:searchFilter | orderBy:myOrderBy ">
      					<td>{{x.id}}</td>
      					<td>{{x.name}}</td>
                <td>{{x.city}}</td>
                <td>{{x.country}}</td>
      				</tr>
      			</tbody>
      		</table>
        </div>
        </div>
      </div>
    </div>

  </body>
</html>
