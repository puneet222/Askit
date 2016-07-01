<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
   include("dbcon.php") ;

   $qidget= $_GET['questionid'];   
   $q = "select * from user where user_ID = \"".$_COOKIE["name"]."\";";
   mysql_select_db('askit');
   $result = mysql_query($q,$conn);
  
   $r = mysql_fetch_assoc($result);
    if(!$r){
   	header("location:login.html");
   }
   else
  $op = $r["Password"];
$username = $r["First_Name"];
?>
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
	ASK it for PEC
</title>
<script type = "text/javascript" src = "a.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
	var f=0;
	var g = 0;
	var h = 0;
	var correct = 0;
	$("#op").on("input",function(){

		var x = document.getElementById("op").value;
		$.post("checkpass.php",{pass:x},function(result){
			if (result == 0)
		{
			
			$("#oldpas").text("Password Incorrect");
			$("#oldpas").css("color","red");
			correct = 0;
		}
		else
			{
			$("#oldpas").text("Correct Password");
			$("#oldpas").css("color","green");
			correct = 1;
		}
	}
		);	
	});
	$("#np").on("blur",function(){
		if (f==0)
		$("#newpas").text("");
		else
			$("#newpas").text("Valid password !!");
	});
	$("#op").on("blur",function(){
		var x = document.getElementById("op").value;
		if (x == '<?php echo $op?>')
		{
		
			$("#oldpas").text("Correct Password");
			$("#oldpas").css("color","green");
		}
		else
			$("#oldpas").text("");
	});
	$("#cp").on('input',function(){
		var x = document.getElementById("np").value;
		var y = document.getElementById("cp").value;
		if (x==y)
		{	$("#confpas").text("Password Matched");
			$("#confpas").css("color","green");
			h = 1;
	}
	else
	{
		h = 0;
		$("#confpas").text("Password did'nt match");
			$("#confpas").css("color","red");
	}
	});
	$("#np").on("input",function(){
		var x = document.getElementById("np").value;
		 f = fun(x);
		if (f==0)
			{
			$("#newpas").text("Too Short");
			$("#newpas").css("color","red");
			g = 0;
		}
		else
		{
			
			f = check(x);
			if (f == 0)
			{
				$("#newpas").text("Password should be alphanumeric");
			$("#newpas").css("color","red");
				g =1;
			}
			else
			{
				g=2;
				$("#newpas").text("Valid password !!");
			$("#newpas").css("color","green");
			}
		}	
	});
	$("#changeform").submit(function(){
		
		var x = document.getElementById("op").value;
		if (correct == 0)
		{
			
			$("#oldpas").text("Password Incorrect");
			$("#oldpas").css("color","red");
			return false;
		}
		else
			if (g==0)
			{
			$("#newpas").text("Too Short");
			$("#newpas").css("color","red");
			return false;
		}
		else
		{
			
			if (g == 1)
			{
				$("#newpas").text("Password should be alphanumeric");
			$("#newpas").css("color","red");
				return false;
			}
			else
			{
				if(h==0)
				{
					$("#confpas").text("Password did'nt match");
			$("#confpas").css("color","red");
				}
					else
						;
			}
		}	
	});
function fun(str){
	if(str.length < 8)
		return 0;
	else
		return 1;
}
function check(str){
	var al = 0;
	var num = 0;
	var i;
	for (i = 0;i<str.length;i++)
	{
		if((str[i] >='a'&&str[i]<='z')||(str[i] >='A'&&str[i]<='Z'))
			{
				al = 1;
			}
			else
			{
				if(str[i]>='0'&&str[i]<=9)
					num = 1;
			}
	}
		return al * num;
 
}
});

</script>
<link rel="stylesheet" type="text/css" href="css/home_style.css" />
<style type="text/css">
	#sitetitle{
		text-align: center;
		font-family: arial;
	}

	#question{
		font-size: 125%;
	}
</style>
</head>
<body>
	
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1>
				<a href="#">ASK it</a>
			</h1>
		</div>
		<div id="search">
			<form action="search.php" method="post">
				<div>
					<input class="text" name="search" size="50" maxlength="64" placeholder = "Search question"/>
					<input type ="submit" value="search" name="searchbutton" id="searchbutton">
				</div>
			</form>
		</div>
		<div id="logout">
			<form action="delete_cookie.php" method="post">
					<input type="submit" value = " logout " id="logbutton">
							</form>
		</div>
		<div id="account">
			
			
  <a href = "user_profile.php?usernameviaget=<?php echo $_COOKIE['name'] ?>" > <table id="usertable"><tr><td><img src ="images/rounduser.png" id="userpic"></td><td>  <?php echo '  Hello, ' ;
                               echo $username; 
                          ?> </td></tr></table>
                          </a>
		</div>
				<div id="menu">
			<ul>
				<li >
					<a href="index1.php">Home</a>
				</li>
				<li >
					<a href="category.php">Categories</a>
				</li>
				<li>
					<a href="askques.php">ASK</a>
				</li>
				<li>
					<a href="answeques.php">Answer</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="help.php">Help</a>
				</li>
				<li class="last">
					<a href="contact.php">Contact</a>
				</li>
			</ul><br class="clearfix" />
		</div>
	</div>

	<div id="page">
		<!-- <div id="content"> -->
			<div class="box">
				


				<div class="box" id = "box-left">

			<h3>
					CATEGORIES
					<br>
					<br>
				</h3>

				<ul class="list">
					<li class="first">
						<a href="category.php?category=General">General</a>
					</li>
					<li>
						<a href="category.php?category=Placement">Placement</a>
					</li>
					<li>
						<a href="category.php?category=Internship">Intership</a>
					</li>
					<li>
						<a href="category.php?category=Clubs">Clubs</a>
					</li>
					
					<li>
						<a href="category.php?category=Aeronautical">Aeronautical</a>
					</li>
					<li>
						<a href="category.php?category=Civil">Civil</a>
					</li>
					<li>
						<a href="category.php?category=Computer">Computer Science</a>
					</li>
					<li>
						<a href="category.php?category=Electrical">Electrical</a>
					</li>
					<li>
						<a href="category.php?category=Electronics">Electronics</a>
					</li>
					<li>
						<a href="category.php?category=Mechanical">Mechanical</a>
					</li>
					<li>
						<a href="category.php?category=Metallurgy">Metallurgy</a>
					</li>
					<li>
						<a href="category.php?category=Production">Production</a>
					</li>
					
					
				</ul>
			</div>
			<center>

			<h4>Change your password:</h4>
			<br>
				<form action = "passwordchange.php" method = "post" id = "changeform">
				<table id ="changepasswordtable" cellpadding="15" cellspacing="15">
					<tr>
						<td>Old Password</td>
						<td>:</td>
						<td><input type = "password" name = "oldpass" id = "op"></td>
						<td>
								<div id = "oldpas">
						
					</div>
						</td>					
					</tr>
					
					
					<tr>
						<td>New Password</td>
						<td>:</td>
						<td><input type = "password" id = "np" name = "pass"></td>
						<td>
						<div id = "newpas">
						
					</div>
						</td>
					</tr>
					<tr>
						<td>Confirm Password</td>
						<td>:</td>
						<td><input type = "password" id = "cp" name = "confpass"></td>
						<td>
						
					<div id = "confpas">
						
					</div>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<input type = "submit" value = "done" id = "sub">
			</form>
			
					
					

			</center>

	</body>

	</html>