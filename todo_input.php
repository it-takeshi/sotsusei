<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <title>TODO入力</title>
  <style>
  
body{
	font-family:Arial, sans-serif;
	-webkit-font-smoothing:antialiased;
	color:#664949;
	background:#6CD8FF url(../img/bg.png) 0 100% repeat-x;
	transition:background .3s;
}
#input_area{
  margin-top: 50px;
}

.gradient1{
  width: 250px;
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
.title{
  width: 250px;
  margin: auto;
  text-align: center;
}

.gradient1:hover{
	color:#E27C1C;
	background:#FEC617;
}

.gradient1:focus{
	outline:none;
}

#input_area{
  /* position: absolute;
  top:80px;
  left:80px; */
  
}

  </style>
</head>
<body>
<section id="input_area">
  <form action="todo_create.php" method="POST">
            <p class="gradient1">じかん・やること<br>にゅうりょく</p>
            <!-- <a href="todo_logout.php" class="gradient1">おわりにする</a> -->
            <div>
              <p class="title">やること</p> 
               <input type="text" name="todo" class="gradient1">
            </div>
            <div>
              <p class="title">にちじ</p>
           <input type="datetime-local" name="date" class="gradient1">
              <!-- 日時: <input type="date" name="date"> -->
            </div>
            <div>
              <button class="gradient1">ほぞん</button> 
            </div>
      </form> 
      <a href="todo_read.php" class="gradient1">やることリストへ</a>
      <div><a href="index2.html" class="gradient1">トップページへ</a></div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>



    </script>

  </body>

</html>