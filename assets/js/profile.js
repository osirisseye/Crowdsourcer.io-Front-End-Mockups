function removeProject(num) {
  swal({
    title: "Are you sure?",
    text: "You will not be able to undo this operation!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false,
    showLoaderOnConfirm: true
  }, function () {
    var url = "/profile/remove-creating-project";
    var type = "POST";
    var data = {
      projid: num
    }
    var success = function (response) {
      swal("Deleted!", "Your task has been deleted.", "success");
      $('#thumbnail_proj_' + num).parent().remove();
    }
    var failure = function (response) {
      swal("Could not delete", "Could not delete this project.", "error");
    }
    n_m_r(url, type, data, success, failure);
  });
}

function acceptInvitation(num) {
  var u, d, s, f;
  console.log('#accept_invitation_button' + num)
  $('#accept_invitation_button' + num).button('loading');
  u = "/invitation-manager/accept-invitation";
  d = {
    invid: num
  }
  s = function (response) {
    $('#accept_invitation_button' + num).button('reset');
    swal("Accepted!", "You are now a contributor of this project! Head over to its Mission Control and introduce yourself.", "success");
    $('#invitation_row' + num).remove()
    var row = $(response.invitation);
    if ($('#historical_invitations_table tbody').children().length == 1 && $('#historical_invitations_table tbody').children('.empty_placeholder').length == 1) {
      $('#historical_invitations_table tbody').children('.empty_placeholder').remove();
    }
    row.prependTo('#historical_invitations_table');
    if ($('#current_invitations_table tbody').children().length == 0) {
      $('#current_invitations_table tbody').html('<tr class="empty_placeholder"><td class="text-center " colspan="4"><h4 class="generic_empty_placeholder">No invitations in here...</h4></td></tr>');
    }
  }

  f = function () {
    $('#accept_invitation_button' + num).button('reset');
    swal("Could not accept", "Could not accept this invitation.", "error");
  }

  n_m_r(u, "POST", d, s, f);
}

function declineInvitation(num) {
  swal({
    title: "Are you sure?",
    text: "You will not be able to undo this operation! You can always apply to the project later though",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, decline it!",
    closeOnConfirm: false,
    showLoaderOnConfirm: true
  }, function () {
    var url = "/invitation-manager/decline-invitation";
    var type = "POST";
    var data = {
      invid: num
    }
    var success = function (response) {
      swal("Declined!", "You have declined this invitation.", "success");
      $('#invitation_row' + num).remove()
      var row = $(response.invitation);
      row.prependTo('#historical_invitations_table');
      if ($('#current_invitations_table tbody').children().length == 0) {
        $('#current_invitations_table tbody').html('<tr class="empty_placeholder"><td class="text-center " colspan="4"><h4 class="generic_empty_placeholder">No invitations in here...</h4></td></tr>');
      }
    }
    var failure = function (response) {
      swal("Could not decline", "Could not decline this invitation.", "error");
    }
    n_m_r(url, type, data, success, failure);
  });
}