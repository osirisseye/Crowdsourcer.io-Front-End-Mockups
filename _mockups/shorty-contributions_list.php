<?php
    // Leave this in, loads all state and style.
    require_once("../root.php");
    require_once("../includes/functions.php");
    require_once("../includes/mission_control_config.php");
    require_once("../partials/header.php");
    require_once("../partials/mission_control_top.php");

    // Custom PHP goes here...
?>


<div class="container-fluid page_content">
    <script src="https://crowdsourcer.io/assets/js/glyphs.js"></script>
    <div class="container-fluid dashboard_container">
        <div class="row nvoffset vmarg-sm">
            <div class="sidebar col-sm-3 col-lg-2">
                <ul class="nav menu">
                    <li>
                        <p class="nvmarg voffset-sm mission_control_nav_text">
                            <span class="fa fa-terminal fa-lg" aria-hidden="true"></span><strong style="vertical-align:middle;">&nbsp; Mission Control</strong>
                            <br>Crowdsourcer.io. <a href="/project/29">Project page</a>
                        </p>
                    </li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a href="/mission-control/29"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</a>
                    </li>
                    <li role="presentation"><a href="/mission-control/29/tasks"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Tasks</a>
                    </li>
                    <li role="presentation" class="active"><a href="/mission-control/29/contributors"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Contributors</a>
                    </li>

                    <li role="presentation"><a href="/mission-control/29/chat"><span class="fa fa-comments" aria-hidden="true"></span> Chat</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 main_mission_control_content">
                <div id="ContributorButtons">
                    <div id="ContributorViews" class="btn-group" data-toggle="buttons">
                      <label class="btn btn-default active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> <i class="fa fa-th-large"></i>
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="options" id="option2" autocomplete="off"> <i class="fa fa-th"></i>
                      </label>
                      <label class="btn btn-default">
                        <input type="radio" name="options" id="option3" autocomplete="off"> <i class="fa fa-th-list"></i>
                      </label>
                    </div>
                    <div id="ContributorSort" class="btn-group" data-toggle="buttons">
                      <button type="button" class="btn btn-sm btn-primary">Sort</button>
                      <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                </div>
                <div class="row nvoffset vmarg-lg even_gutter">
                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container project-creator text-center contributor_thumbnail">
                            <img class="contributor-photo img-circle voffset" src="https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/141/profile.png"/>
                            <h3 class="contributor-username"><strong><a href="https://crowdsourcer.io/profile/8qtQgOfH">MikeDaniel18</a></strong></h3>
                            <h4 class="contributor-title">Project Manager</h4>
                            <!--     <div><h2 class="nvoffset nvmarg">83</h2><p>pts</p></div>-->
                            <div class="contributor-badge-bar">
                                <div class="contributor-badge-item">
                                    <p class="contributor-icon"><i class="fa fa-thumbs-up"></i></p>
                                    <p class="contributor-value">100%</p>
                                    <p class="contributor-label">Approval</p>
                                </div>
                                <div class="contributor-badge-item">
                                    <p class="contributor-icon"><i class="fa fa-check"></i></p>
                                    <p class="contributor-value">11-0</p>
                                    <p class="contributor-label">Tasks</p>
                                </div>
                                <div class="contributor-badge-item">
                                    <p class="contributor-icon"><i class="fa fa-star"></i></p>
                                    <p class="contributor-value">83pts</p>
                                    <p class="contributor-label">Contribution</p>
                                </div>
                                <div class="contributor-overflow-item">
                                    <a class="contributor-overflow" data-context-menu="overflow">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://crowdsourcer.io//assets/images/User-placeholder.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/WXAco0kG">henryjj</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">24</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">24</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/143/profile.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/NUL2RAVJ">Edallen94</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">3</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">3</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/145/profile.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/c7meBwLL">CoffeeAndCream</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/217/profile.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/71oZLiYV">jchi2241</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://crowdsourcer.io//assets/images/User-placeholder.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/gOZYzyFl">mgw</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://crowdsourcer.io//assets/images/User-placeholder.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/zo3qJYQK">Redtama</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/212/profile.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/1RCXxmxQ">lukandruchow</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://crowdsourcer.io//assets/images/User-placeholder.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/44ql7aKk">pasportit</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://crowdsourcer.io//assets/images/User-placeholder.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/hD8up5WJ">lughaidhdev</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://crowdsourcer.io//assets/images/User-placeholder.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/stciLj8a">Shorty</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/215/profile.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/sOMxawiT">decreed11</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://crowdsourcer.io//assets/images/User-placeholder.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/YfZ5D1hT">Jwallace</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                    <div class="col-sm-6 col-md-4 col-lg-3 vmarg-sm even_gutter">

                        <div class="thumbnail_container text-center contributor_thumbnail">
                            <img src="https://crowdsourcer.io//assets/images/User-placeholder.png" class="img-circle voffset">
                            <h3 class="vmarg voffset"><strong><a href="https://crowdsourcer.io/profile/xAPd9l30">shadowhook</a></strong></h3>
                            <!--     <div><h2 class="nvoffset nvmarg">0</h2><p>pts</p></div>-->
                            <p class="task_cont_points_span nvmarg">0</p>
                            <p class="task_cont_points_pts_span nvmarg">Contribution points</p>

                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
    <div class="clearboth"></div>
</div>

<div id="ContributorOverflowMenu" class="overflow-menu dropdown clearfix">
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
      <li class="dropdown-header">mike721@gmail.com</li>
      <li class="divider"></li>
      <li><a tabindex="-1" href="#"><i class="fa fa-paper-plane"></i> Send email</a></li>
      <li><a tabindex="-1" href="#"><i class="fa fa-comments"></i> Direct message</a></li>
      <li><a tabindex="-1" href="#"><i class="fa fa-user"></i> View profile</a></li>
      <li class="divider"></li>
      <li><a tabindex="-1" href="#"><i class="fa fa-flag"></i> Report</a></li>
    </ul>
  </div>

<style id="AdditionalStyles">
    .contributor-badge-bar {
        display: flex;
        position: relative;
        width: 100%;
        padding: 0 80px;
        justify-content: center;
    }
    .contributor-badge-bar > .contributor-badge-item {
        width: 33.3333333%;
    }

    .contributor-badge-bar .contributor-icon i {
        border-radius: 50%;
        background: #5C4ED4;
        width: 30px;
        height: 30px;
        line-height: 30px;
        color: white;
    }

    .contributor-badge-bar .contributor-value {
        font-size: 130%;
    }

    .contributor-badge-bar .contributor-label {
        display: block;
        text-align: center;
        text-transform: uppercase;
        color: #777777;
        font-size: 70%;
        font-weight: bold;
    }

    .contributor-badge-bar .contributor-overflow-item i {
        position: absolute;
        right: 40px;
        border-radius: 50%;
        color: #777777;
        width: 30px;
        height: 30px;
        line-height: 30px;
    }

    .thumbnail_container {
        height: 380px;
    }

    .thumbnail_container > h3 {
        font-size: 140%;
        font-weight: bold;
    }

    .thumbnail_container > h3 a:before {
        content: "@";
    }

    .thumbnail_container > h4 {
        font-size: 100%;
    }

    .thumbnail_container > img {
        max-width: 50%;
        box-shadow: rgba(0, 0, 0, 0.25) 2px 2px
    }
    .contributor-username {
    letter-spacing: 1px;
    margin-top: 15px;
    margin-bottom: 5px;
    }
    .contributor-title {
        letter-spacing: 1px;
        margin-top: 5px;
    }
    .overflow-menu {
      position: absolute;
      display:none;
    }
    .overflow-menu i {
    display: inline-block;
    }

    .overflow-menu i:before {
        display: inline-block;
        width: 20px;
    }

    .overflow-menu i:after {
        content: "";
        border-left: solid 1px;
        margin: 0 2px;
    }

    #ContributorButtons {
        margin-top: -5px;
        margin-bottom: 5px;
        display: flex;
        justify-content: flex-end;
    }

    #ContributorButtons .btn.btn-default {
        box-shadow: none;
    }
</style>

<script>
    $(function() {
      var $contextMenu = $("#ContributorOverflowMenu");
      $("*[data-context-menu]").on("click", function(e) {
        var pos = getContextMenuPostion(e, $contextMenu)
        $contextMenu.css({
          display: "block",
          // TODO(Chris C): The following math is temporary, there is a bug.
          left: pos.x / 2,
          top: pos.y - 40
        });
        return false;
      });
      $contextMenu.on("click", "a", function() {
         $contextMenu.hide();
      });
      $('body').on("click", function() {
         $contextMenu.hide();
      });
    });

    function getContextMenuPostion(event, contextMenu) {

        var mousePosition = {};
        var menuPostion = {};
        var menuDimension = {};

        menuDimension.x = contextMenu.outerWidth();
        menuDimension.y = contextMenu.outerHeight();
        mousePosition.x = event.pageX;
        mousePosition.y = event.pageY;

        if (mousePosition.x + menuDimension.x > $(window).width() + $(window).scrollLeft()) {
            menuPostion.x = mousePosition.x - menuDimension.x;
        } else {
            menuPostion.x = mousePosition.x;
        }

        if (mousePosition.y + menuDimension.y > $(window).height() + $(window).scrollTop()) {
            menuPostion.y = mousePosition.y - menuDimension.y;
        } else {
            menuPostion.y = mousePosition.y;
        }

        return menuPostion;
    }
</script>

<? require_once($_SERVER["DOCUMENT_ROOT"] . "/partials/footer.php"); ?>
