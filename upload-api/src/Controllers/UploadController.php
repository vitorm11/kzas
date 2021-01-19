<?php

namespace Src\Controllers;

class UploadController {
  private $dir = 'uploads/';

  public function uploadFile($file) {
    try {
      if (!is_dir($this->dir))
        mkdir($this->dir);

      $check = getimagesize($file['tmp_name']);
      if($check !== false) {
        $extension = strtolower(end(explode('.', $file['name'])));
        $newFileName = time().'.'.$extension;

        if(move_uploaded_file($file['tmp_name'], $this->dir.$newFileName)) {
          $currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

          return [
            'success' => true,
            'fileName' => $newFileName,
            'fullPath' => $currentUrl.$this->dir.$newFileName
          ];
        } else {
          throw new \Exception('Error on upload file', 400);
        }
      } else {
        throw new \Exception('File is not an image', 400);
      }
    } catch (\Exception $e) {
      return [
        'success' => false,
        'code' => $e->getCode(),
        'message' => $e->getMessage(),
      ];
    }
  }

  public function removeFile($fileName) {
    try {
      $filePath = $this->dir.$fileName;

      if(file_exists($filePath)) {
        unlink($filePath);

        return [
          'success' => true
        ];
      } else {
        throw new \Exception('File does not exists.', 400);
      }
    } catch (\Exception $e) {
      return [
        'success' => false,
        'code' => $e->getCode(),
        'message' => $e->getMessage(),
      ];
    }
  }
}
