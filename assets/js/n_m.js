var req = null;

function n_m_r(u, t, d, s, f) {
    req = $.ajax({
        url: u,
        type: t,
        dataType: 'json',
        data: d
    });

    req.done(function(r, ts, jqXHR) {
        console.log(r);
        if (r.statusCode == 200) {
            s(r);
        } else {
            f(r);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown) {
      if (req.statusText =='abort') {
          return;
      }
        console.error(
            "The following error occurred: " +
            textStatus, errorThrown + " Response: " + JSON.stringify(jqXHR)
        );
        f();
    });
}

function abort_req(){
  if (req && req.readyState != 4 && $.active > 0) {
    req.abort();
  }
}

function get_notifications_dropdown(){
  var url = '/notifications/get_notifications_for_dropdown';
  var success = function (response) {
    $('#notification_dropdown_content, #notification_dropdown_content_mob').html(response.notifications);
    $('#total_counter, #total_counter_mob').html(response.unread);
    $('#notification_dropdown_icon, #notification_dropdown_icon_mob').attr("data-count", response.unread)
    if(response.unread == 0){
      $('#notification_dropdown_icon, #notification_dropdown_icon_mob').removeClass('notification-icon');
    }
    else {
      $('#notification_dropdown_icon, #notification_dropdown_icon_mob').addClass('notification-icon');
    }

  }
  var failure = function (response) {

  }

  n_m_r(url, "POST", '', success, failure);
}

function mark_all_read() {
  var url = '/notifications/mark_all_as_read';
  var success = function (response) {
    if ($('#notification_dropdown_icon').attr("data-count") > 0){
      get_notifications_dropdown();
      $('.list_unread .mark_read_link').hide();
      $('.list_unread').removeClass('list_unread');
    }
  }
  var failure = function (response) {

  }

  n_m_r(url, "POST", '', success, failure);
}

function isInt(value) {
    return !isNaN(value) &&
        parseInt(Number(value)) == value &&
        !isNaN(parseInt(value, 10));
}
