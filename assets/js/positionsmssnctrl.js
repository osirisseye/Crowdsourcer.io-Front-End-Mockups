var information = [];

function getAllData() {
    // Show loading animations

    $('#tabs-4-area1').addClass("__loading");
    $('#tabs-4-area2').addClass("__loading");

    request = $.ajax({
        url: "/mission-control/get-position-info/",
        type: "GET",
        dataType: 'json'
    });

    request.done(function(response, textStatus, jqXHR) {
        //Hide loading animations
        $('#tabs-4-area1').removeClass("__loading");
        $('#tabs-4-area2').removeClass("__loading");

        console.log(response);

        if (response.statusCode == 200) {
            // Refresh UI
            information = response;
            updateDisplay();

        } else {
            // Something went wrong.
        }

    });

    // Callback handler that will be called on failure
    request.fail(function(jqXHR, textStatus, errorThrown) {
        //Hide loading animations
        $('#tabs-4-area1').removeClass("__loading");
        $('#tabs-4-area2').removeClass("__loading");

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown, jqXHR
        );
    });
}

function updateDisplay() {
    updateUserDisplay();
    updatePositionDisplay();
}

function updateUserDisplay() {
    var elem = $("#searchlist").find(".active");
    var num = 0;
    if (elem.length > 0) {
        num = elem.data('identifier');
    }

    var source = $("#user-template").html();
    var template = Handlebars.compile(source);

    $('#searchlist').html(template(information));

    updatePositionSelection(num);
    if (num != 0) $("#searchlist").find("[data-identifier='" + num + "']").addClass(" active");
}

function updatePositionDisplay() {
    var source = $("#position-template").html();
    var template = Handlebars.compile(source);

    $('#positions_content_holder').html(template(information));
    updateProgressBars();
}

function updatePositionSelection(num) {
    if (num === undefined) {
        num = 0;
    }

    if (num == 0) {
        $('#selection_container').fadeOut(150, function() {
            $("#searchlist").find(".active").removeClass(" active");
            $('#selection_list').html(null);
            $('#selection_button_container').html(null);
        });
    } else {
        var elem = $("#searchlist").find(".active");
        console.log(elem)
        if (elem.length > 0) {
            elem.removeClass(" active");

        }

        $('#selection_container').fadeOut(150, function() {
            $("#searchlist").find("[data-identifier='" + num + "']").addClass(" active");

            $('#selection_list').html(null);
            var matches = $.grep(information.contributors, function(e) {
                return e.identifier == num
            });
            var contributor = matches[0];

            var source = $("#user-position-template").html();
            var template = Handlebars.compile(source);

            for (var i = 0; i < information.positions.length; ++i) {
                var pos = information.positions[i];

                for (var l = 0, m = null; l < contributor.positions.length; ++l) {
                    if (contributor.positions[l].projpos != pos.projpos)
                        continue;

                    m = contributor.positions[l];
                    break;
                }

                var context = {
                    name: pos.position_name,
                    checked: m == null ? "" : 'checked="checked"',
                    projpos: pos.projpos
                };
                $('#selection_list').append(template(context));
            }
            $('#selection_container').fadeIn(150);

            source = $("#user-position-buttons-template").html();
            template = Handlebars.compile(source);
            context = {
                num: num
            };

            $('#selection_button_container').html(template(context));

        });
    }
}

function updateDescription(e, num) {
    console.log("update function");
    if (e.value == null || e.value == "") {
        e.target.html(e.old_value);
        //console.log("No description");
        return;
    } else if (e.value == e.old_value) {
        //console.log("No change");
        return;
    }

    request = $.ajax({
        url: "/mission-control/update-position/description",
        type: "POST",
        dataType: 'json',
        data: {
            description: e.value,
            projpos: num
        }
    });

    request.done(function(response, textStatus, jqXHR) {
        //Hide animations
        if (response.statusCode == 200) {

            console.log("Hooray, it worked: " + response + " ; " + textStatus + " ; " + jqXHR);
            information.positions = response.positions
        } else {
            $.notify("Could not save!", "error");
            e.target.html(e.old_value);
        }

    });

    // Callback handler that will be called on failure
    request.fail(function(jqXHR, textStatus, errorThrown) {
        $.notify("Could not save!", "error")

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown, jqXHR
        );

        e.target.html(e.old_value);
    });

}

function updateSpaces(e, num) {

    if (!isInt(e.value)) {
        e.target.html(e.old_value);
        //console.log("No valid input");
        return;
    } else if (e.value == e.old_value) {
        //console.log("No change");
        return;
    }

    request = $.ajax({
        url: "/mission-control/update-position/spaces",
        type: "POST",
        dataType: 'json',
        data: {
            spaces: e.value,
            projpos: num
        }
    });

    request.done(function(response, textStatus, jqXHR) {
        //Hide animations
        if (response.statusCode == 200) {
            //            $.notify("Saved!", {
            //                className: 'success',
            //                autoHideDelay: 2000
            //            })

            console.log("Hooray, it worked: " + response + " ; " + textStatus + " ; " + jqXHR);
            information.positions = response.positions
            updateProgressBars();
        } else {
            $.notify("Could not save!", "error");
            e.target.html(e.old_value);
        }

    });

    // Callback handler that will be called on failure
    request.fail(function(jqXHR, textStatus, errorThrown) {
        $.notify("Could not save!", "error")

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown + "Response: " + jqXHR
        );

        e.target.html(e.old_value);
    });

}

function updateProgressBars() {
    for (i = 0; i < information.positions.length; i++) {
        var pos = information.positions[i];
        $("#progress_bar" + pos.projpos).css('width', pos.percentage + "%");
        $("#progress_bar" + pos.projpos).attr('class', 'progress-bar progress-bar-' + pos.colour_status);
    }
}

function isInt(value) {
    return !isNaN(value) &&
        parseInt(Number(value)) == value &&
        !isNaN(parseInt(value, 10));
}

function toggleFields(animated) {
    //    var anim = animated ? 25 : 0;
    //
    //    if ($("#pos_select").val() === "0") {
    //        $("#create_name").show(anim);
    //    } else {
    //        $("#create_name").hide(anim);
    //    }

}

function validateForm() {
    var posid = $("#pos_select option:selected");
    var posname = $("#pos_select option:selected").text();
    var posavail = $("#pos_avail");
    var posdescr = $("#pos_descr");

    var typecorrect = true;

    if ((posid.data("select2-tag") == true && (posname == null || posname == "")) || posid.val() == null) {
        typecorrect = false;
        $("#pos_selector_container span span").addClass("has-error");
    } else {
        $("#pos_selector_container span span").removeClass("has-error");
    }

    if (!isInt(posavail.val())) {
        typecorrect = false;
        //posavail.css('background-color', '#fddddd');
        posavail.parent().addClass("has-error");
    } else {
        //posavail.css('background-color', '');
        posavail.parent().removeClass("has-error");
    }

    if (posdescr.val() == null || posdescr.val() == "") {
        typecorrect = false;
        posdescr.parent().addClass("has-error");
    } else {
        posdescr.parent().removeClass("has-error");
    }

    if (typecorrect === true) {
        $('#add_position_confirm').button('loading');
        var request;

        request = $.ajax({
            url: "/mission-control/create-position",
            type: "POST",
            data: {
                posid: posid.data("select2-tag") == true ? 0 : posid.val(),
                posname: posname,
                posavail: posavail.val(),
                posdescr: posdescr.val()
            },
            dataType: 'json'
        });

        // Callback handler that will be called on success
        request.done(function(response, textStatus, jqXHR) {
            // you're going to need to update information and the display
            $('#add_position_confirm').button('reset');
            if (response.statusCode == 200) {
                $('#create_position_modal').modal('hide');
                $.notify("Saved!", {
                    className: 'success',
                    autoHideDelay: 2000
                })

                console.log("Hooray, it worked: " + response + " ; " + textStatus + " ; " + jqXHR);
                information.positions = response.positions
                posavail.val('');
                posdescr.val('');
                $("#pos_select").val([]).trigger('change');
                updateDisplay();
            } else {
                $.notify("Could not save!", "error");
                console.error(
                    "The following error occurred: " +
                    textStatus, errorThrown, response
                );
            }
        });

        // Callback handler that will be called on failure
        request.fail(function(jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            //alert("Here 2");
            $('#add_position_confirm').button('reset');
            $.notify("Could not save!", "error")

            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR
            );
        });
    }

    return false;
}

function removePosition(num) {

    swal({
        title: "Are you sure?",
        text: "While this can be undone, removing a position may cause confusion to your contributors and will remove all applications to it.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, remove position!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function() {

        request = $.ajax({
            url: "/mission-control/remove-position",
            type: "POST",
            dataType: 'json',
            data: {
                projpos: num
            }
        });

        request.done(function(response, textStatus, jqXHR) {

            //            console.log("Hooray, it worked: " + response + " ; " + textStatus + " ; " + jqXHR);

            if (response.statusCode == 200) {
                swal("Removed", "Successfully removed this position from your project.", "success");

                information.positions = response.positions
                updateDisplay();

            } else {
                //                $.notify("Could not remove!", "error");
                swal("Could not remove", "Could not remove because " + response.message, "error");
            }

        });

        // Callback handler that will be called on failure
        request.fail(function(jqXHR, textStatus, errorThrown) {
            //            $.notify("Could not remove!", "error")
            swal("Could not remove", "Something went wrong, could not remove.", "error");
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown + "Response: " + jqXHR
            );

        });

    });
}

function updateUserPositions(num) {
    $('#update_positions_confirm').button('loading');
    var posarray = [];
    var conarray = [];

    var $j_object = $("#selection_list .list-group-item");
    $j_object.each(function(i) {
        var $checkbox = $(this).find(':checkbox');
        var projpos = $(this).data('projpos');
        var checked = $checkbox.is(':checked');
        posarray.push({
            projpos: projpos,
            checked: checked
        });
        if (checked) conarray.push({
            projpos: projpos,
            checked: checked
        });
    });

    var oldPositions = []
    for (var l = 0, m = null; l < information.contributors.length; ++l) {
        if (information.contributors[l].identifier != num)
            continue;

        m = information.contributors[l];
        oldPositions = m.positions;
        information.contributors[l].positions = conarray;
        break;
    }

    $("#searchlist").find("[data-identifier='" + num + "'] i").html(conarray.length);

    console.log(posarray);

    var failed = function() {
        for (var l = 0, m = null; l < information.contributors.length; ++l) {
            if (information.contributors[l].identifier != num)
                continue;

            m = information.contributors[l];
            information.contributors[l].positions = oldPositions;
            $("#searchlist").find("[data-identifier='" + num + "'] i").html(oldPositions.length);
            break;
        }

        //updatePositionSelection(num);
    }

    var request;

    request = $.ajax({
        url: "/mission-control/update-user-positions",
        type: "POST",
        data: {
            contributor: num,
            positions: posarray
        },
        dataType: 'json'
    });

    request.done(function(response, textStatus, jqXHR) {
        // you're going to need to update information and the display
        $('#update_positions_confirm').button('reset');
        if (response.statusCode == 200) {

            console.log("Hooray, it worked: " + response + " ; " + textStatus + " ; " + jqXHR);
            information.positions = response.positions;
            updatePositionDisplay();
        } else {
            $.notify("Could not save!", "error");
            failed();

            console.error(
                "The following error occurred: " +
                textStatus, textStatus, response
            );

        }
    });

    request.fail(function(jqXHR, textStatus, errorThrown) {

        $('#update_positions_confirm').button('reset');
        $.notify("Could not save!", "error")

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown, jqXHR
        );

        failed();
    });
}

function md_on_blur(e) {
    alert("Blur triggered!");
}
