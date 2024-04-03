let locationList = new Map();
let gasList = new Map();
let stockList = new Map();
var currentDate = new Date();

// Format the date as YYYY-MM-DD
var formattedDate = currentDate.toISOString().split('T')[0];

// addRefill Button
$('#addRefillBtn').click(function () {
    $('#addRefillModal').modal('toggle');
    $("#addRefillForm").trigger("reset");
    $('#id').val('');
    $('.error').text('');

    autoLoad();
    
});


$('#manufacturer_name').prop('disabled', true);
$('#cylSize').prop('disabled', true);
$('#cylHeight').prop('disabled', true);
// $('#stk_loc').prop('readonly', true);

function autoLoad(){
    console.log('abcd');
    $('#date').val(formattedDate);

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
            transaction_use: 'emp',
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
                    setGasDropdown(response.data[0]);

                }
            } else {
                $('#manufacturer_name').val('');
                $('#barcode').val('');
                $('#cylSize').val('');
                $('#cylHeight').val('');
                $('#stk_loc').val('').change();  // Trigger a change event if needed
                $('#gasName').val('').change();  // Trigger a change event if needed
                $('#date').val('');
                // If there is no data or an error occurred
                // setTimeout(
                    swal("Error!", response.msg, "error");
                //     8000
                // )
            }


        }

    });
}

function setStockList(data){
    console.log('data:',data.gas_id);

    $('#manufacturer_name').val(data.manufacturer_name);
    $('#cylSize').val(data.cylinder_gas_filling_size);
    $('#cylHeight').val(data.cylinder_height);
    $('#gasName').val(data.gas_id).change();
    // $('#date').val(data.date);
    $('#id').val(data.id);
    // $('#stk_loc').val(data.stock_location).change();
    setStkLocation();
    // setGasName();
}

function setStkLocation(){
    // location

    $.ajax({

        url: ebase_url + 'user/other_dept_api',

        type: 'POST',
        
        data: {
            transaction_use: 'refill',
        },

        async: false,

        dataType: 'json',

        success: function (response) {


            if (response.status == 200) {
                       
                if (response.data.length != 0) {

                    for (var i = 0; i < response.data.length; i++) {
                        locationList.set(response.data[i].id, response.data[i]);
                    }
                    setStkLocationDropdown(locationList);
                                          
                }

            }


        }

    });
}

function setStkLocationDropdown(list){
    console.log('dept list: ',list);
    // let options;
    let options='<option value="" disable selected hidden>Please choose...</option>';
    
    for (let k of list.keys()) {
        
        let loctn = list.get(k);
        
          options+=`<option value="`+loctn.id+`">`+loctn.dept_name+`</option>`;
        
        
      }        
    
    $('#stk_loc').html(options);
    $('#stk_loc option:eq(1)').prop('selected', true);
    // $('#stk_loc option:first').prop('selected', true);
}

// $(document).ready(function() {
// $("#stk_loc").dblclick(function() {
//     // Enable the field
//     $(this).prop('disabled', false);
//     $(this).prop('readonly', false);
// });
// });

$('#addRefillForm').on('submit', function (e) {

    e.preventDefault();

    var returnVal = $("#addRefillForm").valid();
    var formdata = new FormData(this);
    console.log('formdata: ',formdata);
    formdata.append("transaction_use", 'str');
    if (returnVal) {
        $.ajax({

            url: ebase_url+'user/other_stock_api',

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
                        $(location).attr('href',ebase_url+'transaction/refill_cylinder'),
                         8000
                         )
                
                } else {
                    swal("Error!", response.msg, "error");
                    setTimeout(
                        $(location).attr('href',ebase_url+'transaction/refill_cylinder'),
                         8000
                         )

                }

            }

        });
    }
});


// function setGasName(){
//     $.ajax({

//         url: ebase_url + 'user/gas_api',

//         type: 'GET',

//         async: false,

//         dataType: 'json',

//         success: function (response) {


//             if (response.status == 200) {
                       
//                 if (response.data.length != 0) {

//                     for (var i = 0; i < response.data.length; i++) {
//                         gasList.set(response.data[i].id, response.data[i]);
//                     }
//                     setGasDropdown(gasList);
                                          
//                 }

//             }


//         }
//     });
// }

// function setGasDropdown(list){
//     let options;
    
//     // let options='<option value="" disable selected hidden>Please choose...</option>';
    
//     for (let k of list.keys()) {
        
//         let gas = list.get(k);

//         options+=`<option value="`+gas.id+`">`+gas.gas_name+`</option>`;
        
//       }        
    
//     $('#gasName').html(options);
//     // Set the first option as selected
//     // $('#gasName option:first').prop('selected', true);
// }
function setGasDropdown(stock){
    
    console.log('stock:',stock);
    let options='<option value="" disable selected hidden>Please choose...</option>';

        options+=`<option value="`+stock.gas_id+`">`+stock.gas_name+`</option>`;
        
    $('#gasName').html(options);
    $('#gasName option:eq(1)').prop('selected', true);
}


function getCreateCylinder(){
    $.ajax({

        url: ebase_url+'user/stock_api_trans',

        type: 'POST',

        data: {
            transaction_use: 'refill',
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
                        // if(response.data[i].transaction_use === 'emp'){

                            stockList.set(response.data[i].id, response.data[i]);
                        // }
                    }
                    
                }
                setCreateCylinder(stockList);
            }
            else {
                // If there is no data or an error occurred
                var tableBody = $('#refillCylList');
                var noDataRow = '<tr><td colspan="8" style="text-align: center;">No data available</td></tr>';
                tableBody.append(noDataRow);
            }

        }

    });
}
getCreateCylinder();


function setCreateCylinder(list){

    console.log('stock:',list);

    $('#refillCylTable').dataTable().fnDestroy();
    $('#refillCylList').empty();
    var tblData = '', index=1;

    for (let k of list.keys()) {
        
        let stock = list.get(k);

        tblData += `
        <tr>
                <td>` + (index++) + `</td>
                <td>` + stock.barcode + `</td>
                <td>` + stock.dept_name + `</td>
                <td>` + stock.gas_name + `</td>
                
                </tr>`            
    }
                // <td> <a href="#" onclick="updateStockDetails(${stock.id})" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> 
                //     <a href="#" onclick="deleteStockDetails(${stock.id})" ><i class="mdi mdi-delete-circle" style="font-size: 20px;"></i></a>
                
                // </td>

    $('#refillCylList').html(tblData);
    $('#refillCylTable').DataTable();
    
}

// function updateStockDetails(id){
    // let stock = stockList.get(id.toString());
    // console.log('stocklist: ',stock)

    // $('#id').val('');
    // $('#manufacturer_name').val('');
    // $('#barcode').val('');
    // $('#stk_loc').val('').change();
    // $('#cylSize').val('');
    // $('#cylHeight').val('');
    // $('#gasName').val('').change();
    // $('#date').val('');

    // $('#barcode').val(stock.barcode);
    // $('#manufacturer_name').val(stock.manufacturer_name);
    // // $('#manufacturer_name').val(stock.manufacturer_name);
    // $('#cylSize').val(stock.cylinder_gas_filling_size);
    // $('#cylHeight').val(stock.cylinder_height);
    // $('#gasName').val(stock.gas_id).change();
    // $('#stk_loc').val(stock.stock_location).change();
    // $('#date').val(stock.date);
    // $('#id').val(stock.id);

    // $('#addRefillModal').modal('toggle');

// }