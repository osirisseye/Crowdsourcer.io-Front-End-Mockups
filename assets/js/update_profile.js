function updateProfile(){
  var bio_input = $('#bio_text_input');
  var update_bio = bio_input.val();
  var skills_input = $('#skill_text_input');
  var update_skills = skills_input.val();

  $('#save_button').button('loading');

  var url = "/profile/update/";

  var data = {
    bio : update_bio,
    skills : update_skills
  }

  var success = function(response){
    $('#save_button').button('reset');
    $.notify("Successfully saved", "success");
    bio_input.html(update_bio);
    skills_input.html(update_skills);
  }

  var failure = function(response) {
    $('#save_button').button('reset');
    $.notify("Could not save update!", "error");
  }

  n_m_r(url, "POST", data, success, failure);
}

function getProfileImage() {
    var url = "/media-manager/get_user_profile_image/";

    var data = {}

    var success = function(response){
      $("#banner_preview_img").attr("src", response.image + "?" + new Date().getTime());
    }

    var failure = function(response) {
    }

    n_m_r(url, "POST", data, success, failure);
}

$(function() {
  $(document).on('change', "select[name='tz_selector']", function() {
    var new_tz = $("select[name='tz_selector'] option:selected").val();
    console.log('new Tz: ' + new_tz);
  });

  $(document).on('change', "#timezone", function() {
    var new_tz = $("#timezone option:selected").val();
    console.log('new Tz: ' + new_tz);
  });

});


function updateTimezone(tz) {
  if (tz === undefined) {
    tz = $("#timezone option:selected").val();
  }

  $('#save_timezone_button').button('loading');

  var url = "/profile/update-timezone";
  var type = "POST";
  var data = {tz : tz}
  var success = function(response) {
    $('#save_timezone_button').button('reset');
    $.notify("Successfully updated timezone", "success");
  }
  var failure = function(response) {
    $('#save_timezone_button').button('reset');
    $.notify("Could not save timezone", "error");
  }
  n_m_r(url, type, data, success, failure);
}