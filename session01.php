<?php
// session変数を定義して値を入れよう

session_start(); 
$_SESSION['num'] =  6; 
echo $_SESSION['num'];

?>
<!-- // session変数を使用する場合も必須! // session変数の宣言 -->