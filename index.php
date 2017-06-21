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

  
</style>

<div class="container">
  	<!--  BEGIN PROGRESS BAR  -->
<?php include("_mockup-task_viewer_progress_bar.php"); ?>
<!--  END PROGRESS BAR  -->

<!--UNCOMMENT AND PASTE IN THE STYLE SECTION FOR 3-PART VIEW: 
.container2 {
	display: flex;
	flex-direction:row;
	flex-wrap: nowrap;
  }
-->
<div class="container2">
<!--  BEGIN TITLE CARDS EXAMPLE  -->
<?php include("_mockup-task_viewer_title_card-1.php"); ?>
<!--  END TITLE CARDS EXAMPLE  -->
	
<!-- BEGIN CONTRIBUTOR CARD EXAMPLE - UNCOMMENT FOR 3-PART VIEW
<?php include("_mockup-task_viewer_contributor_card-1.php"); ?>
 END CONTRIBUTOR CARD EXCAMPLE -->
</div>

  <div class="col-xs-12 col-sm-4">
    <h2>Uploaded Files</h2>
    <ul id="DirectoryList" class="nav nav-pills nav-stacked">
      <?php printDirectoriesAsList(dirname(__FILE__)) ?>
    </ul>
  </div>
</div>

<?php include("./partials/footer.php"); ?>
