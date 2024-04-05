var width=500;
var height=500;

var button = document.getElementById('qrButton');
var saveBtn = document.getElementById('saveBtn');
var resetBtn = document.getElementById('resetBtn');
var form = document.getElementById('qrForm');
var container = document.getElementById('container');
var buttonWrapper = document.getElementById('buttonWrapper');

button.addEventListener('click', function() {

    console.log('Button clicked! start');
    var urlInput = document.getElementById('content');
    var url = urlInput.value.trim();
    
    if (url === '') {
        swal("Error!", "Please enter a URL", "error");
        urlInput.focus();
        return;
    }
    
    // Regular expression for URL validation
    var urlPattern = /^(http(s)?:\/\/)?(www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+(\S*)$/;
    if (!urlPattern.test(url)) {
        swal("Error!", "Please enter a valid URL.", "error");
        urlInput.focus();
        return;
    }
    console.log('Button clicked! end');

    updateContainerSize();

    const content = document.getElementById('content').value
    const color = document.getElementById('color').value

    try {
        var qrcode = new QRCodeSVG({ content, color, join: true, width, height });
        // var qrcode = new QRCodeSVG({ content, color, join: true, width: 500, height: 500 });
        var svg = qrcode.svg();
        document.getElementById("container").innerHTML = svg;
        showButton();
    } catch (error) {
        console.error(error);
    }
});



// Function to update container size
function updateContainerSize() {
    width = document.getElementById('width').value;
    // width = document.getElementById('width').value + 'px';
    // height = document.getElementById('height').value + 'px';
    height = document.getElementById('height').value;
    document.getElementById('container').style.width = width;
    document.getElementById('container').style.height = height;
}

function showButton() {
    document.getElementById('buttonWrapper').style.display = 'block';
    // document.getElementById('resetWrapper').style.display = 'block';
}


saveBtn.addEventListener('click', function() {

    console.log('save button click');

    const content = document.getElementById('content').value;
    const color = document.getElementById('color').value;

    try {
        var qrcode = new QRCodeSVG({ content, color, width, height });
        // var qrcode = new QRCodeSVG({ content, color, width: 500, height: 500 });
        var svgString = qrcode.svg();

        // Convert the SVG string to a Blob object
        var svgBlob = new Blob([svgString], { type: 'image/svg+xml' });

        // Create a download link
        var downloadLink = document.createElement('a');
        downloadLink.href = URL.createObjectURL(svgBlob);
        downloadLink.download = 'qrcode-html.svg'; // Set the filename for the download
        downloadLink.click();
    } catch (error) {
        alert(error);
    }
    

});



resetBtn.addEventListener('click',function(){
    form.reset();
    container.innerHTML = 'Content inside container';
    buttonWrapper.style.display = 'none';
});

//import activityValidation script
// var qrValidation = document.createElement('script');
// qrValidation.src = ebase_url + 'resource/js/custom/qrValidation.js';
// qrValidation.setAttribute("type", "text/javascript");
// document.head.appendChild(qrValidation);