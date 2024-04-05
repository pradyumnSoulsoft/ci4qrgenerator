<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            QR Generator
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!--<li class="breadcrumb-item"><a href="#">Master</a></li>-->
            <li class="breadcrumb-item active">Master</li>
            <li class="breadcrumb-item active">QR Generator</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">QR Generator</h3>

                <ul class="box-controls pull-right">
                    <li><a class="box-btn-close" href="#"></a></li>
                    <li><a class="box-btn-slide" href="#"></a></li>
                    <li><a class="box-btn-fullscreen" href="#"></a></li>
                </ul>
            </div>
            <div class="modal-body">
			    <div class="col-12">
                    <div class="box box-transparent no-shadow">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-danger" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">SVG QR</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">PNG/JPEG QR</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="box-body bg-white tab-content">
                            <div class="tab-pane fade active show" id="home">
                                <!-- start -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label ><span class="error">*</span>Enter URL: </label>
                                            <input type="text" class="form-control" placeholder="Enter Url" id="content" name="content" required> <span class="input-group-btn">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label ><span class="error">*</span>Color: </label>
                                            <input type="color" class="form-control" id="color" name="color">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-30">
                                        <div class="form-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-info" type="button" id="qrButton">Generate QR</button>
                                            </span>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="width">Width:</label>
                                            <input type="number" class="form-control" id="width" value="300">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="height">Height:</label>
                                            <input type="number" class="form-control" id="height" value="300">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group" id="container"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-25" id="buttonWrapper" style="display: none;">
                                        <div class="form-group">
                                            <span class="input-group-btn">
                                                <button class="btn btn-info" type="button" id="saveBtn">Save</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- end -->
                            </div>
                            <div class="tab-pane fade" id="profile">
                                    <!-- put data inside this div -->
                            </div>
                            
                        </div>
                    </div>
                </div>				
            </div>

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->