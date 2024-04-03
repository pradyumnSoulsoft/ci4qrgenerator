let departmentList = new Map();


//get department data
function getDepartmentList() {
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
                        departmentList.set(response.data[i].id, response.data[i]);
                    }
                    
                }
                setDepartmentList(departmentList);
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
getDepartmentList();


// department table show
function setDepartmentList(list) {

$('#departmentTable').dataTable().fnDestroy();
$('#departmentList').empty();
var tblData = '', index=1;

for (let k of list.keys()) {
    
    let department = list.get(k);

    tblData += `
    <tr>
            <td>` + (index++) + `</td>
            <td>` + department.dept_name + `</td>
            <td>` + department.description + `</td>
            <td>` + department.transaction_use + `</td>
            <td> <a href="#" onclick="updateDepartmentDetails(${department.id})" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> 
                 <a href="#" onclick="deleteDepartmentDetails(${department.id})" ><i class="mdi mdi-delete-circle" style="font-size: 20px;"></i></a>
            
            </td>
            
    </tr>`            
}

$('#departmentList').html(tblData);
$('#departmentTable').DataTable();
}


function updateDepartmentDetails(id){
    let department = departmentList.get(id.toString());
    // console.log('id',id);
    //clear all fields
    $('#id').val('');
    $('#dept_name').val('');
    $('#description').val('');
    $('.error').text('');
    //set details
    $('#id').val(department.id);
    // console.log('department',department.id);
    $('#dept_name').val(department.dept_name);
    $('#description').val(department.description);
    $('#transaction_use').val(department.transaction_use);
    
    $('#addDepartmentModal').modal('toggle');
}

function deleteDepartmentDetails(id){
    $.ajax({
        url: ebase_url + 'user/dept_api/' + id,
        type: 'delete',
        headers: {
            "Authorization": etoken
        },
        dataType: 'json',
        success: function (response) {
            if (response.status == 200) {
                swal("Good job!", response.msg, "success");
                setTimeout(
                    $(location).attr('href',ebase_url+'master/department'),
                     8000
                     )
            } else {
                swal("Good job!", response.msg, "error");
                setTimeout(
                    $(location).attr('href',ebase_url+'master/department'),
                     8000
                     )
            }
        }
    });
}

$('#addDepartmentForm').on('submit', function (e) {

    e.preventDefault();

    var returnVal = $("#addDepartmentForm").valid();
    var formdata = new FormData(this);
    console.log('abcd:',formdata);
    if (returnVal) {
        $.ajax({

            url: ebase_url+'user/dept_api',

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
                        $(location).attr('href',ebase_url+'master/department'),
                         8000
                         )
                } else if(response.status == 409){
                    swal("Good job!", response.msg, "error");
                } else {
                    swal("Good job!", response.msg, "error");
                    setTimeout(
                        $(location).attr('href',ebase_url+'master/department'),
                         8000
                         )

                }

            }

        });
    }
});


$('#addDepartmentBtn').click(function () {
    $('#addDepartmentModal').modal('toggle');
    $("#addDepartmentForm").trigger("reset");
    $('#id').val('');
    $('.error').text('');
    
});


//form department validation script
var departmentValidation = document.createElement('script');
departmentValidation.src = ebase_url + 'resource/js/custom/departmentValidation.js';
departmentValidation.setAttribute("type", "text/javascript");
document.head.appendChild(departmentValidation);