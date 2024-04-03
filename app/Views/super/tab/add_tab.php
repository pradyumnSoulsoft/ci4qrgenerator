<div class="modal fade bs-example-modal-lg" id="addTabModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tab Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="form" id="addTabForm" method="post">
                    <div class="box-body">
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Tab Name</label>
                                    <input type="text" class="form-control" placeholder="Tab Name" id="tab_name" name="tab_name">
                                    <input type="hidden" class="form-control" id="id" name="id">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                    <label>Select Icon</label>
                                    <select class="form-control select2" name="icon_id" id="icon_id" style="width:100%;" required>
                                    
                                    </select>
                                    </div>
                                    <div class="col-md-12 text-center mt-2">
                                    <i class="" id="iconMirror" aria-hidden="true" style="font-size:48px;"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
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
                            <div class="col-md-2">
                                <div class="form-group">
                                <input type="checkbox" id="is_subtab" name="is_subtab" value="1">
										<label for="is_subtab">Subtab</label>         
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