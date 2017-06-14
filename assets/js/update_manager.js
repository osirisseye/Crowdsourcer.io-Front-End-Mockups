var updateInfo = [];

function getAllUpdateData() {
    $('#updates').addClass("__loading");

    var success = function(response) {
        $('#updates').removeClass("__loading");
        updateInfo.updates = response.updates;
        refreshUpdateDisplay();
        prepMarkdown();
    }

    var failure = function(response) {
        $('#updates').removeClass("__loading");
        $.notify("Could not get updates!", "error");
    }

    n_m_r("/update-manager/get-updates-for-project/", "GET", {}, success, failure);
}

function refreshUpdateDisplay() {
    var source = $('#update-template').html();
    var template = Handlebars.compile(source);

    $('#updates_container').html(template(updateInfo));
}
