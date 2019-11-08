<html>
<head>
  <meta charset ="utf-8">
  <link rel="stylesheet" href="../css/style.css">
  <title>phpinfo()だよ</title>
</head>
<body>
<?php
  $sql = "select * from user";
  $stmt = $dbh->query($sql);
  foreach($stmt as $row) {
    echo $row['name'].'='.$row['subject'].;

    echo '<br>'
  }

  phpinfo();
?>
</body>
</html>