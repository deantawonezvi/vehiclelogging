<div class="container" ng-app="repairsApp" ng-cloak>
    <div class="center">
        <img src="img/crane.svg" alt="repair" width="10%">
    </div>

    <div class="banner shadow-1" style="margin-top: 50px;">
        <h2>
            <a class="red-text" href="/"><i class="fa fa-home"></i> Home</a>
            <i class="fa fa-angle-right"></i>
            <a class="red-text" href="/cranes">Cranes</a>
            <i class="fa fa-angle-right"></i>
            <span>Repairs</span>
        </h2>
    </div>

    <hr class="divider-icon">

    <div class="row" ng-controller="mainCtrl">
        <div class="col-sm-12">
            <div class="card-large card-default card-body">
                <h3 class="left">REPAIRS [{{repairs.length}}]</h3>

                <h3 class="right"><a class="clickable" data-toggle="modal" data-target="#myModal"><i
                                class="fa fa-plus-circle red-text"></i></a></h3>
                <br>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>
                            Crane Name
                        </th>
                        <th>
                            Defect
                        </th>
                        <th>
                            Garage
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
                    <tr ng-repeat="repair in repairs" ng-dblclick="open(repair)">
                        <td>
                            {{repair.crane.name}}
                        </td>
                        <td>
                            {{repair.defect}}
                        </td>
                        <td>
                            {{repair.garage.name}}

                        </td>
                        <td>
                            {{repair.start_date |stringToDate:"longDate"}}
                        </td>
                        <td>
                            {{repair.end_date |stringToDate:"longDate"}}
                        </td>
                        <td>
                            {{repair.state}}
                        </td>

                        <td class="right">
                            <button class="btn blue darken-2 white-text" ng-click="info(repair)"><i
                                        class="fa fa-info-circle"></i></button>
                            <button ng-hide="repair.state == 'DONE'" class="btn green white-text" ng-click="edit(repair)"><i class="fa fa-pencil"></i>
                            </button>
                            <button ng-hide="repair.state == 'DONE'" class="btn red darken-2 white-text" ng-click="delete(repair)"><i class="fa fa-trash"></i>
                            </button>

                        </td>

                    </tr>
                    </tbody>

                </table>

            </div>
        </div>

        <!--Add Repair Modal-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ADD REPAIR</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addRepairForm" ng-submit="add()">
                            <div class="form-group">
                                <label for="crane">Crane Name:</label>
                                <select name="crane" id="crane" class="search-select" ng-model="crane">
                                    <option ng-repeat="crane in cranes" value="{{crane.id}}">{{crane.name}} -
                                        {{crane.defect}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="garage">Garage Name:</label>
                                <select name="garage" id="garage" class="search-select" ng-model="garage"
                                        ng-options="garage.name for garage in garages track by garage.id"></select>
                            </div>
                            <div class="form-group">
                                <label for="contact">Description</label>
                                <input type="text" class="form-control" id="model" ng-model="description"
                                       required>
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

        <!--Edit Repair Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">EDIT REPAIR</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editRepairForm" ng-submit="updateRepair()">
                            <div class="form-group">
                                <label for="crane">Crane Name:</label>
                                <input name="crane" id="crane" class="form-control" ng-model="repairE.crane.name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="garage">Garage Name:</label>
                                <input name="garage" id="garage" class="form-control" ng-model="repairE.garage.name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="contact">Description</label>
                                <input type="text" class="form-control" id="model" ng-model="repairE.description"
                                       >
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date : {{repairE.start_date | stringToDate:'longDate'}}</label>
                                <input type="text" class="form-control date-picker" id="start_date"
                                       ng-model="repairE.start_date"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date : {{repairE.end_date | stringToDate:'longDate'}}</label>
                                <input type="text" class="form-control date-picker" id="end_date" ng-model="repairE.end_date"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="state">STATUS:</label>
                                <select name="state" id="state" class="form-control" ng-model="repairE.state">
                                    <option value="PENDING">PENDING</option>
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

        <!--View Repair Modal -->

        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">VIEW REPAIR INFORMATION</h4>
                    </div>
                    <div class="modal-body">
                        <h4>
                            <span class="blue-text">CRANE</span> - {{repairE.crane.name}}<br>
                            <span class="blue-text">DEFECT</span> - {{repairE.crane.defect}}<br>
                            <span class="blue-text">CRANE DRIVER</span> - {{repairE.crane.driver.name}}
                            <hr>
                            <span class="blue-text">REPAIR START DATE</span> - {{repairE.start_date
                            |stringToDate:"longDate" }}<br>
                            <span class="blue-text">REPAIR END DATE</span> - {{repairE.end_date |stringToDate:"longDate"
                            }}<br>
                            <span class="blue-text">REPAIR STATUS</span> - {{repairE.state}}

                            <hr>
                            <span class="blue-text">GARAGE NAME</span> - {{repairE.garage.name}}<br>
                            <span class="blue-text">GARAGE CONTACT</span> - {{repairE.garage.contact_person}} | {{repairE.garage.contact_number}}<br>

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
