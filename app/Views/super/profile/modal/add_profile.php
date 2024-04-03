<div class="modal fade bs-example-modal-lg" id="addProfileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Profile Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form" id="addProfileForm" method="post">
                    <div class="box-body">
                        
                        <hr class="my-15">
                        <div class="row">

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Role</label>
                                    <select class="form-control valid" name="role_id" id="role_id">
                                   </select>
                                   <input type="hidden" id="id" name="id">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Profile Title</label>
                                    <input type="text" class="form-control" placeholder="Enter Profile Title" id="profile" name="profile">
                                    </div>
                            </div>

                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="radio">
                                        <input name="is_active" type="radio" id="active" value="1" checked="">
                                        <label for="active">Active</label>                    
                                    </div>
                                    <div class="radio">
                                        <input name="is_active" type="radio" id="inactive" value="0">
                                        <label for="inactive">Inactive</label>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                        </button>
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
