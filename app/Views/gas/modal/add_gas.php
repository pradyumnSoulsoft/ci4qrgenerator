<div class="modal fade bs-example-modal-lg" id="addGasModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Gas Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="form" id="addGasForm" method="post">
                    <div class="box-body">
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Gas Name</label>
                                    <input type="text" class="form-control" placeholder="Gas Name" id="gas_name" name="gas_name">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Gas Formula</label>
                                    <input type="text" class="form-control" placeholder="Gas Formula" id="gas_formula" name="gas_formula">
                                    <!-- <input type="hidden" class="form-control" id="id" name="id"> -->
                                </div>
                                    <!-- <div class="col-md-12 text-center mt-2">
                                    <i class="" id="iconMirror" aria-hidden="true" style="font-size:48px;"></i> -->
                                    <!-- </div> -->
                                    <!-- </div> -->
                            </div>
                            
                            <div class="col-md-2">
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
