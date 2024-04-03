$(function() {

    $("#addClientForm").validate( {

        ignore: [], rules: {

            client_name: {

                required: true, minlength: 2, maxlength: 255

            }
            ,
            contact: {

               required:true, minlength: 10, maxlength: 10 ,number: true

           },
            email: {

                required: true, minlength: 2, maxlength: 255

            },
            address: {

                required: true, minlength: 2, maxlength: 255

            }
            
        }

        , messages: {

            client_name: {

                required: 'Enter Client Name', minlength: 'please enter more word', maxlength: 'length is exceed'

            },
            contact: {

                required:'Enter Contact', minlength: 'please enter 10 digits', maxlength: 'please enter 10 digits' ,number: 'please enter only nos'
                
            },
            email: {
                
                required: 'Enter Email', minlength: 'please enter more word', maxlength: 'length is exceed'

           },
           address: {
                
                required: 'Enter Address', minlength: 'please enter more word', maxlength: 'length is exceed'

           }
            

        }

    });

});



/*

client_name
address
contact
email
idealtimeforcylinder
*/