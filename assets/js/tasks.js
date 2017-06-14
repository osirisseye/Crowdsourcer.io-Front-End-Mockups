function addTask($num) {
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

function showform(num) {
    swal({
            title: "An input!",
            text: 'Write something interesting:',
            type: 'input',
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write something",
        },
        function (inputValue) {
            if (inputValue === false) return false;

            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false;
            }

            swal("Nice!", 'You wrote: ' + inputValue, "success");

        });
}

function validateForm(num, num2, update, num3) {

    $('#edit_task_button').button('loading');
    $('#new_task_button' + num).button('loading');

    var taskname = document.getElementById((update ? "etask_name" : "ntask_name" + num));
    var taskdets = document.getElementById((update ? "etask_dets" : "ntask_dets" + num));
    var taskconts = document.getElementById((update ? "etask_conts" : "ntask_conts" + num));
    var taskpri = document.getElementById((update ? "etask_pri" : "ntask_pri" + num));

    if (!taskname.value) {
        taskname.style.backgroundColor = "#fddddd";
    } else {
        taskname.style.backgroundColor = "";
    }

    if (!taskdets.value) {
        taskdets.style.backgroundColor = "#fddddd";
    } else {
        taskdets.style.backgroundColor = "";
    }

    var uri = (update ? "add-new-task/" : "add-new-task/");

    if (taskname.value && taskdets.value && taskconts.value && taskpri.value) {

        var request;

        request = $.ajax({
            url: "/index.php/mission-control/" + uri,
            type: "POST",
            data: {
                projpos: num,
                taskname: taskname.value,
                taskdets: taskdets.value,
                taskconts: taskconts.value,
                taskpri: taskpri.value,
                task: num3
            }
        });

        request.done(function (response, textStatus, jqXHR) {
//            console.log("Hooray, it worked: " + " ; " + textStatus + " ; " + jqXHR + response);
            $('#edit_task_button').button('reset');
            $('#new_task_button' + num).button('reset');

            $.notify(update ? "Edited!" : "Added", {
                className: 'success',
                autoHideDelay: 1000
            })

            $((update ? '#etask_modal' : '#task_modal' + num)).modal('hide');
            taskname.value = "";
            taskdets.value = "";
            taskconts.value = 1;
            taskpri.value = 2;

            var div = document.createElement('tr');

            div.idname = 'task_row';

            div.innerHTML = response;

            if (update) {
                var elem = document.getElementById("task_row" + num3);
                var index = elem.rowIndex;
                var count = elem.parentElement.children.length;
                elem.parentElement.removeChild(elem);
                if ((index - 1) >= count) {
                    $(response).insertAfter($('#table' + num + ' tbody tr:nth('+(index - 2)+')'));
                }
                else {
                    $("#table" + num + " tbody").append(response);
                }
            }
            else {
                $("#table" + num + " tbody").append(response);
                update_empty_placeholder(num, true);                
            }



            //$("#table" + num + " tbody").innerHTML += response;
            //document.getElementById('table'+num tbody).firstChild.appendChild(div);
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            //alert("Here 2");
            $('#edit_task_button').button('reset');
            $('#new_task_button' + num).button('reset');

            $.notify("Could not save!", "error")

            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR
            );
        });

        return false;
    } else {
        $('#edit_task_button').button('reset');
        $('#new_task_button' + num).button('reset');
    }

}

function removeTask(num, num2, num3) {
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


        var request;

        request = $.ajax({
            url: "/index.php/mission-control/remove-task/",
            type: "POST",
            dataType: 'json',
            data: {
                task: num,
                proj: num2,
            }
        });

        request.done(function (response, textStatus, jqXHR) {

            update_task_stats()

            // console.log("Hooray, it worked: " + " ; " + textStatus + " ; " + jqXHR);
            swal("Deleted!", "Your task has been deleted.", "success");
            // var elem = document.getElementById("task_row" + num);
            // elem.parentElement.removeChild(elem);
            $('#task_row' + num).remove();
            update_empty_placeholder(num3, false);
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            $.notify("Could not remove!", "error")
            swal("Could not delete", "Could not delete this task.", "error");
            //swal.close();
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR
            );
        });

        return false;
    });


}

function acceptTask(num) {
    swal({
        title: "Are you sure?",
        text: "Once accepted, no other contributors can work on this task!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, accept task!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {

        var request;

        request = $.ajax({
            url: "/mission-control/accept-task/",
            type: "POST",
            dataType: 'json',
            data: {
                task: num
            }
        });

        request.done(function (response, textStatus, jqXHR) {
            console.log("Hooray, it worked: " + " ; " + textStatus + " ; " + JSON.stringify(response) + " ; " + JSON.stringify(jqXHR));
            if (response.status == 200) {
                update_task_stats();

                swal({
                    title: "Accepted!",
                    text: "The task has been accepted. Good luck!.",
                    type: "success"
                }, function () {
                    //location.reload();
                    $('#task_status' + num).html("<span class=\"label label-info\">Begun</span>");
                    $('#task_actions' + num).html('Nice! You\'ve accepted this task!');
                });
            } else {
                //$.notify("Could not accept!", "error")
                swal("Could not accept the task", "The task could not be accepted because " + response.message + '.', "error");
            }

        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            //$.notify("Could not accept!", "error")
            swal("Something went wrong", "Could not accept this task because of an unknown internal error.", "error");
            //swal.close();
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR
            );
        });

        return false;
    });
}

function abandonTask(num, fromdashboard) {
    swal({
        title: "Are you sure?",
        text: "Once you abandon this task other contributors may undertake it.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, abandon",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {

        var request;

        request = $.ajax({
            url: "/mission-control/abandon-task/",
            type: "POST",
            dataType: 'json',
            data: {
                task: num
            }
        });

        request.done(function (response, textStatus, jqXHR) {
            console.log("Hooray, it worked: " + " ; " + textStatus + " ; " + JSON.stringify(response) + " ; " + JSON.stringify(jqXHR));

            update_task_stats();

            swal({
                title: "Succesfully abandoned the task",
                text: "The task has been abandoned successfully and other members may now undertake it.",
                type: "success"
            }, function () {
                if (fromdashboard) {
                    // update task information in widgets

                    var currentValue = parseInt($("#tasks_doing").text(), 10);
                    $('#tasks_doing').html(currentValue - 1);

                    var currentValue = parseInt($("#tasks_todo").text(), 10);
                    $('#tasks_todo').html(currentValue + 1);

                    var elem = document.getElementById("task_row" + num);
                    elem.parentElement.removeChild(elem);
                } else {
                    $('#task_status' + num).html("<span class=\"label label-success\">Open</span>");
                    $('#task_time' + num).html(null);
                    $('#task_actions' + num).html('Sorry to hear you couldn\'t complete this task. Perhaps try another?');
                }

            });
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            //$.notify("Could not accept!", "error")
            swal("Something went wrong", "Could not abandon this task because of an unknown error.", "error");
            //swal.close();
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR
            );
        });

        return false;
    });
}

function completeTask(num, fromdashboard) {
    // We need to do validation
    var taskdesc = document.getElementById("ctask_dets");

    if (!taskdesc.value) {
        taskdesc.style.backgroundColor = "#fddddd";
        return false;
    } else {
        taskdesc.style.backgroundColor = "";
    }

    var request;
    $('#ctask_add').button('loading');

    request = $.ajax({
        url: "/mission-control/complete-task/",
        type: "POST",
        dataType: 'json',
        data: {
            task: num,
            comdesc: taskdesc.value
        }
    });

    request.done(function (response, textStatus, jqXHR) {
        console.log("Hooray, it worked: " + response.statusCode + " ; " + textStatus + " ; " + JSON.stringify(response) + " ; " + JSON.stringify(jqXHR));

        update_task_stats()

        if (response.statusCode == 200 || response.statusCode == 201) {
            $.notify("Done!", {
                className: 'success',
                autoHideDelay: 1000
            });

            $('#ctask_add').button('reset');
            get_notifications_dropdown();

            if (fromdashboard) {
                // update task information in widgets
                var currentValue = parseInt($("#tasks_done_user").text(), 10);
                $('#tasks_done_user').html(currentValue + 1);

                var currentValue = parseInt($("#tasks_doing").text(), 10);
                $('#tasks_doing').html(currentValue - 1);

                var currentValue = parseInt($("#tasks_done").text(), 10);
                $('#tasks_done').html(currentValue + 1);

                var currentval = parseInt($("#contribution_pts").text(), 10);
                var addval = parseInt($('#task_contr_pts' + num).text(), 10);
                $('#contribution_pts').html(currentval + addval);

            }

            $('#complete_modal').modal('hide');
            var elem = document.getElementById("task_row" + num);
            elem.parentElement.removeChild(elem);

            swal({
                title: response.statusCode == 200 ? "Congratulations" : "Sent to Review",
                text: response.message,
                type: response.statusCode == 200 ? "success" : "info"
            });
        } else {
            $('#complete_modal').modal('hide');

            swal({
                title: "Could not complete the task",
                text: response.message,
                type: "error"
            });
        }

    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        $.notify("Could not save!", "error")
            //swal("Something went wrong", "Could not complete this task because of an unknown error.", "error");
            //swal.close();
        console.error(
            "The following error occurred: " +
            textStatus, errorThrown, jqXHR
        );

        $('#ctask_add').button('reset');


    });

    return false;


}

function castVote(n, v, d) {
    if (d === undefined) {
        d = false;
    }

    if (d) {
        $('#ctask_modal').modal('hide');
    }

    swal({
        title: "Are you sure?",
        text: "Once voted you can not change your vote!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, vote!",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function (isConfirm) {

        if (!isConfirm) {
            swal.close();
            if (d) $('#ctask_modal').modal('show');
            return false;
        }

        if (!isInt(n) || !isInt(v)) {
            return;
        }

        var request;

        request = $.ajax({
            url: "/mission-control/cast-vote/",
            type: "POST",
            dataType: 'json',
            data: {
                t_n: n,
                v_s: v
            }
        });

        request.done(function (response, textStatus, jqXHR) {
            console.log("Hooray, it worked: " + response.statusCode + " ; " + textStatus + " ; " + JSON.stringify(response) + " ; " + JSON.stringify(jqXHR));

            if (response.statusCode == 200) {
                update_task_stats();
                get_notifications_dropdown();

                $.notify("Vote Success!", {
                    className: 'success',
                    autoHideDelay: 1000
                });

                swal({
                    title: "Succesfully voted on the task",
                    text: "Thank you for taking the time to review this task",
                    type: "success"
                });

                $("#review_footer_action_area" + n).html("Thank you for reviewing this task. Your vote has been counted.")

                var p = (response.upvotes / response.voteCount) * 100;
                var s

                if (p < 0.4) {
                    s = "danger"
                } else if (p < 0.6) {
                    s = "warning"
                } else {
                    s = "success"
                }

                $("#progress_bar" + n).css('width', p + "%");
                $("#progress_bar" + n).attr('class', 'progress-bar progress-bar-' + s);
                $("#progress_bar" + n).html(p + "% approval");

            } else {

                swal({
                    title: "Could not vote.",
                    text: response.message,
                    type: "error"
                });
            }

        });

        request.fail(function (jqXHR, textStatus, errorThrown) {

            $.notify("Could not save!", "error")

            console.error(
                "The following error occurred: " +
                textStatus, errorThrown, jqXHR
            );

        });

    });

    return false;
}

function update_task_stats() {
    var request;

    request = $.ajax({
        url: "/mission-control/get-task-stats",
        type: "POST",
        dataType: 'json',
    });

    request.done(function (response, textStatus, jqXHR) {
        var p = response;

        $("#task_spaces").attr('class', p.a_b_c);
        $("#task_spaces").find("span").html(p.a_s);
        $("#task_spaces").find("i").attr('class', p.a_i_c);

        $("#task_doing").html(p.t_d_u);
        $("#task_review").html(p.t_r_u);
        $("#task_done").html(p.t_c_u);

    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
    });
    return false;
}

function ptsFormatter(value) {
    return '<i class="glyphicon glyphicon-star"></i> ' + value + 'pts';
}

function mkdnFormatter(value) {
    return marked(JSON.parse(value));
}

function actionsFormatter(value, row, index) {

    //    var elem =  '<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ctask_modal" data-task="' + row.tidentifier + '" data-proj="' + row.pidentifier + '" data-pri="' + row.priority + '" data-desc="' + row.description + '" data-name="' + row.tname + '" data-pts="' + row.ct_pts + '" data-notes="' + row.completion_notes + '" data-position="' + row.position + '"  data-uname="' + escape(row.uname) + '" data-completed="' + row.completed_time + '" data-begun="' + row.accepted_time + '">View</button>';

    var elemTwo = '<button type="button" id="view_comptsk_btn' + row.tidentifier + '" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ctask_modal" data-alldata=\'' + escape(JSON.stringify(row)) + '\'>View</button>'

    return elemTwo
}

function prepCompModAction(r, tlr, hv, etv) {
    if (etv && tlr && !hv) {
        return '<button type="button" class="btn btn-sm btn-danger" onclick="castVote(' + r + ',0, true)">Was this task done poorly?</button>'
    } else if (hv) {
        return 'You\'ve downvoted this task'
    } else if (!tlr) {
        return 'The review period for this task has ended';
    } else if (!etv) {
        return 'You can not downvote this task';
    }
}

function update_empty_placeholder(num, isAdding) {
    var $table = $('#table' + num + ' tbody')
    console.log('#table' + num + ' tbody');
    if (isAdding === true) {
        row = '#empty_tasks_row' + num;
        if ($table.children().length > 1 && $table.children(row).length == 1) {
            $table.children(row).remove();
        }
    }
    else {
        if ($table.children().length == 0 ) {
            console.log($table)
            var plchr = get_empty_placeholder(num);
            $table.html(plchr);
        }
    }
}

function get_empty_placeholder(num) {
    html = $('<tr id="empty_tasks_row'+ num +'"><td><h4 class=" text-center generic_empty_placeholder vmarg voffset">No tasks in here...</h4></td></tr>');
    return html;
}