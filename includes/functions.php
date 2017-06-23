<?php

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
      echo getListItem($dir['url'], $dir['displayName'], $class, $dir['user'], $dir['version']);
    }
  }
}

function getDirectoryInfo($directory, $path = "/"){
  $parts = explode(".",  $directory);
  $ext = count($parts) > 1 ? array_pop($parts) : "";
  
  $name = implode('.', $parts);
  
  $displayName = getDisplayName($name);
  $user = getUserName($name);
  $version = getVersion($name);
    
  $url = ROOT . "/" . $path . "/" . $name . "." . $ext;
    
  return array(
    "displayName" => $displayName,
    "name" => $name,
    "ext" => $ext,
    "user" => $user,
    "url" => $url,
    "version" => $version
  );
}

function getDisplayName($name){
  $parts = preg_split("/[-]/", $name);
  $count = count($parts);
  
  $displayName = $count > 1 ? $parts[1] : $parts[0];
  
  $words = preg_split("/[_]/", $displayName);
  for($i = 0; $i < count($words); $i++){
    $words[$i] = ucfirst($words[$i]);
  }
  return join(" ", $words);
}

function getUserName($name){
  $parts = preg_split("/[-]/", $name);
  $count = count($parts);
  
  if($count < 2 || $count > 3) return "";

  if($count == 3){
    return $parts[0];
  } else {
    if(strpos('v', $parts[$count - 1]) == 0){
      return $parts[0];
    } 
  }

  return '';
}

function getVersion($name){
  $parts = preg_split("/[-]/", $name);
  $count = count($parts);
  
  if($count < 2 || $count > 3) return "";

  if($count == 3){      
    return substr($parts[2], 1);
  } else {
    if(strpos($parts[$count - 1], 'v')){
      return substr($parts[$count - 1], 1);
    } 
  }
  return '';
}

function icon($name){
  return '<i class="fa fa-' . $name . '" aria-hidden="true"></i>';
}

function getLink($url, $pageName, $class = '', $user = '', $version = ''){
  $icon = icon('external-link');
  $userString = "";
  $versionString = "";
  if($user) $userString = "<br/><span class='username'>@" . $user . '</span>';
  if($version) $versionString = " <span class='version'>version " . $version . '</span>';
  $link = '<a title="Mockup of the ' . $pageName . ' page!" class="' . $class . '" href="' . $url . '">' . $icon . " " . $pageName  . $versionString . $userString . '</a>';
  return $link;
}

function getListItem($url, $pageName, $class = '', $user = '', $version = ''){
  $item = '<li role="presentation">' . getLink($url, $pageName, $class, $user, $version) . '</li>';
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
