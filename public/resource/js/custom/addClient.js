let clientList = new Map();


//get client data
function getClientList() {
    $.ajax({

        url: ebase_url+'user/client_api',

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
                        clientList.set(response.data[i].id, response.data[i]);
                    }
                    
                }
                setClientList(clientList);
            }
            else {
                // If there is no data or an error occurred
                var tableBody = $('#clientList');
                var noDataRow = '<tr><td colspan="8" style="text-align: center;">No data available</td></tr>';
                tableBody.append(noDataRow);
            }

        }

    });
}
getClientList();


// client table show
function setClientList(list) {

$('#clientTable').dataTable().fnDestroy();
$('#clientList').empty();
var tblData = '', index=1;

for (let k of list.keys()) {
    
    let client = list.get(k);

    tblData += `
    <tr>
            <td>` + (index++) + `</td>
            <td>` + client.client_name + `</td>
            <td>` + client.contact + `</td>
            <td>` + client.email + `</td>
            <td> <a href="#" onclick="updateClientDetails(${client.id})" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> 
                 <a href="#" onclick="deleteClientDetails(${client.id})" ><i class="mdi mdi-delete-circle" style="font-size: 20px;"></i></a>
            
            </td>
            
    </tr>`            
}

$('#clientList').html(tblData);
$('#clientTable').DataTable();
}


function updateClientDetails(id){
    let client = clientList.get(id.toString());
    // console.log('id',id);
    //clear all fields
    $('#id').val('');
    $('#client_name').val('');
    $('#contact').val('');
    $('#email').val('');
    $('#address').val('');
    $('#idealTime').val('');
    $('.error').text('');
    //set details
    $('#id').val(client.id);
    // console.log('client',client.id);
    $('#client_name').val(client.client_name);
    $('#contact').val(client.contact);
    $('#email').val(client.email);
    $('#address').val(client.address);
    $('#idealTime').val(client.idealtimeforcylinder);
    
    $('#addClientModal').modal('toggle');
}

function deleteClientDetails(id){
    $.ajax({
        url: ebase_url + 'user/client_api/' + id,
        type: 'delete',
        headers: {
            "Authorization": etoken
        },
        dataType: 'json',
        success: function (response) {
            if (response.status == 200) {
                swal("Good job!", response.msg, "success");
                setTimeout(
                    $(location).attr('href',ebase_url+'master/client'),
                     8000
                     )
            } else {
                swal("Good job!", response.msg, "error");
                setTimeout(
                    $(location).attr('href',ebase_url+'master/client'),
                     8000
                     )
            }
        }
    });
}

$('#addClientForm').on('submit', function (e) {

    e.preventDefault();

    var returnVal = $("#addClientForm").valid();
    var formdata = new FormData(this);
    console.log(formdata);
    if (returnVal) {
        $.ajax({

            url: ebase_url+'user/client_api',

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
                        $(location).attr('href',ebase_url+'master/client'),
                         8000
                         )
                } else {
                    swal("Good job!", response.msg, "error");
                    setTimeout(
                        $(location).attr('href',ebase_url+'master/client'),
                         8000
                         )

                }

            }

        });
    }
});


$('#addClientBtn').click(function () {
    $('#addClientModal').modal('toggle');
    $("#addClientForm").trigger("reset");
    $('#id').val('');
    $('.error').text('');
    
});


//form client validation script
var clientValidation = document.createElement('script');
clientValidation.src = ebase_url + 'resource/js/custom/clientValidation.js';
clientValidation.setAttribute("type", "text/javascript");
document.head.appendChild(clientValidation);