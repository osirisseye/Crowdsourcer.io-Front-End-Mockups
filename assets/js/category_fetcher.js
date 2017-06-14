$(document).ready(function() {
        var request;

        $(document).on('change', '#category', function() {
            //alert($('#category option:selected').val());

            // Abort any pending request
            if (request) {
                request.abort();
            }
            
            select = document.getElementById('subcategory');

                // Clear the old options
                select.options.length = 1;
            
            // setup some local variables
            var form = $('#category option:selected').val();

            request = $.ajax({
                url  : "/start/get_subcategories/",
                type : "POST",
                data : { category_id : form},
                dataType : 'json'
            });

            // Callback handler that will be called on success
            request.done(function(response, textStatus, jqXHR) {
                // Log a message to the console
                //console.log("Hooray, it worked: " + response + " ; " + textStatus + " ; " + jqXHR);
                
                var options, index, select, option;

                // Get the raw DOM object for the select box
                select = document.getElementById('subcategory');

                // Clear the old options
                select.options.length = 1;

                // Load the new options
                options = response;
                for (index = 0; index < (options.length); ++index) {
                    option = options[index];
                    select.options.add(new Option(option.subcategory_name, option.subcategory_id));
                }
                select.selectedIndex=0;
            });

            // Callback handler that will be called on failure
            request.fail(function(jqXHR, textStatus, errorThrown) {
                // Log the error to the console
                console.error(
                    "The following error occurred: " +
                    textStatus, errorThrown
                );
            });

            // Callback handler that will be called regardless
            // if the request failed or succeeded
            request.always(function() {
                // Reenable the inputs
                //$inputs.prop("disabled", false);
            });
        })
    });