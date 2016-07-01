<?php 
$user =$_GET['user'];

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Ask It Sign In</title>

  

  <link rel="stylesheet" href="css/animate.css">
  <!-- Custom Stylesheet -->
  <link rel="stylesheet" href="css/login_style.css">
  <style type="text/css">
  #green{
    color: green;
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

       <div id ="green"> You have successfully registered .</div>
      <br>
      <label for="username">Username</label>
      <br/>
      <input type="text" id="username" name="user" value="<?php echo $user;?>">
      <br/>
      <label for="password">Password</label>
      <br/>
      <input type="password" id="password" name="pass">
      <br/>
      <button type="submit">Sign In</button>
      <br/>
      </form>
      
      <a href="#"><p class="small">Forgot your password?</p></a>
      <a href="signup.html"><p class="small">Register</p></a>
    </div>
  </div>


</body>



</html>