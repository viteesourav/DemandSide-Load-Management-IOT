<!DOCTYPE html>
<html>
<head>
	<title>Appliance Record</title>
	<link rel="stylesheet" type="text/css" href="ApplianceRecordStyle.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<?php session_start();?>
	<script>
		function confirmation()
		{
			var say=confirm("Records Updated! Click Ok to continue");
			if(say==true)
				return true;
			else
				return false;
		}
	</script>
	<h1 align="center" color="white">Appliance Record</h1>
	<div align="right"><a href="mainpage.php" class="btn btn-primary">Home</a></div>
	<div class="box" align="center">
		<div class="col-md-4"></div>
		<div class="col-md-8">
			<form action="UpdatedRecords.php" method="post">
			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
						<th>Appliances</th>
						<th>Number of Units</th>
						<th>Power Rating (in Watt)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>LED Bulb</td>
						<td><input type="number" name="r11" min="0" max="20" value="0"></td>
						<td>
							<select name="r12">
								<option value="6">6W (Philips)</option>
								<option value="10">10W (Havells)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>LED Tubelight</td>
						<td><input type="number" name="r21" min="0" max="10" value="0"></td>
						<td>
							<select name="r22">
								<option value="22">22W (Wipro High Lumen)</option>
								<option value="25">25W (Ecolite Tech)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>CFL Bulb</td>
						<td><input type="number" name="r31" min="0" max="20" value="0"></td>
						<td>
							<select name="r32">
								<option value="22">22W (Osram CFL Bulbs)</option>
								<option value="27">27W (Crystal Gate Light)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Nightlamp</td>
						<td><input type="number" name="r41" min="0" max="10" value="0"></td>
						<td>
							<select name="r42">
								<option value="4">4W (Philips)</option>
								<option value="5">5W (Havells)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Fan</td>
						<td><input type="number" name="r51" min="0" max="10" value="0"></td>
						<td>
							<select name="r52">
								<option value="75">75W (Orient)</option>
								<option value="80">80W (Bajaj)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>AC</td>
						<td><input type="number" name="r61" min="0" max="5" value="0"></td>
						<td>
							<select name="r62">
								<option value="1456">1456W (LG 1.5ton)</option>
								<option value="1500">1500W (Samsung 1.5ton)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>LED TV</td>
						<td><input type="number" name="r71" min="0" max="5" value="0"></td>
						<td>
							<select name="r72">
								<option value="55">55W (Samsung 32 inches)</option>
								<option value="60">60W (LG 32 inches)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>PC / Laptop</td>
						<td><input type="number" name="r81" min="0" max="5" value="0"></td>
						<td>
							<select name="r82">
								<option value="45">45W (Laptop)</option>
								<option value="100">100W (PC)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Geyser</td>
						<td><input type="number" name="r91" min="0" max="5" value="0"></td>
						<td>
							<select name="r92">
								<option value="2000">2000W (AO Smith 15 litres)</option>
								<option value="1800">1800W (Bajaj 25 litres)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Music System</td>
						<td><input type="number" name="r101" min="0" max="3" value="0"></td>
						<td>
							<select name="r102">
								<option value="60">60W (Bose Wave Music System)</option>
								<option value="75">75W (Sony Music System)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Fridge</td>
						<td><input type="number" name="r111" min="0" max="5" value="0"></td>
						<td>
							<select name="r112">
								<option value="175">175W (Samsung Double Door)</option>
								<option value="200">200W (LG Double Door)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Chimney</td>
						<td><input type="number" name="r121" min="0" max="3" value="0"></td>
						<td>
							<select name="r122">
								<option value="230">230W (Kutchina)</option>
								<option value="250">250W (HTC)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Washing Machine</td>
						<td><input type="number" name="r131" min="0" max="3" value="0"></td>
						<td>
							<select name="r132">
								<option value="350">350W (Whirlpool)</option>
								<option value="370">370W (Videocon)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Elevetor</td>
						<td><input type="number" name="r141" min="0" max="2" value="0"></td>
						<td>
							<select name="r142">
								<option value="1200">1200W (Otis 4 passenger)</option>
								<option value="1500">1500W (Johnson 8 passenger)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Water Pump</td>
						<td><input type="number" name="r151" min="0" max="2" value="0"></td>
						<td>
							<select name="r152">
								<option value="750">750W (Kirloskar 1HP)</option>
								<option value="500">500W (Crompton 1HP)</option>
							</select>
						</td>
					</tr>
					<?php
						        //session_start();
						        // Include the database configuration file
						        $con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");
						        
						        // Get users from the database
						        $userid=$_SESSION['userid'];
								$qry= "SELECT id,Appliance, Num, Rating from $userid where id>15" ;
								$result=mysqli_query($con,$qry);
						        
						        // List all records
						        if(mysqli_num_rows($result) >0){
						            while($row = mysqli_fetch_assoc($result)){
						        ?>
						        <tr> 
						            <td><input type="text" name="app[]" value="<?php echo $row['Appliance']; ?>" ></td>
						            <td><input type="number" name="num[]" value="0" min="0"></td>
						            <td><input type="number" name="rat[]" min="0" value="<?php echo $row['Rating']; ?>"></td>
						        </tr>
						        <?php } }else{ ?>
						            <tr><td colspan="5">No records found.</td></tr>
						        <?php } ?>							
				</tbody>
			</table>
			<button type="submit" class="btn btn-danger btn-block" onclick="return confirmation()">Submit</button>
			</form>
		</div>
	</div>

</body>
</html>