<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Sample Queues</title>
</head>
<body>
<p>
  Queues test!!
</p>
<?php
// 現在のタイムスタンプから、コントローラから受け取ったタイムスタンプの差分を出す事で、処理にかかった時間（秒数）を出力しています
if(!empty($start)) { echo time() - $start; }
?>
</body>
</html>
