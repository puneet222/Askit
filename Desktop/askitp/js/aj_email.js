function validate_email(email){
  $.post('check_email.php',{email:email},function(data){
     $('#sp').text(data);
  });
}


$('#emailid').focusin(function(){
	if($('#emailid').val()==''){
   $('#sp').text('enter a valid email address');
}else{
  validate_email($('#emailid').val());
  
}
}).blur(function(){
   $('#sp').text('');
}).keyup(function(){
 validate_email($('#emailid').val());
  //$('#sp').text(result);
});