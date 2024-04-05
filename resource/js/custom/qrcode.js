// function onScanSuccess(decodedText, decodedResult) {
//     console.log(`Code scanned = ${decodedText}`, decodedResult);
// }
// var html5QrcodeScanner = new Html5QrcodeScanner(
//   "qr-reader", { fps: 10, qrbox: 250 });
// html5QrcodeScanner.render(onScanSuccess);

// document.getElementById('startScanner').addEventListener('click', function () {
//   activateScanner();
// });

// function activateScanner() {
//   Quagga.init({
//       inputStream: {
//           name: "Live",
//           type: "LiveStream",
//           target: document.querySelector("#interactive"),
//       },
//       decoder: {
//           readers: ["code_128_reader", "ean_reader", "upc_reader"],
//       },
//   }, function (err) {
//       if (err) {
//           console.error("Error initializing Quagga:", err);
//           return;
//       }
//       Quagga.start();
//   });

//   Quagga.onDetected(function (result) {
//       var code = result.codeResult.code;
//       // alert("Detected barcode: " + code);
//       // console.log('Detected result: ',result)
//       // console.log('Detected codeResult: ',result.codeResult)
//       console.log('Detected barcode: ',code)

//       // Additional actions with the barcode value can be performed here
//   });
// }


// jQuery("#webcam").webcam({

// 	width: 320,
// 	height: 240,
// 	mode: "callback",
// 	swffile: "jscam_canvas_only.swf", // canvas only doesn't implement a jpeg encoder, so the file is much smaller

// 	onTick: function(remain) {

// 		if (0 == remain) {
// 			jQuery("#status").text("Cheese!");
// 		} else {
// 			jQuery("#status").text(remain + " seconds remaining...");
// 		}
// 	},

// 	onSave: function(data) {

// 		var col = data.split(";");
//     // Work with the picture. Picture-data is encoded as an array of arrays... Not really nice, though =/
// 	},

// 	onCapture: function () {
// 		webcam.save();

//  	  // Show a flash for example
// 	},

// 	debug: function (type, string) {
// 		// Write debug information to console.log() or a div, ...
// 	},

// 	onLoad: function () {
//     // Page load
// 		var cams = webcam.getCameraList();
// 		for(var i in cams) {
// 			jQuery("#cams").append("<li>" + cams[i] + "</li>");
// 		}
// 	}
// });

$('#modalBtn').click(function () {
  $('#qrModal').modal('toggle');
  $("#qrForm").trigger("reset");
    


});