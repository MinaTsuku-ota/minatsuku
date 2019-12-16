<?php
  header('Content-type: application/json; charset=utf-8');

  $files[] = $_GET($file0,$file1,$file2);

  if(isset($files)){
    echo $files;
  };