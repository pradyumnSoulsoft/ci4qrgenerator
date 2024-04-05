let cylinderList = new Map();
let gasList = new Map();
let deptList = new Map();


//get cylinder data
function getCylinderList() {
    $.ajax({

        url: ebase_url+'user/gas_cylinder',

        type: 'GET',

        async:false,

        headers: {
            "Authorization": etoken
        },

        dataType: 'json',

        success: function (response) {
        

            if (response.status == 200) {

                if (response.data.lenght != 0) {
                    for (var i = 0; i < response.data.length; i++) {
                        cylinderList.set(response.data[i].id, response.data[i]);
                    }
                    
                }
                setCylinderList(cylinderList);
            }
            else {
                // If there is no data or an error occurred
                var tableBody = $('#gasCylinderList');
                var noDataRow = '<tr><td colspan="8" style="text-align: center;">No data available</td></tr>';
                tableBody.append(noDataRow);
            }

        }

    });
}
getCylinderList();

//get gas data
function getGasList() {
    $.ajax({

        url: ebase_url+'user/gas_api',

        type: 'GET',

        async:false,

        headers: {
            "Authorization": etoken
        },

        dataType: 'json',

        success: function (response) {
        

            if (response.status == 200) {

                if (response.data.lenght != 0) {
                    for (var i = 0; i < response.data.length; i++) {
                        gasList.set(response.data[i].id, response.data[i]);
                    }
                    
                }
                setGasDropdownList(gasList);
            }
            else {
                swal("Good job!", response.msg, "error");
            }

        }

    });
}
getGasList();

function setGasDropdownList(list){

    var options = '<option value="" disabled selected hidden>Please Choose...</option>';

    for (let k of list.keys()) {

        let cylinder = list.get(k);
        // console.log(unitName.unitName);
        options += `<option value="${cylinder.id}">${cylinder.gas_name}</option>`;


    }


    $('#gas_name').html(options);
}


function getCylStatus(){
    $.ajax({

        url: ebase_url+'user/dept_api',

        type: 'GET',

        async:false,

        headers: {
            "Authorization": etoken
        },

        dataType: 'json',

        success: function (response) {
        

            if (response.status == 200) {

                if (response.data.lenght != 0) {
                    for (var i = 0; i < response.data.length; i++) {
                        deptList.set(response.data[i].id, response.data[i]);
                    }
                    
                }
                setCylStatusDropdownList(deptList);
            }
            else {
                swal("Good job!", response.msg, "error");
            }

        }

    });
}
getCylStatus();


function setCylStatusDropdownList(list){
    var options;
    for (let k of list.keys()) {

        let dept = list.get(k);
        // console.log(unitName.unitName);
        options += `<option value="${dept.id}">${dept.dept_name}</option>`;


    }


    $('#cyl_status').html(options);
    $('#cyl_status option:first').prop('selected', true);
}
// cylinder table show
function setCylinderList(list) {

$('#gasCylinderTable').dataTable().fnDestroy();
$('#gasCylinderList').empty();
var tblData = '',status, cylinder_status, index=1;

for (let k of list.keys()) {
    
    let cylinder = list.get(k);

    switch (cylinder.status) {
        case '1':
            status = '<span class="badge badge-pill badge-success">Active</span>';
            break;

        case '0':
            status = '<span class="badge badge-pill badge-danger">Inactive</span>';
            break;

    }
    // switch (cylinder.cylinder_status) {
    //     case '1':
    //         cylinder_status = '<span class="badge badge-pill badge-success">Refill</span>';
    //         break;
        
    //     case '0':
    //         cylinder_status = '<span class="badge badge-pill badge-danger">Empty</span>';
    //         break;

    // }

    tblData += `
    <tr>
            <td>` + (index++) + `</td>
            <td>` + cylinder.cylinder_no + `</td>
            <td>` + cylinder.barcode + `</td>
            <td>` + cylinder.gas_name + `</td>
            <td>` + cylinder.dept_name + `</td>
            <td> <a href="#" onclick="updateCylinderDetails(${cylinder.id})" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> 
                 <a href="#" onclick="deleteCylinderDetails(${cylinder.id})" ><i class="mdi mdi-delete-circle" style="font-size: 20px;"></i></a>
            
            </td>
            
    </tr>`            
}

$('#gasCylinderList').html(tblData);
$('#gasCylinderTable').DataTable();
}


function updateCylinderDetails(id){
    let cylinder = cylinderList.get(id.toString());
    //clear all fields
    $('#id').val('');
    $('#cylinder_no').val('');
    $('#manufacturer_name').val('');
    $('#manufacturer_no').val('');
    $('#filling_size').val('');
    $('#cylinder_height').val('');
    $('#gas_name').val('');
    $('#barcode_text').val('');

    $("#active").attr('checked', false) ;
    $("#inactive").attr('checked',false);
    $("#fill").attr('checked',false);
    $("#empty").attr('checked',false);
    $('.error').text('');
    //set details
    $('#id').val(cylinder.id);
    // console.log('gas',gas.id);
    $('#cylinder_no').val(cylinder.cylinder_no);
    $('#manufacturer_name').val(cylinder.manufacturer_name);
    $('#manufacturer_no').val(cylinder.manufacturer_no);
    $('#filling_size').val(cylinder.cylinder_gas_filling_size);
    $('#cylinder_height').val(cylinder.cylinder_height);
    $('#barcode_text').val(cylinder.barcode);
    $('#gas_name').val(cylinder.gasId).change();
    $('#cyl_status').val(cylinder.cylinder_status).change();
    
    // (cylinder.cylinder_status == 1) ? $("#fill").attr('checked', 'checked') : $("#empty").attr('checked', 'checked');
    (cylinder.status == 1) ? $("#active").attr('checked', 'checked') : $("#inactive").attr('checked', 'checked');
    $('#addCylinderModal').modal('toggle');
}

function deleteCylinderDetails(id){
    $.ajax({
        url: ebase_url + 'user/gas_cylinder/' + id,
        type: 'delete',
        headers: {
            "Authorization": etoken
        },
        dataType: 'json',
        success: function (response) {
            if (response.status == 200) {
                swal("Good job!", response.msg, "success");
                setTimeout(
                    $(location).attr('href',ebase_url+'master/gasCylinder'),
                     8000
                     )
            } else {
                swal("Good job!", response.msg, "error");
                setTimeout(
                    $(location).attr('href',ebase_url+'master/gasCylinder'),
                     8000
                     )
            }
        }
    });
}


$('#addCylinderForm').on('submit', function (e) {

    e.preventDefault();

    var returnVal = $("#addCylinderForm").valid();
    var formdata = new FormData(this);
    console.log(formdata);
    if (returnVal) {
        $.ajax({

            url: ebase_url+'user/gas_cylinder',

            type: 'POST',

            data: formdata,

            cache: false,

            contentType: false,

            processData: false,

            dataType: 'json',

            success: function (response) {
                if (response.status == 200) {
                    
                    swal("Good job!", response.msg, "success");
                    setTimeout(
                        $(location).attr('href',ebase_url+'master/gasCylinder'),
                         8000
                         )
                } else if(response.status == 409){
                    swal("Good job!", response.msg, "error");
                } else {
                    swal("Good job!", response.msg, "error");
                    setTimeout(
                        $(location).attr('href',ebase_url+'master/gasCylinder'),
                         8000
                         )

                }

            }

        });
    }
});

$('#addCylinderBtn').click(function () {
    $('#addCylinderModal').modal('toggle');
    $("#addCylinderForm").trigger("reset");
    $('#id').val('');
    $('.error').text('');
    
});


// $('#barcode').click(function () {

//     var video = document.createElement("video");
//     var canvasElement = document.getElementById("canvas");
//     var canvas = canvasElement.getContext("2d");
//     // var loadingMessage = document.getElementById("loadingMessage");
//     var outputContainer = document.getElementById("output");
//     var outputMessage = document.getElementById("outputMessage");
//     var outputData = document.getElementById("outputData");

//     function drawLine(begin, end, color) {
//       canvas.beginPath();
//       canvas.moveTo(begin.x, begin.y);
//       canvas.lineTo(end.x, end.y);
//       canvas.lineWidth = 4;
//       canvas.strokeStyle = color;
//       canvas.stroke();
//     }

//     // Use facingMode: environment to attemt to get the front camera on phones
//     navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
//       video.srcObject = stream;
//       video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
//       video.play();
//       requestAnimationFrame(tick);
//     });

//     function tick() {
//     //   loadingMessage.innerText = "⌛ Loading video..."
//       if (video.readyState === video.HAVE_ENOUGH_DATA) {
//         // loadingMessage.hidden = true;
//         canvasElement.hidden = false;
//         outputContainer.hidden = false;

//         canvasElement.height = video.videoHeight;
//         canvasElement.width = video.videoWidth;
//         canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
//         var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
//         var code = jsQR(imageData.data, imageData.width, imageData.height, {
//           inversionAttempts: "dontInvert",
//         });
//         if (code) {
//           drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
//           drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
//           drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
//           drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
//           outputMessage.hidden = true;
//           outputData.parentElement.hidden = false;
//           outputData.innerText = code.data;
//         } else {
//           outputMessage.hidden = false;
//           outputData.parentElement.hidden = true;
//         }
//         // if(outputData.parentElement.hidden === false){
//         //     // canvas.setAttribute('hidden', 'true');
//         //     canvasElement.hidden = true;
//         //     outputContainer.hidden = true;

//         // }
//       }
//       requestAnimationFrame(tick);
//     }
// });
/*
var barcodeEnabled = true;
var video = document.createElement("video");
var canvasElement = document.getElementById("canvas");
var canvas = canvasElement.getContext("2d");
var outputContainer = document.getElementById("output");
var outputMessage = document.getElementById("outputMessage");
var outputData = document.getElementById("outputData");
var mediaStream;

function drawLine(begin, end, color) {
    canvas.beginPath();
    canvas.moveTo(begin.x, begin.y);
    canvas.lineTo(end.x, end.y);
    canvas.lineWidth = 4;
    canvas.strokeStyle = color;
    canvas.stroke();
}

$('#barcode').click(function () {
    if (barcodeEnabled) {
        navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function (stream) {
            mediaStream = stream;
            video.srcObject = stream;
            video.setAttribute("playsinline", true);
            video.play();
            requestAnimationFrame(tick);
        });

        function tick() {
            if (video.readyState === video.HAVE_ENOUGH_DATA) {
                canvasElement.hidden = false;
                outputContainer.hidden = false;

                canvasElement.height = video.videoHeight;
                canvasElement.width = video.videoWidth;
                canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
                var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
                var code = jsQR(imageData.data, imageData.width, imageData.height, {
                    inversionAttempts: "dontInvert",
                });
                if (code) {
                    drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
                    drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
                    drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
                    drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
                    outputMessage.hidden = true;
                    outputData.parentElement.hidden = false;
                    outputData.innerText = code.data;
                } else {
                    outputMessage.hidden = false;
                    outputData.parentElement.hidden = true;
                }
            }
            requestAnimationFrame(tick);
        }

        barcodeEnabled = false;
    } else {
        // Stop the camera stream
        if (mediaStream) {
            var tracks = mediaStream.getTracks();
            tracks.forEach(function (track) {
                track.stop();
            });
        }

        // Clear the srcObject to stop the video
        video.srcObject = null;

        // Hide canvas and output elements
        canvasElement.hidden = true;
        outputContainer.hidden = true;

        // Reset the barcodeEnabled flag for the next click
        barcodeEnabled = true;
    }
});
*/

function onScanSuccess(decodedText, decodedResult) {
    console.log(`Code scanned = ${decodedText}`, decodedResult);
    $('#barcode_text').val(decodedText);
}
var html5QrcodeScanner = new Html5QrcodeScanner(
  "qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);



var cylinderValidation = document.createElement('script');
cylinderValidation.src = ebase_url + 'resource/js/custom/cylinderValidation.js';
cylinderValidation.setAttribute("type", "text/javascript");
document.head.appendChild(cylinderValidation);