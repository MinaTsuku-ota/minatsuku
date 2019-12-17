<?php
  header('Content-type: application/json; charset=utf-8');

  // $files[] = $_GET($file0,$file1,$file2);

  $text = $_GET('comment_data');

  if(isset($text)){

    echo mb_convert_encode($text,'UTF-8');

  };