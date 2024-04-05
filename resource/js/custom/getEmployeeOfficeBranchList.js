let officeBranchList = new Map();
console.log('This is working');
function getOfficeBranchList() {
    $.ajax({

        url: base_url+'super/officeBranchDetails',

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
                        officeBranchList.set(response.data[i].id, response.data[i]);
                    }
                    console.log(officeBranchList);
                    setEmployeeBranchDropdown(officeBranchList);
                    
                }

            }

        }

    });
}

getOfficeBranchList();




