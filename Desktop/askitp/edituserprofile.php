<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
	<script type = "text/javascript" src = "a.js">
	</script>
	
	<script type = "text/javascript"  src = "profilecode.js">
	
	</script>
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

	#question{
		font-size: 125%;
	}
</style>
</head>
<body>
	<?php
   include("dbcon.php");

   $qidget= $_GET['questionid'];   
   $q = "select * from user where user_ID = \"".$_COOKIE["name"]."\";";
  
   mysql_select_db('askit');
   $result = mysql_query($q,$conn);
  
   $r = mysql_fetch_assoc($result);
    if(!$r){
   	header("location:login.html");
   }
   else
   $username = $r["First_Name"];

	$fn = $r[First_Name];
	$ln = $r[Last_Name];
	$dob = $r[DOB];
	$gender = $r[gender];
	$ygrad = $r[Year_of_graduation];
	$sid = $r[SID];
	$prgm = $r[Programme];
	$branch = $r[Branch];
	$cntct = $r[contact];
	$email = $r[email_ID];
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
					<a >Question</a>
				</li>
				<li>
					<a href="askques.php">ASK</a>
				</li>
				
				<li>
					<a >Search</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="#">Help</a>
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
					<li>
						<a href="category.php?category=Placement">Placement</a>
					</li>
					<li>
						<a href="category.php?category=Internship">Intership</a>
					</li>
					</li>
				</ul>
			</div>
			<center><form id = "userform" action = "userchangebackend.php" method = "post">
				<table>
					<tr>
							<td> First Name <td>:
							<td> <input id = "fn" type = "text" name = "First_Name" value = "<?php echo $fn?>">
								<td id = "fndiv">
							</tr>
							<tr>
							<td> Last Name <td>:
							<td> <input id = "ln" type = "text" name = "Last_Name" value = "<?php echo $ln?>" >
							<td id = "lndiv">
							</tr>
							<tr>
							<td> Date of Birth <td>:
							<td> <input type = "date" name = "DOB"value = '2013-12-31'>
							<td id = "dobdiv">
							</tr><tr>
							<td> Gender <td>:
							<td>
								<input type = "radio" name = "gender" value = "MALE"<?php if($gender=='MALE') echo 'checked';?>> male
								<input type = "radio" name = "gender" value = "FEMALE"<?php if($gender=='FEMALE') echo 'checked';?>> female
							<td id = "gdiv">
							</tr>
							<td> Year_of_graduation <td>:
							<td> <select name="Year_of_graduation" id="GRAD">

<option value="2030" <?php if($ygrad=='2030') echo 'selected';?>>2030</option>
<option value="2029" <?php if($ygrad=='2029') echo 'selected';?>>2029</option>
<option value="2028" <?php if($ygrad=='2028') echo 'selected';?>>2028</option>
<option value="2027" <?php if($ygrad=='2027') echo 'selected';?>>2027</option>
<option value="2026" <?php if($ygrad=='2026') echo 'selected';?>>2026</option>
<option value="2025" <?php if($ygrad=='2025') echo 'selected';?>>2025</option>
<option value="2024" <?php if($ygrad=='2024') echo 'selected';?>>2024</option>
<option value="2023" <?php if($ygrad=='2023') echo 'selected';?>>2023</option>
<option value="2022" <?php if($ygrad=='2022') echo 'selected';?>>2022</option>
<option value="2021" <?php if($ygrad=='2021') echo 'selected';?>>2021</option>
<option value="2020" <?php if($ygrad=='2020') echo 'selected';?>>2020</option>
<option value="2019" <?php if($ygrad=='2019') echo 'selected';?>>2019</option>
<option value="2018" <?php if($ygrad=='2018')echo "selected";?>>2018 </option>
<option value="2017" <?php if($ygrad=='2017') echo 'selected';?>>2017</option>
<option value="2016" <?php if($ygrad=='2016') echo 'selected';?>>2016</option>

</select>
							</tr>
							<td> SID <td>:
							<td> <input type = "text" id = "SID" name = "SID" value = "<?php echo $sid?>">
							<td id = "sdiv">
							</tr>
							<td> Programme <td>:
							<td> <input type="radio" name="Programme" value="BE" <?php if($prgm == 'BE') echo 'checked';?>> BE 
							<input type="radio" name="Programme" value="ME" <?php if($prgm == 'ME') echo 'checked';?>> ME
							<input type="radio" name="Programme" value="PHD" <?php if($prgm == 'PHD') echo 'checked';?>> PHD
							</tr>
							<td> Branch <td>:
							<td> <select name="Branch" id="Branch">
      
<option value="Aerospace" <?php if($branch=='Aerospace') echo 'selected';?>>Aerospace</option>
<option value="Civil" <?php if($branch=="Civil") echo 'selected';?>>Civil</option>
<option value="Computer science" <?php if($branch=='Computer science') echo 'selected';?>>Computer Science</option>
 
<option value="Electrical" <?php if($branch=='Electrical') echo 'selected';?>>Electrical</option>
<option value="Electronics" <?php if($branch=='Electronics') echo 'selected';?>>Electronics</option>
<option value="Mechanical" <?php if($branch=='Mechanical') echo 'selected';?>>Mechanincal</option>
<option value="Metallurgy" <?php if($branch=='Metallurgy') echo 'selected';?>>Mettalurgy</option>
<option value="Production" <?php if($branch=='Production') echo 'selected';?>>Production</option>
							</select>
							</tr>
							<td> contact <td>:
							<td> <input type = "text" name = "contact" id = "contact" value = "<?php echo $cntct?>">
							<td id = "cdiv">
							</tr>
							<td> email_ID <td>:
							<td> <input type = "text" id = "email" name =" email_ID" value = "<?php echo $email?>">
							<td id = "ediv">
							</tr>
						<br>
						</table>
						<br>
						<div id = "sssub"><input type = "submit" value = "Submit">		
							</div>
			</form>
		</center>
	</body>
	</html>