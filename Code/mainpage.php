<html>
<head>
	<title>
		Home Page
	</title>
	<h1 align="center"><font color="yellow" size="10">Forecasting Page</font></h1>
	<link rel="stylesheet" type="text/css" href="mainpagecss.css" >
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<div class="pills">
	<br>
	<p align="left"><font color="white" size="6">Welcome <?php session_start(); $fname=$_SESSION['First_Name']; echo $fname; ?></font>
	</p>
	<ul class="nav nav-pills">
		<li class="active"><a href="#">Home</a></li>
		<li><a href="UpdatedApplianceRecord.php">Update Appliance Record</a></li>
		<li><a href="NewAppliance.php">Add New Appliance</a></li>
		<li><a href="deleteAppliance.php">Delete Appliance</a></li>
		<li><a href="viewAppliance.php">Appliance List</a></li>
		<li><a href="aboutus.php">About Us</a></li>
		<li><a href="logout.php" onclick="return btnselect()">Log Out</a></li>
	</ul>
</div>

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
<p align="center"><font color="white" size="6">Installed Capacity: <?php $con=mysqli_connect('localhost','root','123456','fyusers')or die("ERROR 404");
 $userid=$_SESSION['userid'];
 $qry="SELECT installedcap FROM userdata WHERE UserID='$userid'";
 $result=mysqli_query($con,$qry);
 while ($row = $result->fetch_assoc()) {
    echo $row['installedcap'];
} ?>W</font></p>
<div class="container">
	<div class="add-box">
	<div class="row">
		<div class="col-md-12 box-left">
			<h2 align="center"><font color="black">Enter Date & Time For Forecasting</font></h2>
			<form action="runpythongen3.php" method="POST">
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