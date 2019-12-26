<?php
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
  header("Allow: POST");
  header("Accept: text/html");
  header('Content-type: text/plain; charset=utf-8');

  $comment_data = $_POST['comment_data'];

  $text = $_POST('comment_data');

  echo $text;
