$(document).ready(function(){
  $('#subcat_selector_cont').hide()

  $(document).on('change', '#category', function() {
    var int = $('#category option:selected').val();
    if (isInt(int)){
      $('#subcat_selector_cont').show();
    }
    else {
      $('#subcat_selector_cont').hide();
      $("#subcategory").select2("close");
    }
  })
});

function refineProjects(page) {
  if(page != 1){
    // Chrome bug fix
    $('#load_more_button').button('loading');
  }
  $('#results_button_container').addClass('__loading');
  var page_size = 12;
  abort_req();

  var url = '/explore-projects/filter';
  var data = {
    page : page,
    page_size : page_size,
    filter : parseInt($("#filled_select option:selected").val()),
    cat : parseInt($("#category option:selected").val()),
    subcat : parseInt($("#subcategory option:selected").val()),
    pos : parseInt($("#pos_select option:selected").val()),
    sort : parseInt($("#sorter_select option:selected").val()),
  }

  var no_results = '<h1 class="generic_empty_placeholder text-center">Nothing to see here :(</h1>'
  var no_more = '<h1 class="generic_empty_placeholder voffset-md text-center">No more to show :(</h1>'
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
          refineProjects((response.count / page_size) + 1);
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
