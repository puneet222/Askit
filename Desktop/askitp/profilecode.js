$(document).ready(function(){
var i;
var fnf = 0; //first name not contain only alphabets
var fne = 0; //first name empty
var lnf = 0;
var lne = 0;
var e = 0;
var cne = 0;
var cnf = 0;
var snf = 0;
var sne = 0;
function em(x){
	var ln = x.length;
	var at=0;
	var dot=0;
	
	for(i=0;i<ln;i++)
	{
		if(x[i] == '@')
			at =1;
		if(x[i] == '.'){
			dot = 0;
			if(ln-i==4)
			{
				if(x[ln-3]=='c' && x[ln-2] == 'o' && x[ln-1]== 'm' )
				{	dot = 1;
					
					break;				
				}
				else
					dot = 0;
				
			}
			else
			{if(ln-i==3)
			{
				if(x[i+1]=='i' && x[i+2] == 'n')
					{dot = 1;
					break;
				}
				else
					dot = 0;
			}
			else
				dot = 0;
		}
		}
	
	}
	return at*dot;
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

$("#fn").on("input",function(){
	var check = 0;
var x = document.getElementById("fn").value;
var ln = x.length;

if(ln == 0)
{fne = 1;
$("#fndiv").text("Too short ");
$("#fndiv").css('color','red');
$("#fndiv").css('font-weight','bold');
}
else{
	fne = 0;
if(alpha(x) == 0)
{fnf = 1;
$("#fndiv").text("This Field can only have alphabets");
$("#fndiv").css('color','red');
$("#fndiv").css('font-weight','bold');
}	
else
{
fnf = 0;
$("#fndiv").text("valid First Name");
$("#fndiv").css('color','green');
$("#fndiv").css('font-weight','bold');

}
}
});
$("#ln").on("input",function(){
	var check = 0;
var x = document.getElementById("ln").value;
var ln = x.length;
var i;
if(ln == 0)
{lne = 1;
$("#lndiv").text("Too short ");
$("#lndiv").css('color','red');
$("#lndiv").css('font-weight','bold');
}
else{
	lne = 0;
if(alpha(x) == 0)
{lnf = 1;
$("#lndiv").text("This Field can only have alphabets");
$("#lndiv").css('color','red');
$("#lndiv").css('font-weight','bold');
}	
else
{
lnf = 0;
$("#lndiv").text("valid Last Name");
$("#lndiv").css('color','green');
$("#lndiv").css('font-weight','bold');

}
}
});
$("#SID").on("input",function(){
	
var x = document.getElementById("SID").value;
var ln = x.length;
var i;

if(num(x) == 0)
{snf = 1;
	$("#sdiv").text("This Field can only have numerics");

$("#sdiv").css('color','red');
$("#sdiv").css('font-weight','bold');
}
else{
	snf = 0;
if(ln != 8)
{
sne = 1;
$("#sdiv").text("should be of 8 numbers");
$("#sdiv").css('color','red');
$("#sdiv").css('font-weight','bold');
}	
else
{
sne = 0;
$("#sdiv").text("valid SID");
$("#sdiv").css('color','green');
$("#sdiv").css('font-weight','bold');

}
}
});
$("#contact").on("input",function(){
var x = document.getElementById("contact").value;
var ln = x.length;
var i;

if(num(x) == 0)
{cnf = 1;

	$("#cdiv").text("This Field can only have numerics");
$("#cdiv").css('color','red');
$("#cdiv").css('font-weight','bold');
}
else{
	cnf = 0;
if(ln != 10)
{
cne = 1;
$("#cdiv").text("should be of 10 numbers");
$("#cdiv").css('color','red');
$("#cdiv").css('font-weight','bold');
}	
else
{
cne = 0;
$("#cdiv").text("valid contact");
$("#cdiv").css('color','green');
$("#cdiv").css('font-weight','bold');

}
}
});
$("#email").on("input",function(){
var x = document.getElementById("email").value;
var ln = x.length;
var i;
if(em(x)==0)
{

enf = 1;
$("#ediv").text("Invalid Email");
$("#ediv").css('color','red');
$("#ediv").css('font-weight','bold');
}	
else
{
enf = 0;
$("#ediv").text("valid Email");
$("#ediv").css('color','green');
$("#ediv").css('font-weight','bold');

}

});
$("#fn").on("blur",function(){
$("#fndiv").text("");	
});
$("#ln").on("blur",function(){
$("#lndiv").text("");	
});
$("#contact").on("blur",function(){
$("#cdiv").text("");	
});
$("#SID").on("blur",function(){
$("#sdiv").text("");	
});
$("#email").on("blur",function(){
$("#ediv").text("");	
});
$("#userform").submit(function(){
	if(fne == 1)
	{
$("#fndiv").text("Too short ");
$("#fndiv").css('color','red');
$("#fndiv").css('font-weight','bold');
return false;
}
	if(fnf == 1)
		{
$("#fndiv").text("This Field can only have alphabets");
$("#fndiv").css('color','red');
$("#fndiv").css('font-weight','bold');
return false;
}
	
	if(lne == 1)
	{
$("#lndiv").text("Too short ");
$("#lndiv").css('color','red');
$("#lndiv").css('font-weight','bold');
return false;
}
	if(lnf == 1)
		{
$("#lndiv").text("This Field can only have alphabets");
$("#lndiv").css('color','red');
$("#lndiv").css('font-weight','bold');
return false;
}
	
	
	
	if(sne == 1){
		$("#sdiv").text("should be of 8 numbers");
$("#sdiv").css('color','red');
$("#sdiv").css('font-weight','bold');
	return false;
	}
	if(snf == 1){
		$("#sdiv").css('color','red');
$("#sdiv").css('font-weight','bold');
return false;
	}
	if(cne == 1)
	{
$("#cdiv").text("should be of 10 numbers");
$("#cdiv").css('color','red');
$("#cdiv").css('font-weight','bold');
return false;
	}
	if(cnf == 1){
		$("#cdiv").text("This Field can only have numerics");
$("#cdiv").css('color','red');
$("#cdiv").css('font-weight','bold');
return false;
}
	if(e == 1)
{	$("#ediv").text("Invalid Email");
$("#ediv").css('color','red');
$("#ediv").css('font-weight','bold');
	return false;
}
});
});
