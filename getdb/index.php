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
    <script type="text/javascript" src="assets/js/dirPagination.js"></script>
  </head>
  <body>
    <section>
      <div class="container">

        <div class="row" ng-controller="MyController">
          <div class="col-xs-12">
            <h1>Database</h1>
          </div>

          <div class="col-sm-9">
            <div class="input-group">
              <span class="input-group-addon">Search</span>
              <input type="text" class="form-control" ng-model="searchFilter">
            </div>
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <span class="input-group-addon">No. of items</span>
              <input type="number" min="1" max="100" class="form-control" ng-model="pageSize">
            </div>
          </div>
          <div class="col-sm-12">
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
                <tr dir-paginate="x in list | filter:searchFilter | itemsPerPage: pageSize | orderBy:myOrderBy">
                  <td>{{x.id}}</td>
                  <td>{{x.name}}</td>
                  <td>{{x.city}}</td>
                  <td>{{x.country}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row" ng-controller="OtherController">
          <div class="col-xs-12">
            <div class="other-controller">
              <div class="text-center">
                <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="dirPagination.tpl.html"></dir-pagination-controls>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </body>
</html>
