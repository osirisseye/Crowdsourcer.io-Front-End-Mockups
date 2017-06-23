<?php
  function setDocumentRoot(){
    $projectRoot = dirname(__FILE__);
    $serverRoot = $_SERVER["DOCUMENT_ROOT"];
    
    $projectRoot = str_replace('\\', '/', $projectRoot);
    $serverRoot = str_replace('\\', '/', $serverRoot);
        
    $difference = explode($serverRoot, $projectRoot);
    
    if($projectRoot == $serverRoot || count($difference) != 2){
      return "";
    } else { 
      return $difference[1];
    }    
  }

  $ROOT = setDocumentRoot();
  ini_set('include_path', $ROOT);
  define('ROOT', $ROOT);
?>

