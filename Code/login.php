<html>
<head>
	<title>
		Login Page For Home Automation
	</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>

<body>
<br>
<h1 align="center" style="color:#404040" "font-size: 50px" "font-family: algerian">WELCOME TO HOME AUTOMATION</h1>
<br>
<div class="container">
	<div class="login-box">
	<h2 align="center" class="serif"> Login </h2>
	<p align="center" style="color: red" "text-align: center" "font-family:courier">!! Inavalid Username or Password !!</p>
	<form action="check.php" method="post">
		<div class="form-group">
            <label> User ID: </label>
            <input type="text" placeholder="Enter User ID" name="userid" class="form-control" required>
            <br>
        </div>
        <div action="form-group">
            <label> Password: </label>
            <input type="Password" placeholder="Enter Password" name="pass" class="form-control" required>
            <br>
        </div>
    <div align="center"><button type="submit" class= "btn btn-primary"> Login </button></div>

    <p align="center">New user here ? <a href="signup.php">Sign Up</a> </p>
    <p align="center">Admin Signup <a href="admin.php" >Admin</a></p>

</form>
</div>
</div>
</body>
</html>