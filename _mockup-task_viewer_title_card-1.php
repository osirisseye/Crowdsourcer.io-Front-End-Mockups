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
}
#lowPriorityCard {
  border: 5px solid transparent;
	border-image: repeating-linear-gradient(20deg, #29c75f, #1e923c 10px, #136527 10px, #469850 20px );
	border-image-slice: 1;
}
#normalPriorityCard {
  border: 5px solid transparent;
  border-image: repeating-linear-gradient(20deg, #FFBC11, #ffb700 10px, #fff300 10px, #fbff00 20px );
  border-image-slice: 1;
}
#highPriorityCard {
  border: 5px solid transparent;
  border-image: repeating-linear-gradient(20deg, #E74C3C, #ff3d29 10px, #cc0000 10px, #7d0000 20px );
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
    <h3>SAMPLE TASK DESCRIPTION</h3>
    <p>
      The task view is going to be a page that's dedicated to displaying a task in all its glory, in all phases of the task lifecycle (Open, Begun, In Review, Completed). Obviously some elements will be hidden in some circumstances and so on, so I've put O,B,R,C next to each requirement to make it clear which stages it'll be required in. You can put a flag in PHP and then use if statements to change the state dynamically. If you need any help with this let me know.
      <br>
      <br>
      What needs to be displayed:
      
      <li>Position</li>
      <li>Under taker (B,R,C)</li>
      <li>Completion notes (R,C)</li>
      <li>Approval rating (R)</li>
      <br>

    
    </p>
  </div>
</div>