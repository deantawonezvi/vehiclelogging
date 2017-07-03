angular.module('jobsApp', [])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/job/get')
            .then(function (data) {
                $scope.jobs = data.data;
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
            $http.post('/api/job/add',post)
                .then(function (data) {
                    swal(data.data);
                    $scope.loader = false;
                    $('#myModal').modal('toggle');
                    $('#addJobForm').trigger('reset');
                    $http.get('/api/job/get')
                        .then(function (data) {
                            $scope.jobs = data.data;
                        }, function (error) {
                            console.log(error)
                        });
                }, function(error){
                    $scope.loader = false;
                    swal('',Object.values(error.data)[0],'error');
                })

        };
        $scope.open = function (job) {
            console.log(job)
        };
        $scope.edit = function (job) {
            $('#editModal').modal('show');
            $scope.jobE = job;

            $scope.updateJob = function(){
                $scope.loader = true;

                var post = {
                    id:$scope.jobE.id,
                    name:$scope.jobE.name,
                    contact:$scope.jobE.contact,
                    address:$scope.jobE.address,
                    email:$scope.jobE.email,
                    additional_contact:$scope.jobE.additional_contact
                };
                $http.post('/api/job/update',post)
                    .then(function (data) {
                        swal(data.data);
                        $scope.loader = false;

                    }, function (error) {
                        swal('',Object.values(error.data)[0],'error');
                        $scope.loader = false;
                    })
            }

        };
        $scope.delete = function (job) {
            swal({
                    title: "DELETE JOB",
                    text: "Name - " + job.name,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#dd140f",
                    confirmButtonText: "Yes, delete!",
                    showLoaderOnConfirm: true,
                },
                function () {
                    var post = {
                        id: job.id
                    };
                    $http.post('/api/job/delete', post)
                        .then(function (data) {
                            swal('', data.data, 'success');
                            $http.get('/api/job/get')
                                .then(function (data) {
                                    $scope.jobs = data.data;
                                }, function (error) {
                                    console.log(error)
                                });
                        }, function (error) {
                            console.log(error)
                        });
                });
            console.log(job)
        };
        $scope.closeEdit = function () {
            $http.get('/api/job/get')
                .then(function (data) {
                    $scope.jobs = data.data;
                }, function (error) {
                    console.log(error)
                });
        }
    }]);
