
<?php
// 手順
// 1、変数「php_array」にarray()で配列を作る
// 2,json_encode関数でJSON形式のフォーマットに変換
// 3,変数「json_array」にJSONデータを格納
// 4,続きはJS処理

// $php_array = array('てつだい','学校','じゅく');
$php_array =  [
  'id'=>'1',
  'date'=>'2021-07-15',
  'todo'=>'てつだい'
  ];
// var_dump($php_array);
$json_array = json_encode($php_array);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<!-- <div>
  <ul id="result"></ul>
</div> -->
<tbody>
  
</tbody>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

// 手順
// 5,JSONデータを受け取るために、JavaScriptのJSON.parseメソッドを使う
  // JSON.parse()は、文字列をJSONとして解析し、JavaScriptのJSONオブジェクトに変換するメソッド
// 6、引数にPHPのから受け取るデータ「$json_array」を入れる。そして変数「js_array」に格納。
// 7、ここからjQueryのeachメソッドを使って、PHPから受け取った配列のデータをリストで展開
// 8,appendメソッドを使って、id「result」のul要素の中にli要素を、配列の値を入れながら追加

// 以下はJqueryで処理分
$(function() {
  const js_array = JSON.parse('<?php echo $json_array; ?>');
  // console.log(js_array);

  $.each(js_array, function(index,value){
  $('#result').append('<li>' + value + '</li>');
    // console.log(value);
  })
});
// JQueryで処理分ここまで


// ●Java scriptで処理した場合はここから
// 5、JSON.parseメソッドでの受け取りは、jQueryと同じ
// 6、変数「el」にul要素を格納して、forEachメソッドで配列の数だけ処理
// 7、insertAdjacentHTMLメソッドでli要素を追加していく
   // insertAdjacentHTML()は、指定した位置にHTML要素を追加することができるメソッド
// 8,第1引数は「beforeend」として、element内部の最後の子要素の後に挿入していくようにする

const js_array2 = JSON.parse('<?php echo $json_array; ?>');
// console.log(js_array2);

let el = document.querySelector('#result');
js_array2.forEach(function(value){
  el.insertAdjacentHTML('beforeend', '<li>' + value + '</li>');
  // console.log(value);
});

// Java scriptで処理した場合はここまで
</script>
</body>
</html>