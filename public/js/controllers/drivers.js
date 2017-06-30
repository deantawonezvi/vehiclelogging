angular.module('driversApp', [])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $http.get('/api/driver/get')
            .then(function (data) {
                $scope.drivers = data.data;
            }, function (error) {
                console.log(error)
            });
        $scope.open = function (driver) {
            console.log(driver)
        };
        $scope.edit = function (driver) {
            $('#editModal').appendTo("body").modal('show');
        };
        $scope.delete = function (driver) {
            console.log(driver)
        }
    }]);

