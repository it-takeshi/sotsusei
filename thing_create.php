<?php
session_start();
include("functions.php");
check_session_id();

var_dump($_POST);
exit();

if (
  !isset($_POST['thing']) || $_POST['thing'] == '' ||
  !isset($_POST['how']) || $_POST['how'] == '' ||
  !isset($_POST['map']) || $_POST['map'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$thing = $_POST['thing'];
$how = $_POST['how'];
$map = $_POST['map'];


$pdo = connect_to_db();

$sql = 'INSERT INTO thing_table(id, thing, how, map,created_at, updated_at) VALUES(NULL, :thing, :how, :map,sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':thing', $thing, PDO::PARAM_STR);
$stmt->bindValue(':how', $how, PDO::PARAM_STR);
$stmt->bindValue(':map', $map, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:thing_input.php");
  exit();
}
