
function save_update() {
  isCreate = false;
  num = $('#uidentifier').val();
  if (!isInt(num)) { isCreate = true}

  var update_name_input = $('#title_input');
  var update_name = update_name_input.val();
  var update_body_input = $('#body_input');
  var update_body = update_body_input.val();

  var success = true;
  if (update_name == null || update_name == "") {
      success = false;
      update_name_input.parent().addClass("has-error");
  } else {
      update_name_input.parent().removeClass("has-error");
  }

  if (update_body == null || update_body == "") {
      success = false;
      update_body_input.parent().addClass("has-error");
  } else {
      update_body_input.parent().removeClass("has-error");
  }

  if (success){
    $('#save_button').button('loading');
    data = {
      body: update_body,
      title: update_name
    }

    if (!isCreate){data.uid = num}

    base = "/update-manager/"
    url = base + (isCreate ? "create_update/" : "save_update/")

    var success = function(response) {
      $('#save_button').button('reset');
      $('#uidentifier').val(response.update.uidentifier);
      $('#delete_button').removeClass('hidden');
      $.notify("Successfully saved", "success");
      updateTimes(response.update);
      updateSaveState(false);
      history.pushState(null, null, '/mission-control/' + response.update.pidentifier + '/update-editor?action=edit&uid=' + response.update.uidentifier);
      //Update defaults for reset
      update_name_input.attr('value', update_name);
      update_body_input.html(update_body);
    }

    var failure = function(response) {
      $('#save_button').button('reset');
      $.notify("Could not save update!", "error");
    }

    n_m_r(url, "POST", data, success, failure);
  }
}

function publish_update(){
  num = $('#uidentifier').val();
  if (!isInt(num)) { return }

  swal({
      title: "Are you sure?",
      text: "Once published everyone can see your update. Are you sure you proofread it?!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, publish it!",
      closeOnConfirm: false,
      showLoaderOnConfirm: true
  }, function () {

    var success = function(response){
      swal("Published!", "Your update has been published to your project page.", "success");
      updatePublishStateUpdate(response.update);
      updateTimes(response.update);
    }

    var failure = function(response) {
      string = "We couldn't publish your update for some reason."
      if(response.message != null){
        string = response.message;
      }
      swal("Uh oh!", string, "error");
    }

    n_m_r('/update-manager/publish_update', 'POST', {uid : num}, success, failure);
  });
}

function removeUpdate(){
  num = $('#uidentifier').val();
  if (!isInt(num)) { return }

  swal({
      title: "Are you sure?",
      text: "You can not undo this action, once deleted it will be removed forever!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false,
      showLoaderOnConfirm: true
  }, function () {

    var success = function(response){
      swal("Deleted!", "Your update has been successfully deleted.", "success");
      finishDelete();
    }

    var failure = function(response) {
      string = "We couldn't delete your update for some reason."
      if(response.message != null){
        string = response.message;
      }
      swal("Uh oh!", string, "error");
    }

    n_m_r('/update-manager/remove_update', 'POST', {uid : num}, success, failure);
  });
}

function unpublishUpdate(){
  $('#unpublish_button').button('loading');
  num = $('#uidentifier').val();
  if (!isInt(num)) { return }

  var success = function(response) {
    $('#unpublish_button').button('reset');
    updateTimes(response.update);
    updatePublishStateUpdate(response.update);
    updateSaveState(false);
    $.notify("Successfully unpublished the update", "success");
  }

  var failure = function(response) {
    $('#unpublish_button').button('reset');
    $.notify("Could not unpublish update!", "error");
  }

  n_m_r('/update-manager/unpublish_update', "POST", {uid : num}, success, failure);
}

function finishDelete(){
  $('#delete_message').removeClass('hidden');
  var elem = document.getElementById("update_card");
  elem.parentElement.removeChild(elem);
  elem = document.getElementById("publish_card");
  elem.parentElement.removeChild(elem);
}

function updateTimes(update){
  $('#created_on').html(update.created_on);
  $('#modified_on').html(update.modified_on);
  $('#published_on').html(update.published_on ? update.published_on : "Not Published");
}

$(document).ready(function () {
  $(":input").change(function(){
      updateSaveState(true);
  });

  $("#reset_button").click(function(){
      updateSaveState(false);
  });
});

function updatePublishStateUpdate(update){
  updatePublishState(update.published);
}

function updatePublishState(published){
  if (published){
    $('#publish_button').addClass('hidden');
    $('#unpublish_button').removeClass('hidden');
  }
  else {
    $('#publish_button').removeClass('hidden');
    $('#unpublish_button').addClass('hidden');
  }
}

function updateSaveState(unsvd) {
  if (unsvd) {
    $("#publish_button").prop("disabled",true)
  }
  else {
    $("#publish_button").prop("disabled",false)
  }
}
