



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
   $dbhost = 'localhost'; 
   $dbuser = 'root'; 
   $dbpass = 'Incorrect'; 
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   $q = "select First_Name from user where user_ID = \"".$_COOKIE["name"]."\";";
  
   mysql_select_db('askit');
   $result = mysql_query($q,$conn);
  
   $r = mysql_fetch_assoc($result);
    if(!$r){
   	header("location:login.php");
   }
   $username = $r["First_Name"];

   // $userpage = $_COOKIE["name"];
   // echo $userpage ;
?>
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

		<?php
		$arr = array($_COOKIE["name"],'.php') ;
   // echo  $_COOKIE["name"].'.php';
   			// $userpage = $_COOKIE["name"].'.php' ;
		$userpage = $_COOKIE["name"] ;
   ?>
			
					
  <a href = "user_profile.php?usernameviaget=<?php echo $_COOKIE['name'] ?>" > <table id="usertable"><tr><td><img src ="images/rounduser.png" id="userpic"></td><td>  <?php echo '  Hello, ' ;
                               echo $username; 
                          ?> </td></tr></table>
                          </a>
   					
		</div>
		<div id="menu">
			<ul>
				<li class="first active">
					<a href="index1.php">Home</a>
				</li>
				<li>
					<a href="category.php">Categories</a>
				</li>
				<li>
					<a href="askques.php">ASK</a>
				</li>
				<li>
					<a href="#">Search</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="#">Links</a>
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
				


					<div class="box" id="box-left">
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
					<li>
						<a href="category.php?category=Placement">Placement</a>
					</li>
					<li>
						<a href="category.php?category=Internship">Intership</a>
					</li>
					</li>
				</ul>
			</div>

			<div class="box" id="box-right">
			<br>
			<br>

			 <h2>
				Welcome to ASK it
				</h2>
				<br>
				<br>
				<h3>
					QUESTIONS
				</h3>

				<p>

					<?php
						$connection = mysql_connect('localhost' , 'root' , 'Incorrect' ) ;

						if(!$connection){
							die('Could  not connect'.mysql_error());
						}

						$ques_id = $_GET["questionid"] ;

						// echo $ques_id ;



						$sqlquery = 'select * from Questions where Q_ID = "'.$ques_id.'";' ;

						// echo $sqlquery ;


						mysql_select_db('askit');
						$sqlstatus = mysql_query($sqlquery,$connection);


						if(!$sqlstatus){
							die('Could not run the query '.mysql_error());
						}


						  while ($row = mysql_fetch_array($sqlstatus, MYSQL_NUM)) {

							
							?>
							<a href="question.php?questionid=<?php echo $row[0] ?>">
							<?php

							echo "{$row[1]}<br>" ;?></a>
		

						<?php


							$sqlquery2 = "select First_Name from user where user_ID = '$row[2]'" ;
					 
							
							mysql_select_db('askit');
							$sqlstatus2 = mysql_query($sqlquery2,$connection);


							if(!$sqlstatus2){
								die('Could not run the query '.mysql_error());
							}

							$query2_result = mysql_fetch_array($sqlstatus2) ;

							$display_name = $query2_result["First_Name"] ;

							// echo $display_name ;

							?> 
							<?php
								if($row[8]=='y')
									echo "anonymous";
								else{
							?>
							<a href="user_profile.php?usernameviaget=<?php echo $row[2] ?>">
							<?php

							//put $display_name after echo below this line to display the firtname of the user who asked the question

							echo $row[2]."  <br> ";}?> </a>



							<form action = "answerbackend.php?questionid=<?php echo $row[0] ?>" method = "post">
							                Type an answer... <br>
							                	<textarea name="answer" id="questext" rows="10" cols="45"></textarea>
							                	<br><br><br>
							                    
							                    <br><br><br>

							                    <input type="checkbox" name = "anonyans" > Ask as annonymous
							                    <br><br><br>
							                    <input type = "submit" value =" Answer "  id="askbutton"> 
							</form>


							
							<?php
							echo "____________________________________________<br>";
							
						}


					mysql_close($connection) ;
					?>
				</p>
				
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
	&copy; SiteName | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>
</div>
</body>
</html>

