<?php
    // Use this space to change the default page variables.
    // $loggedin = true;
    
    // Leave this in, loads all state and style.
    require_once("../includes/page_config.php");
    require_once("../partials/header.php");

    // Custom PHP goes here...


    $version = phpversion();
    $displayVersion = "";

    $parts = explode(".", $version);

    if($parts[0] >= 7 && $parts[1] >= 1 && $parts[2] >= 3){
      $displayVersion .= "<p>Your php version is <span class='valid'>" . $version . "</span><br/>PHP version is <span class='valid'>valid</span>.</p></p>";
    } else {
      $displayVersion .= "<p>Your php version is <span class='invalid'>" . $version . "</span><br/>Minimum version required is <span class='invalid'>7.1.0</span></p>";
      $displayVersion .= "<p>Make sure to download XAMPP with PHP 7.1.4 or higher. <a href='https://www.apachefriends.org/download.html'>Download XAMPP</a>";
    }

    $shortTags = ini_get("short_open_tag");
    $displayShortTags = "";

    if($shortTags){
      $displayShortTags .= "<p>Short tags are <span class='valid'>enabled</span> in your php.ini file.</p>";
    } else {
      $displayShortTags .= "<p>Short tags are <span class='invalid'>not enabled</span> in your php.ini file.</p>";
      $displayShortTags .= "<p>Navigate to your php.ini file (Can get to from XAMPP control panel, Apache config) and find the line that says 'short_open_tags = off' and change it to 'on'.";
    }

?>

<style>
  .table td + td {
    word-break: break-all;
  }
  .valid {
    color: #048304;
    font-weight: bold;
  }
  .invalid {
    color: #d40000;
    font-weight: bold;
  }
</style>

<h1 class="text-center vmarg-sm">Environment Test</h1>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12">
      <?php echo $displayVersion; ?>
      <?php echo $displayShortTags; ?>
      <table class="table">
        <thead>
          <tr>
            <th>$key</th>
            <th>$_SERVER[$key]</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($_SERVER as $key => $value){ ?>
          <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $value; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<? require_once($_SERVER["DOCUMENT_ROOT"] . "/partials/footer.php"); ?>