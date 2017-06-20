<?php
/* ###############################
  DO NOT EDIT THIS PAGE :D
  - If you need a page to copy, pick anything with a 'template-' prefix.
################################ */

require_once("./includes/functions.php");
require_once("./includes/page_config.php");
require_once("./partials/header.php");

// Custom PHP goes here...

?>

<style>
  #NamingTable td:nth-child(2){
    min-width: 200px;
  }
  #DirectoryList {
    display: flex;
    flex-direction: column;
  }
  #SidebarMenu {
    margin-top: 30px;
  }
</style>

<div class="container">
  <div class="col-xs-12 col-sm-8">
    <h1>Hello World</h1>

    <p>You can use these templates pages to build entirely new pages. More functionality will be coming so that you can integrate even better with the front end of the site.</p>

    <p>I appreciate I've not given detailed instructions on setting this up, but there are only two components. Setting up the PHP and setting up the SCSS. For the PHP your simply downloading an application that can create a small virtual server on your computer (MAMP is great for Mac); and for SCSS you just need an app that can convert the SCSS to CSS and place it in the assets/css/ directory. Scout app is great for this.</p>

    <h2>Where to start?</h2>

    <p>Start by looking through the pages and pick a starting point. <strong><u>Copy and rename</u></strong> the file to something detailed. (eg. 'conributions-list-mockup'). And add numbers if there is already a mockup of that type.</p>

    <h2>Naming things.</h2>
    <p>Let's follow some basic naming conventions. Pay attention to '-' and '_'. Use underscores to separate different words 'eg. task-detail'. Use dashes to separate different parts of a name. 'eg template-task_detail'. Doing this will allow me to organize these via a script later :D.</p>
    <table id="NamingTable" class="table">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Purpose</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Mockup:</td>
          <td><div>mockup-{{ page_name }}<br /><small>eg. <em>mockup-task_detail.php</em></small></td>
          <td>Random design mockups. Put these up whenever you feel like sharing ideas.</td>
        </tr>
        <tr>
          <td>Template:</td>
          <td><div>template-{{ page_type }}<br /><small>eg. <em>template-dashboard.php</em></small></td>
          <td>Templates for new type of page. Requires basic PHP knowledge to create a new one.</td>
        </tr>
        <tr>
          <td>Task:</td>
          <td><div>task-{{ task_name }}-v{{##}}<br /><small>eg. <em>task-task_viewer-v1.php</em></small></td>
          <td>Proposal for a task. Append version number at end if ideas are being thrown around.</td>
        </tr>
      </tbody>
    </table>

    <h2>Some tips:</h2>
    <ul>
       <li>Familiarise yourself with the existing classes. Look at other pages on the live site, inspect elements to see how things are currently laid out.</li>
       <li>Absolutely try to avoid editing the raw CSS, instead only ever edit the SCSS files (Scout app is a good tool to auto generate CSS from SCSS).</li>
       <li>Some CSS classes aren't in the SCSS as I'm still mid migration, if you want to make changes to these, move everything related to that class over to the appropriate SCSS file (make a new one if necessary) and remove it from the CSS files. This will help me so much with migration.</li>
       <li>You can change some parameters to test out different functionality from the tops of the header and footer files.</li>
       <li>To create an entirely new page create a file such as "my-page.php" and include the header and footer in the index. Then simply navigate to it in your browser.</li>
    </ul>
  </div>
  <div class="col-xs-12 col-sm-4">
    
    <div id="SidebarMenu" class="panel-group" role="tablist" aria-multiselectable="false">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#SidebarMenu" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Project Documents
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <p>Documents specific to Crowdsourcer.io</p>
            <ul id="DirectoryList" class="nav nav-pills nav-stacked">
              <?php printDirectoriesAsList($_SERVER["DOCUMENT_ROOT"] . "/_docs") ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#SidebarMenu" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Tutorials
            </a>
          </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body">
            <p>Tutorials on XAMPP, php, git, and more. <p>
            <ul id="DirectoryList" class="nav nav-pills nav-stacked">
              <?php printDirectoriesAsList($_SERVER["DOCUMENT_ROOT"] . "/_tutorials") ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#SidebarMenu" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Templates
            </a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
            <p>Template documents for you to use as a staring point.</p>
            <ul id="DirectoryList" class="nav nav-pills nav-stacked">
              <?php printDirectoriesAsList($_SERVER["DOCUMENT_ROOT"] . "/_templates") ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFour">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#SidebarMenu" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              Tasks
            </a>
          </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
          <div class="panel-body">
            <p>Proposals for tasks. Please use version numbers to keep organized, and not lose data.</p>
            <ul id="DirectoryList" class="nav nav-pills nav-stacked">
              <?php printDirectoriesAsList($_SERVER["DOCUMENT_ROOT"] . "/_tasks") ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFive">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#SidebarMenu" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
              Mockups
            </a>
          </h4>
        </div>
        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
          <div class="panel-body">
            <p>Random mockups, put anything you want to show the team in here at any time.</p>
            <ul id="DirectoryList" class="nav nav-pills nav-stacked">
              <?php printDirectoriesAsList($_SERVER["DOCUMENT_ROOT"] . "/_mockups") ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once("./partials/footer.php"); ?>
