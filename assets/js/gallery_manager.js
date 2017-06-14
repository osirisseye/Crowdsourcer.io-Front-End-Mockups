var mediaInfo = [];

function getAllMediaData() {
    $('#media_gallery').addClass("__loading");
    var request = $.ajax({
        url: "/media-manager/get-media-for-project/",
        type: "GET",
        dataType: 'json'
    });
    request.done(function(response, textStatus, jqXHR) {
        //Hide loading animations
        $('#media_gallery').removeClass("__loading");

        if (response.statusCode == 200) {
            // Refresh UI
            mediaInfo.media = response.media;
            updateMediaDisplay();

        } else {
            // Something went wrong.
            $.notify("Could not get media!", "error");
        }

    });

    request.fail(function(jqXHR, textStatus, errorThrown) {
        //Hide loading animations
        $('#media_gallery').removeClass("__loading");

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown, jqXHR, JSON.stringify(jqXHR)
        );
    });
}

function updateMediaDisplay() {
    var source = $('#media-template').html();
    var template = Handlebars.compile(source);

    $('#media_list_container').html(template(mediaInfo));

}

function updateMediaInfo(e, num, type) {
    var url = type == 1 ? "/media-manager/update-media-name/" : "/media-manager/update-media-desc/"

    if (e.value == e.old_value) {
        return;
    }
    // else if (e.value == null || e.value == "") {
    //     e.target.html(e.old_value);
    //     return;
    // }

    var request = $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        data: {
            val: e.value,
            mid: num
        }
    });

    request.done(function(response, textStatus, jqXHR) {
        //Hide animations
        console.log("Hooray, it worked: " + response + " ; " + textStatus + " ; " + JSON.stringify(jqXHR));
        if (response.statusCode == 200) {
            mediaInfo.media = response.media
            //updateMediaDisplay();
        } else {
            $.notify("Could not save!", "error");
            e.target.html(e.old_value);
        }

    });

    request.fail(function(jqXHR, textStatus, errorThrown) {
        $.notify("Could not save!", "error")

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown + " Response: " + jqXHR
        );

        e.target.html(e.old_value);
    });
}

function getElementIndex(el) {
    return [].slice.call(el.parentElement.children).indexOf(el);
}

function getNewPosition(el) {
    var index = getElementIndex(el);
    var count = el.parentElement.children.length;
    //console.log(index, count);
    if (index == 0) {
        var first_pos = el.parentElement.children[1].dataset.pos;
        //console.log('new position: ', first_pos / 2);
        new_pos = Math.round(first_pos / 2);
        if (Math.abs(new_pos - first_pos) < 4) {
            redisPos(el);
        }
    } else if (index == count - 1) {
        var last_pos = parseInt(el.parentElement.children[count - 2].dataset.pos);
        //console.log('new position: ', (parseInt(last_pos) + 10000));
        new_pos = last_pos + 10000;
    } else {
        var before_pos = parseInt(el.parentElement.children[index - 1].dataset.pos)
        var after_pos = parseInt(el.parentElement.children[index + 1].dataset.pos)
        new_pos = Math.round((before_pos + after_pos) / 2);
        if (Math.abs(new_pos - before_pos) < 4 || Math.abs(new_pos - after_pos) < 4) {
            redisPos(el);
        }
    }
    console.log('new: ', new_pos);
    el.setAttribute('data-pos', new_pos);
    updateIndex(el);
}

function redisPos(el) {
    array = el.parentElement.children
    array[array.length - 1].setAttribute('data-pos', 0);
}

function updateIndex(el) {
    array = el.parentElement.children;
    final_pos = parseInt(array[array.length - 1].dataset.pos);
    final_n = parseInt(array[array.length - 1].dataset.mid);

    el_pos = parseInt(el.dataset.pos);
    el_n = parseInt(el.dataset.mid);

    var el_data = [{
        pos: el_pos,
        mid: el_n
    }];
    var should_repos = final_pos == 0;
    if (should_repos) {
        el_data = el_data.concat([{
            pos: final_pos,
            mid: final_n
        }])
    }
    var request = $.ajax({
        url: "/media-manager/update-media-positions/",
        type: "POST",
        dataType: 'json',
        data: {
            data: el_data
        }
    });

    request.done(function(response, textStatus, jqXHR) {
        //Hide animations
        if (response.statusCode == 200) {
            console.log("Hooray, it worked: " + response + " ; " + textStatus + " ; " + jqXHR);
            mediaInfo.media = response.media
            if (should_repos) {
                updateMediaDisplay();
            }
        } else {
            $.notify("Could not save!", "error");
            updateMediaDisplay();
        }

    });

    request.fail(function(jqXHR, textStatus, errorThrown) {
        $.notify("Could not save!", "error")

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown + " Response: " + JSON.stringify(jqXHR)
        );

        updateMediaDisplay();
    });
}

function remove(num) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: true,
        showLoaderOnConfirm: false
    }, function() {
        var elem = document.getElementById("media_list_object" + num);
        elem.parentElement.removeChild(elem);

        var request = $.ajax({
            url: "/media-manager/remove-media/",
            type: "POST",
            dataType: 'json',
            data: {
                mid: num
            }
        });

        request.done(function(response, textStatus, jqXHR) {
            //Hide animations
            if (response.statusCode == 200) {
                mediaInfo.media = response.media
            } else {
                $.notify("Could not remove!", "error");
                updateMediaDisplay();
            }

        });

        request.fail(function(jqXHR, textStatus, errorThrown) {
            $.notify("Could not save!", "error")

            console.error(
                "The following error occurred: " +
                textStatus, errorThrown + " Response: " + JSON.stringify(jqXHR)
            );

            updateMediaDisplay();
        });


    });
}

function saveLink() {

    var url_input = $('#url_input');
    var url = url_input.val();
    var name_input = $('#name_input');
    var name = name_input.val();
    var cap_input = $('#caption_input');
    var cap = cap_input.val();
    var type = $('input[name="type_radio"]:checked').val();

    var success = true;
    if (url == null || url == "") {
        success = false;
        url_input.parent().parent().addClass("has-error");
    } else {
        url_input.parent().parent().removeClass("has-error");
    }

    // if (name == null || name == "") {
    //     success = false;
    //     name_input.parent().parent().addClass("has-error");
    // } else {
    //     name_input.parent().parent().removeClass("has-error");
    // }
    //
    // if (cap == null || cap == "") {
    //     success = false;
    //     cap_input.parent().parent().addClass("has-error");
    // } else {
    //     cap_input.parent().parent().removeClass("has-error");
    // }
    if (success) {
        var request
        $('#save_url_button').button('loading');

        request = $.ajax({
            url: "/media-manager/add-media-link/",
            type: "POST",
            dataType: 'json',
            data: {
                url: url,
                type: type,
                name: name,
                caption: cap
            }
        });

        request.done(function(response, textStatus, jqXHR) {
            //Hide animations
            $('#save_url_button').button('reset');
            console.log(response);
            if (response.statusCode == 200) {
                mediaInfo.media = response.media
                url_input.val('');
                name_input.val('');
                cap_input.val('');
                updateMediaDisplay();
            } else {
                $.notify("Could not save!", "error");
                updateMediaDisplay();
                url_input.parent().parent().addClass("has-error");
            }

        });

        request.fail(function(jqXHR, textStatus, errorThrown) {
            $.notify("Could not save!", "error")
            $('#save_url_button').button('reset');
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown + " Response: " + JSON.stringify(jqXHR)
            );

            updateMediaDisplay();
        });

    }
}

function getBannerImage(num) {
    wProj = num !== undefined;

    var url = "/media-manager/get-banner-image/" + (wProj ? num : "");
    var type = "GET";

    var success = function(response) {
        $("#banner_preview_img").attr("src", response.banner);
    }

    var failure = function(response) {
        
    }

    n_m_r(url, type, {}, success, failure);
}
