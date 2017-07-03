angular.module('clientsApp', [])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/client/get')
            .then(function (data) {
                $scope.clients = data.data;
            }, function (error) {
                console.log(error)
            });

        $scope.add = function () {
            $scope.loader = true;
            var post = {
                name:$scope.name,
                contact:$scope.contact,
                address:$scope.address,
                email:$scope.email,
                additional_contact:$scope.additional_contact
            };
            console.log(post);
            $http.post('/api/client/add',post)
                .then(function (data) {
                    swal(data.data);
                    $scope.loader = false;
                    $('#myModal').modal('toggle');
                    $('#addClientForm').trigger('reset');
                    $http.get('/api/client/get')
                        .then(function (data) {
                            $scope.clients = data.data;
                        }, function (error) {
                            console.log(error)
                        });
                }, function(error){
                    $scope.loader = false;
                    swal('',Object.values(error.data)[0],'error');
                })

        };
        $scope.open = function (client) {
            console.log(client)
        };
        $scope.edit = function (client) {
            $('#editModal').modal('show');
            $scope.clientE = client;

            $scope.updateClient = function(){
                $scope.loader = true;

                var post = {
                    id:$scope.clientE.id,
                    name:$scope.clientE.name,
                    contact:$scope.clientE.contact,
                    address:$scope.clientE.address,
                    email:$scope.clientE.email,
                    additional_contact:$scope.clientE.additional_contact
                };
                $http.post('/api/client/update',post)
                    .then(function (data) {
                        swal(data.data);
                        $scope.loader = false;

                    }, function (error) {
                        swal('',Object.values(error.data)[0],'error');
                        $scope.loader = false;
                    })
            }

        };
        $scope.delete = function (client) {
            swal({
                    title: "DELETE CLIENT",
                    text: "Name - " + client.name,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#dd140f",
                    confirmButtonText: "Yes, delete!",
                    showLoaderOnConfirm: true,
                },
                function () {
                    var post = {
                        id: client.id
                    };
                    $http.post('/api/client/delete', post)
                        .then(function (data) {
                            swal('', data.data, 'success');
                            $http.get('/api/client/get')
                                .then(function (data) {
                                    $scope.clients = data.data;
                                }, function (error) {
                                    console.log(error)
                                });
                        }, function (error) {
                            console.log(error)
                        });
                });
            console.log(client)
        };
        $scope.closeEdit = function () {
            $http.get('/api/client/get')
                .then(function (data) {
                    $scope.clients = data.data;
                }, function (error) {
                    console.log(error)
                });
        }
    }]);
