<?php echo $_SERVER["DOCUMENT_ROOT"];
/* ###############################
  DO NOT EDIT THIS PAGE :D
  - If you need a page to copy, pick anything with a 'template-' prefix. */
require("./includes/full_page_header.php");
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
  .container2 {
  	display: flex;
  	flex-direction:row;
  	flex-wrap: nowrap;
  }


</style>

<div class="container">

<!--  BEGIN PROGRESS BAR  -->
<? include("_mockup-task_viewer_progress_bar.php"); ?>
<!--  END PROGRESS BAR  -->


<div class="container2">
  <!--  BEGIN TITLE CARDS EXAMPLE  -->
  <? include("_mockup-task_viewer_title_card-3.php"); ?>
  <!--  END TITLE CARDS EXAMPLE  -->

  <!-- BEGIN CONTRIBUTOR CARD EXAMPLE - UNCOMMENT FOR 3-PART VIEW -->
  <? include("_mockup-task_viewer_contributor_card-2.php"); ?>
  <!-- END CONTRIBUTOR CARD EXCAMPLE -->
</div>

  <div class="col-xs-12 col-sm-4">
    <h2>Uploaded Files</h2>
    <ul id="DirectoryList" class="nav nav-pills nav-stacked">
      <?php printDirectoriesAsList(dirname(__FILE__)) ?>
    </ul>
  </div>
</div>

<?php include("./partials/footer.php"); ?>
