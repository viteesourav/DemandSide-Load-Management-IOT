<html>
<head>
	<title>
		Appliance Records
	</title>
	<!--<link rel="stylesheet" type="text/css" href="viewrecordscss.css">-->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<style>
	body{
	background-image: url("img234.jpg");
	background-size: cover;
	background-origin: content-box;
	background-position: center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	overflow-x: hidden;
	}



.table-content{
	border-collapse: collapse;
	margin: 25px 2px;
	font-size: 1.1em;
	min-width: 600px;
	border-radius: 8px 8px 5px 5px;
	overflow: hidden;
	box-shadow: 0 0 50px #rgba(0,0,0,0.50);
	width: 100%;
}

.table-content th{
	border:2px  #f3f3f3;
}

.table-content td{
	border:2px solid #009879;
}

.table-content thead tr{
	background-color: #009879; 
	color: #ffffff;
	text-align: center;
	font-weight: bold;
}

.table-content th,
.table-content td{
	padding: 8px 6px;
}

.table-content tbody tr{
	border-bottom: 2px solid #000000;
	background-color: #ffffff; 
}

.container{
	text-align: center;
	width: 100%;
}
</style>

<body>
	<h1 align="center"><font color="yellow" size="10">Appliance Records</font></h1>
	<div align="right">
		<a href="mainpage.php" class="btn btn-primary">Home</a>
		<a href="logout.php" class="btn btn-primary">Logout</a>
	</div>	
	<hr><hr>
	<div class="container">
		<table class="table-content">
		<thead>
		<tr>
		    <th><font color="white">Appliances</font></th>
		    <th><font color="white">Number of Units</font></th>
		    <th><font color="white">Rating (in Watts)</font></th>
		</tr>
		</thead>
		<tbody>
		<?php

		session_start();

		$s=mysqli_connect('localhost','root','123456','fyusers')or die("couldn't connect to the database");
		$userid=$_SESSION['userid'];
		$qry= "SELECT Appliance, Num, Rating from $userid";
		$result=mysqli_query($s,$qry);
		if(mysqli_num_rows($result) >0){
		    while($row = mysqli_fetch_assoc($result)){
		        echo "<tr><td>".$row["Appliance"]."</td><td>".$row["Num"]."</td><td>".$row["Rating"]."</td><tr>";
		    }
		    echo"</tbody>";
		    echo"</table>";
		}
		else
		{
		echo "Records don't exist so far.. ";

		}

		$s->close();
		?>
		</tbody>
		</table>
	</div>
</body>
</html>

