<?php
session_start();
include("functions.php");
check_session_id();

if (
  !isset($_POST['todo']) || $_POST['todo'] == '' ||
  !isset($_POST['date']) || $_POST['date'] == '' ||
  !isset($_POST['id']) || $_POST['id'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

 // 各値をpostで受け取る
$todo = $_POST["todo"];
$date = $_POST["date"];
$id = $_POST["id"];

$pdo = connect_to_db();

// idを指定して更新するSQLを作成(UPDATE文)
$sql = "UPDATE todo_table SET todo=:todo,date=:date,updated_at=sysdate() WHERE id=:id"; 

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR); 
// $stmt->bindValue(':date', $date, PDO::PARAM_STR); 
$stmt->bindValue(':date', '2021-07-16', PDO::PARAM_STR); 
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

 // 各値をpostで受け取る
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する 
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
  } else {
  // 正常に実行された場合は一覧ページファイルに移動し，処理を実行する
  header("Location:todo_read.php");
  exit();
  }


?>

