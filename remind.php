<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style type="text/css">

body{
	font-family:Arial, sans-serif;
	-webkit-font-smoothing:antialiased;
	color:#664949;
	background:#6CD8FF url(../img/bg.png) 0 100% repeat-x;
	transition:background .3s;
}
  .timerCount {
    font-size: 20px;
    font-weight: bold;
  }
  
  .box {
    float: left;
    margin-left: 5px;
    margin-right: 5px;
  }
  
  #box1 {
  }
  
  #box2 {
      display: none;
  }
  h2 {
    clear: both;
		font-size: 20px;
  }
  p {
    clear: both;
  }
  #box2 {
    background-color: #FFFF66;
  }
  .blackText {
    color: #000;
  }
  .blueText {
    color: #00f;
  }
  .redText {
    color: #f00;
  }

	.gradient1{
  width: 100px;
	display:block;
	margin:0 auto;
	border:none;
	color:#FEC617;
	background:#E2681C;
	border-radius:35px;
	font-size: 10px;
	font-weight:bold;
	padding:10px 20px;
	cursor:pointer;
	color:#FEC617;
	background:#E27C1C;
  text-align: center;
  text-decoration:none;
  margin-bottom: 5px;
  margin-left: 30px;
	text-align: center;
	margin: auto;
  
}

.gradient1:hover{
	color:#E27C1C;
	background:#FEC617;
}

.gradient1:focus{
	outline:none;
}
#f_count{
    display: none;
}
#nowrap{
    display: none;
}

img{
    border-radius: 50%;
		margin-top: 20px;
		margin-left: 110px;
      }



  
  </style>
  </head>
<body>

	<section>
	</section>
	<h3 class="remind">おもいだす</h3>
<p align="center" class="timerCount"><span id="cdt_title">予定まで</span><br><span id="cdt_timer"></span></p>
<form name="f_count" id="f_count">
	<div align="center">
		<input name="b_bc" type="button" value="" onClick="countup()">  
	</div>
</form>
	<p align="center"></p> 

<form name="form1" onSubmit="return false;">
<div class="box" id="box1">
<table>
<tr><td align="right" nowrap>やること</td>
	<td colspan="3" nowrap><input name="text_title" type="text" id="text_title" size="30" maxlength="30">まで</td>
	</tr>
<tr>
	<td nowrap>にちじ</td>
	<td colspan="3" nowrap><select name="sel_year" id="sel_year" onChange="format_timer_day(0)"></select>年
	<select name="sel_mon" id="sel_mon" onChange="format_timer_day(0)" ></select>月
	<select name="sel_day" id="sel_day" ></select>日
	<select name="sel_hour" id="sel_hour"></select>時
	<select name="sel_min" id="sel_min"></select>分</td>
	</tr>

	<tr>
		<td align="right">&nbsp;</td>
		<td><input type="button" value="リセット" onClick="form_reset(1)" class="gradient1"></td>
	
		<!-- <td>&nbsp;</td>  -->
		<td >
			<input type="button" value="せってい" onClick="set_date()" class="gradient1">
			<!-- <input type="button" value="保存" onClick="set_cookie()">
			<input type="button" value="URL" onClick="set_url()"> -->
		</td> 
	</tr>

<tr>
	<td align="right" nowrap>
	</td>
	<td colspan="3" nowrap>
		<!-- <label><input name="r_alert" type="radio" value="0" checked>なし</label> -->
		<!-- <label><input name="r_alert" type="radio" value="1">前面</label>  -->
		<label><input name="r_alert" type="radio" value="2">アラート</label>
		<label><input name="r_alert" type="radio" value="3">もどる</label>	
        <label for=""><input type="button" onclick="history.back()" class="gradient1" value="トップページへ"></label>
	</td>     
</tr>

</table>
</div>
 <div class="box" id="box2">
	<table>
		<tr>
			<td align="center"><span id="one_tt"></span></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#FFFF66"><input type="button" value="1分" onClick="ot_timer(60)">
				<input type="button" value="3分" onClick="ot_timer(3*60)">
				<input type="button" value="5分" onClick="ot_timer(5*60)">
				<input type="button" value="10分" onClick="ot_timer(10*60)">
				<input type="button" value="15分" onClick="ot_timer(15*60)">
				<input type="button" value="30分" onClick="ot_timer(30*60)"></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#FFFF66"><input type="button" value="1時間" onClick="ot_timer(3600)">
				<input type="button" value="2時間" onClick="ot_timer(2*3600)">
				<input type="button" value="6時間" onClick="ot_timer(6*3600)">
				<input type="button" value="8時間" onClick="ot_timer(8*3600)">
				<input type="button" value="12時間" onClick="ot_timer(12*3600)"></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#FFFF66"><input type="button" value="1日" onClick="ot_timer(86400)">
				<input type="button" value="7日" onClick="ot_timer(7*86400)">
				<input type="button" value="30日" onClick="ot_timer(30*86400)">
				<input type="button" value="100日" onClick="ot_timer(100*86400)">
				<input type="button" value="365日" onClick="ot_timer(365*86400)"></td>
		</tr>
	</table> 
</div>
</form>
<table border="2">    
  <tr>
  	<th nowrap id="nowrap">「<span id="text_bc">ボ</span>」</th>
  	</tr>
  <tr>  
  </tr>
</table>  
<p class="img"><img src="image/istockphoto-1156344814-170667a.jpg" width="170" height="170" alt=""><a href="todo_input.php"></a></p>	

<script>
  //初期設定
//タイマーの更新間隔（1/1000秒）
timer_update = 500;
//タイマーの小数点以下の桁数
timer_fixed = 0;
//ボーナスカウントボタンの名称
button_name = "時間を増やす";
//ボーナスカウンタの有効期限（秒）
count_limit = 10;
//cookieの期限日数（予定日時＋期限日数）
c_limit = 0;
//cookie名
c_name = "cdt=";
//Twitterタイトル
tw_title = "速報";

//初期値（固定）
//予定日時
timer_count = 0;
d_title = "カウントダウンタイマー";
//document.title = d_title;
timerID = -1;
search_b = false; //共有モード
//テキスト
cdt1 = "";
cdt2 = "";
//タイマーモード
t_mode = 0; //0=通常/1=ワンタッチ

//ウィンドウの初期状態を設定
check_focus(1);

if (button_name != "") {
	document.f_count.b_bc.value = button_name;
	document.getElementById("text_bc").innerHTML = button_name;
}
if (count_limit > 0) {
	//document.getElementById("text_cl").innerHTML = count_limit + "秒以上";
}

//フォーム初期化
form_reset(0);

//カウント開始
timerID = setInterval("get_count()",timer_update);

//キーの状態を把握
SK = false; //shiftKey
AK = false; //altKey
CK = false; //ctrlKey
MK = false; //metaKey

document.onkeydown = function(ev) {
    var key_event = ev || window.event;

    SK = key_event.shiftKey;
	AK = key_event.altKey;
	CK = key_event.ctrlKey;
	MK = key_event.metaKey;
	
	textOTT();
}

document.onkeyup = function(ev) {
    var key_event = ev || window.event;

    SK = key_event.shiftKey;
	AK = key_event.altKey;
	CK = key_event.ctrlKey;
	MK = key_event.metaKey;
	
	textOTT();
}

function textOTT() {
	var s = "ワンタッチタイマー";
	if (AK) s = "(-) タイマー減算";
	if (CK) s = "(-) タイマー減算";
	if (MK) s = "(+) タイマー加算";
	if (SK) s = "(+) タイマー加算";
	
	document.getElementById("one_tt").innerHTML = s;
}

function check_focus(num) {
	//ドキュメントがアクティブかどうか
	afocus = (num == 1);
}

function form_reset(num) {
	//num=0 : 起動時
	//num=1 : リセットボタン
	var s,t,n;
	//フォーム初期化
	//再読込
	if (search_b) {
		s = document.location.href;
		n = s.indexOf("?");
		if (n > -1) {
			s = s.substring(0,n);
		}
		document.location.href = s;
	}
	
	//現在の時間
	now = new Date();		

	//現在の時間
	year = now.getFullYear();
	mon = now.getMonth()+1; //１を足すこと
	day = now.getDate();
	hour = now.getHours();
	min = now.getMinutes();

	//初期値
	t_title = mon + "月の終了";
	if (mon == 12) {
		year++;
		mon = 1;
	} else {
		mon++;
	}
	t_time = year + "/" + mon + "/1 00:00";
	sel_alert = 0;
	t_mode = 0;
	
	//検索部の取得
	get_search = document.location.search;
	get_search = get_search.substring(1,get_search.length);
	if (get_search != "") {
		//共有モード
		search_b = true;
		//検索部取得
		t = get_search.split(",");
		t_title = unescape(decodeURIComponent(t[2]));
		t_time = "";
		if (t[0] == "C") {
			if (t_title == "") s = "カウントダウン";
			else s = t_title;
			d_title = s + "タイマー";
			stime = t[1] * 10000;
			num = 2;
		} else {
			t_mode = eval(t[1]);
			d_title = count_format(t_mode,0) + "タイマー";
			num = 3;
		}
		//cookieを読み込まない
	}
	
	//カウンタ
	counter = 0;
	//document.getElementById("cdt_counter").innerHTML = "";
	document.f_count.b_bc.value = button_name;
	//カウンタの最終日時
	ctime = 0;
		
	//cookie読込
	if (num == 0) get_cookie();

	//表題の設定
	document.form1.text_title.value = t_title;
	get_title();
	
	//告知の設定
	document.form1.r_alert[sel_alert].checked = true;
	
	if (num < 3) {
		//時間の設定
		get_timer(num);
	} else {
		//検索部読込時
		ot_timer2(t[1]);
	}
	
	get_search = "";
	//タイマー初期化
	format_timer();
}

function get_count() {
	//文字色
	var text_color = "black";
	//現在の時間
	now = new Date();		
	var nt = now.getTime();
		
	//カウンタの時間
	if (ctime > 0) {
		var ct = Math.floor((nt - ctime) / 1000);
		//ボーナスカウンタ初期化
		if (ct > count_limit) {
			counter = counter - Math.floor(ct - count_limit);
			//counter = Math.floor(counter / 2);
			bcounter();
		}
	}
	
	//残り時間（1/1000秒→秒単位）
	timer_count = ((stime - nt) / 1000);
	
	//タイマーの表示
	if (timer_count > -1) {
		//タイマーが0秒以上
		cdt2 = "" + count_format(timer_count + counter,0);
		//ウィンドウタイトル
		if (afocus) document.title = d_title;
		else document.title = "CD " + count_format(timer_count,1);
	} else if (timer_count + counter > 0) {
		//タイマーがマイナスだが、ボーナスを入れるとプラス
		cdt1 = t_title + "まで";
		cdt2 = count_format(timer_count + counter,0);
		text_color = "blue";
	} else {
		//タイマーがマイナス
		if (document.form1.r_alert[0].checked) {
			//マイナスをカウント
			cdt1 = t_title + "から";
			cdt2 = count_format(Math.abs(timer_count + counter),0) + "経過";
			text_color = "red";
		} else {
			//タイマー停止
			if (timerID > 0) {
				timer_count = 0;
				//タイマー停止
				clearInterval(timerID);
				timerID = 0;
				//アラート
				job_alert();
				//ボーナスカウンタ初期化
				counter = 0;
				bcounter();
			}
			cdt1 = t_title + "です";
			cdt2 = "";
		}
		//ウィンドウタイトル
		document.title = "カウントダウンタイマー";
	}
	//画面出力
	document.getElementById("cdt_title").innerHTML = cdt1;
	document.getElementById("cdt_timer").innerHTML = "<span class='" + text_color + "Text'>" + cdt2 + "</span>";
}

function countup() {
	//ボーナスカウンタを増やす	
	counter++;
	
	//ボーナス時間
	if ((counter % 10) == 0) {
		var r = Math.floor(Math.random() * 10);
		if (r == 0) counter = counter * 2;
		//document.title = r;
	}
	
	//ボーナスカウンタ表示
	bcounter();
	
	//最終日時
	now = new Date();
	ctime = now.getTime();
}

function bcounter() {
	//ボーナスカウンタ表示
	var s = "";
	if (counter > 0) s = " +" + counter;
	else counter = 0;
	//document.getElementById("cdt_counter").innerHTML = s;
	document.f_count.b_bc.value = button_name + s;
}

function job_alert() {
	//時間告知
	if (document.form1.r_alert[1].checked) {
		//前面
		window.focus();
		document.focus();
	} else if (document.form1.r_alert[2].checked) {
		//警告
		alert("「" + t_title + "」です");
	} else if (document.form1.r_alert[3].checked) {
		//前頁
		history.back();
	}
	//alert(timerID);
}

function count_format(sec,mode) {
	//sec=秒数 fix=小数桁数
	//小数点以下の調整
	if (timer_fixed == 0) var sec = Math.ceil(sec);
	var ts = sec.toFixed(timer_fixed);
	var tm = Math.floor(ts / 60); //秒数切り捨て
	ts = ts % 60; //60秒未満の秒数
	var th = Math.floor(tm / 60); //分の切り捨て
	tm = tm % 60; //60分未満の分数
	var td = Math.floor(th / 24); //時間の切り捨て
	th = th % 24; //24時間未満の時間数
	//表示の整形
	//ts = format_num2(ts);
	//tm = format_num2(tm);
	
	var s = "";
	if (mode == 0) {
		if (td > 0) s += td + "日"
		if (th > 0) s += th + "時間"
		if (tm > 0) s += tm + "分"
		if ((s == "") || (ts > 0)) s += ts + "秒"
	} else if (mode == 1) {
		if (td > 0) s += td + "d "
		if (th > 0) s += format_num2(th) + "h "
		if (tm > 0) s += format_num2(tm) + "m "
		if ((s == "") || (ts > 0)) s +=  format_num2(ts) + "s"
	} else {
		if (td > 0) s += td + ":"
		s += format_num2(th) + ":"
		s += format_num2(tm) + ":"
		s += format_num2(ts);
	}
	
	return s;
}

function format_timer() {
	var n,s;
	
	//年
	var max = 100;
	document.form1.sel_year.length = max;
	for (n=0;n<max;n++) {
		document.form1.sel_year[n].value = year + n;
		document.form1.sel_year[n].text = year + n;
	}
	document.form1.sel_year.value = year;
	
	//月
	var max = 12;
	document.form1.sel_mon.length = max;
	for (n=0;n<max;n++) {
		document.form1.sel_mon[n].value = n+1;
		document.form1.sel_mon[n].text = n+1;
	}
	document.form1.sel_mon.value = mon;
	
	//日
	format_timer_day(day);

	//時間
	var max = 24;
	document.form1.sel_hour.length = max;
	for (n=0;n<max;n++) {
		document.form1.sel_hour[n].value = n;
		document.form1.sel_hour[n].text = format_num2(n);
	}
	document.form1.sel_hour.value = hour;

	//分
	var max = 60;
	document.form1.sel_min.length = max;
	for (n=0;n<max;n++) {
		document.form1.sel_min[n].value = n;
		document.form1.sel_min[n].text = format_num2(n);
	}
	document.form1.sel_min.value = min;
}

function format_timer_day(gday) {
	//日付のセレクトメニューを設定
	var max = 31;
	
	var gyear = document.form1.sel_year.value;
	var gmon = document.form1.sel_mon.value;
	if (gday == 0) gday = document.form1.sel_day.value;
	
	if (gmon == 2) {
		if ((gyear%4 == 0 && gyear%100 != 0) || (gyear%400 == 0)) {
			//閏年
			max = 29;
		} else {
			//平年
			max = 28;
		}
	} else if (gmon == 4 || gmon == 6 || gmon == 9 || gmon == 11) {
		max = 30;
	}
	
	document.form1.sel_day.length = max;
	for (n=0;n<max;n++) {
		document.form1.sel_day[n].value = n+1;
		document.form1.sel_day[n].text = n+1;
	}
	if (day > max) gday = 1;
	document.form1.sel_day.value = gday;
}

function format_num2(num) {
	var s = "";
	if (num < 10) s = "0";
	return s + num;
}

function get_timer(num) {
	//日付と時間の設定
	now = new Date();
	
	if (t_time != "") {
		var tt = t_time.split(" ",2);
		var d = tt[0].split("/",3);
		var t = tt[1].split(":",2);
		year = eval(d[0]);
		mon = eval(d[1]);
		day = eval(d[2]);
		hour = eval(t[0]);
		min = eval(t[1]);
	} else {
		if (num == 2) now.setTime(stime);
		//現在の時間
		year = now.getFullYear();
		mon = now.getMonth()+1; //１を足すこと
		day = now.getDate();
		hour = now.getHours();
		min = now.getMinutes();
	}

	set_timer();
}

function set_timer() {
	//日付と時間の設定
	now = new Date();
	
	//予定時刻
	now.setDate(1);
	now.setYear(year);
	now.setMonth(mon-1);
	now.setDate(day);
	now.setHours(hour);
	now.setMinutes(min);
	now.setSeconds(0);		
	now.setMilliseconds(0);		
	stime = now.getTime();
	
	//alert(now + "\n" + year + "/" + mon + "/" + day);
}

//設定ボタン
function set_date() {
	//タイマーモード
	t_mode = 0;
	
	//表題
	get_title();

	//日時
	year = document.form1.sel_year.value;
	mon = document.form1.sel_mon.value;
	day = document.form1.sel_day.value;
	hour = document.form1.sel_hour.value;
	min = document.form1.sel_min.value;
	
	//目標時間
	t_time = year + "/" + mon + "/" + day + " " + hour + ":" + min;
	//現在時間
	set_timer();
	
	//検索部準備
	get_search = "C," + (stime / 10000);

	//タイマー起動
	if (timerID == 0) timerID = setInterval("get_count()",timer_update);
}

function get_title() {
	t_title = document.form1.text_title.value;
	if (t_title == "") t_title = "予定日時";
	cdt1 = t_title + "まで"
	document.getElementById("cdt_title").innerHTML = cdt1;
}

//ワンタッチボタン
function ot_timer(gtime) {
	//タイマーモード
	
	//モード
	var mode = (t_mode == 0) && (SK || AK); //通常モードでシフト加算した場合

	//shiftKeyの判定
	if (SK || MK) {
		//加算
		t_mode += gtime; //表示の時間に加算
		gtime = timer_count + gtime; //進行中の時間に加算
	} else if (AK || CK) {
		t_mode -= gtime; //表示の時間に減算
		gtime = timer_count - gtime; //進行中の時間に減算
	} else {
		//入れ替え
		t_mode = gtime;
	}
	
	//ワンタッチタイマー設定
	ot_timer2(gtime);
	
	if (mode) { 
		t_mode = 0;
	} else {
		//検索部準備
		get_search = "T," + t_mode;
		//表題表示
		document.form1.text_title.value = count_format(t_mode,0) + "後";
		get_title(); //表題
	}
	format_timer(); //フォーム
	
	if (timerID == 0) timerID = setInterval("get_count()",timer_update);
}

//ワンタッチタイマー設定
function ot_timer2(gtime) {
	//日付と時間の設定
	now = new Date();
	
	//予定時刻
	stime = now.getTime() + (gtime * 1000);
	
	//タイマー設定
	now.setTime(stime);
	year = now.getFullYear();
	mon = now.getMonth()+1; //１を足すこと
	day = now.getDate();
	hour = now.getHours();
	min = now.getMinutes();
}

function get_cookie() {
	var c_data;
	var n, m, data
	//保存cookieの読込
	c_data = document.cookie;
	
	//cookie名からデータの切り出し
	n = c_data.indexOf(c_name,0); 
	if (n > -1) {
		/* //データがあった場合 */
		m = c_data.indexOf(";", n + c_name.length); 
		if (m == -1) m = c_data.length; 
		data = c_data.substring(n + c_name.length, m); 
	} else {
		/* //データがなかった場合 */
		data = ""; //
	}

	if (data != "") {
		var t = data.split(",",3);
		t_title = unescape(t[0]);
		t_time = t[1];
		sel_alert = t[2];
	}
}

//保存ボタン
function set_cookie() {
	var c_data,c_date,n,kigen;

	//保存データの準備
	set_date();
	c_data = escape(t_title) + "," + t_time + ",";
	for (n=0;n<document.form1.r_alert.length;n++) {
		if (document.form1.r_alert[n].checked) c_data += n;
	}

	//有効期限
	c_date = new Date();
	n = c_date.getTime() + (60*60*24*c_limit + timer_count)*1000; 
	c_date.setTime(n);
	kigen = c_date.toGMTString();

	//cookieの書き出し
	document.cookie = c_name + c_data + "; expires=" + kigen;
}

//URLボタン
function set_url() {
	if (get_search == "") set_date();
	//else get_title();
	//表題がURLに表示されないように二重化
	get_search += "," + encodeURIComponent(escape(t_title));
	//alert(get_search);
	document.location.href = "?" + get_search;
}

//Twitterボタン
function toTwitter() {
	var n, s, url;

	url = "";

	if (t_mode == 0) {
		s = "【" + tw_title + "】" + cdt1 + cdt2;
	} else {
		s = count_format(t_mode,0);
		s = "【" + s + "タイマー】";
		if (get_search == "") {
			set_date();
		} else {
			//s += cdt1 + cdt2;
		}
		//URL取得
		url = document.location.href;
		n = url.indexOf("?");
		if (n > 0) {
			url = url.substring(0,n);
		}
		url = url + "?" + get_search + "," + encodeURIComponent(escape(t_title));
	}
	
	//文字数制限内ならリンクを追加
	//if ((s + url).length < 140) s += " " + url;
	//ツイート画面に移動
	if (url == "") {
		url = "http://twitter.com/share?text=" + encodeURIComponent(s);
	} else {
		url = "http://twitter.com/share?url=" + url + "&text=" + encodeURIComponent(s);
	}
	window.open(url,"_blank","width=600,height=300");
}

</script>


  
</body>
</html>