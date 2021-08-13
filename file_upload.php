<?php
// var_dump($_FILES);
// exit();

 // ファイルが追加されていない or エラー発生の場合を分ける. 
 // 送信されたファイルは$_FILES['...'];で受け取る!

if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {

  // 送信が正常に行われたときの処理(この後記述) ...
  $uploaded_file_name = $_FILES['upfile']['name'];
  $temp_path = $_FILES['upfile']['tmp_name'];
  $directory_path = 'upload/';

  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis').md5(session_id()) . "." . $extension;
  $file_name_to_save = $directory_path . $unique_name;

  if (is_uploaded_file($temp_path)) {
    if (move_uploaded_file($temp_path, $file_name_to_save)){
      chmod($file_name_to_save, 0644);
      $img = '<img src="'. $file_name_to_save . '" >';
} else {
exit('保存できませんでした'); 
} 
}else {
exit('画像がないです');
}
}else{
exit('アップロードに失敗しました');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>file_upload</title>
</head>

<body>
<!-- <?php  echo "$img";?>  -->
<?=  $img ?> 

</body>

</html>