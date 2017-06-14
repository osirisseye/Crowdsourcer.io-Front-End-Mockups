function resetFields() {
    document.getElementById("project_settings_form").reset();

    var elem = document.getElementById("fixed-input")
    if (elem.value != null && elem.value != "") {
        elem.disabled = false
    } else {
        elem.disabled = true
    }

    elem = document.getElementById("scaled-input")
    if (elem.value != null && elem.value != "") {
        elem.disabled = false
    } else {
        elem.disabled = true
    }

    $('.has-error').removeClass('has-error');

}

function verify() {
    var a = $('input[name="radio4"]:checked').val();
    var b = $('#fixed-input')
    var bv = parseInt(b.val())
    var ub = b.attr("max");
    var lb = b.attr("min");
    var c = $("#scaled-input");
    var cv = parseInt(c.val())
    var uc = c.attr("max");
    var lc = c.attr("min");

    var l = $("#task_add");
    var lv = parseInt(l.val())
    var ul = l.attr("max");
    var ll = l.attr("min");
    var m = $("#vote_in");
    var mv = parseInt(m.val())
    var um = m.attr("max");
    var lm = m.attr("min");

    var x = true;

    if (a == "f") {
        if (!isInt(b.val()) || bv < lb || bv > ub) {
            x = false;
            b.parent().addClass("has-error");
        } else {
            b.parent().removeClass("has-error");
        }

    } else if (a == "s") {
        if (!isInt(c.val()) || cv < lc || cv > uc) {
            x = false;
            c.parent().addClass("has-error");
        } else {
            c.parent().removeClass("has-error");
        }
    } else {
        return false;
    }

    if (!isInt(l.val()) || lv < ll || lv > ul) {
        x = false;
        l.parent().addClass("has-error");
    } else {
        l.parent().removeClass("has-error");
    }

    if (!isInt(m.val()) || mv < lm || mv > um) {
        x = false;
        m.parent().addClass("has-error");
    } else {
        m.parent().removeClass("has-error");
    }

    if (x) {
        $('#save_settings_button').button('loading');
        var request

        request = $.ajax({
            url: "/mission-control/update-settings",
            type: "POST",
            dataType: 'json',
            data: {
                f_l: a == "f" ? bv : 0,
                s_l: a == "s" ? cv : 0,
                t_a_r: lv,
                v_r: mv
            }
        });

        request.done(function(response, textStatus, jqXHR) {
            $('#save_settings_button').button('reset');
            //Hide animations
            if (response.statusCode == 200) {
                console.log("Hooray, it worked: " + response + " ; " + textStatus + " ; " + jqXHR);
                $.notify("Saved", "success")

            } else {
                $.notify("Could not save!", "error");
            }

        });

        // Callback handler that will be called on failure
        request.fail(function(jqXHR, textStatus, errorThrown) {
            $('#save_settings_button').button('reset');
            $.notify("Could not save!", "error")

            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR, JSON.stringify(jqXHR)
            );

        });

    }

    return false;
}

function goLive() {
  swal({
      title: "Are you sure?",
      text: "Once you go live you can not go un-live (if that's a word).",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, go live",
      closeOnConfirm: false,
      showLoaderOnConfirm: true
  }, function () {
    url = "/mission-control/go-live"
    var success = function(response){
      swal("You are Live!", "Your project is now live. This is where the fun begins.", "success");
      $('#project_live_alert').remove();
    }
    var failure = function(response){
      swal("Uh oh!", "Something went wrong when taking your project live", "error");
    }
    data = {};

    n_m_r(url, "GET", data, success, failure);
  });
}

function isInt(value) {
    return !isNaN(value) &&
        parseInt(Number(value)) == value &&
        !isNaN(parseInt(value, 10));
}
