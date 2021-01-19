<?php

header("Content-Type: application/json; charset=UTF-8");

// CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require 'vendor/autoload.php';
use Src\Controllers\UploadController;

$uploadController = new UploadController();

if(isset($_FILES['logo'])) {
 $response = $uploadController->uploadFile($_FILES['logo']);
 echo json_encode($response);
} else if(isset($_POST['fileName']) || isset($_POST['fullPath'])) {
  if(isset($_POST['fullPath'])) {
    $fileName = strtolower(end(explode('/', $_POST['fullPath'])));
  } else if(isset($_POST['fileName'])) {
    $fileName = $_POST['fileName'];
  }

  $response = $uploadController->removeFile($fileName);
  echo json_encode($response);
}
