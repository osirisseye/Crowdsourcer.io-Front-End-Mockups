function isInt(value) {
    return !isNaN(value) &&
        parseInt(Number(value)) == value &&
        !isNaN(parseInt(value, 10));
}

function need_help() {
    swal({
        title: "Are you sure?",
        text: "Are you sure you want to get some support into your group chat?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {

        var request;

        request = $.ajax({
            url: "/mission-control/need-help/",
            type: "POST",
            dataType: 'json',
        });

        request.done(function (response, textStatus, jqXHR) {
            console.log("Hooray, it worked: " + response.statusCode + " ; " + textStatus + " ; " + JSON.stringify(response) + " ; " + JSON.stringify(jqXHR));

            if (response.statusCode == 200) {

                $.notify("Vote Success!", {
                    className: 'success',
                    autoHideDelay: 1000
                });
                
                $('#help_footer').html("A Guidance, Navigation and Controls System Engineer is on the way.");

                swal({
                    title: "Succesfully added a support member",
                    text: "A support member is now in your project chat. You can open a new channel or message them directly. Give them a bit of time to reply though as they've been added automatically.",
                    type: "success"
                });

            } else {

                swal({
                    title: "Could not add.",
                    text: response.message,
                    type: "error"
                });
            }

        });

        request.fail(function (jqXHR, textStatus, errorThrown) {

            $.notify("Could not Add!", "error");

            swal({
                title: "Could not add.",
                text: response.message,
                type: "error"
            });

            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR
            );

        });
        return false;
    });

    return false
}
