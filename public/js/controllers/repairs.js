angular.module('repairsApp', [])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/repair/get')
            .then(function (data) {
                $scope.repairs = data.data;
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
            $http.post('/api/repair/add',post)
                .then(function (data) {
                    swal(data.data);
                    $scope.loader = false;
                    $('#myModal').modal('toggle');
                    $('#addRepairForm').trigger('reset');
                    $http.get('/api/repair/get')
                        .then(function (data) {
                            $scope.repairs = data.data;
                        }, function (error) {
                            console.log(error)
                        });
                }, function(error){
                    $scope.loader = false;
                    swal('',Object.values(error.data)[0],'error');
                })

        };
        $scope.open = function (repair) {
            console.log(repair)
        };
        $scope.edit = function (repair) {
            $('#editModal').modal('show');
            $scope.repairE = repair;

            $scope.updateRepair = function(){
                $scope.loader = true;

                var post = {
                    id:$scope.repairE.id,
                    name:$scope.repairE.name,
                    contact_number:$scope.repairE.contact_number,
                    contact_person:$scope.repairE.contact_person,
                    bank_name:$scope.repairE.bank_name,
                    bank_branch:$scope.repairE.bank_branch,
                    bank_account_number:$scope.repairE.bank_account_number
                };
                $http.post('/api/repair/update',post)
                    .then(function (data) {
                        swal(data.data);
                        $scope.loader = false;

                    }, function (error) {
                        swal('',Object.values(error.data)[0],'error');
                        $scope.loader = false;
                    })
            }

        };
        $scope.delete = function (repair) {
            swal({
                    title: "DELETE REPAIR",
                    text: "Name - " + repair.name,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#dd140f",
                    confirmButtonText: "Yes, delete!",
                    showLoaderOnConfirm: true,
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
                                }, function (error) {
                                    console.log(error)
                                });
                        }, function (error) {
                            console.log(error)
                        });
                });
            console.log(repair)
        };
        $scope.closeEdit = function () {
            $http.get('/api/repair/get')
                .then(function (data) {
                    $scope.repairs = data.data;
                }, function (error) {
                    console.log(error)
                });
        }
    }]);
