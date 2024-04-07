var etoken = sessionStorage.getItem('etoken');
if(etoken == null) {
    
    $('#loginForm').on('submit', function (e) {
        
    e.preventDefault();

    var returnVal = $("#loginForm").valid();
    var formdata = new FormData(this);
    if (returnVal) {
        $.ajax({

            url: 'employee_login',

            type: 'POST',

            data: formdata,

            cache: false,

            contentType: false,

            processData: false,

            dataType: 'json',

            success: function (response) {
                if (response.status == 200) {
                    console.log(response);
                   swal("Good job!", response.msg, "success");
                    
                    sessionStorage.setItem("eurl", response.url);
                    sessionStorage.setItem("etoken", response.token);
                    sessionStorage.setItem("etype", response.type);
                    sessionStorage.setItem("empdetails", JSON.stringify(response.empdetails));
                    sessionStorage.setItem("rolePermission",JSON.stringify(response.role));
                    sessionStorage.setItem("tabPermission", JSON.stringify(response.tab));
                    sessionStorage.setItem("activityPermission", JSON.stringify(response.activity));
                    sessionStorage.setItem("activityControlPermission", JSON.stringify(response.activityControls));
                 
                    window.location.replace("dashboard");
                    console.log('Employee');
                 
                } else if(response.status == 400){

                    swal("Login Error!", response.msg, "error");

                }

            }

        });
    }
});
}//if ends
else{
    window.location.replace("dashboard");
}



// $('#loginForm').on('submit', function (e) {

//     e.preventDefault();

//     user = document.getElementById('uname').value;
//     password = document.getElementById('password').value;

//     // var formdata = new FormData(this);
//     console.log(user);
//     console.log(password);
//     if(user === 'admin@admin.com' && password === '12345'){
//         window.location.replace("dashboard");
//     }else{
//         swal("Login Error!", "Incorrect Password" , "error");
//     }

    
// });
// }//if ends
// else{
//     window.location.replace("dashboard");
// }