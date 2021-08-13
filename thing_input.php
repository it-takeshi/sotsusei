<?php 
session_start();
include('functions.php');
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

.gradient1:hover{
	color:#E27C1C;
	background:#FEC617;
}

.gradient1:focus{
	outline:none;
}

.gradient2{
  width: 340px;
  height: 40px;
	display:block;
	margin:auto;
  
	border:none;
	color:#FEC617;
	background:#E2681C;
	border-radius:35px;
	font-size: 15px;
	font-weight:bold;
	padding-left: 10px;
	cursor:pointer;
	color:#FEC617;
	background:#E27C1C;
  text-align: center;
  text-decoration:none;
  margin-bottom: 10px;
}

.gradient2:hover{
	color:#E27C1C;
	background:#FEC617;
}

.gradient2:focus{
	outline:none;
}
.title{
  width: 250px;
  margin: auto;
  text-align: center;
}
  </style>
</head>
<body>

<form  method="POST"  action="create_file.php"  enctype="multipart/form-data">
    
      <a href="thing_read.php" class ="gradient1">もの・こと にゅうりょく</a>
      <!-- <a href="thing_logout.php">logout</a> -->
    <p class="title">ものごと</p>
      <div>
         <input type="text" name="thing" class ="gradient1">
      </div>
      <p class="title">もちもの</p>
        <div><input type="file" name="upfile" accept="image/
        *"capture="camera" class ="gradient2"> 
        
        </div>
        <p class="title">やりかた</p>
      <div>
         <input type="text" name="how" class ="gradient1">
      </div>
        <p class="title">ちず</p>
      <div>
       <input type="text" name="map" class ="gradient1"> 
      </div>
      
        <button class ="gradient1">ほぞん</button>
        <div><a href="thing_read.php" class="gradient1">もの・こといちらんへ</a></div>
        <div><a href="index2.html" class="gradient1">トップページへ</a></div>
      </div>
  
  </form> 


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>



    </script>

  </body>

</html>