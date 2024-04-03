

$(function() {

    $("#addCylinderForm").validate( {

        ignore: [], rules: {

            cylinder_no: {

                required: true, minlength: 2, maxlength: 255

            },
            manufacturer_name: {

                required: true, minlength: 2, maxlength: 255

            },
            manufacturer_no: {

                required: true, minlength: 2, maxlength: 255

            },
            gas_name: {

                required: true

            },
                        
        }

        , messages: {
                    
            
            cylinder_no: {

                required: 'Enter Cylinder No.', minlength: 'please enter more word', maxlength: 'length is exceed'

            },
            manufacturer_name: {

                required: 'Enter Manufacturer Name', minlength: 'please enter more word', maxlength: 'length is exceed'

            },
            manufacturer_no: {

                required: 'Enter Manufacturer No.', minlength: 'please enter more word', maxlength: 'length is exceed'

            },
            gas_name: {

                required: 'Select Gas Name'

            },
                      

        }

    });

});



