
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>AskIt Sign In</title>

	



	<link rel="stylesheet" href="css/login_style.css">
	<style type="text/css">
	   #wrpass{
	   	color: red;
	   
	   }
	</style>

</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">AskIt </span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<form action = "logintest.php" method = "POST">
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username" name="user">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="pass">
			<br/>
			<button type="submit">Sign In</button>
			<br/>
			</form>
			<div id ="wrpass">
			  Invalid username or password
			</div>
			<a href="s4a.php"><p class="small">Register</p></a>
		</div>
	</div>


</body>



</html>