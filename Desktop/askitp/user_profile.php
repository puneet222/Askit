



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
	$userid = 

    include("dbcon.php");
   $q = "select First_Name from user where user_ID = \"".$_COOKIE["name"]."\";";
  
   mysql_select_db('askit');
   $result = mysql_query($q,$conn);
  
   $r = mysql_fetch_assoc($result);
    if(!$r){
   	header("location:login.php");
   }
   $username = $r["First_Name"];

   // $userpage = implode($_COOKIE["name"],'.php');

   // implode
   $arr = array($_COOKIE["name"],'.php') ;
   // echo implode("",$arr) ;
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
		
		$userpage = $_COOKIE["name"] ;
   ?>
	
  <a href = "user_profile.php?usernameviaget=<?php echo $_COOKIE['name'] ?>" > <table id="usertable"><tr><td><img src ="images/rounduser.png" id="userpic"></td><td>  <?php echo '  Hello, ' ;
                               echo $username; 
                          ?> </td></tr></table>
                          </a>
   					
		</div>
		<div id="menu">
			<ul>
				
					<a href="index1.php">Home</a>
				</li>
				<li>
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
				<li>
					<li class="first active">
					<a>Profile</a>
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
			<br>
				<h3>
					USER  PROFILE
				</h3>

				<p>

					<?php
						 include("dbcon.php");

						if(!$conn){
							die('Could  not connect'.mysql_error());
						}

						$userid_get = $_GET["usernameviaget"] ;

						// echo "$userid_get" ;

						// echo "working working " ;


						$sqlquery = 'select * from user  where user_ID = "'.$userid_get.'";' ; 

						mysql_select_db('askit');
						$sqlstatus = mysql_query($sqlquery,$conn);
						$data = mysql_fetch_array($sqlstatus , MYSQL_NUM) ;


						if(!$sqlstatus){
							die('Could not run the query '.mysql_error());
						}

						
						


											  
                   ?>

							
					<table id= "usertable2">	<tr>	<td>User name </td>
						<td>:</td>
						<td>	<?php echo "{$data[0]}" ; ?> </td></tr>
							
						<tr>	<td> First Name  </td>
						<td>:</td>
							<td> <?php echo " {$data[2]}  "; ?> </td>
		 				</tr>	
						<tr><td>	Last Name </td>
							<td>:</td>
							<td> <?php echo " {$data[3]}  "; ?></td></tr>
                      
					  <tr><td> Student ID </td>
							<td>:</td>
							<td> <?php echo " {$data[7]}  "; ?></td></tr>

						<tr><td>	Branch </td>
						<td>:</td>
						<td> <?php	echo " {$data[9]}  "; ?></td></tr>

						<tr><td>Date of Birth </td>
							<td>:</td>
							<td> <?php echo " {$data[4]}  "; ?></td></tr> 
							
						<tr><td>	Gender </td>
							<td>:</td>
							<td> <?php echo " {$data[5]}  "; ?></td></tr>

							<tr><td> Year of Graduation </td>
							<td>:</td>
							<td> <?php echo " {$data[6]}  "; ?> </td></tr>

							<tr><td>Programme </td>
							<td>:</td>
							<td> <?php echo " {$data[8]}  "; ?></td></tr>

							<tr><td>Contact </td>
							<td>:</td>
							<td> <?php echo " {$data[10]}  "; ?></td></tr>

							<tr><td>Email_id </td>
							<td>:</td>
							<td> <?php echo " {$data[11]}  "; ?></td></tr>

							</table>	
							<?php 						
							
						


					mysql_close($conn) ;

					?>

					<?php
					if($userid_get == $_COOKIE['name'])
					{
						?>
						<div id = "edit2">
						<table cellspacing="10px">
						<tr>
						<td><a href = "edituserprofile.php">edit profile</a></td>
						<td><a href = "changepassword.php" >change password</a></td>
						</tr>
						</table>
						
						</a>
						</div>

						<?php
					}
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
	&copy; Askit 
</div>
</body>
</html>

