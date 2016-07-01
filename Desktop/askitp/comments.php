



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
						<a href="category.php?category=Internship">Clubs</a>
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
					
					</li>
				</ul>
			</div>

			<div class="box" id="box-right">
			<br>
			<br>
				
               
                <h4>
                Question:
                </h4>

                <p id ="question">
                <?php 
                $ques_id = $_GET["questionid"] ;
                $ans_id = $_GET["answerid"];
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


						<?php	$ansquery="select * from answers where  answer_ID='$ans_id';";
                             
                           mysql_select_db('askit');
                           $ansq = mysql_query($ansquery,$conn);
                           if(!$ansq){
							die('Could not '.mysql_error());
							}

							$ansrow = mysql_fetch_array($ansq);
						
							?>

						


               </p >

                <br>
                Answer:
                <br>

                <p id ="answer">
                <?php echo "{$ansrow['answer']}";
                ?>
                </p>
                <br>

                <form action = "commentbackend.php?questionid=<?php echo $ques_id?>&answerid=<?php echo $ans_id?>" method = "post">
                Your comment:<br>
                	<textarea name="comment" id="questext" rows="5" cols="45" required></textarea>
                	<br>
                    <input type = "submit" value ="Comment "  id="askbutton" >
                </form>
                <br>

                Comments:<br>

                <?php

                   $ansquery="select * from comments where  answer_ID='$ans_id' order by date_added desc;";
                             
                           mysql_select_db('askit');
                           $comq = mysql_query($ansquery,$conn);
                           if(!$comq){
							die('Could not '.mysql_error());
							}

							$comrow = mysql_fetch_array($comq);  


							if(!$comrow){
							  	echo "<br>Sorry!! , no comment available.";
							  }
							  else{
							  	while ($comrow) {
						  		
						  	
							
							
						  	echo "<br> {$comrow['comment']} ";
						  	
						  	?>
						  	<br>
						  	<table id="answeroptionstable" >
						  	<tr>
						  	<td>
							 <a href ="user_profile.php?usernameviaget=<?php echo "{$comrow['user_ID']}" ?> " ><?php echo "{$comrow['user_ID']}"?> </a> 
						  	
						  	</td>
						  		<td>
						  	
						  <?php
						  $cidd = $comrow['C_ID'];
						  $uname = $_COOKIE['name'];
						  $quer = "select * from report_comment where user_ID = '$uname' and C_ID = '$cidd'";
						  mysql_select_db("askit");
		
		$count_query = mysql_query($quer , $conn) ;
		$abuses = mysql_fetch_array($count_query) ;
						  if(!$abuses){
						  ?>

			<a href ="reportcomment.php?cid=<?php echo "{$comrow['C_ID']}" ?>&ques=<?php echo $ques_id?>&ans=<?php echo $ans_id?>" >report</a> 
						  	</td>
							<?php
}
else
echo "reported </td>";
							?>
							
							<td>
							<?php echo " {$comrow['date_added']}   ";?></td>
							</tr>
							
							</table>
							
							
							<div id = "quessep">
							
                            
                            __________________________________________________________________________
							</div>

               <?php $comrow = mysql_fetch_array($comq);
               } }?>
	
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