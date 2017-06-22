
<style>

h1 {
  text-align: center;
  font-family: sans-serif;
  font-weight: 200;
  color: lightslategray;
}
#contr-list {
  max-width:350px;
}
.card {
  min-height: 200px;
  padding: 30px;
  box-shadow: 3px 3px 2px #c8d1d3;
}
.contr-card {
  min-height: 80px;
  flex-direction:row;
  margin-top:10px;
  margin-bottom:10px;
  border-radius: 5px;
}

.gradient80 {
  background: red; /* For browsers that do not support gradients */
  background: -webkit-linear-gradient(left, #8089ff  , #e9eaff 80%, white); /* For Safari 5.1 to 6.0 */
  background: -o-linear-gradient(right, #8089ff , #e9eaff 80%, white); /* For Opera 11.1 to 12.0 */
  background: -moz-linear-gradient(right, #8089ff , #e9eaff 80%, white); /* For Firefox 3.6 to 15 */
  background: linear-gradient(to right, #8089ff  , #e9eaff 80%, white); /* Standard syntax */
}
.gradient50 {
  background: red; /* For browsers that do not support gradients */
  background: -webkit-linear-gradient(left, #8089ff  , #e9eaff 50%, white); /* For Safari 5.1 to 6.0 */
  background: -o-linear-gradient(right, #8089ff , #e9eaff 50%, white); /* For Opera 11.1 to 12.0 */
  background: -moz-linear-gradient(right, #8089ff , #e9eaff 50%, white); /* For Firefox 3.6 to 15 */
  background: linear-gradient(to right, #8089ff  , #e9eaff 50%, white); /* Standard syntax */
}
.gradient100 {
  background: red; /* For browsers that do not support gradients */
  background: -webkit-linear-gradient(left, #8089ff  , #e9eaff 100%, white); /* For Safari 5.1 to 6.0 */
  background: -o-linear-gradient(right, #8089ff , #e9eaff 100%, white); /* For Opera 11.1 to 12.0 */
  background: -moz-linear-gradient(right, #8089ff , #e9eaff 100%, white); /* For Firefox 3.6 to 15 */
  background: linear-gradient(to right, #8089ff  , #e9eaff 100%, white); /* Standard syntax */
}
.gradient30 {
  background: red; /* For browsers that do not support gradients */
  background: -webkit-linear-gradient(left, #8089ff  , #e9eaff 30%, white); /* For Safari 5.1 to 6.0 */
  background: -o-linear-gradient(right, #8089ff , #e9eaff 30%, white); /* For Opera 11.1 to 12.0 */
  background: -moz-linear-gradient(right, #8089ff , #e9eaff 30%, white); /* For Firefox 3.6 to 15 */
  background: linear-gradient(to right, #8089ff  , #e9eaff 30%, white); /* Standard syntax */
}

.avatar {
  height:60px;
  width: 25%;
  color: white;

}
.details {
  color: white;
  text-shadow: 1px 1px #8089ff;
  height:60px;
  width:75%;

}



</style>

<!--  Priority of the task -->

<div class="card col-xs-12 col-sm-4" id="contr-list">
  <h1>Contributors</h1>
  <div class="contr-card gradient80">
    <div class="contr-card ">
        <? include("ui_blocks/_user_profile2.php") ?>
    </div>
  </div>
  <div class="contr-card gradient50">
    <div class="contr-card ">
        <? include("ui_blocks/_user_profile2.php") ?>
    </div>
  </div>
  <div class="contr-card gradient30">
    <div class="contr-card ">
        <? include("ui_blocks/_user_profile2.php") ?>
    </div>
  </div>
  <div class="contr-card gradient100">
    <div class="contr-card ">
        <? include("ui_blocks/_user_profile2.php") ?>
    </div>
  </div>
</div>
