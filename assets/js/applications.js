function addContributor(num) {
    swal({
        title: "Are you sure?",
        text: "You should only accept an application if you're convinced of the applicant's credibility",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, add to project!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {

        var request;

        request = $.ajax({
            url: "/index.php/mission-control/add-contributor/",
            type: "POST",
            dataType: 'json',
            data: {
                appl: num,
            }
        });

        request.done(function (response, textStatus, jqXHR) {
            console.log("Hooray, it worked: " + " ; " + textStatus + " ; " + jqXHR);
            swal("Added", "The user was added to the project", "success");
            var elem = document.getElementById("application_row" + num);
            elem.parentElement.removeChild(elem);
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            $.notify("Could not add!", "error")
            swal("Could not add", "Could not add this contributor.", "error");
            //swal.close();
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR
            );
        });

        return false;
    });

}

function removeApplication(num) {
    swal({
        title: "Are you sure?",
        text: "Once deleted you can not undo.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {

        var request;

        request = $.ajax({
            url: "/index.php/mission-control/delete-application/",
            type: "POST",
            dataType: 'json',
            data: {
                appl: num,
            }
        });

        request.done(function (response, textStatus, jqXHR) {
            console.log("Hooray, it worked: " + " ; " + textStatus + " ; " + jqXHR);
            swal("Deleted", "The application was successfully deleted", "success");
            var elem = document.getElementById("application_row" + num);
            elem.parentElement.removeChild(elem);
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            $.notify("Could not delete!", "error")
            swal("Could not delete", "Could not delete this application.", "error");
            //swal.close();
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR
            );
        });

        return false;
    });
}

function sendInvite() {
    var invite_recipient_input = $('#invite_recipient');
    var invite_recipient = invite_recipient_input.val();
    var invite_position_input = $('#invite_position');
    var invite_position = invite_position_input.find(":selected").val();

    var success = true;
    if (invite_recipient == null || invite_recipient == "") {
        success = false;
        invite_recipient_input.parent().addClass("has-error");
    } else {
        invite_recipient_input.parent().removeClass("has-error");
    }

    if (invite_position == null || invite_position == "" || invite_position == 0) {
        success = false;
        console.log("NA " + invite_position);
        invite_position_input.parent().addClass("has-error");
    } else {
        invite_position_input.parent().removeClass("has-error");
    }

    if (!success) {
        return;
    }
    $('#send_invite_button').button('loading');
    var u = "/invitation-manager/invite-new-contributor";
    var d = {
        user: invite_recipient,
        mctrl: 1,
        projpos: invite_position
    }

    var s = function (response) {
        $('#send_invite_button').button('reset');
        $.notify("Invite sent!", "success");
        if ($('#current_invitations_table tbody').children().length == 1 && $('#current_invitations_table tbody').children('.empty_placeholder').length == 1) {
            $('#current_invitations_table tbody').children('.empty_placeholder').remove();
        }
        var row = $(response.invitation);
        row.prependTo('#current_invitations_table');
        invite_recipient_input.val('')
    }

    var f = function (response) {
        $('#send_invite_button').button('reset');
        var message;
        if (response !== undefined) {
            message = response.message;
        } else {
            message = "Something has gone horribly wrong."
        }
        $.notify(message, "error")
    }

    n_m_r(u, "POST", d, s, f)
}

function revokeInvitation(num) {
    swal({
        title: "Are you sure?",
        text: "Once revoked the recipient will no longer be able to join your project.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, revoke",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {

        var u = "/invitation-manager/revoke-invitation"
        var d = {
            invid: num
        }

        var s = function (response) {
            swal("Revoked", "The invitation was successfully revoked. You can still send a future invitation to this user though.", "success");
            $('#invitation_row' + num).remove()
            if ($('#historical_invitations_table tbody').children().length == 1 && $('#historical_invitations_table tbody').children('.empty_placeholder').length == 1) {
                $('#historical_invitations_table tbody').children('.empty_placeholder').remove();
            }
            var row = $(response.invitation);
            row.prependTo('#historical_invitations_table');
            if ($('#current_invitations_table tbody').children().length == 0) {
                $('#current_invitations_table tbody').html('<tr class="empty_placeholder"><td class="text-center " colspan="4"><h4 class="generic_empty_placeholder">No invitations in here...</h4></td></tr>');
            }
        }

        var f = function () {
            swal("Could not revoke", "Could not revoke this invitation.", "error");
        };

        n_m_r(u, "POST", d, s, f)
        return false;
    });
}