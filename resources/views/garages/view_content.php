<div class="container" ng-app="garagesApp" ng-cloak>
    <div class="center">
        <img src="img/crane.svg" alt="garage" width="10%">
    </div>

    <div class="banner shadow-1" style="margin-top: 50px;">
        <h2>
            <a class="red-text" href="/"><i class="fa fa-home"></i> Home</a>
            <i class="fa fa-angle-right"></i>
            <a class="red-text" href="/cranes">Cranes</a>
            <i class="fa fa-angle-right"></i>
            <span>Garages</span>
        </h2>
    </div>

    <hr class="divider-icon">

    <div class="row" ng-controller="mainCtrl">
        <div class="col-sm-12" >
            <div class="card-large card-default card-body">
                <h3 class="left">GARAGES [{{garages.length}}]</h3>

                <h3 class="right"><a class="clickable" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle red-text"></i></a></h3>
                <br>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>
                            Garage Name
                        </th>
                        <th>
                            Contact Person
                        </th>
                        <th>
                            Contact Number
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="garage in garages" ng-dblclick="open(garage)">
                        <td>
                            {{garage.name}}
                        </td>
                        <td>
                            {{garage.contact_person}}
                        </td>
                        <td>
                            {{garage.contact_number}}
                        </td>

                        <td class="right">
                            <button class="btn green white-text" ng-click="edit(garage)"><i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn red darken-4 white-text" ng-click="delete(garage)"><i
                                    class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    </tbody>

                </table>

            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ADD GARAGE</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addGarageForm" ng-submit="add()">
                            <div class="form-group">
                                <label for="name">Garage Name:</label>
                                <input type="text" class="form-control" id="name" ng-model="name" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Person:</label>
                                <input type="text" class="form-control" id="model" ng-model="contact_person"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Number</label>
                                <input type="text" class="form-control" id="model" ng-model="contact_number"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Bank Name</label>
                                <input type="text" class="form-control" id="model" ng-model="bank_name"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Bank Branch</label>
                                <input type="text" class="form-control" id="model" ng-model="bank_branch"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Bank Account Number</label>
                                <input type="number" class="form-control" id="model" ng-model="bank_account_number"
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

        <!--Edit Garage Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">EDIT GARAGE</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editGarageForm" ng-submit="updateGarage()">
                            <div class="form-group">
                                <label for="name">Garage Name:</label>
                                <input type="text" class="form-control" id="name" ng-model="garageE.name" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Person:</label>
                                <input type="text" class="form-control" id="model" ng-model="garageE.contact_person"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact Number</label>
                                <input type="text" class="form-control" id="model" ng-model="garageE.contact_number"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Bank Name</label>
                                <input type="text" class="form-control" id="model" ng-model="garageE.bank_name"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Bank Branch</label>
                                <input type="text" class="form-control" id="model" ng-model="garageE.bank_branch"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Bank Account Number</label>
                                <input type="text" class="form-control" id="model" ng-model="garageE.bank_account_number"
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
