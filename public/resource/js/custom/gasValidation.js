

$(function() {

    $("#addGasForm").validate( {

        ignore: [], rules: {

            gas_name: {

                required: true, minlength: 2, maxlength: 255

            },
            gas_formula: {

                required: true, minlength: 1, maxlength: 255

            },
                        
        }

        , messages: {
                    
            
            gas_name: {

                required: 'Enter Gas Name', minlength: 'please enter more word', maxlength: 'length is exceed'

            },
            gas_formula: {

                required: 'Enter Gas Formula', minlength: 'please enter more word', maxlength: 'length is exceed'

            },
                      

        }

    });

});



