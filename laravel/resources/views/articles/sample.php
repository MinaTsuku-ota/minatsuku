<?php

// modelクラスのインスタンス生成
$comments = new Comment();
// header("Content-type: text/plain; charset=UTF-8");
// 持ってくる
// if (isset($_POST['comment_data'])) { } else {
//     $comment = $_POST['comment_data'];
// }
$comments = $_POST('comment_data');

// DBに保存
Comment::create([
  'comment' => 'aaa',
  'user_id' => '1',
  'article_id' => '3'
]);
        // return Response::json($comment);
