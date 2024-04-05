<div class="modal fade bs-example-modal-lg" id="addDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Location Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="form" id="addDepartmentForm" method="post">
                    <div class="box-body">
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Location Name</label>
                                    <input type="text" class="form-control" placeholder="Department Name" id="dept_name" name="dept_name">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Description</label>
                                    <input type="text" class="form-control" placeholder="Description" id="description" name="description">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Transaction</label>
                                    <input type="text" class="form-control" placeholder="Transaction" id="transaction_use" name="transaction_use">
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
