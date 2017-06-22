<? $priority = "high"; ?>
<? $status = ""; ?>

<style>
h1 {
  text-align: center;
}


.card {
  min-height: 250px;
  padding: 50px;
  box-shadow: 3px 3px 2px #c8d1d3;
  width:100% !important;
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
</style>
<!-- BEGIN Priority of the task -->
<? if($priority == "low") {
    $priorityCardId = "lowPriorityCard";
  } elseif($priority == "normal") {
    $priorityCardId = "normalPriorityCard";
  } else {
    $priorityCardId = "highPriorityCard";
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
<div id="container">
  <div class="card" id=<?=$priorityCardId?>>
    <h1>SAMPLE TITLE</h1>
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#sectionA">Description</a></li>
            <li><a data-toggle="tab" href="#sectionB">Completion notes</a></li>
            <li><a data-toggle="tab" href="#sectionC">Approval</a></li>
            <li><a data-toggle="tab" href="#sectionD">Contributors</a></li>
          </ul>




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
