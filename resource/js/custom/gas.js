let gasList = new Map();


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
                setGasList(gasList);
            }
            else {
                // If there is no data or an error occurred
                var tableBody = $('#gasList');
                var noDataRow = '<tr><td colspan="8" style="text-align: center;">No data available</td></tr>';
                tableBody.append(noDataRow);
            }

        }

    });
}
getGasList();


// gas table show
function setGasList(list) {

$('#gasTable').dataTable().fnDestroy();
$('#gasList').empty();
var tblData = '', status,index=1;

for (let k of list.keys()) {
    
    let gas = list.get(k);

    switch (gas.status) {
        case '1':
            status = '<span class="badge badge-pill badge-success">Active</span>';
            break;

        case '0':
            status = '<span class="badge badge-pill badge-danger">Inactive</span>';
            break;

    }
    tblData += `
    <tr>
            <td>` + (index++) + `</td>
            <td>` + gas.gas_name + `</td>
            <td>` + gas.gas_formula + `</td>
            <td>` + status + `</td>
            <td> <a href="#" onclick="updateGasDetails(${gas.id})" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> 
                 <a href="#" onclick="deleteGasDetails(${gas.id})" ><i class="mdi mdi-delete-circle" style="font-size: 20px;"></i></a>
            
            </td>
            
    </tr>`            
}

$('#gasList').html(tblData);
$('#gasTable').DataTable();
}


function updateGasDetails(id){
    let gas = gasList.get(id.toString());
    // console.log('id',id);
    //clear all fields
    $('#id').val('');
    $('#gas_name').val('');
    $('#gas_formula').val('');
    $("#active").attr('checked', false) ;
    $("#inactive").attr('checked',false);
    $('.error').text('');
    //set details
    $('#id').val(gas.id);
    // console.log('gas',gas.id);
    $('#gas_name').val(gas.gas_name);
    $('#gas_formula').val(gas.gas_formula);
    
    (gas.status == 1) ? $("#active").attr('checked', 'checked') : $("#inactive").attr('checked', 'checked');
    $('#addGasModal').modal('toggle');
}

function deleteGasDetails(id){
    $.ajax({
        url: ebase_url + 'user/gas_api/' + id,
        type: 'delete',
        headers: {
            "Authorization": etoken
        },
        dataType: 'json',
        success: function (response) {
            if (response.status == 200) {
                swal("Good job!", response.msg, "success");
                setTimeout(
                    $(location).attr('href',ebase_url+'master/gas'),
                     8000
                     )
            } else {
                swal("Good job!", response.msg, "error");
                setTimeout(
                    $(location).attr('href',ebase_url+'master/gas'),
                     8000
                     )
            }
        }
    });
}

$('#addGasForm').on('submit', function (e) {

    e.preventDefault();

    var returnVal = $("#addGasForm").valid();
    var formdata = new FormData(this);
    console.log(formdata);
    if (returnVal) {
        $.ajax({

            url: ebase_url+'user/gas_api',

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
                        $(location).attr('href',ebase_url+'master/gas'),
                         8000
                         )
                } else {
                    swal("Good job!", response.msg, "error");
                    setTimeout(
                        $(location).attr('href',ebase_url+'master/gas'),
                         8000
                         )

                }

            }

        });
    }
});


$('#addGasBtn').click(function () {
    $('#addGasModal').modal('toggle');
    $("#addGasForm").trigger("reset");
    $('#id').val('');
    $('.error').text('');
    
});


//form Gas validation script
var gasValidation = document.createElement('script');
gasValidation.src = ebase_url + 'resource/js/custom/gasValidation.js';
gasValidation.setAttribute("type", "text/javascript");
document.head.appendChild(gasValidation);