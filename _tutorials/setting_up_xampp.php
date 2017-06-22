<?php
    // Use this space to change the default page variables.
    // $loggedin = true;

    // Leave this in, loads all state and style.

    require_once("../root.php");
    require_once("../includes/functions.php");
    require_once("../includes/page_config.php");
    require_once("../partials/header.php");

    // Custom PHP goes here...
?>

<style>
  /* Fixes cards not lining up */
  .row > * > .thumbnail_container {
    margin: 0px;
  }
</style>

<!-- Example of full-width content aka a "Jumbotron" -->
<header class="create-header">
  <div class="create-splash-bg">
    <div class="container-fluid">
        <div class="col-lg-12 splash-vertical-span-container text-center">
            <span class="vertical-span">
                <h1 class="tagline funky_text">Setting Up XAMPP</h1>
            </span>
            <h3 class="voffset">On Windows</h3>
        </div>
    </div>
  </div>
</header>

<!-- Container wraps, and centers content. Use for non-fullwidth content-->
<div class="container">
  <h1>Setting Up XAMPP on Windows</h1>
  <p>If you asking 'why do I have to do it' then the simple answer is to setup your local server and view PHP files (yes we are working on those).</p>

  <h2>Downloading XAMPP</h2>
  <li>Download from here (PHP 7.1.4 or Higher): <a href="https://www.apachefriends.org/download.html">https://www.apachefriends.org/download.html</a>.</li>
  <li>Unpack, install (pay attention where you install it).</li>

  <h3>For Junior PHP users</h3>
  <li>In the installation directory you will find folder 'htdocs'.</li>
  <li>Clone/download 'Crowdsourcer.io-Front-End-Mockups' repository.</li>
  <li>Copy the repo folder into 'htdocs' directory of XAMPP (default is C:\XAMPP if you just clicked your way through installation).</li>

  <h3>For Advance PHP users</h3>
  In order to correctly set up your 'document root', set up a Virtual Host (Coming Soon)

  Now you should have all the documents in the right place - we will start XAMPP.

  <h2>Setting up XAMPP</h2>
  <li>In search bar (Windows Start) type "XAMPP control panel" and click it.</li>
  <li>You will see a window with listed items on the left - we are concerned about only two: Apache, MySQL.</li>
  <li>Click 'start' for both Apache and MySQL.<br/><br/><em>* Note: If you are on windows, Disable UAC restrictions in the control panel. And also, run the control panel in Administrator Mode. In admin mode, you can install both MySQL and Apache as a service, meaning you no longer have to start them.</em></li>
    
  <li>Start your web browser and type in the address bar "http://localhost".</li>
  <li>If you see official website of XAMPP - you're good to go.</li>

  <p>Let's view our repo.</p>

  <h2>Viewing the repo.</h2>
  <li>To see a php file you have to navigate to it - using address bar of your browser.</li>
  <li>Type 'http://localhost/{{folder-name}}', where {{folder-name}} is the name of the folder you pasted the repository into.</li>
     (I pasted 'Crowdsourcer.io-Front-End-Mockups' repository into a new folder 'crowd' in 'htdocs' so for me it is
     'http://localhost/crowd/' )
  <li>You should now see a big Hello World in h1 and instructions on how to use the downloaded repo.</li>
  <li>Get busy reading... and welcome.</li>

</div>
<br/>
<?php require_once("../partials/footer.php"); ?>
