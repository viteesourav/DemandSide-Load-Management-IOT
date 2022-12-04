<!DOCTYPE html>
<html>
<head>
	<title>Appliance Record</title>
	<link rel="stylesheet" type="text/css" href="ApplianceRecordStyle.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<style type="text/css">
		p{
			color: white;
		}
	</style>
</head>
<body>
	<h1 align="center" color="white">Appliance Record</h1>
	<div class="box" align="center">
		<p>Installed Load : <font id="installedcapacity" color="white"></font>W</p>
		<div class="col-md-4"></div>
		<div class="col-md-8">
			<form action="records.php" method="post">
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
						<td><input type="number" name="r11" min="0" max="20" value="0" id="r11" onblur="update()"></td>
						<td>
							<select name="r12" id="r12">
								<option value="6">6W (Philips)</option>
								<option value="10">10W (Havells)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>LED Tubelight</td>
						<td><input type="number" name="r21" min="0" max="10" value="0" id="r21" onblur="update()"></td>
						<td>
							<select name="r22" id="r22">
								<option value="22">22W (Wipro High Lumen)</option>
								<option value="25">25W (Ecolite Tech)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>CFL Bulb</td>
						<td><input type="number" name="r31" min="0" max="20" value="0" id="r31" onblur="update()"></td>
						<td>
							<select name="r32" id="r32">
								<option value="22">22W (Osram CFL Bulbs)</option>
								<option value="27">27W (Crystal Gate Light)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Nightlamp</td>
						<td><input type="number" name="r41" min="0" max="10" value="0" id="r41" onblur="update()"></td>
						<td>
							<select name="r42" id="r42">
								<option value="4">4W (Philips)</option>
								<option value="5">5W (Havells)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Fan</td>
						<td><input type="number" name="r51" min="0" max="10" value="0" id="r51" onblur="update()"></td>
						<td>
							<select name="r52" id="r52">
								<option value="75">75W (Orient)</option>
								<option value="80">80W (Bajaj)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>AC</td>
						<td><input type="number" name="r61" min="0" max="5" value="0" id="r61" onblur="update()"></td>
						<td>
							<select name="r62" id="r62">
								<option value="1456">1456W (LG 1.5ton)</option>
								<option value="1500">1500W (Samsung 1.5ton)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>LED TV</td>
						<td><input type="number" name="r71" min="0" max="5" value="0" id="r71" onblur="update()"></td>
						<td>
							<select name="r72" id="r72">
								<option value="55">55W (Samsung 32 inches)</option>
								<option value="60">60W (LG 32 inches)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>PC / Laptop</td>
						<td><input type="number" name="r81" min="0" max="5" value="0" id="r81" onblur="update()"></td>
						<td>
							<select name="r82" id="r82">
								<option value="45">45W (Laptop)</option>
								<option value="100">100W (PC)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Geyser</td>
						<td><input type="number" name="r91" min="0" max="5" value="0" id="r91" onblur="update()"></td>
						<td>
							<select name="r92" id="r92">
								<option value="2000">2000W (AO Smith 15 litres)</option>
								<option value="1800">1800W (Bajaj 25 litres)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Music System</td>
						<td><input type="number" name="r101" min="0" max="3" value="0" id="r101" onblur="update()"></td>
						<td>
							<select name="r102" id="r102">
								<option value="60">60W (Bose Wave Music System)</option>
								<option value="75">75W (Sony Music System)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Fridge</td>
						<td><input type="number" name="r111" min="0" max="5" value="0" id="r111" onblur="update()"></td>
						<td>
							<select name="r112" id="r112">
								<option value="175">175W (Samsung Double Door)</option>
								<option value="200">200W (LG Double Door)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Chimney</td>
						<td><input type="number" name="r121" min="0" max="3" value="0" id="r121" onblur="update()"></td>
						<td>
							<select name="r122" id="r122">
								<option value="230">230W (Kutchina)</option>
								<option value="250">250W (HTC)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Washing Machine</td>
						<td><input type="number" name="r131" min="0" max="3" value="0" id="r131" onblur="update()"></td>
						<td>
							<select name="r132" id="r132">
								<option value="350">350W (Whirlpool)</option>
								<option value="370">370W (Videocon)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Elevetor</td>
						<td><input type="number" name="r141" min="0" max="2" value="0" id="r141" onblur="update()"></td>
						<td>
							<select name="r142" id="r142">
								<option value="1200">1200W (Otis 4 passenger)</option>
								<option value="1500">1500W (Johnson 8 passenger)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Water Pump</td>
						<td><input type="number" name="r151" min="0" max="2" value="0" id="r151" onblur="update()"></td>
						<td>
							<select name="r152" id="r152">
								<option value="750">750W (Kirloskar 1HP)</option>
								<option value="500">500W (Crompton 1HP)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="text" name="r160" placeholder="Custom Appliance"></td>
						<td><input type="number" name="r161" min="0" value="0" id="r161" onblur="update()"></td>
						<td><input type="number" name="r162" min="0" value="0" id="r162"></td>
					</tr>
				</tbody>
			</table>
			<button type="submit" class="btn btn-danger btn-block">Submit</button>
			</form>
		</div>
	</div>
<script type="text/javascript">
	function update()
	{
		var r11=document.getElementById("r11").value;
		var r12=document.getElementById("r12").value;
		var r21=document.getElementById("r21").value;
		var r22=document.getElementById("r22").value;
		var r31=document.getElementById("r31").value;
		var r32=document.getElementById("r32").value;
		var r41=document.getElementById("r41").value;
		var r42=document.getElementById("r42").value;
		var r51=document.getElementById("r51").value;
		var r52=document.getElementById("r52").value;
		var r61=document.getElementById("r61").value;
		var r62=document.getElementById("r62").value;
		var r71=document.getElementById("r71").value;
		var r72=document.getElementById("r72").value;
		var r81=document.getElementById("r81").value;
		var r82=document.getElementById("r82").value;
		var r91=document.getElementById("r91").value;
		var r92=document.getElementById("r92").value;
		var r101=document.getElementById("r101").value;
		var r102=document.getElementById("r102").value;
		var r111=document.getElementById("r111").value;
		var r112=document.getElementById("r112").value;
		var r121=document.getElementById("r121").value;
		var r122=document.getElementById("r122").value;
		var r131=document.getElementById("r131").value;
		var r132=document.getElementById("r132").value;
		var r141=document.getElementById("r141").value;
		var r142=document.getElementById("r142").value;
		var r151=document.getElementById("r151").value;
		var r152=document.getElementById("r152").value;
		var r161=document.getElementById("r161").value;
		var r162=document.getElementById("r162").value;
		var installedcapacity=(r11*r12)+(r21*r22)+(r31*r32)+(r41*r42)+(r51*r52)+(r61*r62)+(r71*r72)+(r81*r82)+(r91*r92)+(r101*r102)+(r111*r112)+(r121*r122)+(r131*r132)+(r141*r142)+(r151*r152)+(r161*r162);
		document.getElementById("installedcapacity").innerHTML=installedcapacity;
	}
</script>

</body>
</html>