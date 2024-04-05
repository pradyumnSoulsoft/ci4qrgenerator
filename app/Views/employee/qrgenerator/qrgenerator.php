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
            <form class="form" id="qrForm" method="post">
                <div class="box-body">
                            
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
                        <div class="col-md-3 mt-25" id="buttonWrapper" style="display: none;">
                            <div class="form-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" id="saveBtn">Save</button>
                                    <button class="btn btn-danger" type="button" id="resetBtn">Refresh</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12 mt-25" id="resetWrapper" style="display: none;">
                            <div class="form-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" id="resetBtn">Refresh</button>
                                </span>
                            </div>
                        </div>
                    </div> -->
                </div>    
                <!-- /.box-body -->
            </form>

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->