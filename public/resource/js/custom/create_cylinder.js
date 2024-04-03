let stockList = new Map();
// let location = new Map();

// addCylinder Button
$('#addGasCylBtn').click(function () {
    $('#addCylinderModal').modal('toggle');
    $("#addCylinderForm").trigger("reset");
    $('#id').val('');
    $('.error').text('');

    autoLoad();
    
});

$('#stk_loc').prop('disabled', true);
$('#stk_loc').prop('readonly', true);

$('#manufacturer_name').prop('disabled', true);
$('#cylSize').prop('disabled', true);
$('#cylHeight').prop('disabled', true);

function autoLoad(){
    console.log('abcd');

    var typingTimer;
    var doneTypingInterval = 1000;  // Adjust the delay (in milliseconds) as needed

    $('#barcode').on('input', function() {
        // Clear the existing timer
        clearTimeout(typingTimer);

        // Start a new timer
        typingTimer = setTimeout(function() {
            // Get the current value of the input
            var inputValue = $('#barcode').val();

            // Call your method or perform any action with the input value
            getCylinderData(inputValue);

            // Reset the timer
            typingTimer = null;
        }, doneTypingInterval);
    });

}

function getCylinderData(barcode){
    console.log('barcode',barcode);

    $.ajax({

        url: ebase_url + 'user/stock_barcode',

        type: 'POST',

        data: {
            barcode: barcode,
        },

        async: false,

        dataType: 'json',

        success: function (response) {


            if (response.status == 200) {

                if (response.data.length != 0) {
                    // for (var i = 0; i < response.data.length; i++) {
                    //     salesList.set(response.data[i].id, response.data[i]);
                    // }
                    setStockList(response.data[0]);

                }
            } else {
                // If there is no data or an error occurred
                swal("Error!", response.msg, "error");
            }


        }

    });
}

function setStockList(data){
    console.log('data:',data);

    $('#manufacturer_name').val(data.manufacturer_name);
    $('#cylSize').val(data.cylinder_gas_filling_size);
    $('#cylHeight').val(data.cylinder_height);
    $('#id').val(data.id);
    // $('#stk_loc').val(data.stock_location).change();
    setStkLocation(data.stock_location);
}

function setStkLocation(id){
    // location

    $.ajax({

        url: ebase_url + 'user/dept_api/'+id,

        type: 'GET',

        async: false,

        dataType: 'json',

        success: function (response) {


            if (response.status == 200) {
                let option;
                // let option='<option value="disabled selected hidden>"</option>';
                       
                if (response.data.length != 0) {
                                          
                        option +=`<option value="${response.data[0].id}">${response.data[0].dept_name}</option>`; 
                   
                }
                $('#stk_loc').html(option);

            }


        }

    });
}

$(document).ready(function() {
$("#stk_loc").dblclick(function() {
    // Enable the field
    $(this).prop('disabled', false);
    $(this).prop('readonly', false);
});
});

$('#addCylinderForm').on('submit', function (e) {

    e.preventDefault();

    var returnVal = $("#addCylinderForm").valid();
    var formdata = new FormData(this);
    console.log('formdata: ',formdata);
    if (returnVal) {
        $.ajax({

            url: ebase_url+'user/stock_api',

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
                        $(location).attr('href',ebase_url+'transaction/create_cylinder'),
                         8000
                         )
                
                } else {
                    swal("Error!", response.msg, "error");
                    setTimeout(
                        $(location).attr('href',ebase_url+'transaction/create_cylinder'),
                         8000
                         )

                }

            }

        });
    }
});

function getCreateCylinder(){
    $.ajax({

        url: ebase_url+'user/stock_api_trans',

        type: 'POST',

        data: {
            transaction_use: 'emp',
        },

        async:false,

        headers: {
            "Authorization": etoken
        },

        dataType: 'json',

        success: function (response) {
        

            if (response.status == 200) {

                if (response.data.lenght != 0) {
                    for (var i = 0; i < response.data.length; i++) {
                        stockList.set(response.data[i].id, response.data[i]);
                    }
                    
                }
                setCreateCylinder(stockList);
            }
            else {
                // If there is no data or an error occurred
                var tableBody = $('#departmentList');
                var noDataRow = '<tr><td colspan="8" style="text-align: center;">No data available</td></tr>';
                tableBody.append(noDataRow);
            }

        }

    });
}
getCreateCylinder();


function setCreateCylinder(list){

    console.log('stock:',list);

    $('#gasCylTable').dataTable().fnDestroy();
    $('#gasCylList').empty();
    var tblData = '', index=1;

    for (let k of list.keys()) {
        
        let stock = list.get(k);

        tblData += `
        <tr>
                <td>` + (index++) + `</td>
                <td>` + stock.barcode + `</td>
                <td>` + stock.dept_name + `</td>
                <td>` + stock.gas_name + `</td>
                <td> <a href="#" onclick="updateStockDetails(${stock.id})" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> 
                    <a href="#" onclick="deleteStockDetails(${stock.id})" ><i class="mdi mdi-delete-circle" style="font-size: 20px;"></i></a>
                
                </td>
                
        </tr>`            
    }

    $('#gasCylList').html(tblData);
    $('#gasCylTable').DataTable();
    
}