<?php

// var_dump($_POST);
// exit();

session_start();
include("functions.php");
check_session_id();

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



// ここからファイルアップロード&DB登録の処理を追加！！！
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0){
} else {
  exit('Error:画像が送信されていません');
}
$uploaded_file_name = $_FILES['upfile']['name'];
$temp_path = $_FILES['upfile']['tmp_name'];
$directory_path = 'upload/';

$extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
$unique_name = date('YmdHis').md5(session_id()) . "." . $extension;
$file_name_to_save = $directory_path . $unique_name;

if (is_uploaded_file($temp_path)) {
  if (move_uploaded_file($temp_path, $file_name_to_save)) {
  chmod($file_name_to_save, 0644);
} else {
  exit('');
}
}else{
  exit('アップロードできませんでした');
  }

$pdo = connect_to_db();

$sql = 'INSERT INTO thing_table(id, thing, image, how, map, created_at, updated_at) VALUES(NULL,:thing,:image,:how,:map, sysdate(), sysdate())';


// INSERT INTO `thing_table`(id, thing, image, how, map, created_at, updated_at) VALUES (NULL,'そうじ','画像','やり方','ちず',sysdate(), sysdate())

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':thing', $thing, PDO::PARAM_STR);
$stmt->bindValue(':image', $file_name_to_save, PDO::PARAM_STR);
$stmt->bindValue(':how', $how, PDO::PARAM_STR);
$stmt->bindValue(':map', $map, PDO::PARAM_STR);
$status = $stmt->execute();
// var_dump($status);
// exit();


if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:thing_input.php");
  exit();
}

?>