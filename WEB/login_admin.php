﻿<?php
session_start();
  require_once('Config/SQLServer.php');
  $mysqli =  MySQLi();
  if($mysqli->connect_errno){
  echo $mysqli->connect_errno.";".$mysqli->connect_errnor;
  } 
 mysqli_set_charset($mysqli,'utf8');
$error_message = "";
if(isset($_POST["login"]) && $_POST["login"]){
	$id= $_REQUEST['ID'];
	$select ="select count(module_ID) as num from water_level where module_ID ='$id'";
	$stmt =$mysqli->query($select);
   foreach($stmt as $row){
		 if($row['num']==1){
       $_SESSION["ID"] = $_REQUEST["ID"];
       $url = "admin_con.html?ID=".$id;
       header("Location:" .$url);
      exit;
     }
    }
  
	
		
	
$error_message ="ID,パスワードが間違っています。";
    }
?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/config.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/drawer.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/iscroll.js"></script>
    <script src="js/drawer.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>

    <title>AMIZDAS Login</title>
  </head>

  <body class="drawer drawer--right">
    <button type="button" class="drawer-toggle drawer-hamburger">
      <span class="sr-only">toggle navigation</span>
      <span class="drawer-hamburger-icon"></span>
    </button>
    <nav class="drawer-nav">
      <ul class="drawer-menu">
        <p>メニュー</p>
        <li><a href="index.html">topページへ</a></li>
        <li><a href="login_mypage.php">マイページへ</a></li>
        <li><a href="login_admin.php">管理者ページへ</a></li>
      </ul>
    </nav>

    <div class="minititle">
	     設置者ページログイン
    </div>
		<div class="conf">
		  <p>水位計本体に書かれている水位計IDを入力してください。</p>
		  <b> 水位計ID：</b><input type="text" name="name">
		  <br>
		  <div class="button">
	      		<input type="submit" onclick="location.href='admin_con.html'"value="ログイン">
	      		<a href="javascript:history.back()"><input type="button"  value="キャンセル"></a>
		  </div>
		</div>
	<body>
</html>
<?php
if($error_message){
	echo $error_message;
}
?>
