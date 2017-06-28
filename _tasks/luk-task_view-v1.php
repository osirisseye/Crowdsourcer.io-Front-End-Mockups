<?php
    // Use this space to change the default page variables.
    // $loggedin = true;

    // Leave this in, loads all state and style.

    require_once("../root.php");
    require_once("../includes/functions.php");
    require_once("../includes/mission_control_config.php");
    require_once("../partials/header.php");
    require_once("../partials/mission_control_top.php");

    // Custom PHP goes here...

    $priority = "high";
    $status = "";

    if($priority == "low") {
      $priorityCardId = "lowPriorityCard";
      $headerColor = "rgba(50, 201, 102, .75)";
      $bodyColor = 'rgba(41, 199, 95, .20)';
    } elseif($priority == "normal") {
      $priorityCardId = "normalPriorityCard";
      $headerColor = 'rgba(255, 188, 17, .75)';
      $bodyColor = 'rgba(255, 188, 17, .20)';
    } else {
      $priorityCardId = "highPriorityCard";
      $headerColor = 'rgba(231, 76, 60, .75)';
      $bodyColor = 'rgba(231, 76, 60, .20)';
    }

    if($status == "open") {
     $statusId = "o";
   } elseif($status == "begun") {
     $statusId = "b";
   } elseif($status == "review") {
     $statusId = "r";
   } else {
     $statusId = "c";
   }
?>
<style>

hr {
    width: 75%;
    transition: width, .5s;
    text-decoration: none;
    color: white;
}
p {
  margin: 0px;
}

#NamingTable td:nth-child(2){
  min-width: 200px;
}
#DirectoryList {
  display: flex;
  flex-direction: column;
}
#myProgressbar {
  margin-left: 7px;
  width: 99% !important;
  background-color: rgba(92, 78, 212, 0.07);
  display: inline-block;
  height: 40px !important;
  vertical-align: -webkit-baseline-middle;
}
.progress-bar {
  font-weight: 600;
  background-color: #5C4ED4;
}

#taskContributionPoints {
  display: inline-block;
  /* border: 1px solid; */
  padding: 8.5px;
  font-size: large;
  vertical-align: top;
  color: rgba(92, 78, 212, 1);
  border-left: 0;
  margin-left: -58px;
  font-weight: 900;
  box-shadow: inset -1px 0.5px 0px 0px rgba(0,0,0,.03);
}
#progressMessage {
  font-size: 16px;
  vertical-align: middle;
  margin-top: 10px;
}


.contributorsContainer {
  background-color: #5C4ED4;
  padding-bottom: 25px;
}


.contributors_title {
  float: right;
  color: white;
  font-family: sans-serif;
  text-transform: lowercase;
  font-size: 15px;
  margin-top: 0px;
  margin-right: 20px;
}

.nav-tabs {
  margin-bottom: -9px !important;
  border-bottom: 0px !important;
  
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
  color: #f7f7f7;
  cursor: default;
  background-color: <?= $headerColor ?>;
  border: 1px solid #F7F7F7;
  border-bottom-color: transparent;
}
.nav-tabs>li>a:hover {
  border-color: #F7F7F7;
}
.nav-tabs>li>a {
  font-weight: 600;
  margin-right: 2px;
  line-height: 1.42857143;
  border: 1px solid #F7F7F7;
  border-bottom: 0px;
  border-radius: 10px 10px 0 0;
  color: white;
}
.nav>li>a:focus, .nav>li>a:hover {
  text-decoration: none;
  background-color: <?= $headerColor ?>;
  color: white;
}
#lowPriorityCard {
  display: inline-block;
  background-color: <?= $bodyColor ?>;
  min-height: 350px;
  padding: 50px;
  box-shadow: 3px 3px 2px #c8d1d3;
}
#normalPriorityCard {
  display: inline-block;
  background-color: <?= $bodyColor ?>;
  min-height: 350px;
  padding: 50px;
  box-shadow: 3px 3px 2px #c8d1d3;
}
#highPriorityCard {
  display: inline-block;
  background-color: <?= $bodyColor ?>;
  min-height: 350px;
  padding: 50px;
  box-shadow: 3px 3px 2px #c8d1d3;
}
#titleCardHeader {
  background-color: <?= $headerColor ?>;
  color: white;
  padding: 10px;
  margin-top: -50px;
  margin-left: -50px;
  margin-right: -50px;
}
#titleCardBody {
  margin-left: -50px ;
  padding: 25px;
  margin-right: -50px;
  margin-bottom: -50px;
}
#right-header {
  border:solid 1px;
  
}
</style>
<div id="progressSection">
  <div id="myProgressbar" class="progress">
   <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
     <p id="progressMessage">Nothing</p>
   </div>
  </div>
  <div id="taskContributionPoints">
    <p>2 CP</p>
  </div>
  <p>
     <button data-toggle="progressbar" data-target="#myProgressbar" data-value="reset" data-level="info" class="btn btn-default">Reset</button>
     <button data-toggle="progressbar" data-target="#myProgressbar" data-value="10" class="btn btn-default">Open</button>
     <button data-toggle="progressbar" data-target="#myProgressbar" data-value="33" class="btn btn-default">Begun</button>
     <button data-toggle="progressbar" data-target="#myProgressbar" data-value="80" class="btn btn-default">In Review</button>
     <button data-toggle="progressbar" data-target="#myProgressbar" data-value="100" class="btn btn-default">Completed</button>
  </p>
</div>

<div id="container">
  <div class="row">
    <div class="col-lg-12">
      <div id=<?=$priorityCardId?>>
        
        <div id="titleCardHeader" class="row">
          <div id="left-header" class="col-lg-6"> 
            <h1>SAMPLE TITLE</h1>
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#sectionA">Description</a></li>
              <li><a data-toggle="tab" href="#sectionB">Completion notes</a></li>            
            </ul>

          </div>
          <div id="right-header" class="col-lg-6"> 
            <h1>SAMPLE TITLE</h1>
            

          </div>

          
        </div>


        <div id="titleCardBody" class="col-lg-12">
          <div class="tab-content">
            <div id="sectionA" class="tab-pane fade in active">
              <h3>SAMPLE TASK DESCRIPTION</h3>
              <p>The task view is going to be a page that's dedicated to displaying a task in all its glory, in all phases of the task lifecycle (Open, Begun, In Review, Completed). Obviously some elements will be hidden in some circumstances and so on, so I've put O,B,R,C next to each requirement to make it clear which stages it'll be required in. You can put a flag in PHP and then use if statements to change the state dynamically. If you need any help with this let me know.</p>
              <br>
              <br>
          </div>
          <div id="sectionB" class="tab-pane fade">
            <h3>SAMPLE COMPLETION NOTES TAB</h3>
              <p>The task view is going to be a page that's dedicated to displaying a task in all its glory, in all phases of the task lifecycle (Open, Begun, In Review, Completed). Obviously some elements will be hidden in some circumstances and so on, so I've put O,B,R,C next to each requirement to make it clear which stages it'll be required in. You can put a flag in PHP and then use if statements to change the state dynamically. If you need any help with this let me know.</p>
              <br>
              <br>
          </div>
          
          
        </div>
      </div>
    </div>
  </div>
    
  </div>
</div>



<?php include("../partials/footer.php"); ?>

<script>
!function ($) {

    "use strict";

    // PROGRESSBAR CLASS DEFINITION
    // ============================

    var Progressbar = function (element) {
        this.$element = $(element);
    }

    Progressbar.prototype.update = function (value) {
        var $div = this.$element.find('div');
        var $span = $div.find('span');
        $div.attr('aria-valuenow', value);
        $div.css('width', value + '%');
        $span.text(value + '% Complete');
    }

    Progressbar.prototype.finish = function () {
        this.update(100);
    }

    Progressbar.prototype.reset = function () {
        this.update(0);
    }

    // PROGRESSBAR PLUGIN DEFINITION
    // =============================

    $.fn.progressbar = function (option) {
        return this.each(function () {
            var $this = $(this),
                data = $this.data('jbl.progressbar');

            if (!data) $this.data('jbl.progressbar', (data = new Progressbar(this)));
            if (typeof option == 'string') data[option]();
            if (typeof option == 'number') data.update(option);
        })
    };

    // PROGRESSBAR DATA-API
    // ====================

    $(document).on('click', '[data-toggle="progressbar"]', function (e) {
        var $this = $(this);
        var $target = $($this.data('target'));
        var value = $this.data('value');
        $("#progressMessage").html($this[0].innerHTML);

        if(value === 100) {
          $("#taskContributionPoints").css({ 'color': "rgba(255,255,255,1)", 'transition' : 'color .5s' });
        } else {
          $("#taskContributionPoints").css({ 'color': "rgba(92, 78, 212, 1)", 'transition' : 'color .5s' });
        }

        e.preventDefault();

        $target.progressbar(value);
    });



}(window.jQuery);
</script>