angular.module('cranesApp', [])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/crane/get')
            .then(function (data) {
                $scope.cranes = data.data;
            }, function (error) {
                console.log(error)
            });
        $http.get('/api/defect/get')
            .then(function (data) {
                $scope.defects = data.data;
            }, function (error) {
                console.log(error)
            });
        $http.get('/api/driver/get')
            .then(function (data) {
                $scope.drivers = data.data;
            }, function (error) {
                console.log(error)
            });


        $scope.add = function () {
            $scope.loader = true;
            var post = {
                name: $scope.name,
                model: $scope.model,
                driver_id: $scope.crane_driver.id
            };

            $http.post('/api/crane/add', post)
                .then(function (data) {
                    swal(data.data);
                    $scope.loader = false;
                    $('#myModal').modal('toggle');
                    $('#addCraneForm').trigger('reset');
                    $http.get('/api/crane/get')
                        .then(function (data) {
                            $scope.cranes = data.data;
                        }, function (error) {
                            console.log(error)
                        });
                }, function (error) {
                    $scope.loader = false;
                    swal('', Object.values(error.data)[0], 'error');
                })

        };
        $scope.open = function (crane) {
            console.log(crane)
        };
        $scope.edit = function (crane) {
            $('#editModal').modal('show');
            $scope.craneE = crane;

            $scope.updateCrane = function () {
                $scope.loader = true;

                var post = {
                    id: $scope.craneE.id,
                    name: $scope.craneE.name,
                    model: $scope.craneE.model,
                    driver_id: $scope.craneE.driver.id,
                    defect_id: $scope.craneE.defect.id
                };

                $http.post('/api/crane/update', post)
                    .then(function (data) {
                        swal(data.data);
                        $scope.loader = false;
                        $http.get('/api/crane/get')
                            .then(function (data) {
                                $scope.cranes = data.data;
                            }, function (error) {
                                console.log(error)
                            });


                    }, function (error) {
                        swal('', Object.values(error.data)[0], 'error');
                        $scope.loader = false;
                    })
            }

        };
        $scope.delete = function (crane) {
            swal({
                    title: "DELETE CRANE",
                    text: "Name - " + crane.name,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#dd140f",
                    confirmButtonText: "Yes, delete!",
                    showLoaderOnConfirm: true,
                },
                function () {
                    var post = {
                        id: crane.id
                    };
                    $http.post('/api/crane/delete', post)
                        .then(function (data) {
                            swal('', data.data, 'success');
                            $http.get('/api/crane/get')
                                .then(function (data) {
                                    $scope.cranes = data.data;

                                    $http.get('/api/driver/get')
                                        .then(function (data) {
                                            $scope.drivers = data.data;
                                            $scope.cranes.forEach(function (c) {
                                                $scope.drivers.forEach(function (d) {
                                                    if (c.driver_id === d.id) {
                                                        c['driver'] = d
                                                    }
                                                })
                                                $http.get('/api/defect/get')
                                                    .then(function (data) {
                                                        $scope.defects = data.data
                                                        $scope.defects.forEach(function (d) {
                                                            if (c.defect_id === d.id) {
                                                                c['defect'] = d
                                                            }
                                                        })
                                                    }, function (error) {
                                                        console.log(error)
                                                    });
                                            });
                                            console.log($scope.cranes);
                                        }, function (error) {
                                            console.log(error)
                                        })
                                }, function (error) {
                                    console.log(error)
                                });
                        }, function (error) {
                            console.log(error)
                        });
                });
            console.log(crane)
        };
        $scope.closeEdit = function () {
            $('#editCraneForm').trigger('reset');
            $scope.craneE = [];
            $http.get('/api/crane/get')
                .then(function (data) {
                    $scope.cranes = data.data;
                }, function (error) {
                    console.log(error)
                });
        }
    }]);



