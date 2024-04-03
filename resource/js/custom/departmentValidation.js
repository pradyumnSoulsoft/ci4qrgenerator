

$(function() {

    $("#addDepartmentForm").validate( {

        ignore: [], rules: {

            dept_name: {

                required: true, minlength: 2, maxlength: 255

            },
            // description: {

            //     required: true, minlength: 2, maxlength: 255

            // },
                        
        }

        , messages: {
                    
            
            dept_name: {

                required: 'Enter Department Name', minlength: 'please enter more word', maxlength: 'length is exceed'

            },
            // description: {

            //     required: 'Enter Description', minlength: 'please enter more word', maxlength: 'length is exceed'

            // },
                      

        }

    });

});



