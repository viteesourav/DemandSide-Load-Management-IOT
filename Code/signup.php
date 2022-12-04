<!DOCTYPE html>
<html>
<head>
	<title>New User Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script>
			// Function to check Whether both passwords is same or not. 
			function checkPassword(form) 
			{ 
				password = form.password.value; 
				confirmpassword = form.confirmpassword.value; 
				userid=form.userid.value;

				if (password != confirmpassword) 
				{ 
					alert ("\nPassword did not match: Please try again...") 
					return false; 
				} 
				return true;
			} 
	</script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	function checkname()
	{
 		var name=document.getElementById( "userid" ).value;
	
		if(name)
 		{
  			$.ajax({
  			type: 'post',
  			url: 'onkeycheck.php',
  			data: {
   				userid:name,
  			},
  			success: function (response) {
   				$( '#name_status' ).html(response);
   				if(response=="Available")	
   				{
	   				$("#name_status").css('color', '#003300', 'important');
	   				document.getElementById("finally").disabled=false;
    				return true;
   				}
   				else
   				{
	   				$("#name_status").css('color', '#FF0004', 'important');
	   				//alert("\n User Id already exit... Try  Again !!")
	   				document.getElementById("finally").disabled=true;
    				return false;
   				}
  			}
  		});
 		}
 		else
 		{
  			$( '#name_status' ).html("");
  			return false;
 		}
	}
</script>

</head>
<body>

	<div class="container">
		<div class="login-box">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 login-center">
				<h2 align="center">Register Here</h2>
				<form action="registration.php" method="post" onSubmit = "return checkPassword(this);">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" name="firstname" class="form-control" required placeholder="Enter First Name">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" name="lastname" class="form-control" required placeholder="Enter Last Name">
					</div>
					<div class="form-group">
						<label>Email ID</label>
						<input type="email" name="email" class="form-control" required placeholder="Enter Email ID">
					</div>
					<div class="form-group">
						<label>User Name</label>
						<input type="text" name="userid" id="userid" class="form-control" required placeholder="Enter User Name" onkeyup="checkname();">
						<br>
						<p id="name_status"></p>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required placeholder="Enter Password">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="confirmpassword" class="form-control" required placeholder="Confirm Password">
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="number" class="form-control" required placeholder="Enter Phone Number">
					</div>
					<button type="submit" id="finally" class="btn btn-danger btn-block">Register</button>
				</form>
			</div>
		</div>
	</div>
	</div>
</body>
</html>>