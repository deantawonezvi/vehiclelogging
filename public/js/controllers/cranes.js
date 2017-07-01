angular.module('cranesApp', [])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/crane/get')
            .then(function (data) {
                $scope.cranes = data.data;
            }, function (error) {
                console.log(error)
            });

        $scope.add = function () {
            $scope.loader = true;
            var post = {
                name:$scope.name,
                contact_number:$scope.contact
            };
            $http.post('/api/crane/add',post)
                .then(function (data) {
                    swal(data.data);
                    $scope.loader = false;
                    $('#myModal').modal('toggle');
                    $('#addDriverForm').trigger('reset');
                    $http.get('/api/crane/get')
                        .then(function (data) {
                            $scope.cranes = data.data;
                        }, function (error) {
                            console.log(error)
                        });
                }, function(error){
                    $scope.loader = false;
                    swal('',Object.values(error.data)[0],'error');
                })

        };
        $scope.open = function (crane) {
            console.log(crane)
        };
        $scope.edit = function (crane) {
            $('#editModal').modal('show');
            $scope.craneE = crane;

            $scope.updateDriver = function(){
                $scope.loader = true;

                var post = {
                    id:$scope.craneE.id,
                    name:$scope.craneE.name,
                    contact_number:$scope.craneE.contact_number
                };
                $http.post('/api/crane/update',post)
                    .then(function (data) {
                        swal(data.data);
                        $scope.loader = false;

                    }, function (error) {
                        swal('',Object.values(error.data)[0],'error');
                        $scope.loader = false;
                    })
            }

        };
        $scope.delete = function (crane) {
            swal({
                    title: "DELETE DRIVER",
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
            $http.get('/api/crane/get')
                .then(function (data) {
                    $scope.cranes = data.data;
                }, function (error) {
                    console.log(error)
                });
        }
    }]);
