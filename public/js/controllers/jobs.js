angular.module('jobsApp', [])
    .controller('mainCtrl', ['$scope', '$http', function ($scope, $http) {
        $scope.loader = false;
        $http.get('/api/job/get')
            .then(function (data) {
                $scope.jobs = data.data;
                console.log(data)
            }, function (error) {
                console.log(error)
            });
        $http.get('/api/client/get')
            .then(function (data) {
                $scope.clients = data.data;
            }, function (error) {
                console.log(error)
            });
        $http.get('/api/crane/get')
            .then(function (data) {
                $scope.cranes = data.data;
            }, function (error) {
                console.log(error)
            });

        $scope.add = function () {
            $scope.loader = true;
            var post = {
                client_id:$scope.client,
                crane_id:$scope.crane,
                location:$scope.location,
                fuel:$scope.fuel,
                description:$scope.description,
                start_date:$scope.start_date,
                end_date:$scope.end_date
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
            $scope.jobE = job;
            $('#viewModal').modal('toggle');
            console.log($scope.jobE)
        };
        $scope.edit = function (job) {
            $('#editModal').modal('show');
            $scope.jobE = job;

            $scope.updateJob = function(){
                $scope.loader = true;

                var post = {
                    id:$scope.jobE.id,
                    client_id:$scope.jobE.client_id,
                    crane_id:$scope.jobE.crane_id,
                    location:$scope.jobE.location,
                    status:$scope.jobE.status,
                    closing_mileage:$('#closing_mileage').val(),
                    description:$scope.jobE.description,
                    start_date:$scope.jobE.start_date,
                    end_date:$scope.jobE.end_date

                };
                $http.post('/api/job/update',post)
                    .then(function (data) {
                        console.log(data)
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
                    //language=HTML
                    text: "Client - " + job.client.name +
                    "<br>Crane - " + job.crane.name,
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    confirmButtonColor: "#dd140f",
                    confirmButtonText: "Yes, delete!",
                    showLoaderOnConfirm: true,
                    html:true

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
    }])

    .filter('stringToDate', function ($filter) {
        return function (ele, dateFormat) {
            return $filter('date')(new Date(ele), dateFormat);
        }
    });
