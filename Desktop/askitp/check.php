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

      
       $username=mysql_real_escape_string($_POST['name']);
       $us="SELECT * FROM user where user_ID='$username'";
       $query= mysql_query($us);

       if($username==NULL) {
       	echo '<span style="color:blue;text-align:center;font-size:13px">Choose Username</span>';
       }
       else if(strlen($username)<4){
       	echo '<span style="color:red;text-align:center;font-size:13px">UserName Too Short</span>';
       }
       else
       if(mysql_num_rows($query)>=1){
       echo '<span style="color:red;text-align:center;font-size:13px;">Username Already Exist .Please provide another User Name</span>';
       }
       else {
       	echo '<span style="color:green;text-align:center;font-size:13px">UserName Available!</span>';
       }

?>