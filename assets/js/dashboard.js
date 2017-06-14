function updateMotd(e) {
    console.log("update function");
    if (e.value == null || e.value == "") {
        e.target.html(e.old_value);
        console.log("No message");
        return;
    } else if (e.value == e.old_value) {
        console.log("No change");
        return;
    }

    request = $.ajax({
        url: "/mission-control/update-motd",
        type: "POST",
        dataType: 'json',
        data: {
            message: e.value,
        }
    });

    request.done(function (response, textStatus, jqXHR) {
        //Hide animations
        if (response.statusCode == 200) {
            console.log("Hooray, it worked: " + response + " ; " + textStatus + " ; " + jqXHR);
            
        } else {
            $.notify("Could not save!", "error");
            e.target.html(e.old_value);
        }

    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown) {
        $.notify("Could not save!", "error")

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown, jqXHR
        );

        e.target.html(e.old_value);
    });

}