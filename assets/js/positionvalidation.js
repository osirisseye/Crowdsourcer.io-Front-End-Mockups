    function updatePos(num, isCreate) {
      if(!isCreate){
        var posidInput = document.forms["pos" + num]["pos_select" + num+" option:selected"];
        var posid = posidInput.value;
        var posname = $("#pos_select"+ num+" option:selected").text();;
        var posavailInput = document.forms["pos" + num]["pos_avail" + num];
        var posavail = posavailInput.value;
        var posdescrInput = document.forms["pos" + num]["pos_descr" + num];
        var posdescr = posdescrInput.value
      }
      else {
        var posidInput = $("#pos_select");
        var posid = $("#pos_select").val();
        var posname = $("#pos_select option:selected").text();
        var posavailInput = $("#pos_avail");
        var posavail = $("#pos_avail").val();
        var posdescrInput = $("#pos_descr");
        var posdescr = $("#pos_descr").val();
      }

        var typecorrect = true;

        if ((posidInput.data("select2-tag") == true && (posname == null || posname == "")) || posid == null) {
            typecorrect = false;
            isCreate ? $("#pos_selector_container span span").addClass("has-error") :$("#pos_selector_container"+num+" span span").addClass("has-error");
        } else {
            isCreate ? $("#pos_selector_container span span").removeClass("has-error") : $("#pos_selector_container"+num+" span span").removeClass("has-error");
        }

        if (!isInt(posavail)) {
            typecorrect = false;
            isCreate ? posavailInput.parent().addClass("has-error") : posavailInput.style.backgroundColor = "#fddddd";
        } else {
            isCreate ? posavailInput.parent().removeClass("has-error") : posavailInput.style.backgroundColor = "";
        }

        if (posdescr == null || posdescr == "") {
            typecorrect = false;
            isCreate ? posdescrInput.parent().addClass("has-error") : posdescrInput.style.backgroundColor = "#fddddd";
        } else {
            isCreate ? posdescrInput.parent().removeClass("has-error") : posdescrInput.style.backgroundColor = "";
        }

        if (typecorrect === true) {

            var url = isCreate ? "/start/create_new_proj_position" : "/start/set_position/";
            var type = "POST";
            var data = {
                projpos: num,
                posid: posidInput.data("select2-tag") == true ? 0 : posid,
                posname: posname ,
                posavail: posavail,
                posdescr: posdescr
            }
            var dataType = 'json';

            var success = function(response) {
              if(isCreate) {
                if(response.should_reload) {
                  console.log(response.url)
                  window.location.replace(response.url)
                }
                $('#add_position_confirm').button('reset');
                $('#create_position_modal').modal('hide');
                $('#project_positions_content').append(response.result);
                posavailInput.val('');
                posdescrInput.val('');
                $("#pos_select").val([]).trigger('change');
              }
              else {
                $.notify("Saved!", {className: 'success', autoHideDelay: 1000})
              }
            }

            var failure = function(response) {
              if(isCreate) {
                $('#add_position_confirm').button('reset');
              }

              $.notify("Could not save!", "error")
            }

            $('#add_position_confirm').button('loading');
            n_m_r(url, type, data, success, failure);
        }

        return false;
    }

    function isInt(value) {
        return !isNaN(value) &&
            parseInt(Number(value)) == value &&
            !isNaN(parseInt(value, 10));
    }

    function addRow() {
        request = $.ajax({
            url: "/index.php/start/create_new_project_position/",
            type: "POST",
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            //console.log("Hooray, it worked: " + " ; " + textStatus + " ; " + jqXHR);
            var div = document.createElement('div');

            div.className = '';

            div.innerHTML = response;

            document.getElementById('project_positions_content').appendChild(div);



        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            //alert("Here 2");
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
    }

    function removeRow(num) {
        request = $.ajax({
            url: "/index.php/start/remove_project_position/",
            type: "POST",
            data: {
                projpos: num
            },
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            var elem = document.getElementById("projpos_container_" + num);
            elem.parentElement.removeChild(elem);
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            //alert("Here 2");
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR
            );
        });

        //document.getElementById('project_positions_content').removeChild( input.parentNode );
    }
