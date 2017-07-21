<div class="container" ng-app="jobsApp" ng-cloak>
    <div class="center">
        <img src="img/inspection.svg" alt="job" width="10%">
    </div>

    <div class="banner shadow-1" style="margin-top: 50px;">
        <h2>
            <a class="red-text" href="/"><i class="fa fa-home"></i> Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Jobs</span>
        </h2>
    </div>

    <hr class="divider-icon">

    <div class="row" ng-controller="mainCtrl">
        <div class="col-sm-12">
            <div class="card-large card-default card-body">
                <h3 class="left">JOBS [{{jobs.length}}]</h3>

                <h3 class="right"><a class="clickable" data-toggle="modal" data-target="#myModal"><i
                                class="fa fa-plus-circle red-text"></i></a></h3>
                <br>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>
                            Client
                        </th>
                        <th>
                            Crane
                        </th>
                        <th>
                            Start Date
                        </th>
                        <th>
                            End Date
                        </th>
                        <th>
                            Status
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="job in jobs" ng-dblclick="open(job)">
                        <td>
                            {{job.client.name}}
                        </td>
                        <td>
                            {{job.crane.name}} - {{job.crane.driver.name}}
                        </td>
                        <td>
                            {{job.start_date |stringToDate:"longDate"}}
                        </td>
                        <td>
                            {{job.end_date |stringToDate:"longDate"}}
                        </td>
                        <td>
                            {{job.status  | uppercase}}
                        </td>

                        <td class="right">
                            <button ng-hide="job.status == 'pending'" class="btn blue darken-2 white-text" ng-click="info(job)"><i
                                        class="fa fa-info-circle"></i></button>
                            <button ng-hide="job.status == 'DONE'" class="btn green white-text" ng-click="edit(job)"><i
                                        class="fa fa-pencil"></i>
                            </button>
                            <button ng-hide="job.status == 'DONE'" class="btn red darken-2 white-text"
                                    ng-click="delete(job)"><i class="fa fa-trash"></i>
                            </button>

                        </td>

                    </tr>
                    </tbody>

                </table>

            </div>
        </div>

        <!--Add Job Modal-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ADD JOB</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addJobForm" ng-submit="add()">
                            <div class="form-group">
                                <label for="client">Client:</label>
                                <select name="client" id="client" class="form-control" ng-model="client">
                                    <option ng-repeat="client in clients" value="{{client.id}}">{{client.name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="garage">Crane:</label>
                                <select name="crane" id="crane" class="form-control" ng-model="crane">
                                    <option ng-repeat="crane in cranes" value="{{crane.id}}">{{crane.name}} -
                                        {{crane.driver.name}}
                                    </option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" ng-model="description"
                                          required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="location">Location: </label>
                                <input type="text" class="form-control" name="location" id="location" ng-model="location" required>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="text" class="form-control date-picker" id="start_date"
                                       ng-model="start_date"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="text" class="form-control date-picker" id="end_date" ng-model="end_date"
                                       required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary red white-text">Save
                            changes <i ng-show="loader" class="fa fa-spin fa-spinner"></i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Edit Job Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">EDIT JOB</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editJobForm" ng-submit="updateJob()">
                            <div class="form-group">
                                <label for="client">Client:</label>
                                <input type="text" class="form-control" ng-model="jobE.client.name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="crane">Crane:</label>
                                <select name="crane" id="crane" class="form-control" ng-model="jobE.crane_id">
                                    <option ng-repeat="crane in cranes" value="{{crane.id}}">{{crane.name}} -
                                        {{crane.driver.name}}
                                    </option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contact">Description</label>
                                <input type="text" class="form-control" id="model" ng-model="jobE.description"
                                >
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date : {{jobE.start_date |
                                    stringToDate:'longDate'}}</label>
                                <input type="text" class="form-control date-picker" id="start_date"
                                       ng-model="jobE.start_date"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date : {{jobE.end_date | stringToDate:'longDate'}}</label>
                                <input type="text" class="form-control date-picker" id="end_date"
                                       ng-model="jobE.end_date"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="state">STATUS:</label>
                                <select name="state" id="state" class="form-control" ng-model="jobE.status">
                                    <option value="pending">PENDING</option>
                                    <option value="DONE">DONE</option>
                                </select>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" ng-click="closeEdit()"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary red white-text">Save changes <i
                                    ng-show="loader" class="fa fa-spin fa-spinner"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--View Job Modal -->

        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">VIEW JOB INFORMATION</h4>
                    </div>
                    <div class="modal-body">
                        <h4>
                            <span class="blue-text">JOB</span> - {{jobE.job.name}}<br>
                            <span class="blue-text">DEFECT</span> - {{jobE.job.defect}}<br>
                            <span class="blue-text">JOB DRIVER</span> - {{jobE.job.driver.name}}
                            <hr>
                            <span class="blue-text">JOB START DATE</span> - {{jobE.start_date
                            |stringToDate:"longDate" }}<br>
                            <span class="blue-text">JOB END DATE</span> - {{jobE.end_date |stringToDate:"longDate"
                            }}<br>
                            <span class="blue-text">JOB STATUS</span> - {{jobE.state}}

                            <hr>
                            <span class="blue-text">GARAGE NAME</span> - {{jobE.garage.name}}<br>
                            <span class="blue-text">GARAGE CONTACT</span> - {{jobE.garage.contact_person}} |
                            {{jobE.garage.contact_number}}<br>

                        </h4>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" ng-click="closeEdit()"
                                    data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
