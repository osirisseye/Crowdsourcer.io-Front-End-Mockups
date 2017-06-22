
<style>

h1 {
  text-align: center;
}
#contr-list {
  max-width:350px;
  margin-left:10px;
}
.contributorsContainer {
  width: 100%;
  min-height: 200px;
  background-color: #5C4ED4;
  padding: 30px;
  box-shadow: 3px 3px 2px #c8d1d3;
}
.contr-card {
  min-height: 80px;
  flex-direction:row;
  margin-top:10px;
  margin-bottom:10px;
}
.contr-card:hover hr {
  width: 100%;
}

.avatar {
  height:60px;
  width: 25%;
}
.details {
  height:60px;
  width:75%;
}
.contributors_title{
  float: right;
  color: white;
  font-family: sans-serif;
  text-transform: lowercase;
  font-size: 15px;
  margin-top: -15px;
  margin-right: -10px;
}
hr {
    width: 50%;
    transition: width, .5s;
}

</style>

<!--  Priority of the task -->

<div class="contributorsContainer col-xs-12 col-sm-4" id="contr-list">
  <span class="contributors_title">Contributors</span>
  <div class="contr-card">
      <? include("ui_blocks/_user_profile1.php") ?>
      <hr>
  </div>
  <div class="contr-card">
    <div class="contr-card ">
        <? include("ui_blocks/_user_profile1.php") ?>
        <hr>
    </div>
  </div>
  <div class="contr-card">
    <div class="contr-card ">
        <? include("ui_blocks/_user_profile1.php") ?>
        <hr>
    </div>
  </div>
  <div class="contr-card ">
    <div class="contr-card ">
        <? include("ui_blocks/_user_profile1.php") ?>
        <hr>
    </div>
  </div>
</div>
