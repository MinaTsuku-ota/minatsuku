<?php
  header('Content-type: application/json; charset=utf-8');

  $comment_data = $_POST['comment_data'];

  $result = 'これはテストです' . $comment_data;

  echo json_encode($result);