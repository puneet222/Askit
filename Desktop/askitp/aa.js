$(document).ready(function(){
var fne = 1;
var fnf = 1;
var lne=1;
var lnf=1;
var side=1;
var sida=1;
var sids=1;
var mobe=1;
var moba=1;
var h=0;
var g=0;
var f=0;

function alpha(x){
var ln = x.length;
for(i= 0;i<ln;i++){
if((x[i]>='a'&&x[i]<='z')||(x[i]>='A'&&x[i]<='Z'))
  ;
else
  return 0;

}
return 1;
}

function num(x){
var ln = x.length;
for(i= 0;i<ln;i++){
if((x[i]>='0'&&x[i]<='9'))
  ;
else
  return 0;

}
return 1;
}

 $("#fname").on("blur",function(){
  $("#fnamediv").text("");
 });
    $("#fname").on("input",function(){
     var x = document.getElementById("fname").value;
     if(x.length ==0){
      $("#fnamediv").text("Provide firstname");
       $("#fnamediv").css('color','red');
      fne =1;
     }
      else{
        fne = 0;
     if(alpha(x)==0)
     {$("#fnamediv").text("Only alphabets are allowed");
        $("#fnamediv").css('color','red');
      fnf = 1;
     }
     else
     { $("#fnamediv").text("Valid First Name");
       $("#fnamediv").css('color','green');
        fnf = 0;
    }
    }
    });


$("#lname").on("blur",function(){
  $("#lnamediv").text("");
 });
    $("#lname").on("input",function(){
     var x = document.getElementById("lname").value;
     if(x.length ==0){
      $("#lnamediv").text("Provide lastname");
       $("#lnamediv").css('color','red');
      lne =1;
     }
      else{
        lne = 0;
     if(alpha(x)==0)
     {$("#lnamediv").text("Only alphabets are allowed");
      $("#lnamediv").css('color','red');
      lnf = 1;
     }
     else
     { $("#lnamediv").text("Valid last Name");
        $("#lnamediv").css('color','green');
        lnf = 0;
    }
    }
    });



$("#Sid").on("blur",function(){
 $("#siddiv").text("");
});

$("#Sid").on("input",function(){
  var x=document.getElementById("Sid").value;
  if(x.length==0){
    $("#siddiv").text("Provide sid");
     side=1;
  }
  else{
    side=0;
    if(num(x)==0){
      $("#siddiv").text("Only digits are allowed");
      $("#siddiv").css('color','red');
      sida=1;
    }
    else {
      
       if(x.length==8)
        {
       $("#siddiv").text("Sid is Valid");
       $("#siddiv").css('color','green');
       sida=0;
       sids=0;
       }
        else
          {
        $("#siddiv").text("Sid should be of 8 digits");
        $("#siddiv").css('color','red');
        sids=1;
        sida=0;
        }
    
     }
    }
  });


$("#mob").on("blur",function(){
 $("#mobdiv").text("");
});

$("#mob").on("input",function(){
  var x=document.getElementById("mob").value;
  if(x.length==0){
    $("#mobdiv").text("Provide Contact Number");
    $("#mobdiv").css('color','red');
     mobe=1;
  }
  else
    {
    mobe=0;
    if(num(x)==0){
      $("#mobdiv").text("Only digits are allowed");
      $("#mobdiv").css('color','red');
      sida=1;
    }
    else {
       if(x.length==10)
       {
       $("#mobdiv").text("Contact number is Valid");
       $("#mobdiv").css('color','green');
       moba=0;
       mobs=0;
       }
      else
        {
        $("#mobdiv").text("Contact number should of 10 digits");
        $("#mobdiv").css('color','red');
        mobs=1;
        moba=0;
        }
    }
  }
});


function fun(str){
  if(str.length < 8)
    return 0;
  else
    return 1;
}
function check(str){
  var al = 0;
  var num = 0;
  var i;
  for (i = 0;i<str.length;i++)
  {
    if((str[i] >='a'&&str[i]<='z')||(str[i] >='A'&&str[i]<='Z'))
      {
        al = 1;
      }
      else
      {
        if(str[i]>='0'&&str[i]<=9)
          num = 1;
      }
  }
    return al * num;
 
}

$("#cp").on('input',function(){
    var x = document.getElementById("np").value;
    var y = document.getElementById("cp").value;
    if (x==y)
    { $("#confpas").text("Password Matched");
      $("#confpas").css("color","green");
      h = 1;
  }
  else
  {
    h = 0;
    $("#confpas").text("Password did'nt match");
      $("#confpas").css("color","red");
  }
  });
  $("#np").on("input",function(){
    $("#confpas").text("");
    var x = document.getElementById("np").value;
     f = fun(x);
    if (f==0)
      {
      $("#newpas").text("Too Short");
      $("#newpas").css("color","red");
      g = 0;
    }
    else
    {
      f = check(x);
      if (f == 0)
      {
        $("#newpas").text("Password should be alphanumeric");
        $("#newpas").css("color","red");
        g =1;
      }
      else
      {
        g=2;
        $("#newpas").text("Valid password !!");
      $("#newpas").css("color","green");
      }
    } 
  });



    

$("#form").submit(function(){
  
  if(fne ==1)
{
  $("#fnamediv").text("Provide Firstname");
  $("#fnamediv").css('color','red');
  return false;
}

   if(fnf == 1)
{
  $("#fnamediv").text("Only Alphabets are allowed");
  $("#fnamediv").css('color','red');
  return false;
} 



  if(lne ==1)
{
  $("#lnamediv").text("Too Short");
  $("#lnamediv").css('color','red');
  return false;
}
 if(lnf == 1)
{
  $("#lnamediv").text("Only Alphabets are allowed");
  $("#lnamediv").css('color','red');
  return false;
}  

if(side==1){
   $("#siddiv").text("Provide sid");
  $("#siddiv").css('color','red');
  return false;
}

if(sida==1){
  $("#siddiv").text("Only digits are allowed");
  $("#siddiv").css('color','red');
  return false;
}

if(sids==1){
  $("#siddiv").text("Sid should be of 8 digits");
  $("#siddiv").css('color','red');
  return false;
}

if(mobe==1){
    $("#mobdiv").text("Provide Contact Number");
  $("#mobdiv").css('color','red');
  return false;
}

if(moba==1){
  $("#mobdiv").text("Only digits are allowed");
  $("#mobdiv").css('color','red');
  return false;
}

if(mobs==1){
  $("#mobdiv").text("Contact number should of 10 digits");
  $("#mobdiv").css('color','red');
  return false;
}

if (g==0)
  {
  $("#newpas").text("Too Short");
  $("#newpas").css("color","red");
  return false;
  }

if (g == 1)
  {
      $("#newpas").text("Password should be alphanumeric");
      $("#newpas").css("color","red");
      return false;
  }
  else
      {
        if($("#np").val() != $("#cp").val())
        {
          $("#confpas").text("Password did'nt match");
      $("#confpas").css("color","red");
          return false;
        }
          else
            ;
      }


    });
    });