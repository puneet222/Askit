<?php 

$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='Incorrect';
$conn_error='could not connect';

$dbhandle=mysql_connect($mysql_host,$mysql_user,$mysql_pass)
or die($conn_error);

$data_connect='askit';

$selected=mysql_select_db($data_connect)
or die("could not connect");


 if(isset($_POST['username'])){
    
    $username=$_POST['username'];
    
    $firstname=$_POST['First_Name'];
    $lastname=$_POST['Last_Name'];
    $pass=$_POST['pass'];
    $sid =$_POST['SID'];
    $date=$_POST['date'];
    $email=$_POST['Email_Id'];
    $mobile=$_POST['Mobile_Number'];
    $gender=$_POST['Gender'];
    $grad=$_POST['GRAD'];
    $pro=$_POST['PRO'];
    $password_hash=md5($pass);
    $branch = $_POST['BRANCH'];  
     
      
      
      //inserting data into database

       $sql = 'INSERT INTO user  
      VALUES ( "'.$username.'", "'.$password_hash.'","'.$firstname.'", "'.$lastname.'", "'.
      $date.'", "'.$gender.'", '. $grad.', "'.$sid.'", "'.
      $pro.'", "'.$branch.'", "'.$mobile.'", "'.$email.'");';

      //sending query to sql
      $query_run =mysql_query($sql);

      if($query_run) {
     ?>
   
 <META http-equiv="refresh" content="0;URL=aftersignup.php?user=<?php echo $username?>">

        <?php 
      }
      else
      echo 'Query unsuccessfull';
    
}   
      


      ?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <script type = "text/javascript" src = "js/jquery-latest.js"></script>
    <script type = "text/javascript" src = "aa.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Ask it Sign UP</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <script type="text/javascript" src="a.js"></script>
  <script type="text/javascript">
   $( document ).ready(function() {
    $('#content').load('check.php').show();
  

   $('#user_name').keyup(function(){
    //$.post(url,data,callback)
   
     $.post("check.php",{name:form.username.value}, //data sending with request to server
      function(result){         //required callback function response receives - whatever written in echo of above php script 
       $('#content').html(result).show();
      }).blur(function(){
        $('#content').text('');
      });
   });
   });
  </script>

    <script type="text/javascript">
    
 
  
    
    function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

     for(var i=0; i<password.length; i++)
      {
        var char1 = password.charAt(i);
        var cc = char1.charCodeAt(0);

        if((cc>47 && cc<58) || (cc>64 && cc<91) || (cc>96 && cc<123))
        {
          if(password.length>=8){
         $("#pass").html("Password valid");
         $("#pass").css("color","green");
         }
        else{
        $("#pass").html("Password too short");
         $("#pass").css("color","red");
         }
         }
         else {
         $("#pass").html("Password not alphanumeric");
          $("#pass").css("color","red");
        
          return false;
        }
    }
 }


  </script>



<script type="text/javascript">

 function Validate()
        {


        // create array containing textbox elements
        var inputs = [document.getElementById('user_name'),document.getElementById('GRAD'),document.getElementById('gender'),document.getElementById('emailid'),document.getElementById('branch'),document.getElementById('date')];

        var error;

        for(var i = 0; i<inputs.length; i++)
        // loop through each element to see if value is empty
        {
            if(inputs[i].value == '')
            {
                error = 'Please fill all fields';
                $("#confpas").html(error);
                $("#confpas").css("color","red");
                return false;
                }
        }
     }
      
</script>
  
    
</head>

<body>
  <div class="container">
    <section class="register">
      <h1>ASK IT</h1>
      <form onsubmit="return Validate();" name="form" action="s4a.php" method="POST" id = "form">
      <div class="reg_section personal_info">
      <h3>Your Personal Information</h3>
     
      <input type="text"   id="user_name" placeholder="Your Desired Username " name="username">
      <div id="content"></div>
      <h3>First Name</h3>
      <input type="text" name="First_Name" id = "fname" value="<?php echo $firstname; ?>" placeholder="Your firstname ">
      <div id="fnamediv"></div>
      <h3>Last Name</h3>
      <input type="text" name="Last_Name" id="lname" value="<?php echo $lastname; ?>" placeholder="Your Lastname ">
      <div id="lnamediv"></div>
      <h3>SID</h3>
      <input type="text" name="SID" value="<?php echo $sid; ?>" placeholder="Sid" id="Sid">
      <div id="siddiv"></div>
      <h3>Date Of Birth</h3>
      <input type="date" name="date" value="<?php echo $date; ?>" placeholder="Date:format yyyy/mm/dd" id="date">
      <h3>Email Address</h3>
       <input type="text" name="Email_Id" id="emailid" value="<?php echo $email; ?>" placeholder="Your E-mail Address">
       <div id="sp"></div>
      <!--script for javascript-->
       <script type="text/javascript" src="js/jquery-latest.js"></script>
      <script type="text/javascript" src="js/aj_email.js"></script>
       <h3>Branch</h3>
      <select name="BRANCH" id="branch">

        <option value="-1">Branch:</option>
        <option value="Aerospace">Aerospace</option>
        <option value="Civil">Civil</option>
        <option value="Computer science">Computer Science</option>
        <option value="Electrical">Electrical</option>
        <option value="Electronics">Electonics</option>
        <option value="Mechanical">Mechanical</option>
        <option value="Metallurgy">Metallurgy</option>
        <option value="Production">Production</option>
       </select>
      

      <h3>programme</h3>
      BE <input type="radio" name="PRO" value="BE" id="prog"/>
      ME <input type="radio" name="PRO" value="ME" id="prog" />
      PHD <input type="radio" name="PRO" value="PHD" id="prog" />
       <h3>Year of Graduation</h3>
      <select name="GRAD" id="GRAD">
        <option value="-1">Year:</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
        <option value="2029">2029</option>
        <option value="2030">2030</option>
        </select>
      
      <h3>Mobile Number</h3>
      <input type="text" name="Mobile_Number" value="<?php echo $mobile; ?>" placeholder="Your mobile number" id="mob">
      <div id="mobdiv"></div>
      <h3>Gender</h3>
      Male <input type="radio" name="Gender" value="MALE" id="gender" />
      Female <input type="radio" name="Gender" value="FEMALE" id="gender"/>


      </div>
      <div class="reg_section password">
      <h3>Your Password</h3>
      <input type="password" name="pass" value="" placeholder="Your Password" id="np" >
      <div id="newpas"></div>
      <h3>Confirm Password</h3>
      <input type="password" name="confirm" value="" placeholder="Confirm Password" id="cp" >
      <div id="confpas"></div>
      <p class="submit"><input type="submit" name="commit" value="Sign Up"></p>
      </form>
      </section>
      </div>
      <div id="footer">
  &copy; Askit 
</div>
</body>
</html>