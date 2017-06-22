<?
  $user_id = 145;
  $img_url = "https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/" . $user_id . "/profile.png";
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  //<img id="banner_preview_img" class="banner_preview" src="https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/145/profile.png">
?>
<style>
.user_profile{
  padding: 5px;
  border-radius: 25px;
}
.user_profile_circle {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  vertical-align: middle;
  border: 2px solid white;
  transition: border-color, .5s;
}
.user_profile_circle:hover {
  border-color: gold;
  transition: border-color, .5s;
  width: 76px;
  height: 76px;
}
.user_profile_name {
  margin-top: -20px;
  font-size: 22px;
  color: #FFF;
  display: inline-flex;
  vertical-align: middle;
  text-transform: lowercase;
  text-decoration: none;
}
.user_profile_name:hover {
  color: #ffef00;
  -webkit-transition: color .5;
  -moz-transition: color .5s;
}
.user_position {
  margin-left: 85px;
  margin-top: -28px;
  color: white;
  margin-bottom: 5px;
}
</style>
<div class="user_profile">
  <img class="user_profile_circle" src=<?=$img_url?>></img>
  <a href=<?=$actual_link?> class="user_profile_name">@CoffeeAndCream</a>
  <div class="user_position">HTML / CSS Developer</div>
</div>
