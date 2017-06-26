<?
  $user_id = 145;
  $img_url = "https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/" . $user_id . "/profile.png";
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  //<img id="banner_preview_img" class="banner_preview" src="https://s3-eu-west-1.amazonaws.com/cs-usr-stg/users/145/profile.png">
?>
<style>
.user_profile_circle {
  float: left;
  margin-left: 50px;
  width: 84px;
  height: 84px;
  border-radius: 50%;
  transition: border-color, .5s;
  margin-right: 10px;
}
.user_profile_circle:hover {
  width: 100%;
  border: 3px rgba(255, 255, 255, 0.57);
  transition: all, .2s;
  border-style: solid;
}
.user_profile_name {
  font-size: 20px;
  font-weight: 400;
  color: #FFF;
  text-transform: lowercase;
  text-decoration: none;
  letter-spacing: 0px;
}
.user_profile_name:hover {
  color: white;
  transition: all .5s ease-in;
}
.user_position {
  display: inline-block;
  font-size: 13px;
  margin-left: 0px;
  color: white;
}
#userProfile:hover .user_profile_circle {
  width: 130px;
  height: 130px;
  border: 3px rgba(255, 255, 255, 0.57);
  transition: all, .2s;
  border-style: solid;
  color: black;
  margin-right: 15px;
}
#userDetails {
  margin-top: 15px;
  text-align: left;
  margin-right: 50px;
  margin-left: 50px;
}
#userDetails:hover hr {
  width: 100%;
}

</style>
<a href=<?=$actual_link?>  class="row" id="userProfile">
  <img class="user_profile_circle" src=<?=$img_url?>></img>
  <div id="userDetails">
    <span class="user_profile_name">@CoffeeAndCream</span>
    <br>
    <span class="user_position">HTML / CSS Developer</span>
  </div>
</a>
