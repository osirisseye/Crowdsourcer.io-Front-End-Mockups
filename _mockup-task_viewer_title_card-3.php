<? $priority = "high"; ?>
<? $status = ""; ?>
<!-- BEGIN Priority of the task -->
<? if($priority == "low") {
    $priorityCardId = "lowPriorityCard";
    $headerColor = 'rgba(41, 199, 95, .75)';
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
?>
<!--  END OF Priority of the task -->

<!-- BEGIN Status of the task -->
<? if($status == "open") {
    $statusId = "o";
  } elseif($status == "begun") {
    $statusId = "b";
  } elseif($status == "review") {
    $statusId = "r";
  } else {
    $statusId = "c";
  }
?>
<!-- END Status of the task -->

<style>
h1 {
  text-align: center;
}
.nav-tabs {
    margin-bottom: -9px !important;
    border-bottom: 0px !important;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #f7f7f7;
    cursor: default;
    background-color: #e74c3c;
    border: 1px solid #fadbd8;
    border-bottom-color: transparent;
}
.nav-tabs>li>a:hover {
    border-color: #fadbd8 #fadbd8 #fadbd8;
}
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
    color: white;
}
.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #e74c3c;
    color: white;
}
.card {
  min-height: 250px;
  max-width: 760px;
  padding: 50px;
  box-shadow: 3px 3px 2px #c8d1d3;
}
#lowPriorityCard {
  border: 5px solid transparent;
  border-color: #29c75f;
  border-image-slice: 1;
}
#normalPriorityCard {
  border: 5px solid transparent;
  border-color: #FFBC11;
  border-image-slice: 1;
}
#highPriorityCard {
  border: 5px solid transparent;
  border-color: #E74C3C;
  border-image-slice: 1;
}
#titleCardHeader{
  background-color: <?= $headerColor ?>;
  color: white;
  /* width: 100%; */
  padding: 10px;
  margin-top: -50px;
  margin-left: -50px;
  padding-left: 50px;
  margin-right: -50px;
  padding-right: 50px;
}
#titleCardBody{
  background-color:  <?= $bodyColor ?>;
  margin-left: -50px;
  padding: 25px;
  margin-right: -50px;
  margin-bottom: -50px;
}
</style>
<div id="container">
  <div class="card" id=<?=$priorityCardId?>>
    <div id="titleCardHeader">
    <h1>SAMPLE TITLE</h1>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#sectionA">Description</a></li>
        <li><a data-toggle="tab" href="#sectionB">Completion notes</a></li>
        <li><a data-toggle="tab" href="#sectionC">Approval</a></li>
        <li><a data-toggle="tab" href="#sectionD">Contributors</a></li>
      </ul>
    </div>
  <div id="titleCardBody">
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

      <div id="sectionC" class="tab-pane fade">
        <h3>SAMPLE APPROVAL TAB</h3>
          <p>The task view is going to be a page that's dedicated to displaying a task in all its glory, in all phases of the task lifecycle (Open, Begun, In Review, Completed). Obviously some elements will be hidden in some circumstances and so on, so I've put O,B,R,C next to each requirement to make it clear which stages it'll be required in. You can put a flag in PHP and then use if statements to change the state dynamically. If you need any help with this let me know.</p>
          <br>
          <br>
      </div>

      <div id="sectionD" class="tab-pane fade">
        <h3>SAMPLE CONTRIBUTORS TAB</h3>
            <div>A's avatar</div>
            <div>
                 <h5>@AlanAlan</h5>
                 <h5>Junior HTML/CSS Dev</h5>
            </div>
      </div>
    </div>
    </div>


  </div>
</div>
