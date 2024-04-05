
$(function() {

    $("#qrForm").validate( {

        ignore: [], rules: {

            content: {

                required: true

            },
           
        }

        , messages: {

            content: {

                required: 'Please Enter Url'

            },

        }

    });

});



