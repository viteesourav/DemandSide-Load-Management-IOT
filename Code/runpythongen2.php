<html>
<head>
	<title>
		Home Page
	</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style type="text/css">
body{
background-image:url("2345.jpg"); 
background-size: cover;
background-repeat: no-repeat;
background-position: center;
background-attachment: fixed;
overflow-x: hidden;
}

table.a{
	min-width: 1580px;
	table-layout: auto;
}


table.table-content{
	margin-left: 27px;
	border-collapse: collapse;
	table-layout: auto;
	min-width: 775px;
	border-radius: 10px 10px 8px 8px;
	overflow: hidden;
	box-shadow: 0 0 50px #rgba(0,0,0,0.50);
}

table.table-content thead tr{
	background-color: #009879; 
	color: #ffffff;
	text-align: center;
	font-weight: bold;
}

table.table-content tbody tr{
	border-bottom: 2px solid #d6d6c2;
	background-color: #ffffff;
	text-align: center; 
}


h2.serif{
	font-family: "algerian", Times, serifs;
}

.boxbox{
	max-width: 850px;
	float:none;
	margin-left: 150px;
	background-color: rgba(255,255,255,0.50);
	padding:10px;
	border-radius: 5px 5px 8px 8px;
}

.boxbox1{
	max-width: 1050px;
	float:none;
	margin-left: 20px;
	background-color: rgba(255, 255, 255,0.65);
	padding:10px;
	border-radius: 5px 5px 8px 8px;
}

.form-control{
	background-color: #fff; 
}

.form-control1{
	background-color: #fff;
	border-radius: 4px 4px 4px 4px;
	border-color: black;
	text-align: center;
}

table.showdate{

 border-radius: 8px 8px 8px 8px;
 overflow: hidden;
}

.heade{
	background-color: #009879;
	border-radius: 8px 8px 8px 8px;
	overflow: hidden;
	box-shadow: 0 0 100px grey;
}



.form-right{
	margin-left: 45px;
   float: right;
   weight: 500px;
   border: 2px solid black;
   padding:10px;	
}

.formleft{
	margin-left: 65px;
   float: left;
   weight: 500px;
   border: 2px solid black;
   padding:15px;	
}

.r{
	margin-left: 10px;
}

}


</style>
</head>


<body>
	<br>
<h1 align="center" class="serif"><font color="orange" size="10">Forecasting Page</font></h1>
<table class="a">
	<tr>
		<td><br>
			<p align="left"><font color="white" size="6">Welcome <?php session_start(); echo $_SESSION['First_Name']; ?></font></p></td>
		<td>
			<a href="mainpage.php" class="btn btn-primary btn-sm">Home</a>
			<a href="logout.php" class="btn btn-primary btn-sm" onclick="return btnselect()">Log Out</a>
		</td>	
	</tr>
</table>
<hr><hr>
<br>


<div class="container">
	<div align="center">
		<br>
      <div class="col-md-18">
     <table class="table-content">
     <thead>
     <tr>
     <th><label><font color="white" size="4">User Name </font></label></th>
     <th><label><font color="white" size="4">Entered Date </font></label></th>
     <th><label><font color="white" size="4">Entered Time </font></label></th>	
     </tr>
     </thead>
     <tbody>
     <tr>
     	<th><input type="text" value="<?php echo $_SESSION['First_Name'] ?>" class="form-control" disabled></th>
        <th><input type="text" value="<?php echo $_POST['forcastdategen'] ?>" class="form-control"disabled></th>
        <th><input type="time" value="<?php echo $_POST['forcasttimegen'] ?>" class="form-control" disabled></th>
     </tr>
     </tbody> 
      </table>
      </div>
       </div>
</div> 
      <br><br>
      
<div class="container">
	<div class="boxbox">
		<br>
      <div class="row">
   	 <div class="col-md-6">
   	 	<p align="left"><img src="solarpanel1.png" width="50px" height="50px"><font color="black" size="5">&nbsp&nbspPredicted Solar Generation: </font></p><br>
   	 	<p align="left"><img src="windmill.png" width="50px" height="50px"><font color="black" size="5">&nbsp&nbspPredicted Wind Generation: </font></p><br>
   	 	<p align="left"><img src="cell.png" width="50px" height="50px"><font color="black" size="5">&nbsp&nbspBattery Percentage: </font></p>
   	 </div> 

   	 <div class="col-md-6 box-right">
   	 <?php
      $var0=$_POST['forcastdategen'];
      $day1=substr($var0, 8,2);
      $mon1=substr($var0, 5,2);
      $year1=substr($var0, 0,4);
      $vark=$day1."-".$mon1."-".$year1;
      $var1=strval($vark);
      //echo $var1;
      $varp=$_POST['forcasttimegen'];
      //$varc=intval(substr($varp, 3,2));
      //if($varc>30)

      $var2=substr($varp,0,2);
      //echo $var2;
      $_SESSION['gendate']=$var0;
      
      $con=mysqli_connect('localhost','root','123456','fyusers') or die('connection_aborted');
      $qry= "SELECT * FROM predictionrecord WHERE pdate='$var1' && ptime='$var2'"; 
      $result=mysqli_query($con,$qry);

      $row=mysqli_fetch_assoc($result);
      $np=intval(($row['battery']*100)/6000);                //Max Capacity For battery is 6000kW ( 100 % )
     echo "<h2>&nbsp&nbsp&nbsp&nbsp".$row['solarpredict']." KW<br><br><h2>&nbsp&nbsp&nbsp&nbsp".$row['windpredict']." KW<br><br><h2>&nbsp&nbsp&nbsp&nbsp".$np."%";      
     $load=intval($row['consumpredict']);
     $batpower=intval($row['battery']);
     $userid= $_SESSION['userid'];
     $k1= "SELECT fraction FROM userdata WHERE UserID='$userid'";
     $f=mysqli_query($con,$k1);
     $row= mysqli_fetch_assoc($f);
     $fract= $row['fraction'];

     $loaddisplay= intdiv($load*$fract*1000,6*30*27);
     if($batpower<=1200)
     {
     	$battery=0;
     } 
     else
     {
     	$battery=($batpower*1000*$fract)/810;
     }
     $p1=0;     $p2=0;     $p3=0;     $p4=0;     $p5=0;     
     $maxp1=round($loaddisplay*0.15);     
     $maxp2=round($loaddisplay*0.2);     
     $maxp3=round($loaddisplay*0.25);
     if(($loaddisplay*0.1)<$battery)
     {
     	$p1=0;
     }
     else
     {
     	$p1=round(($loaddisplay*0.1)-$battery);
     }
     if(($loaddisplay*0.25)<$battery)
     {
     	$p2=0;
     }
     else if($p1==0)
     {
     	$p2=round(($loaddisplay*0.25)-$battery);
     }
     else
     {
     	$p2=round($loaddisplay*0.15);
     }
     if(($loaddisplay*0.45)<$battery)
     {
     	$p3=0;
     }
     else if($p2==0)
     {
     	$p3=round(($loaddisplay*0.45)-$battery);
     }
     else
     {
     	$p3=round($loaddisplay*0.2);
     }
     if($p1==0 && $p2==0 && $p3==0)
     {
     	$p4=round($loaddisplay*0.45);
     	$maxp1=$battery;
     	$maxp2=$battery;
     	$maxp3=$battery;
     }
     else
     	$p4=round($loaddisplay*0.25);
     if($p1==0 && $p2==0 && $p3==0)
     	$p5=round($loaddisplay*0.55);
     else
     	$p5=round($loaddisplay*0.3);
     if($p1==0 && $p2==0 && $p3!=0)
     {
     	$maxp1=$battery;
     	$maxp2=$battery;
     	$maxp3=round($loaddisplay*0.25);
     	$p4=round($loaddisplay*0.35);
     	$p5=round($loaddisplay*0.4);
     }
     else if($p1==0 && $p2!=0 && $p3!=0)
     {
     	$maxp2=round($loaddisplay*0.25);
     	$maxp3=round($loaddisplay*0.3);
     	$p4=round($loaddisplay*0.35);
     	$p5=round($loaddisplay*0.4);
     }
	
	?>
   	 </div>
   	</div>
   	<div class="row">
   	<div class="col-md-4">
   		<!--progress bar for battery -->	
   		<?php
 		$showstatus= ($np*260)/100;

 		if($np>0 && $np<40){
                //red
 			echo "<div class='progress' style='height:30px'>";
 			echo "<div class='progress-bar progress-bar-striped progress-bar-animated bg-danger' style='width:".$showstatus."px;height:30px'>";
 			echo "".$np."%";
 			echo "</div>";
 			echo "</div>";
 		}
 		elseif($np>=40 && $np<60){
                //orange
 			echo "<div class='progress' style='height:30px'>";
 			echo "<div class='progress-bar progress-bar-striped progress-bar-animated bg-warning' style='width:".$showstatus."px;height:30px'>";
			echo "".$np."%";
			echo "</div>";
 			echo "</div>"; 			
 		}
 		else{
 			//green
 			echo "<div class='progress' style='height:30px'>";
 			echo "<div class='progress-bar progress-bar-striped progress-bar-animated bg-success' style='width:".$showstatus."px';height:30px'>";
 			echo "".$np."%";
 			echo "</div>";
 			echo "</div>"; 
 		} 			
       ?>
   	</div>
   </div>
   </div>
</div>

<br>

<div class="container">
	<div class="boxbox1">
		<br>

    <div align="left">
       <table class="showdate">
       	<colgroup>
       		<col span="1" style="background-color: #009879">
       		<col style="background-color: #e6e6e6">
       	</colgroup>
       	<tr>
       		<th><font color="white">&nbspDATE&nbsp</th>
       		<th><?php echo $_POST['forcastdategen']; ?></th>
       	</tr>
       </table>
     </div>
		<div class="container">
			<canvas id="myChart"></canvas>
		</div>
		<script type="text/javascript">
			let myChart=document.getElementById('myChart').getContext('2d');

			$.ajax({
			url:"http://localhost/FYproject/chartdata.php",
			method:"GET",
			success:function(data){
				console.log(data);
				var time = [];
				var solar = [];
				var wind= [];
				var cell=[];
				var total=[];

				Chart.defaults.global.defaultFontFamily = 'Lato';
				Chart.defaults.global.defaultFontSize = 18;
				Chart.defaults.global.defaultFontColor = 'black';

				for(var i in data){
					time.push(data[i].ptime + ":00 Hrs");
					solar.push(data[i].solarpredict);
					wind.push(data[i].windpredict);
					cell.push(data[i].battery);
					total.push(data[i].totalgen);
				}

				var chartdata = {
					labels: time,
					datasets: [{
						label: ' Predicted Solar Generation',
						fill: false,
						lineTension: 0.5,
						backgroundColor: "rgba(54,162,235,0.75)",
						borderColor: "rgba(54,162,235,1)",
						pointHoverBackgroundColor: "rgba(54,162,235,1)",
						pointHoverBorderColor: "rgba(54,162,235,1)",
						data:solar
					},
					{
						label: ' Predicted Wind Generation',
						fill: false,
						lineTension: 0.5,
						backgroundColor: "rgba(255,206,86,0.75)",
						borderColor: "rgba(255,206,86,1)",
						pointHoverBackgroundColor: "rgba(255,206,86,1)",
						pointHoverBorderColor: "rgba(255,206,86,1)",
						data:wind
					},
					{
						label: ' Predicted Battery',
						fill: false,
						lineTension: 0.5,
						backgroundColor: "rgba(153,51,0,0.75)",
						borderColor: "rgba(153,51,0,1)",
						pointHoverBackgroundColor: "rgba(153,51,0,1)",
						pointHoverBorderColor: "rgba(153,51,0,1)",
						data:cell
					},
					{
						label: ' Total Generation',
						fill: false,
						lineTension: 0.5,
						backgroundColor: "rgba(204,0,0,0.75)",
						borderColor: "rgba(204,0,0,1)",
						pointHoverBackgroundColor: "rgba(204,0,0,1)",
						pointHoverBorderColor: "rgba(204,0,0,1)",
						data:total
					},
					],
				};
				var ctx=$("#myChart");

				var LineGraph=new Chart(ctx, {
					type:'line',
					data: chartdata,
					options:{
						title:{
							display:true,
							text: 'Prediction of the Day',
							fontSize: 25,
							fontColor: 'black',
							fontfamily: 'Lato'	
						},
						legend:{
							position:'top'
						} 
					}
				});
			},
			error: function(data){
				console.log(data);
			}
		});
	</script>
   </div>
</div>
<br><br>

<div class="container">
	<div class="boxbox1">
		<div class="heade">
		<p align="center"><font color="white" size="5" face="Lato"> Select Appliance </font></p>
        </div>
        <hr>
		<div align="left">
			<div class="row r">

			<label align="right"><font size="4" face="Lato">Max Limit for entered Load Values:&nbsp&nbsp</font></label>
            <input type="number" class="form-control1" id="display" value="<?php echo $loaddisplay ?>" disabled >&nbspW
            <br>
            <p align="left" style="font-family: 'Times New Roman' "><font color="black">Instructions:<br>
            	1.	Total power available from the battery is <?php echo round($battery); ?>W.<br>
            	2.	Total power available to run appliances on solar and wind power is <?php echo round($loaddisplay); ?>W.<br>
            	3.	Appliances selected under P1 will consume power from battery upto <?php echo round($battery); ?>W.<br>
            	4.	Appliances selected under P2, P3, P4, P5 and P6 has a total power consumption limit of <?php echo round($loaddisplay); ?>W.<br>
            	5.	It is advised to fully utilize the available battery power to run maximum possible appliances.<br> 
            </font></p>
        </div>
		</div>
        <br>
		<form action="adduserloadtodb.php" method="post">
			<div class="row">
				<div class="col-md-10 formleft">
					<label><font size="4">Critical Loads (Priority 1): </font><font color="red" size="2">(Range: 0 W to <?php echo round($battery); ?>W)</font></label>
					<input type="number" name="l1" id="l1" min="0" max="<?php echo round($battery) ?>" value="<?php echo round($battery) ?>" class="form-control" required placeholder="Enter L1" onblur="update()">
				</div>
						<br>
				<div class="col-md-10 formleft">
					<label><font size="4">Light Loads (Priority 2): </font><font color="red" size="2">(Range: 0 W to <?php echo round($maxp1); ?>W)</font></label>
						<input type="number" name="l2" id="l2" min="0" max="<?php echo round($maxp1); ?>" value="<?php echo $p1; ?>" class="form-control" required placeholder="Enter L2" onblur="update()">
						<br>
						<table class="table-content">
							<thead>
								<tr>
									<th><input type="checkbox" id="select_all" class="select_all" value="" checked></th>        
            						<th>Appliance</th>
            						<th>Priority</th>
            						<th>Number of Units</th>
            						<th>Power Rating (in Watts)</th>
								</tr>
							</thead>
							<?php
						        //session_start();
						        // Include the database configuration file
						        $con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");
						        
						        // Get users from the database
						        $userid=$_SESSION['userid'];
								$qry= "SELECT id,Appliance, Num, Rating FROM $userid WHERE id IN (1,2,3,4)";
								$result=mysqli_query($con,$qry);
						        
						        // List all records
						        if(mysqli_num_rows($result) >0){
						            while($row = mysqli_fetch_assoc($result)){
						        ?>
						        <tr>
						            <td align="center"><input type="checkbox" name="checked_id2[]" class="checkbox" value="<?php echo $row['id']; ?>" checked></td>        
						            <td><?php echo $row['Appliance']; ?></td>
						            <td><select name="prior2[]">
						            	<option value="1">P1</option>
						            	<option value="2">P2</option>
						            </select></td>
						            <td><input type="number" name="num2[]" value="0" onblur="check2()" min="0" max="<?php echo $row['Num']; ?>"></td>
						            <td><input type="number" name="rat2[]" min="<?php echo $row['Rating']; ?>" max="<?php echo $row['Rating']; ?>" value="<?php echo $row['Rating']; ?>"></td>
						        </tr>
						        <?php } }else{ ?>
						            <tr><td colspan="5">No records found.</td></tr>
						        <?php } ?>							
							</table>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-10 formleft">
					<label><font size="4">Light Loads (Priority 3): </font><font color="red" size="2">(Range: 0 W to <?php echo round($maxp2); ?>W)</font></label>
						<input type="number" name="m1" id="m1" min="0" max="<?php echo round($maxp2); ?>" value="<?php echo $p2; ?>" class="form-control" required placeholder="Enter M1"
						onblur="update()">
						<br>
						<table class="table-content">
							<thead>
								<tr>
									<th><input type="checkbox" id="select_all" class="select_all" value="" checked></th>        
            						<th>Appliance</th>
            						<th>Priority</th>
            						<th>Number of Units</th>
            						<th>Power Rating (in Watts)</th>
								</tr>
							</thead>
							<?php
						        //session_start();
						        // Include the database configuration file
						        $con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");
						        
						        // Get users from the database
						        $userid=$_SESSION['userid'];
								$qry= "SELECT id,Appliance, Num, Rating FROM $userid WHERE id IN (5,7,8,10,11)";
								$result=mysqli_query($con,$qry);
						        
						        // List all records
						        if(mysqli_num_rows($result) >0){
						            while($row = mysqli_fetch_assoc($result)){
						        ?>
						        <tr>
						            <td align="center"><input type="checkbox" name="checked_id3[]" class="checkbox" value="<?php echo $row['id']; ?>" checked></td>        
						            <td><?php echo $row['Appliance']; ?></td>
						            <td><select name="prior3[]">
						            	<option value="1">P1</option>
						            	<option value="3">P3</option>
						            </select></td>
						            <td><input type="number" name="num3[]" value="0" onblur="check3()" min="0" max="<?php echo $row['Num']; ?>"></td>
						            <td><input type="number" name="rat3[]" min="<?php echo $row['Rating']; ?>" max="<?php echo $row['Rating']; ?>" value="<?php echo $row['Rating']; ?>"></td>
						        </tr>
						        <?php } }else{ ?>
						            <tr><td colspan="5">No records found.</td></tr>
						        <?php } ?>							
							</table>
				</div>
				<br>
				<div class="col-md-10 formleft">
					<label><font size="4">Medium Loads (Priority 4): </font><font color="red" size="2">(Range: 0 W to <?php echo round($maxp3); ?>W)</font></label>
						<input type="number" name="m2" id="m2" min="0" max="<?php echo round($maxp3); ?>" value="<?php echo $p3; ?>" class="form-control" required placeholder="Enter M2" 
						onblur="update()">
						<br>
						<table class="table-content">
							<thead>
								<tr>
									<th><input type="checkbox" id="select_all" class="select_all" value="" checked></th>        
            						<th>Appliance</th>
            						<th>Priority</th>
            						<th>Number of Units</th>
            						<th>Power Rating (in Watts)</th>
								</tr>
							</thead>
							<?php
						        //session_start();
						        // Include the database configuration file
						        $con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");
						        
						        // Get users from the database
						        $userid=$_SESSION['userid'];
								$qry= "SELECT id,Appliance, Num, Rating FROM $userid WHERE id>15 AND Rating<=200";
								$result=mysqli_query($con,$qry);
						        
						        // List all records
						        if(mysqli_num_rows($result) >0){
						            while($row = mysqli_fetch_assoc($result)){
						        ?>
						        <tr>
						            <td align="center"><input type="checkbox" name="checked_id4[]" class="checkbox" value="<?php echo $row['id']; ?>" checked></td>        
						            <td><?php echo $row['Appliance']; ?></td>
						            <td><select name="prior4[]">
						            	<option value="1">P1</option>
						            	<option value="4">P4</option>
						            </select></td>
						            <td><input type="number" name="num4[]" value="0" onblur="check4()" min="0" max="<?php echo $row['Num']; ?>"></td>
						            <td><input type="number" name="rat4[]" min="<?php echo $row['Rating']; ?>" max="<?php echo $row['Rating']; ?>" value="<?php echo $row['Rating']; ?>"></td>
						        </tr>
						        <?php } }else{ ?>
						            <tr><td colspan="5">No records found.</td></tr>
						        <?php } ?>							
							</table>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-10 formleft">
					<label><font size="4">Heavy Loads (Priority 5): </font><font color="red" size="2">(Range: 0 W to <?php echo round($loaddisplay); ?>W)</font></label>
						<input type="number" name="h1" id="h1" min="0" max="<?php echo round($loaddisplay); ?>" value="<?php echo round($p4); ?>" class="form-control" required placeholder="Enter H1" 
						onblur="update()">
						<br>
						<table class="table-content">
							<thead>
								<tr>
									<th><input type="checkbox" id="select_all" class="select_all" value="" checked></th>        
            						<th>Appliance</th>
            						<th>Priority</th>
            						<th>Number of Units</th>
            						<th>Power Rating (in Watts)</th>
								</tr>
							</thead>
							<?php
						        //session_start();
						        // Include the database configuration file
						        $con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");
						        
						        // Get users from the database
						        $userid=$_SESSION['userid'];
								$qry= "SELECT id,Appliance, Num, Rating FROM $userid WHERE id IN (6,9,12,13,14,15)";
								$result=mysqli_query($con,$qry);
						        
						        // List all records
						        if(mysqli_num_rows($result) >0){
						            while($row = mysqli_fetch_assoc($result)){
						        ?>
						        <tr>
						            <td align="center"><input type="checkbox" name="checked_id5[]" class="checkbox" value="<?php echo $row['id']; ?>" checked></td>        
						            <td><?php echo $row['Appliance']; ?></td>
						            <td><select name="prior5">
						            	<option value="5">P5</option>
						            </select></td>
						            <td><input type="number" name="num5[]" value="0" onblur="check5()" min="0" max="<?php echo $row['Num']; ?>"></td>
						            <td><input type="number" name="rat5[]" min="<?php echo $row['Rating']; ?>" max="<?php echo $row['Rating']; ?>" value="<?php echo $row['Rating']; ?>"></td>
						        </tr>
						        <?php } }else{ ?>
						            <tr><td colspan="5">No records found.</td></tr>
						        <?php } ?>							
							</table>
				</div>
				<br>
				<div class="col-md-10 formleft">
					<label><font size="4">Heavy Loads (Priority 6): </font><font color="red" size="2">(Range: 0 W to <?php echo round($loaddisplay); ?>W)</font></label>
						<input type="number" name="h2" id="h2" min="0" max="<?php echo round($loaddisplay); ?>" value="<?php echo round($p5); ?>" class="form-control" required placeholder="Enter H2" 
						onblur="update()">
						<br>
						<table class="table-content">
							<thead>
								<tr>
									<th><input type="checkbox" id="select_all" class="select_all" value="" checked></th>        
            						<th>Appliance</th>
            						<th>Priority</th>
            						<th>Number of Units</th>
            						<th>Power Rating (in Watts)</th>
								</tr>
							</thead>
							<?php
						        //session_start();
						        // Include the database configuration file
						        $con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");
						        
						        // Get users from the database
						        $userid=$_SESSION['userid'];
								$qry= "SELECT id,Appliance, Num, Rating FROM $userid WHERE id>15 AND Rating>200";
								$result=mysqli_query($con,$qry);
						        
						        // List all records
						        if(mysqli_num_rows($result) >0){
						            while($row = mysqli_fetch_assoc($result)){
						        ?>
						        <tr>
						            <td align="center"><input type="checkbox" name="checked_id6[]" class="checkbox" value="<?php echo $row['id']; ?>" checked></td>        
						            <td><?php echo $row['Appliance']; ?></td>
						            <td><select name="prior6">
						            	<option value="6">P6</option>
						            </select></td>
						            <td><input type="number" name="num6[]" value="0" onblur="check6()" min="0" max="<?php echo $row['Num']; ?>"></td>
						            <td><input type="number" name="rat6[]" min="<?php echo $row['Rating']; ?>" max="<?php echo $row['Rating']; ?>" value="<?php echo $row['Rating']; ?>"></td>
						        </tr>
						        <?php } }else{ ?>
						            <tr><td colspan="5">No records found.</td></tr>
						        <?php } ?>							
							</table>
				</div>
			</div>
			<br>
			<div align="center">
			<button type="submit" id="finally" class="btn btn-danger" onclick="alertme()">Submit</button>
		    </div>
		</form>
       

        <script>
        	var total=0;
          
        function update()
		{
			var l1=parseInt(document.getElementById( "l1" ).value);
			var l2=parseInt(document.getElementById( "l2" ).value);
			var m1=parseInt(document.getElementById( "m1" ).value);
			var m2=parseInt(document.getElementById( "m2" ).value);
			var h1=parseInt(document.getElementById( "h1" ).value);
			var h2=parseInt(document.getElementById( "h2" ).value);
			var load2=parseInt("<?php echo json_encode($loaddisplay); ?>");
			total=load2-(l2+m1+m2+h1+h2);
			document.getElementById("display").value=total;

			if(total>10 || total<-10 || l1<-3 || l1><?php echo $battery; ?>)
			{
				document.getElementById("finally").disabled=true;
			}
			else
			{
				document.getElementById("finally").disabled=false;
			}				
		}

		function btnselect(){
			var say=confirm("Are you sure want to logout ?");
	   		if(say==true){
				header('location:logout.php');
				return true;
	     	}
			else
				return false;
     	}
 	
       function alertme(){
       		alert("Your Load Values are updated in the database");
       }  


        	var sum12=0;
        	var sum13=0;
        	var sum14=0;

	        function check2()
        	{
	       		var arr1=$("input[name='checked_id2[]']").map(function(){return $(this).val();}).get();
	       		var arr2=$("input[name='num2[]']").map(function(){return $(this).val();}).get();
	       		var arr3=$("input[name='rat2[]']").map(function(){return $(this).val();}).get();
	       		var arr4=$("select[name='prior2[]']").map(function(){return $(this).val();}).get();
	       		var i;
	       		sum12=0;
	       		var sum2=0;
	       		for (i=0; i<arr1.length; i++)
	       		{
	       			var a=parseInt(arr2[i]);
	       			var b=parseInt(arr3[i]);
	       			var c=parseInt(arr4[i]);
	       			if(c==1)
	       				sum12=sum12+(a*b);
	       			else
	       				sum2=sum2+(a*b);
	       		}
	       		if(<?php echo $battery; ?>==0)
	       			sum12=0;
	       		document.getElementById("l1").value=sum12+sum13+sum14;
	       		document.getElementById("l2").value=sum2;
	       		if(parseInt(document.getElementById("l1").value)><?php echo $battery; ?>)
	       			document.getElementById("l1").value=<?php echo round($battery); ?>;

	       		if(total>10 || total<-10 || l1<-3 || l1><?php echo $battery; ?>)
				{
					document.getElementById("finally").disabled=true;
				}
				else
				{
					document.getElementById("finally").disabled=false;
				}
	        }

	        function check3()
        	{
	       		var arr1=$("input[name='checked_id3[]']").map(function(){return $(this).val();}).get();
	       		var arr2=$("input[name='num3[]']").map(function(){return $(this).val();}).get();
	       		var arr3=$("input[name='rat3[]']").map(function(){return $(this).val();}).get();
	       		var arr4=$("select[name='prior3[]']").map(function(){return $(this).val();}).get();
	       		var i;
	       		sum13=0;
	       		var sum3=0;
	       		for (i=0; i<arr1.length; i++)
	       		{
	       			var a=parseInt(arr2[i]);
	       			var b=parseInt(arr3[i]);
	       			var c=parseInt(arr4[i]);
	       			if(c==1)
	       				sum13=sum13+(a*b);
	       			else
	       				sum3=sum3+(a*b);
	       		}
	       		if(<?php echo $battery; ?>==0)
	       			sum13=0;
	       		document.getElementById("l1").value=sum12+sum13+sum14;
	       		document.getElementById("m1").value=sum3;
	       		if(parseInt(document.getElementById("l1").value)><?php echo $battery; ?>)
	       			document.getElementById("l1").value=<?php echo round($battery); ?>;

	       		if(total>10 || total<-10 || l1<-3 || l1><?php echo $battery; ?>)
				{
					document.getElementById("finally").disabled=true;
				}
				else
				{
					document.getElementById("finally").disabled=false;
				}
	        }

	        function check4()
        	{
	       		var arr1=$("input[name='checked_id4[]']").map(function(){return $(this).val();}).get();
	       		var arr2=$("input[name='num4[]']").map(function(){return $(this).val();}).get();
	       		var arr3=$("input[name='rat4[]']").map(function(){return $(this).val();}).get();
	       		var arr4=$("select[name='prior4[]']").map(function(){return $(this).val();}).get();
	       		var i;
	       		sum14=0;
	       		var sum4=0;
	       		for (i=0; i<arr1.length; i++)
	       		{
	       			var a=parseInt(arr2[i]);
	       			var b=parseInt(arr3[i]);
	       			var c=parseInt(arr4[i]);
	       			if(c==1)
	       				sum14=sum14+(a*b);
	       			else
	       				sum4=sum4+(a*b);
	       		}
	       		if(<?php echo $battery; ?>==0)
	       			sum14=0;
	       		document.getElementById("l1").value=sum12+sum13+sum14;
	       		document.getElementById("m2").value=sum4;
	       		if(parseInt(document.getElementById("l1").value)><?php echo $battery; ?>)
	       			document.getElementById("l1").value=<?php echo round($battery); ?>;

	       		if(total>10 || total<-10 || l1<-3 || l1><?php echo $battery; ?>)
				{
					document.getElementById("finally").disabled=true;
				}
				else
				{
					document.getElementById("finally").disabled=false;
				}
	        }

	        function check5()
        	{
	       		var arr1=$("input[name='checked_id5[]']").map(function(){return $(this).val();}).get();
	       		var arr2=$("input[name='num5[]']").map(function(){return $(this).val();}).get();
	       		var arr3=$("input[name='rat5[]']").map(function(){return $(this).val();}).get();
	       		var i;
	       		var sum=0;
	       		for (i=0; i<arr1.length; i++)
	       		{
	       			var a=parseInt(arr2[i]);
	       			var b=parseInt(arr3[i]);
	       			sum=sum+(a*b);
	       		}
	       		document.getElementById("h1").value=sum;
	       		if(parseInt(document.getElementById("h1").value)><?php echo $loaddisplay; ?>)
	       			document.getElementById("h1").value=<?php echo round($loaddisplay); ?>;

	       		if(total>10 || total<-10 || l1<-3 || l1><?php echo $battery; ?>)
				{
					document.getElementById("finally").disabled=true;
				}
				else
				{
					document.getElementById("finally").disabled=false;
				}
	        }

	        function check6()
        	{
	       		var arr1=$("input[name='checked_id6[]']").map(function(){return $(this).val();}).get();
	       		var arr2=$("input[name='num6[]']").map(function(){return $(this).val();}).get();
	       		var arr3=$("input[name='rat6[]']").map(function(){return $(this).val();}).get();
	       		var i;
	       		var sum=0;
	       		for (i=0; i<arr1.length; i++)
	       		{
	       			var a=parseInt(arr2[i]);
	       			var b=parseInt(arr3[i]);
	       			sum=sum+(a*b);
	       		}
	       		document.getElementById("h2").value=sum;
	       		if(parseInt(document.getElementById("h1").value)><?php echo $loaddisplay; ?>)
	       			document.getElementById("h2").value=<?php echo round($battery); ?>;

	       		if(total>10 || total<-10 || l1<-3 || l1><?php echo $battery; ?>)
				{
					document.getElementById("finally").disabled=true;
				}
				else
				{
					document.getElementById("finally").disabled=false;
				}
	        }

	        $(document).ready(function(){
	    		$('#select_all').on('click',function(){
	        		if(this.checked){
	            		$('.checkbox').each(function(){
	                	this.checked = true;
	            		});
	        		}else{
	             		$('.checkbox').each(function(){
	                	this.checked = false;
	            		});
	        		}
	    		});


				$('tr td:first-child input[type="checkbox"]').click( function() {
   				//enable/disable all except checkboxes, based on the row is checked or not
   					$(this).closest('tr').find(":input:not(:first)").attr('disabled', !this.checked);
				});
			});

		</script>

	</div>
</div>





</body>
</html>
