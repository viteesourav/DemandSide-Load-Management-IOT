<html>
<head>
	<title>
		Home Page
	</title>
	<link rel="stylesheet" type="text/css" href="mainpagecss.css" >
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

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
<h1 align="center"><font color="yellow" size="10">Forecasting Page</font></h1>
		<p align="left"><font color="white" size="6">Welcome Admin <?php session_start(); echo $_SESSION['First_Name']; ?></font></p>
		<div align="right"><a href="logout.php" onclick="btnselect()" class="btn btn-primary">Logout</a></div>
<hr><hr>

<div class="container">
	<div class="add-box">
	<div class="row">
		<div class="col-md-12 box-left">
			<h2 align="center"><font color="black">Enter Date & Time For Forecasting</font></h2>
			<form action="adminrunpythongen.php" method="POST">
				<div class="form-group">
					<label><font color="black">Forcasting Date: </font></label>
					<input type="date" min="2020-01-01" max="2021-04-30" name="forcastdategen" class="form-control" placeholder="Date" required>
				</div>
				<div class="form-group">
					<label><font color="black">Forcasting Time: </font></label>
					<input type="time" name="forcasttimegen" class="form-control" placeholder="Time" required>
				</div>
				<div align="center">
				<button type="submit" class="btn btn-primary btn-sm">Predict </button></div>
			</form>
		</div>
	</div>
	</div>
</div>
</body>
</html>