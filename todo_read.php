<?php
session_start();
include("functions.php");
check_session_id();

$pdo= connect_to_db();

$sql = 'SELECT * FROM todo_table ORDER BY id ASC LIMIT 10';
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
    // $output .= "<div>{$record["date"]}</div>";
    // $output .= "<div>{$record["todo"]}</div>";
    // $output .= "<div><a href='todo_edit.php?id={$record["id"]}'>なおす</a></div>";
    // $output .= "<div><a href='todo_delete.php?id={$record["id"]}'>けす</a></div>";
  $output .= "<tr>";
   $output .= "<td>{$record["date"]}</td>"; 
  $output .= "<td>{$record["todo"]}</td>"; 
  // $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>なおす</a></td>";
  
  // // $output .= "<td>{$record["id"]}</td>"; 
  $output .= "</tr>";
  $output .= "<div><a href='todo_delete.php?id={$record["id"]}'>けす</a></div>"; 
  }
  // $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
  // 今回は以降foreachしないので影響なし
  unset($record);
}

// json_encodeでJSON形式に変換  $resultデータを変数「json_array」に格納
$json_array = json_encode($result);
// var_dump($json_array);
// exit();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/vegas.min.css"> -->
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <title>やること</title>
  <style>

body{
	font-family:Arial, sans-serif;
	-webkit-font-smoothing:antialiased;
	color:#664949;
	background:#6CD8FF url(../img/bg.png) 0 100% repeat-x;
	transition:background .3s;
}

.when{
      font-size: 10px;
    }
.when2{
      font-size: 10px;
      padding-left: 30px;
    } 
.show{
  display:block;
}
#list{
  position: absolute;
  top:50px;
  left: 10px;
}
#result{
  font-size: 7px;
}
#list2{
  position: absolute;
  top:200px;
  left: 10px;  
}
#result2{
font-size: 7px;
display: none; 
}
#can{
   position: absolute;
  top:240px;
  left: 50px; 
}
.title{
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
	color:#FEC617;
	background:#E27C1C;
  text-align: center;
  text-decoration:none;
  margin-bottom: 5px;
  margin-left: 70px;
  margin-top: 10px;
}

.gradient1{
  width: 250px;
	display:block;
	/* margin:0 auto;  */
	border:none;
	color:#FEC617;
	background:#E2681C;
	border-radius:35px;
	font-size: 15px;
	font-weight:bold;
	padding:5px 40px;
	cursor:pointer;
	color:#FEC617;
	background:#E27C1C;
  text-align: center;
  text-decoration:none;
  margin-bottom: 5px;
  margin-left: 30px;   
}
.gradient1:hover{
	color:#E27C1C;
	background:#FEC617;
}
.gradient1:focus{
	outline:none;
}

/* #input_area{
  position: absolute;
  top:30px;
  left:10px;
} */
#can_btn{
    color: antiquewhite;
    display: inline-block;
    border-radius: 5px;
    opacity: 0.8;
    z-index: 1;
    cursor: pointer;
}
#can_btn:hover {
    opacity: 1.0;
}
#can_btn:active {
    background-color: tomato;
    color: white;
}
</style>
<!-- CSSここまで -->
</head>
<body>
<!-- HTMLここから -->
  <!-- タイトル -->
  <h3  class="title">やることリスト</h3>
 <!-- タイトル -->

 <!-- JSON.parseで受け取り処理分をHTML表示  -->
<section id="list">
    <table>
          <thead>
            <tr>
            <th class="when">いつ</th>
            <th class="when2">やること</th> 
            </tr>
          </thead>
        </table>
    <tbody><div id="result"><?= $output ?> </div></tbody> 
</section>

<section id="list2">
    <table>
          <thead>
            <tr>
            <!-- <th class="when">たっせいしたこと</th> -->
            </tr>
          </thead>
        </table>
    <tbody><div id="result2"></div></tbody> 
</section>
 

<section id="can">
  <div class="input">
    <form action="can_create.php" method="POST">
    <div class="gradient1">できたこと にゅうりょく</div>
      <p>日時</p>
       <input type="datetime-local" name="date" class="gradient1">
      <p>できたこと</p>
       <input type="text" name="can" class="gradient1">  
        <div>
          <button class="gradient1">にゅうりょく</button>
        </div>
    </form> 
    </div>
    <div class="return">
      <div><a href="can_read.php" class="gradient1">できたこと いちらんへ</a></div>
      <div><a href="index2.html" class="gradient1">トップページへ</a></div>
      <div> <a href="todo_input.php" class="gradient1">にゅうりょくへもどる</a></div>
    </div>
  </section>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/vegas.min.js"></script>
    <script>

// JSON.parseで受け取り処理とHTML表示

// const data = JSON.parse('<?php echo $json_array; ?>');
// console.log(data);

const output_data =[];
data.forEach(function(x){
output_data.push(`
<div class ="row">
<div class="col">${x.date}</div>
<div class="col">${x.todo}</div>
<div class="col" id="can_btn"><a href="" ><img src="image/s256_f_object_125_0bg.png" width="10" height="10" alt="">できた</a></div>
// <div class="col"><a href='todo_delete.php'>さくじょ</a></div>
<div class="col"><a href='todo_delete.php?id={$record["id"]}'>さくじょ</a></div>
// <div class="col"><a href='todo_edit.php'>へんこう</a></div>
<div class="col"><a href='todo_edit.php?id={$record["id"]}'>へんこう</a></div>
</div>
`)
})

$("#result").html(output_data);
$("#result2").html(output_data);

// できたボタンクリックして たっせい側へやできたことが表示される
$('#can_btn').click(function () {
        $('#result').hide();
        $('#result2').show();
});

</script>
</body>

</html>


