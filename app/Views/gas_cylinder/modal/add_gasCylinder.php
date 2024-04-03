<div class="modal fade bs-example-modal-lg" id="addCylinderModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Gas Cylinder Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="form" id="addCylinderForm" method="post">
                    <div class="box-body">
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Cylinder Number</label>
                                    <input type="text" class="form-control" placeholder="Cylinder Number" id="cylinder_no" name="cylinder_no">
                                    <input type="hidden" class="form-control" id="id" name="id">
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
                                    <label ><span class="error">*</span>Manufacturer Number</label>
                                    <input type="text" class="form-control" placeholder="Manufacturer Number" id="manufacturer_no" name="manufacturer_no">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Gas Filling Size(Ltr)</label>
                                    <input type="text" class="form-control" placeholder="Gas Filling Size" id="filling_size" name="filling_size">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Cylinder Height(Ft)</label>
                                    <input type="text" class="form-control" placeholder="Cylinder Height" id="cylinder_height" name="cylinder_height">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <!-- <div class="col-md-12"> -->
                                    <label>Used For Gas</label>
                                    <!-- <select class="form-control select2" name="gas_name" id="gas_name" style="width:100%;" required>
                                    
                                    </select> -->
                                    <select class="form-control select2" placeholder="Select Gas" id="gas_name" name="gas_name" style="width:100%;">     
                                    </select>
                                    <!-- </div> -->
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- <label ><span class="error">*</span>Cylinder Number</label>
                                    <input type="text" class="form-control" placeholder="Cylinder Name" id="cylinder_no" name="cylinder_no">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                    </div>
                                    <div class="col-6 col-md-1 col-lg-1 col-xs-1 input-group-sm"> -->
                                    <!-- <button type="button" style="margin-top:30px;" id="barcode"> -->
                                        <!-- Barcode<i class="fa fa-user-plus" style="font-size:20px;"></i> -->
                                    <!-- </button> -->
                                    <!-- <div id="qr-reader" style="width: 600px"></div>
                                    <div id="qr-reader" style="width: 600px"></div> -->
                                    <!-- <div id="loadingMessage">🎥 Unable to access video stream (please make sure you have a webcam enabled)</div> -->
                                    <!-- <canvas id="canvas" hidden></canvas>
                                    <div id="output" hidden>
                                    <div id="outputMessage">No QR code detected.</div>
                                    <div hidden><b>Data:</b> <span id="outputData"></span></div>
                                    </div> -->
                                    <div id="qr-reader"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label ><span class="error">*</span></label>
                                    <input type="text" class="form-control" placeholder="barcode" id="barcode_text" name="barcode_text">
                                </div>
                            </div>
                            
                        </div>
                        <h4 class="box-title text-info"><i class="fa fa-map-marker mr-15"></i> Status </h4>
                        <hr class="my-15">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="radio">
                                        <input name="status" type="radio" id="active" value="1" checked="">
                                        <label for="active">Active</label>                    
                                    </div>
                                    <div class="radio">
                                        <input name="status" type="radio" id="inactive" value="0">
                                        <label for="inactive">Inactive</label>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cylinder Status</label>

                                    <select class="form-control select2" placeholder="Cylinder Status" id="cyl_status" name="cyl_status" style="width:100%;">     
                                        <!-- <option value="" selected="selected">Empty</option>
                                        <option>Refill</option>
                                        <option>Storage</option>
                                        <option>Vehicle Load</option>
                                        <option>Vehicle Unload</option>
                                        <option>Sale To Customer</option> -->
                                    </select>
                                    <!-- <div class="radio">
                                        <input name="filled" type="radio" id="fill" value="1">
                                        <label for="fill">Filled</label>                    
                                    </div>
                                    <div class="radio">
                                        <input name="filled" type="radio" id="empty" value="0" checked="">
                                        <label for="empty">Empty</label>   
                                    </div> -->
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
