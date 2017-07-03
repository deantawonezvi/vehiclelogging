<div class="container" ng-app="clientsApp" ng-cloak>
    <div class="center">
        <img src="img/man.svg" alt="reports" width="10%">
    </div>

    <div class="banner shadow-1" style="margin-top: 50px;">
        <h2>
            <a class="red-text" href="/"><i class="fa fa-home"></i> Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Clients</span>
        </h2>
    </div>
    <hr class="divider-icon">
    <div class="row" ng-controller="mainCtrl">
        <div class="col-sm-12">
            <div class="card-large card-default card-body">
                <h3 class="left">CLIENTS [{{clients.length}}]</h3>
                <h3 class="right"><a class="clickable" data-toggle="modal" data-target="#myModal"><i
                                class="fa fa-plus-circle red-text"></i></a></h3>
                <br>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            CONTACT NUMBER
                        </th>
                        <th>
                            ADDRESS
                        </th>
                        <th>
                           EMAIL ADDRESS
                        </th>
                        <th>
                           ADDITIONAL CONTACT
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="client in clients" ng-dblclick="open(client)">
                        <td>
                            {{client.name}}
                        </td>
                        <td>
                            {{client.contact}}
                        </td>
                        <td>
                            {{client.address}}
                        </td>
                        <td>
                            {{client.email}}
                        </td>
                        <td>
                            {{client.additional_contact}}
                        </td>

                        <td class="right">
                            <button class="btn green white-text" ng-click="edit(client)"><i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn red darken-4 white-text" ng-click="delete(client)"><i
                                        class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    </tbody>
                </table>

                <!--Add Client Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">ADD CLIENT</h4>
                            </div>
                            <div class="modal-body">
                                <form id="addClientForm" ng-submit="add()">
                                    <div class="form-group">
                                        <label for="name">Client Name:</label>
                                        <input type="text" class="form-control" id="name" ng-model="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Contact Number:</label>
                                        <input type="text" class="form-control" id="contact" ng-model="contact"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Client Address:</label>
                                        <input type="text" class="form-control" id="address"
                                               ng-model="address"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Client Email Address:</label>
                                        <input type="email" class="form-control" id="email"
                                               ng-model="email"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Additional Contact:</label>
                                        <input type="text" class="form-control" id="additional_contact"
                                               ng-model="additional_contact"
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

                <!--Edit Client Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                        aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">EDIT CLIENT</h4>
                            </div>
                            <div class="modal-body">
                                <form id="editClientForm" ng-submit="updateClient()">
                                    <div class="form-group">
                                        <label for="name">Client Name:</label>
                                        <input type="text" class="form-control" id="name" ng-model="clientE.name">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Contact Number:</label>
                                        <input type="text" class="form-control" id="contact"
                                               ng-model="clientE.contact">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Email Address:</label>
                                        <input type="text" class="form-control" id="contact"
                                               ng-model="clientE.email">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Address:</label>
                                        <input type="text" class="form-control" id="contact"
                                               ng-model="clientE.address">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Additional Contact:</label>
                                        <input type="text" class="form-control" id="contact"
                                               ng-model="clientE.additional_contact">
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
    </div>


</div>
