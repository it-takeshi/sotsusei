<?php
session_start();
include("functions.php");
check_session_id();

$pdo = connect_to_db();

// $sql = "SELECT * FROM thing_table";
$sql = 'SELECT * FROM thing_table ORDER BY id DESC LIMIT 5';

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["thing"]}</td>";
    $output .= "<td><img src='{$record["image"]}'width=120px height=70px></td>";
    $output .= "<td>{$record["how_to"]}</td>";
    $output .= "<td>{$record["map"]}</td>";
    // $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>";
    // $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>";
    
    $output .= "</tr>";
  }
  unset($value);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>やること もちもの</title>
  <style>

body{
	font-family:Arial, sans-serif;
	-webkit-font-smoothing:antialiased;
	color:#664949;
	background:#6CD8FF url(../img/bg.png) 0 100% repeat-x;
	transition:background .3s;
}

.gradient1{
  width: 150px;
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
  margin-bottom: 10px;
}

.gradient1:hover{
	color:#E27C1C;
	background:#FEC617;
}

.gradient1:focus{
	outline:none;
}
.title{
  width: 150px;
	 display:block; 
	margin:0 auto;
	border:none;
	color:#FEC617;
	background:#E2681C;
	border-radius:35px;
	font-size: 15px;
	font-weight:bold;
	padding:10px 30px;
	color:#FEC617;
	background:#E27C1C;
  text-align: center;
  text-decoration:none;
  margin-bottom: 5px;
  margin-left: 90px;
}
  </style>
</head>

<body>
  
    <p class="title"> やること もちもの</p>
    <!-- <a href="todo_logout.php">logout</a> -->
    <table>
      <thead>
        <tr>
          <th>ものごと</th>
          <th>もちもの</th>
          <th>やりかた</th>
          <th>ちず</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
    <a href="thing_input.php" class="gradient1">にゅうりょくへもどる</a>
    <a href="index2.html" class="gradient1">トップページへもどる</a>
</body>

</html>