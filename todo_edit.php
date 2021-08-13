<?php
// var_dump($_GET);
// exit();
session_start();
include("functions.php");
check_session_id();

$id = $_GET['id'];

$pdo= connect_to_db();

// DB接続&id名でテーブルから検索   // 該当􏰀データを取得するためidでDBを検索する!
$sql = 'SELECT * FROM todo_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();

 // fetch()で1レコード取得できる.
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]); 
  exit();
  } else {
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
  }


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>参加者データ更新・編集</title>
  <style>

body{
	font-family:Arial, sans-serif;
	-webkit-font-smoothing:antialiased;
	color:#664949;
	background:#6CD8FF url(../img/bg.png) 0 100% repeat-x;
	transition:background .3s;
}
.gradient1{
  width: 200px;
	display:block;
	margin:0 auto;
	border:none;
	color:#FEC617;
	background:#E2681C;
	border-radius:35px;
	font-size: 15px;
	font-weight:bold;
	padding:10px 40px;
	cursor:pointer;
	color:#FEC617;
	background:#E27C1C;
  text-align: center;
  text-decoration:none;
  margin-bottom: 25px;
  margin-left: 60px;
  
}

.gradient1:hover{
	color:#E27C1C;
	background:#FEC617;
}

.gradient1:focus{
	outline:none;
}


.gradient2{
  width: 280px;
	display:block;
	margin:0 auto;
	border:none;
	color:#FEC617;
	background:#E2681C;
	border-radius:35px;
	font-size: 15px;
	font-weight:bold;
	padding:10px 40px;
	cursor:pointer;
	color:#FEC617;
	background:#E27C1C;
  text-align: center;
  text-decoration:none;
  margin-bottom: 25px;
  margin-left: 60px;
  
}

.gradient2:hover{
	color:#E27C1C;
	background:#FEC617;
}

.gradient2:focus{
	outline:none;
}

  </style>
</head>

<body>
  <section></section>
  <form action="todo_update.php" method="POST">
    
      <p class="gradient1">へんこう</p>
      
      <!-- htmlのタグに初期値として設定 -->
      <div>
        (やること) <input type="text" name="todo" value="<?= $record['todo'] ?>" class="gradient1">
      </div>
      
      <div>
        (にちじ) <input type="date" name="date" value="<?= $record['date'] ?>" class="gradient1">
      </div>

      <div>
      <!-- idを見えないように送る -->
      <!-- input type="hidden"を使用する! -->
      <input type="hidden" name="id" value="<?=$record['id']?>">
      </div>
      <div>
        <button class="gradient2">ほぞん</button>
      </div>
      <a href="todo_read.php" class="gradient1">やることいちらんへ</a>
  </form>

</body>

</html>

