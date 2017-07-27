<div class="container" ng-app="cranesApp" ng-cloak>
    <div class="center">
        <img src="img/crane.svg" alt="crane" width="10%">
    </div>

    <div class="banner shadow-1" style="margin-top: 50px;">
        <h2>
            <a class="red-text" href="/"><i class="fa fa-home"></i> Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Cranes</span>
        </h2>
    </div>

    <hr class="divider-icon">
    <div>
        <a class="btn btn-flat" href="/garages"><i class="fa fa-bus"></i> GARAGES</a>
        <a class="btn btn-flat" href="/repairs"><i class="fa fa-wrench"></i> REPAIRS</a>
    </div>
    <hr>
    <div class="row" ng-controller="mainCtrl">
        <div class="col-sm-12" >
            <div class="card-large card-default card-body">
                <h3 class="left">CRANES [{{cranes.length}}]</h3>

                <h3 class="right"><a class="clickable" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle red-text"></i></a></h3>
                <br>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Model
                        </th>
                        <th>
                            Driver
                        </th>
                        <th>
                            Mileage
                        </th>
                        <th>
                            Defect
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="crane in cranes" ng-dblclick="open(crane)">
                        <td>
                            {{crane.name}}
                        </td>
                        <td>
                            {{crane.model}}
                        </td>
                        <td>
                            {{crane.driver.name}}
                        </td>
                        <td>
                            {{crane.mileage}} km
                        </td>
                        <td>
                            {{crane.defect}}
                        </td>

                        <td class="right">
                            <button class="btn green white-text" ng-click="edit(crane)"><i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn red darken-4 white-text" ng-click="delete(crane)"><i
                                    class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    </tbody>

                </table>

            </div>
            <br><br>

        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ADD CRANE</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addCraneForm" ng-submit="add()">
                            <div class="form-group">
                                <label for="name">Crane Name:</label>
                                <input type="text" class="form-control" id="name" ng-model="name" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Crane Model:</label>
                                <input type="text" class="form-control" id="model" ng-model="model"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Crane Driver</label>
                                <select name="" id="" class="search-select" ng-model="crane_driver" ng-options="driver.name for driver in drivers track by driver.id" required>

                                </select>
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

        <!--Edit Crane Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">EDIT CRANE</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editCraneForm" ng-submit="updateCrane()">
                            <div class="form-group">
                                <label for="name">Crane Name:</label>
                                <input type="text" class="form-control" id="name" ng-model="craneE.name" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Crane Model:</label>
                                <input type="text" class="form-control" id="model" ng-model="craneE.model"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Crane Mileage(km):</label>
                                <input type="text" class="form-control" id="model" ng-model="craneE.mileage"
                                       required disabled>
                            </div>
                            <div class="form-group">
                                <label for="contact">Crane Driver</label>
                                <select name="driver" id="driver" class="search-select" ng-model="craneE.driver" ng-options="driver.name for driver in drivers track by driver.id" required>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="contact">Crane Defect</label>
                                <input type="text" class="form-control" id="model" ng-model="craneE.defect"
                                       required>
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
    </div>

</div>
