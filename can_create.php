<?php
session_start();
include("functions.php");
check_session_id();


if ( !isset($_POST['date']) || $_POST['date']=='' ||
    !isset($_POST['can']) || $_POST['can']=='' 
) {
  echo json_encode(["error_msg" => "no input"]);
exit();
}

$date = $_POST['date'];
$can =$_POST['can'];



$pdo = connect_to_db();

// $dbn = 'mysql:dbname=sotsusei;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   echo json_encode(["db error" => "{$e->getMessage()}"]);
// exit();
// }

// $sql = 'INSERT INTO todo_table(id, todo, deadline, created_at, updated_at) VALUES(NULL, :todo, :deadline, sysdate(), sysdate())';

$sql = 'INSERT INTO can_table(id, can, date, created_at, updated_at) VALUES (NULL,:can,:date,sysdate(),sysdate())';


// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
// $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
// $status = $stmt->execute();

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':can', $can, PDO::PARAM_STR); 
$stmt->bindValue(':date', $date, PDO::PARAM_STR); 
$status = $stmt->execute(); // SQLを実行

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  // exit();
} else {
  header('Location:todo_read.php'); 
  // header("Location:todo_input.php");
  // exit();
}
