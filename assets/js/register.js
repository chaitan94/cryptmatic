$(document).ready(function(){
	$("#regSubmit").click(function(){
		$.post('assets/php/register.php',{name: $("#regName").val(), email: $("#regMail").val(), pass: $("#regPass").val(), pass2: $("#regPass2").val()},function(data){
			alert(data);
		});
	});
	$("#logSubmit").click(function(){
		$.post('assets/php/login.php',{email: $("#logMail").val(), pass: $("#logPass").val()},function(data){
			$("#logMsg").html(data);
		});
	});
});