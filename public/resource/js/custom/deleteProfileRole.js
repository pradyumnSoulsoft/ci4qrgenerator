function deleteProfileRole(profileroleid){
    swal({
        title: "Are you sure ??",
        text: "You want to delete this Tab", 
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
         deleteRole(profileroleid);
        
      } else {
        
      }
    });

    
}

function deleteRole(id){
    
    $.ajax({

        url: base_url+'super/profileRole/'+id,

        type: 'DELETE',

        async: false,

        headers: {
            "Authorization": token
        },

        dataType: 'json',

        success: function (response) {
            if (response.status == 200) {
                
                  
        profileRoleList.delete(id.toString());
        setProfileRoleList(profileRoleList);
        swal(response.msg, {
            icon: "success",
          });
        
            } else {

                swal(response.msg, {
                    icon: "error",
                  });

            }

        }

    });
    
    
}