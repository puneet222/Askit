
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type = "text/javascript" src = "a.js">
</script>	
<script type = "text/javascript">
$(document).ready(function(){
	$("#caterr").css("color","red");
	$("#category").on("focus",function(){
		$("#caterr").text("");
	});
		$("#questext").click(function(){
				$('#checkerr').text("");
			});
		$("#checkerr").css("color",'red');
		$("#quesform").submit(function(){
			var x = document.getElementById("category").value;
			var que = document.getElementById("questext").value;
				que = que.trim();
				var len = que.length;
			if (len == 0){
				$("#checkerr").text("This is the required field");
				return false;
			}
			else{
			if(que[len-1] == '?')
				{
					if( x == -1)
					{
						$("#caterr").text("please select category");
						return false;
					}
						else
							;
				}
			else
			{
				$("#checkerr").text("Question must end with a question mark");
			return false;		
			}}
			});
		$("#questext").blur(function(){
			var que = document.getElementById("questext").value;
				que = que.trim();
				var len = que.length;
			if (len == 0){
				$("#checkerr").text("This is the required field");
			}
			else{
			if(que[len-1] == '?')
				;
			else
			{
				$("#checkerr").text("Question must end with a question mark");	
			}}
			});
});
</script>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
	ASK it for PEC
</title>

<link rel="stylesheet" type="text/css" href="css/ask_ques.css" />
<style type="text/css">
	#sitetitle{
		text-align: center;
		font-family: arial;
	}
</style>
</head>
<body>
	<?php
  include("dbcon.php") ;

   $q = "select First_Name from user where user_ID = \"".$_COOKIE["name"]."\";";
   
   mysql_select_db('askit');
   $result = mysql_query($q,$conn);
   $r = mysql_fetch_assoc($result);
   if(!$r){
   	header("location:login.php");
   }
   $username = $r["First_Name"];
?>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1>
				<a href="index1.php">ASK it</a>
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
				<li>
					<a >Categories</a>
				</li>
				<li class="first active">
					<a href="#">ASK</a>
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

			<div class="box" id="box-right">
			<br>
			<br>
				<h4>
					Submit Question
				</h4>
                <br>
                <br>

                <form action = "qid.php" method = "post" id = "quesform">
                Question:<br>
                	<textarea name="ques" id="questext" rows="10" cols="45"></textarea>
                	<div id = "checkerr">
                	</div>
                	<br><br><br>
                    Category :
                    <select name="cat" id="category">
<option value="General">General</option>
<option value="Placement">Placement</option>
<option value="Internship">Internship</option>
<option value="Clubs">Clubs</option>
<option value="Aeronautical">Aerospace</option>
<option value="Civil">Civil</option>
<option value="Computer">Computer Science</option>
 
<option value="Electrical">Electrical</option>
<option value="Electronics">Electronics</option>
<option value="Mechanical">Mechanincal</option>
<option value="Metallury">Metallurgy</option>
<option value="Production">Production</option>
</select>
                    <div id = "caterr">
                    </div>
                    <br><br><br>

                    <input type="checkbox" name = "anonyques" > Ask as annonymous
                    <br><br><br>
                    <input type = "submit" value =" Ask "  id="askbutton" >
                </form>
	
			</div><br class="clearfix" />
		</div>
				
			</div>
			<br class="clearfix" />
		</div>
	<br class="clearfix" />
	</div>


			
	</div>
</div>
</div>

<div id="footer">
	&copy; Askit 
</div>

</body>
</html>

