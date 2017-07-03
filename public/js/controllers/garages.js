angular.module('garagesApp', [])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/garage/get')
            .then(function (data) {
                $scope.garages = data.data;
            }, function (error) {
                console.log(error)
            });

        $scope.add = function () {
            $scope.loader = true;
            var post = {
                name:$scope.name,
                contact_number:$scope.contact_number,
                contact_person:$scope.contact_person,
                bank_name:$scope.bank_name,
                bank_branch:$scope.bank_branch,
                bank_account_number:$scope.bank_account_number
            };
         $http.post('/api/garage/add',post)
                .then(function (data) {
                    swal(data.data);
                    $scope.loader = false;
                    $('#myModal').modal('toggle');
                    $('#addGarageForm').trigger('reset');
                    $http.get('/api/garage/get')
                        .then(function (data) {
                            $scope.garages = data.data;
                        }, function (error) {
                            console.log(error)
                        });
                }, function(error){
                    $scope.loader = false;
                    swal('',Object.values(error.data)[0],'error');
                })

        };
        $scope.open = function (garage) {
            console.log(garage)
        };
        $scope.edit = function (garage) {
            $('#editModal').modal('show');
            $scope.garageE = garage;

            $scope.updateGarage = function(){
                $scope.loader = true;

                var post = {
                    id:$scope.garageE.id,
                    name:$scope.garageE.name,
                    contact_number:$scope.garageE.contact_number,
                    contact_person:$scope.garageE.contact_person,
                    bank_name:$scope.garageE.bank_name,
                    bank_branch:$scope.garageE.bank_branch,
                    bank_account_number:$scope.garageE.bank_account_number
                };
                $http.post('/api/garage/update',post)
                    .then(function (data) {
                        swal(data.data);
                        $scope.loader = false;

                    }, function (error) {
                        swal('',Object.values(error.data)[0],'error');
                        $scope.loader = false;
                    })
            }

        };
        $scope.delete = function (garage) {
            swal({
                    title: "DELETE GARAGE",
                    text: "Name - " + garage.name,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#dd140f",
                    confirmButtonText: "Yes, delete!",
                    showLoaderOnConfirm: true,
                },
                function () {
                    var post = {
                        id: garage.id
                    };
                    $http.post('/api/garage/delete', post)
                        .then(function (data) {
                            swal('', data.data, 'success');
                            $http.get('/api/garage/get')
                                .then(function (data) {
                                    $scope.garages = data.data;
                                }, function (error) {
                                    console.log(error)
                                });
                        }, function (error) {
                            console.log(error)
                        });
                });
            console.log(garage)
        };
        $scope.closeEdit = function () {
            $http.get('/api/garage/get')
                .then(function (data) {
                    $scope.garages = data.data;
                }, function (error) {
                    console.log(error)
                });
        }
    }]);
