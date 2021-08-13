<?php
session_start();
include("functions.php");
check_session_id();

$pdo= connect_to_db();

// $sql = 'SELECT * FROM todo_table';
$sql = 'SELECT * FROM can_table ORDER BY id ASC LIMIT 8';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  // exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";
  foreach ($result as $record) {
  $output .= "<tr>";
  $output .= "<td>{$record["date"]}</td>"; 
  $output .= "<td>{$record["can"]}</td>"; 
  // $output .= "</tr>";
  // edit deleteリンクを追加
  // $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>へんこう</a></td>";
  // $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>さくじょ</a></td>"; 
  // $output .= "<td>{$record["id"]}</td>"; 
  $output .= "</tr>";
  }
  // $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($record);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title>できたこと</title>
  <style>

    body{
      font-family:Arial, sans-serif;
      -webkit-font-smoothing:antialiased;
      color:#664949;
      background:#6CD8FF url(../img/bg.png) 0 100% repeat-x;
      transition:background .3s;
    }
    #output{
      position: absolute;
      top:100;
      left:150;
      color: blue;
      font-size: 20px;
    }
    #gazo{
      position: absolute;
      top:350px;
      left:120px;
        }
    
    #button{
      position: absolute;
      top:300px;
      left: 120px;
    }

    #taasei{
      display: none;
    }
    .when{
      font-size: 15px;
    }
    .can{
      font-size: 15px;
      padding-left: 70px;
    } 

 
    img{
          cursor: pointer;
          transition: border-radius .5s;
         
    
        }

    .changed{
      border-radius: 50%;
    }


    .gradient1{
      width: 150px;
      display:block;
      margin:0 auto;
      border:none;
      color:#FEC617;
      background:#E2681C;
      border-radius:35px;
      font-size: 12px;
      font-weight:bold;
      padding:10px 10px;
      cursor:pointer;
      color:#FEC617;
      background:#E27C1C;
      text-align: center;
      text-decoration:none;
      margin-bottom: 5px;
      margin-left: 10px;
      
    }

    .gradient1:hover{
      color:#E27C1C;
      background:#FEC617;
    }

    .gradient1:focus{
      outline:none;
    }
    img{
        cursor: pointer;
        border-radius: 50%;
        position: absolute;
        top:450px;
        left:150px;
          }
  .title{
  width: 250px;
  margin: auto;
  text-align: center;
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
  margin-top: 20px;
  margin-bottom: 5px;
  margin-left: 135px;
}
</style>
</head>
<body>
<h3 class="title">できたこと</h3>
    <table>
      <thead>
        <tr>
        <th class="when">いつ  </th>
        <th class="can">できた</th>       
        </tr>
      </thead>
      <tbody id="output">
        <?= $output ?>
    </tbody>
    </table>

    <!-- // 画像クリック 画像まるくなる。できた表示試し -->
<section id="gazo">
  
 
  <div><h2 id="target"></h2></div>
  <div><h2 id="taasei">たっせい！！！</h2></div>
</section>
    <!-- / 画像クリック 画像まるくなる。できた表示試し ここまで -->
  
<section id="button">
 
  <h3><a href="todo_read.php" class="gradient1">やること いちらんへ</a></h3>
  <a href="todo_input.php" class="gradient1">にゅうりょくへ</a>
  <a href="index2.html" class="gradient1">トップページへ</a>
  </section>
  <p class="img"><img src="image/trophy-5994842__480.png" width="100" height="100" alt=""
  id="trigger"></p>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>

// // 画像クリック 画像まるくなる。できた表示試し
// function process(){
//   document.querySelector('#trigger').classList.add('changed');
//   document.querySelector('#target').textContent='できた！！';
//   document.querySelector('#taasei').classList.add('show');
// }

//     document.querySelector('#trigger').addEventListener('click',process);

// // 画像クリック 画像まるくなる。できた表示試し ここまで

    
    </script>
</body>

</html>