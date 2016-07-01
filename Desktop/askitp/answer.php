



<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
	ASK it for PEC
</title>

<link rel="stylesheet" type="text/css" href="css/home_style.css" />
<style type="text/css">
	#sitetitle{
		text-align: center;
		font-family: arial;
	}
</style>
</head>
<body>
	<?php
    include("dbcon.php");
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

			<div class="box" id="box-right">
			<br>
			<br>
				<h3>
					Answer a question:
				</h3>
                <br>
                <br>
                <h4>
                Question:
                </h4>

                <p>
                <?php 
                $ques_id = $_GET["questionid"] ;
                $sqlquery = 'select * from Questions where Q_ID = "'.$ques_id.'";' ;

						


						mysql_select_db('askit');
						$sqlstatus = mysql_query($sqlquery,$conn);


						if(!$sqlstatus){
							die('Could not run the query '.mysql_error());
						}
						$row = mysql_fetch_array($sqlstatus);

                        ?>
						 
						 <a href="question.php?questionid=<?php echo $row['Q_ID'] ?>">
							<?php

							echo "{$row['Question']}<br>" ;?></a>

						


               </p>
                <br>

                <form action = "answerbackend.php?questionid=<?php echo $row[0]?>" method = "post">
                Your answer:<br>
                	<textarea name="ans" id="questext" rows="10" cols="45" required></textarea>
                	<br><br><br>
                    
                    

                    <input type="checkbox" name = "anonyans"> Answer as annonymous
                    <br><br><br>
                    <input type = "submit" value =" answer "  id="askbutton" >
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

