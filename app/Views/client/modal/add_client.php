<div class="modal fade bs-example-modal-lg" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Client Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="form" id="addClientForm" method="post">
                    <div class="box-body">
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Client Name</label>
                                    <input type="text" class="form-control" placeholder="client Name" id="client_name" name="client_name">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Contact</label>
                                    <input type="text" class="form-control" placeholder="Enter Contact" id="contact" name="contact">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Address</label>
                                    <textarea class="form-control" placeholder="Enter Address" id="address" name="address" rows="1" cols="5"></textarea>
                                </div>
                                    <!-- <div class="col-md-12 text-center mt-2">
                                    <i class="" id="iconMirror" aria-hidden="true" style="font-size:48px;"></i> -->
                                    <!-- </div> -->
                                    <!-- </div> -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Ideal Time For Cylinder</label>
                                    <input type="number" class="form-control" placeholder="" id="idealTime" name="idealTime">
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
                </form>
                <!--form end-->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
