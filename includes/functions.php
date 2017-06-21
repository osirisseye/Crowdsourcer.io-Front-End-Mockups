<?php

$TEMP = explode("/", $_SERVER["DOCUMENT_ROOT"]);
$ROOT = $TEMP[count($TEMP) - 1];

function printDirectories($path = "./", $class = ''){
  $directories = scandir($path);
  foreach ($directories as $directory) {
    if($directory == "." || $directory == "..") continue;
    $dir = getDirectoryInfo($directory);
    if($dir['ext'] == "php" && $dir['name'] != "index"){
      printLink($dir['url'], $dir['displayName'], $class);
    }
  }
}

function printDirectoriesAsList($path = "./", $class = ''){
  $directories = scandir($path);
  foreach ($directories as $directory) {
    if($directory == "." || $directory == "..") continue;
    $dir = getDirectoryInfo($directory, $path);
    if($dir['ext'] == "php" && $dir['name'] != "index"){
      echo getListItem($dir['url'], $dir['displayName'], $class);
    }
  }
}

function getDirectoryInfo($directory, $path = ""){
  $parts = explode(".",  $directory);
  $name = $parts[0];
  $ext = count($parts) > 1 ? $parts[1] : "";
  $displayName = getDisplayName($name);
  
  $url = "";
  global $ROOT;
  
  if($path != "" && strpos($path, $ROOT) !== false){
    $relative_path = explode($ROOT, $path)[1];
    $url = $relative_path . "/" . $name . "." . $ext;
  } else {
    $url = $path  . "/" . $name . "." . $ext;
  }

  return array(
    "displayName" => $displayName,
    "name" => $name,
    "ext" => $ext,
    "url" => $url
  );
}

function getDisplayName($name){
  $parts = preg_split("/[-]/", $name);
  if(count($parts) > 1) $parts = array_splice($parts, 1);
    
  $words = preg_split("/[_]/", join("", $parts));
  for($i = 0; $i < count($words); $i++){
    $words[$i] = ucfirst($words[$i]);
  }
  return join(" ", $words);
}

function icon($name){
  return '<i class="fa fa-' . $name . '" aria-hidden="true"></i>';
}

function getLink($url, $pageName, $class = ''){
  $icon = icon('external-link');
  $link = '<a title="Mockup of the ' . $pageName . ' page!" class="' . $class . '" href="' . $url . '">' . $icon . " " . $pageName . '</a>';
  return $link;
}

function getListItem($url, $pageName, $class = ''){
  $item = '<li role="presentation">' . getLink($url, $pageName, $class) . '</li>';
  return $item;
}

function getRandomImage($key = "abstract"){
  $images = array(
    "abstract" => array(
      "http://media.istockphoto.com/photos/abstract-cubes-retro-styled-colorful-background-picture-id508795172?k=6&m=508795172&s=612x612&w=0&h=cNTF4sOLFL3VuYscPNiPCf-tnXfdowg4rVeGUIvQ0WM=",
      "http://images.all-free-download.com/images/graphicthumb/abstract_background_sparkling_bokeh_ornament_6828539.jpg",
      "http://7bna.net/images/abstract/abstract-16.jpg",
      "http://cdn.wallpapersafari.com/65/93/xKIQLv.png",
      "https://cdn.pixabay.com/photo/2016/06/28/05/39/abstract-1484017_960_720.jpg",
      "http://7bna.net/images/abstract-pictures/abstract-pictures-19.jpg",
      "https://static.pexels.com/photos/30732/pexels-photo-30732.jpg",
    )
  );
  switch($key){
    case "abstract":
      $max = count($images['abstract']);
      $index = rand(0, $max - 1);
      echo $images['abstract'][$index];
      break;
  }
  return "";
}
 ?>
