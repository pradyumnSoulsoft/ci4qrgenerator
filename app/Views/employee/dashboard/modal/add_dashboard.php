<div class="modal fade bs-example-modal-lg" id="addDashboardModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Refill Cylinder Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="form" id="addDashboardForm" method="post">
                    <div class="box-body">
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Barcode</label>
                                    <input type="text" class="form-control" placeholder="Barcode" id="barcode" name="barcode">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Quantity</label>
                                    <input type="text" class="form-control" placeholder="Quantity" id="quantity" name="quantity">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                </div>
                            </div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Date:</label>
                                    <input type="date" class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Stock Location</label>
                                    <select class="form-control select2" placeholder="Select Stock Location" id="stk_loc" name="stk_loc" style="width:100%;">     
                                        <option>Please choose...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Manufacturer Name</label>
                                    <input type="text" class="form-control" placeholder="Manufacturer Name" id="manufacturer_name" name="manufacturer_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Cylinder Size</label>
                                    <input type="text" class="form-control" placeholder="Cylinder Size" id="cylSize" name="cylSize">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Cylinder Height</label>
                                    <input type="text" class="form-control" placeholder="Cylinder Height" id="cylHeight" name="cylHeight">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Gas Name</label>
                                    <select class="form-control select2" placeholder="Gas Name" id="gasName" name="gasName" style="width:100%;">     
                                        <option>Please choose...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="submit" class="btn btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                        </button>
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancel</button>
                    </div>
                    <!--form end-->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
