<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
<form role="form" method="post" action="test1_act.php">
<div ng-app="app" ng-controller="myCtrl">
  <select ng-model="selectedItem" ng-options="c.rate as c.name for c in invoice.items"></select></td>
  <td><input type="text"  ng-model="selectedItem" id="trate" name="trate"  />
  <button type="submit" class="btn btn-info pull-right" onClick="return confirm('Are You Sure Want to Submit?');" >Save Changes</button>
  
</div>
</form>
<script>
angular.module("app", [])
  .controller("myCtrl", function($scope) {
    $scope.selectedItem = '';
    $scope.invoice = {
      items: [{
          id: 1,
          name: 'Basic',
          rate: 299
        },
        {
          id: 2,
          name: 'Advanced',
          rate: 499
        }
      ]
    };
    $scope.show = function(item) {
      return item.name + '(' + item.rate + ')';
    }
  });
</script>