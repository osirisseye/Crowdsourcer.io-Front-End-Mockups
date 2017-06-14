$(document).ready(function(){
  $('#load_more_button').button('reset');
  get_notifications(1);
});

function get_notifications(page){
  if(page != 1){
    // Chrome bug fix
    $('#load_more_button').button('loading');
  }

  $('#results_button_container').addClass('__loading');
  var page_size = 15;
  abort_req();
  var url = '/notifications/get_notifications';
  var data = {
    page : page,
    page_size : page_size
  }
  var no_results = '<h2 class="generic_empty_placeholder text-center">Nothing to see here :(</h2>'
  var no_more = '<h2 class="generic_empty_placeholder voffset-md text-center">No more to show :(</h2>'

  var success = function(response){
    $('#results_button_container').removeClass('__loading');
    $('#load_more_button').button('reset');
    if (page == 1){
      $("#results_container").html(response.results)
    }
    else {
      $("#results_container").append(response.results)
    }

    if(response.count == 0) {
        $("#results_container").html(no_results)
    }
    else {
      if (response.count % page_size == 0 && response.count == page_size * page){
        $('#load_more_button').show()
        $('#load_more_button').on('click', function(){
          get_notifications((response.count / page_size) + 1);
        })
      }
      else {
        if (response.count == page_size * (page - 1) && response.count % page_size == 0){
          $("#results_container").append(no_more)
        }
        $('#load_more_button').hide()
      }
    }
  }

  var failure = function(response) {
    $('#results_button_container').removeClass('__loading');
    $('#load_more_button').button('reset');
    $("#results_container").html(no_results)
  }
  console.log(data);
  n_m_r(url, "GET", data, success, failure);
}

function markRead(nid) {
  var url = '/notifications/mark_as_read';
  var data = {nid : nid};
  var success = function(response) {
    $('#notification_item' + nid).removeClass('list_unread');
    $('#notification_item' + nid + ' .mark_read_link').hide();
    get_notifications_dropdown();
  }
  var failure = function(response) {

  }
  n_m_r(url, "POST", data, success, failure);
}
