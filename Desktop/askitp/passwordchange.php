<?php
  include("dbcon.php");
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
 $username = $_COOKIE["name"];
   $q = "select * from user where user_ID = \"".$_COOKIE["name"]."\";";
   mysql_select_db('askit');
   $result = mysql_query($q,$conn);
  
   $r = mysql_fetch_assoc($result);
    if(!$r){
   	header("location:login.html");
   }
   else
   ;
   $st = "update user set Password = '".md5($_POST["pass"])."' where user_ID = \"".$_COOKIE["name"]."\";";
  echo $st;
  	mysql_query($st,$conn);
  	header("location: user_profile.php?usernameviaget=$username");
?>