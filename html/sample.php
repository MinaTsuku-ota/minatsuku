<?php
  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
  header("Allow: POST");
  header("Accept: text/html");
  header('Content-type: text/plain; charset=utf-8');

  $comment_data = $_POST['comment_data'];

<<<<<<< HEAD
  $result = 'これはテストです' . $comment_data;

  echo json_encode($result);
=======
  $text = $_POST('comment_data');

  echo $text;
>>>>>>> f561d309d13228e1cb5ac9710c062e738f3c6fb4
