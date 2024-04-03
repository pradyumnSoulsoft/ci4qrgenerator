<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR Code Scanner</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    video {
      width: 100%;
      max-width: 400px;
      border: 2px solid #333;
    }
  </style>

  
</head>
<body> -->

  <!-- <video id="qrVideo" playsinline autoplay></video>
<input type="text" name="text" id="text" class="form-control">


  <button type="button" class="btn btn-primary" id="qrbutton">Add Gas Cylinder</button> -->
  <!-- <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script> -->
  <script>
    // $('#qrbutton').click(function () {

    //     let scanner = new Instascan.Scanner({video:document.getElementById('qrVideo')});
    //     Instascan.Camera.getCameras().then(function(cameras){
    //         if(cameras.length>0)
    //         {
    //             //0 for front camera
    //             //1 for back camera
    //             scanner.start(cameras[0]);
    //         }
    //         else
    //         {
    //             alert('no camera found');
    //         }
    //     }).catch(function(e){
    //         console.error(e);
    //     });
    //     scanner.addListener('scan',function(c){
    //         document.getElementById("text").value=c;
    //     })
    // });
  </script>
  <!-- <script src="<?php //echo base_url() . 'resource/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
  <script src="<?php //echo base_url() . 'resource/js/instascan.min.js' ?>"></script>
</body>
</html> -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gas Cylinder
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!--<li class="breadcrumb-item"><a href="#">Master</a></li>-->
            <li class="breadcrumb-item active">Master</li>
            <li class="breadcrumb-item active">Gas Cylinder</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Gas Cylinder List</h3>

                <ul class="box-controls pull-right">
                    <li><a class="box-btn-close" href="#"></a></li>
                    <li><a class="box-btn-slide" href="#"></a></li>
                    <li><a class="box-btn-fullscreen" href="#"></a></li>
                </ul>
            </div>
            <div class="box-body">
                <!--table start-->
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border box-controls pull-right">

                            <!--<div class="box-controls pull-right">-->
                            <!-- <button id="modalBtn" class="btn btn-xs btn-primary">modal</button> -->
                            <!-- <button id="row-count" class="btn btn-xs btn-primary">Row count</button> -->

                            <!-- <h1 style="text-align:left">jsQR Demo</h1> -->
                            <!-- <a id="githubLink" href="https://github.com/cozmo/jsQR">View documentation on Github</a>
                            <p>Pure JavaScript QR code decoding library.</p>
                            <div id="loadingMessage">🎥 Unable to access video stream (please make sure you have a webcam enabled)</div>
                            <canvas  id="canvas" hidden></canvas>
                            <div id="output" hidden>
                              <div id="outputMessage">No QR code detected.</div>
                              <div hidden><b>Data:</b> <span id="outputData"></span></div>
                            </div> -->

                            <!--</div>-->
                            <!-- <center><div id="qr-reader" style="width: 600px"></div></center> -->
                            <!-- <button id="startScanner">Start Scanner</button>
                            <div id="interactive" class="viewport"></div> -->

                            <!-- <div id="webcam"></div> -->


                            <div class="modal-body">

                              <form class="form" id="qrForm" method="post">
                                  <div class="box-body">
                                      <div class="col-md-8" >
                                          <!-- <div class="form-group">
                                              <label for="exampleInputEmail1" class="form-label">Date:</label>
                                              <input type="date" class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" />
                                          </div> -->
                                      </div>
                                      <div class="col-md-4" style="margin-right:45px">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1" class="form-label">Date:</label>
                                              <input type="date" class="form-control" id="dateField" name="dateField" placeholder="MM/DD/YYYY" />
                                          </div>
                                      </div>
                                      <hr class="my-15">
                                      <div class="row">
                                          <!-- <div class="col-md-6">
                                              <div class="box">
                                                  <div class="box-body p-0">				  	
                                                          <div class="media">
                                                              lfjlasjfladsj
                                                          </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="box">
                                                  <div class="box-body p-0">				  	
                                                          <div class="media">
                                                              lfjlasjfladsj
                                                          </div>
                                                  </div>
                                              </div>
                                          </div> -->
                                          <div class="col-md-6">
                                              <!-- <div class="box">
                                                  <div class="box-body p-0">				  	
                                                          <div class="media"> -->
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label ><span class="error">*</span>Barcode</label>
                                                                      <input type="text" class="form-control" placeholder="Barcode" id="barcode" name="barcode">
                                                                      <input type="hidden" class="form-control" id="id" name="id">
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label>Stock Location</label>
                                                                      <select class="form-control select2" placeholder="Select Stock Location" id="stk_loc" name="stk_loc" style="width:100%;">     
                                                                          <option>Please choose...</option>
                                                                      </select>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label>Gas Name</label>
                                                                      <select class="form-control select2" placeholder="Gas Name" id="gasName" name="gasName" style="width:100%;">     
                                                                          <option>Please choose...</option>
                                                                      </select>
                                                                  </div>
                                                              </div>
                                                          <!-- </div>
                                                  </div>
                                              </div> -->
                                          </div>
                                          <div class="col-md-6">
                                              <!-- <div class="box">
                                                  <div class="box-body p-0">				  	
                                                          <div class="media"> -->
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label ><span class="error">*</span>Manufacturer Name</label>
                                                                      <input type="text" class="form-control" placeholder="Manufacturer Name" id="manufacturer_name" name="manufacturer_name">
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label ><span class="error">*</span>Cylinder Size</label>
                                                                      <input type="text" class="form-control" placeholder="Cylinder Size" id="cylSize" name="cylSize">
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label ><span class="error">*</span>Cylinder Height</label>
                                                                      <input type="text" class="form-control" placeholder="Cylinder Height" id="cylHeight" name="cylHeight">
                                                                  </div>
                                                              </div>
                                                          <!-- </div>
                                                  </div>
                                              </div> -->
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
                        </div>
                        
                        
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!--table end-->

            </div>
            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->