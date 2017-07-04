angular.module('repairsApp', [])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/repair/get')
            .then(function (data) {
                $scope.repairs = data.data;
                $http.get('/api/crane/get')
                    .then(function (data) {
                        $scope.cranes = data.data;
                        console.log($scope.cranes);
                        $scope.repairs.forEach(function (r) {
                            for(var i=0;i<=$scope.cranes.length;i++){
                                try{
                                    if($scope.cranes[i].id == r.crane_id && $scope.cranes[i].defect === 'No Defect' ){
                                        $scope.cranes.splice(i, 1);
                                        break;
                                    }
                                }
                                catch(e){
                                    //TODO
                                }
                            }
                        });
                    }, function (error) {
                        console.log(error)
                    });
                console.log(data.data)
            }, function (error) {
                console.log(error)
            });

        $http.get('/api/garage/get')
            .then(function (data) {
                $scope.garages = data.data;
            }, function (error) {
                console.log(error)
            });

        $scope.add = function () {

            if (new Date($scope.start_date).getTime() > new Date($scope.end_date).getTime()) {
                swal('', 'Invalid Date Range!', 'warning');
                return;
            }
            $scope.loader = true;
            $scope.cranes.forEach(function (c) {
                if (c.id == $scope.crane) {
                    $scope.selectedCrane = c;
                }
            });
            var post = {

                garage_id: $scope.garage.id,
                crane_id: $scope.crane,
                description: $scope.description,
                defect: $scope.selectedCrane.defect,
                start_date: $scope.start_date,
                end_date: $scope.end_date
            };
            $http.post('/api/repair/add', post)
                .then(function (data) {
                    swal(data.data);
                    $scope.loader = false;
                    $('#myModal').modal('toggle');
                    $('#addRepairForm').trigger('reset');
                    $scope.crane = '';
                    $scope.garage = '';
                    $http.get('/api/repair/get')
                        .then(function (data) {
                            $scope.repairs = data.data;
                            $http.get('/api/crane/get')
                                .then(function (data) {
                                    $scope.cranes = data.data;
                                    console.log($scope.cranes);
                                    $scope.repairs.forEach(function (r) {
                                        for(var i=0;i<=$scope.cranes.length;i++){
                                            try{
                                                if($scope.cranes[i].id == r.crane_id  || $scope.cranes[i].defect == 'No Defect'){
                                                    $scope.cranes.splice(i, 1);
                                                    break;
                                                }
                                            }
                                            catch(e){
                                                //TODO
                                            }
                                        }
                                    });
                                }, function (error) {
                                    console.log(error)
                                });
                            console.log(data.data)
                        }, function (error) {
                            console.log(error)
                        });
                }, function (error) {
                    $scope.loader = false;
                    swal('', Object.values(error.data)[0], 'error');
                })

        };
        $scope.open = function (repair) {
            console.log(repair)
        };
        $scope.edit = function (repair) {
            $('#editModal').modal('show');
            $scope.repairE = repair;

            $scope.updateRepair = function () {
                $scope.loader = true;
                if (new Date($scope.repairE.start_date).getTime() > new Date($scope.repairE.end_date).getTime()) {
                    swal('', 'Invalid Date Range!', 'warning');
                    return;
                }
                var post = {
                    id:$scope.repairE.id,
                    garage_id: $scope.repairE.garage.id,
                    crane_id: $scope.repairE.crane.id,
                    description: $scope.repairE.description,
                    start_date: $scope.repairE.start_date,
                    end_date: $scope.repairE.end_date,
                    state: $scope.repairE.state
                };
                $http.post('/api/repair/update', post)
                    .then(function (data) {
                        swal(data.data);
                        $scope.loader = false;

                    }, function (error) {
                        swal('', Object.values(error.data)[0], 'error');
                        $scope.loader = false;
                    })
            }

        };
        $scope.delete = function (repair) {
            swal({
                    title: "DELETE REPAIR",
                    text: "Crane - " + repair.crane.name,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#dd140f",
                    confirmButtonText: "Yes, delete!",
                    showLoaderOnConfirm: true
                },
                function () {
                    var post = {
                        id: repair.id
                    };
                    $http.post('/api/repair/delete', post)
                        .then(function (data) {
                            swal('', data.data, 'success');
                            $http.get('/api/repair/get')
                                .then(function (data) {
                                    $scope.repairs = data.data;
                                    $http.get('/api/crane/get')
                                        .then(function (data) {
                                            $scope.cranes = data.data;
                                            console.log($scope.cranes);
                                            $scope.repairs.forEach(function (r) {
                                                for(var i=0;i<=$scope.cranes.length;i++){
                                                    try{
                                                        if($scope.cranes[i].id == r.crane_id  || $scope.cranes[i].defect == 'No Defect'){
                                                            $scope.cranes.splice(i, 1);
                                                            break;
                                                        }
                                                    }
                                                    catch(e){
                                                        //TODO
                                                    }
                                                }
                                            });
                                        }, function (error) {
                                            console.log(error)
                                        });
                                    console.log(data.data)
                                }, function (error) {
                                    console.log(error)
                                });
                        }, function (error) {
                            console.log(error)
                        });
                });
        };

        $scope.info = function (repair) {
            $('#viewModal').modal('show');
            $scope.repairE = repair

        };
        $scope.closeEdit = function () {
            $http.get('/api/repair/get')
                .then(function (data) {
                    $scope.repairs = data.data;
                    $http.get('/api/crane/get')
                        .then(function (data) {
                            $scope.cranes = data.data;
                            console.log($scope.cranes);
                            $scope.repairs.forEach(function (r) {
                                for(var i=0;i<=$scope.cranes.length;i++){
                                    try{
                                        if($scope.cranes[i].id == r.crane_id || $scope.cranes[i].defect === 'No Defect'){
                                            $scope.cranes.splice(i, 1);
                                            break;
                                        }
                                    }
                                    catch(e){
                                        //TODO
                                    }
                                }
                            });
                        }, function (error) {
                            console.log(error)
                        });
                    console.log(data.data)
                }, function (error) {
                    console.log(error)
                });
        }
    }])
    .filter('stringToDate', function ($filter) {
        return function (ele, dateFormat) {
            return $filter('date')(new Date(ele), dateFormat);
        }
    });