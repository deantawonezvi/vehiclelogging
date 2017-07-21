angular.module('driversApp', [])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/driver/get')
            .then(function (data) {
                $scope.drivers = data.data;
            }, function (error) {
                console.log(error)
            });

        $scope.add = function () {
            $scope.loader = true;
            var post = {
                name:$scope.name,
                contact_number:$scope.contact,
                drivers_licence_class:$scope.licence_class,
                crane_operating_licence:document.getElementById('crane_licence').checked,
                defensive_licence_expiry_date:$scope.licence_expiry
            };
            console.log(post);
            $http.post('/api/driver/add',post)
                .then(function (data) {
                    swal(data.data);
                    $scope.loader = false;
                    $('#myModal').modal('toggle');
                    $('#addDriverForm').trigger('reset');
                    $http.get('/api/driver/get')
                        .then(function (data) {
                            $scope.drivers = data.data;
                        }, function (error) {
                            console.log(error)
                        });
                }, function(error){
                    $scope.loader = false;
                    swal('',Object.values(error.data)[0],'error');
                })

        };
        $scope.open = function (driver) {
            console.log(driver)
        };
        $scope.edit = function (driver) {
            $('#editModal').modal('show');
            $scope.driverE = driver;

            $scope.updateDriver = function(){
                $scope.loader = true;

                var post = {
                    id:$scope.driverE.id,
                    name:$scope.driverE.name,
                    contact_number:$scope.driverE.contact_number
                };
                $http.post('/api/driver/update',post)
                    .then(function (data) {
                        swal(data.data);
                        $scope.loader = false;

                    }, function (error) {
                        swal('',Object.values(error.data)[0],'error');
                        $scope.loader = false;
                    })
            }

        };
        $scope.delete = function (driver) {
            swal({
                    title: "DELETE DRIVER",
                    text: "Name - " + driver.name,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#dd140f",
                    confirmButtonText: "Yes, delete!",
                    showLoaderOnConfirm: true,
                },
                function () {
                    var post = {
                        id: driver.id
                    };
                    $http.post('/api/driver/delete', post)
                        .then(function (data) {
                            swal('', data.data, 'success');
                            $http.get('/api/driver/get')
                                .then(function (data) {
                                    $scope.drivers = data.data;
                                }, function (error) {
                                    console.log(error)
                                });
                        }, function (error) {
                            console.log(error)
                        });
                });
            console.log(driver)
        };
        $scope.closeEdit = function () {
            $http.get('/api/driver/get')
                .then(function (data) {
                    $scope.drivers = data.data;
                }, function (error) {
                    console.log(error)
                });
        }
    }]);


