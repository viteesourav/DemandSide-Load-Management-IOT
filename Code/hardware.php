<html>
<head>
	<title>
		Hardware Implementation
	</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>

<style type="text/css">
	
body{
background-image:url("hardwarepaper1.jpg"); 
background-size: cover;
background-repeat: no-repeat;
background-position: center;
background-attachment: fixed;
overflow-x: hidden;
}

table.a{
	min-width: 1400px;
	table-layout: auto;
}

.boxbox1{
	max-width: 1050px;
	float:none;
	margin-left: 20px;
	background-color: rgba(255, 255, 255,0.65);
	padding:10px;
	border-radius: 5px 5px 8px 8px;
}


</style>

<script>

function btnselect(){
	   var say=confirm("Are you sure want to logout ?");
	   if(say==true){
		header('location:logout.php');
		return true;
	     }
	else
		return false;
     }

</script>

<body>
<br>
<h1 align="center" class="serif"><font color="orange" size="10">HARDWARE IMPLEMENTATION</font></h1>
<table class="a">
	<tr>
		<td><br>
			<p align="left"><font color="black" size="6"><b>Welcome Admin <?php session_start(); echo $_SESSION['First_Name']; ?></b></font></p></td>
		<td>
		<form action="logout.php" method="">
		<button type="submit" class="btn btn-danger btn-sm" onclick="return btnselect();">Log Out</button></form></td>	
	</tr>
</table>
<hr><hr>
<br>

<div class="container">
	<div class="boxbox1">
  <div align="center">
	<?php
    "<b>".
    $output= shell_exec('fyproject1.exe');
    echo '<pre>'.$output.'</pre>'
    ."</b>";

	?>
		</div>
	</div>
</div>
</body>
</html>