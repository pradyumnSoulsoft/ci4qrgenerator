
let activityList = new Map();
let tabList = new Map();

function getActivityList() {
    $.ajax({

        url: base_url+'super/activity',

        type: 'GET',

        async:false,

        headers: {
            "Authorization": token
        },

        dataType: 'json',

        success: function (response) {
        

            if (response.status == 200) {

                if (response.data.lenght != 0) {
                    for (var i = 0; i < response.data.length; i++) {
                        activityList.set(response.data[i].id, response.data[i]);
                    }
                    setActivityList(activityList);
                }

            }

        }

    });
}
getActivityList();

function setActivityList(list) {
    
    $('#activityTable').dataTable().fnDestroy();
    $('#activityList').empty();
    var tblData = '', badge, status;
    
    for (let k of list.keys()) {
        
        let activity = list.get(k);
        
        switch (activity.is_active) {
            case '1':
                status = '<span class="badge badge-pill badge-success">Active</span>';
                break;

            case '0':
                status = '<span class="badge badge-pill badge-danger">Inactive</span>';
                break;

        }

        tblData += `
                <tr>
                        <td>` + activity.id + `</td>
                        <td>` + activity.tab_name + `</td>
                        <td>` + activity.activity_title + `</td>
                        <td>` + activity.url + `</td>
                        <td><i class="${activity.icon}" aria-hidden="true" style="font-size:20px;"></i></td>
                        <td>` + status + `</td>
                        <td> <a href="#" onclick="updateActivityDetails(` + activity.id + `)" title="Update Tab" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> </td>
                </tr>
                `;
    }
    
    $('#activityList').html(tblData);
    $('#activityTable').DataTable();
}


$('#addActivityForm').on('submit', function (e) {

    e.preventDefault();

    var returnVal = $("#addActivityForm").valid();
    var formdata = new FormData(this);
    if (returnVal) {
        $.ajax({

            url: base_url+'super/activity',

            type: 'POST',

            headers: {
                "Authorization": token
            },

            data: formdata,

            cache: false,

            contentType: false,

            processData: false,

            dataType: 'json',

            success: function (response) {
                if (response.status == 200) {
                    $('#addActivityModal').modal('toggle');
                    swal("Good job!", response.message, "success");
                let id=response.data.id;
                  
                 if(activityList.has(id)){
                    activityList.delete(id);   
                 }
                 activityList.set(id, response.data);
                 setActivityList(activityList);
                 
                 setTimeout(
                    $(location).attr('href',base_url+'super/superActivity'),
                     8000
                     )

                } else {

                    swal("Good job!", response.message, "error");

                }

            }

        });
    }
});



$('#addActivityBtn').click(function () {
    $('#addActivityModal').modal('toggle');
    $("#addActivityForm").trigger("reset");
    $('#id').val('');
    $('.error').text('');
    // setIconDropdown(iconList);
    // $("#iconMirror").removeAttr('class');
    // $('#is_subtab').prop('checked',false);
});

function getTabList() {
    $.ajax({

        url: base_url+'super/tab',

        type: 'GET',

        async:false,

        headers: {
            "Authorization": token
        },

        dataType: 'json',

        success: function (response) {
        

            if (response.status == 200) {

                if (response.data.lenght != 0) {
                    for (var i = 0; i < response.data.length; i++) {
                        tabList.set(response.data[i].id, response.data[i]);
                    }
                    //setTabList(tabList);
                }

            }

        }

    });
}
getTabList();

function setTabDropdown(list) {

    var options = '<option value="" disabled selected hidden>Please Choose...</option>';
    
    for (let k of list.keys()) {
        
        let tab = list.get(k);
        
          options+=`<option value="${tab.id}">${tab.tab_name}</option>`;
        
        
      }
        
    
    $('#tab_id').html(options);
    
}

setTabDropdown(tabList);


function updateActivityDetails(id) {
    let activity = activityList.get(id.toString());
     //clear all fields
     $('#id').val('');
     $('#activity_title').val('');
     $('#url').val('');
     $("#active").attr('checked', false) ;
      $("#inactive").attr('checked',false);
     $('.error').text('');
     //set details
     $('#id').val(activity.id);
     $('#tab_id').val(activity.tab_id);
     $('#activity_title').val(activity.activity_title);
     $('#url').val(activity.url);
     $('#icon_id').val(activity.icon_id).change();
     (activity.is_active == 1) ? $("#active").attr('checked', 'checked') : $("#inactive").attr('checked', 'checked');
     $('#addActivityModal').modal('toggle');
}

let iconList = new Map();

function getIconList() {
    $.ajax({

        url: base_url+'super/icon',

        type: 'GET',

        async:false,

        headers: {
            "Authorization": token
        },

        dataType: 'json',

        success: function (response) {
        

            if (response.status == 200) {

                if (response.data.lenght != 0) {
                    for (var i = 0; i < response.data.length; i++) {
                        iconList.set(response.data[i].id, response.data[i]);
                    }
                    
                }

            }

        }

    });
}
getIconList();

function setIconDropdown(list) {

    var options = '<option value="" disabled selected hidden>Please Choose...</option>';
    
    for (let k of list.keys()) {
        
        let icon = list.get(k);
        
          options+=`<option value="${icon.id}">${icon.icon_title}</option>`;
        
        
      }
        
    
    $('#icon_id').html(options);
    
}

setIconDropdown(iconList);


$('#icon_id').change(function(){
    let icon = iconList.get(this.value);
    $("#iconMirror").removeAttr('class');
    $('#iconMirror').addClass(icon.icon);
});

//import activityValidation script
var activityValidation = document.createElement('script');
activityValidation.src = base_url + 'resource/js/custom/activityValidation.js';
activityValidation.setAttribute("type", "text/javascript");
document.head.appendChild(activityValidation);