<?
  $user_id = 145;
  $img_url = "https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/" . $user_id . "/profile.png";
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  //<img id="banner_preview_img" class="banner_preview" src="https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/145/profile.png">
?>
<style>
.user_profile{
  padding: 5px;
  padding-top: 7px;
  border-radius: 25px;
}
.user_profile_circle {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  vertical-align: middle;
}
.user_profile_name {
  margin-top: -20px;
  font-size: 22px;
  color: #6000f1;
  display: inline-flex;
  vertical-align: middle;
  text-transform: lowercase;
  text-decoration: none;
}
.user_profile_name:hover {
  color: #31007b;
  -webkit-transition: color .2s ease-in-out;
  -moz-transition: color .2s ease-in-out;
}
.user_position {
  margin-left: 70px;
  margin-top: -25px;
  text-shadow: 1px 1px 1px #797979;
  color: #ecf5ff;
}
</style>
<div class="user_profile">
  <img class="user_profile_circle" src=<?=$img_url?>></img>
  <a href=<?=$actual_link?> class="user_profile_name">@CoffeeAndCream</a>
  <div class="user_position">HTML / CSS Developer</div>
</div>
