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
	<h2 align="center" class="serif"> Welcome Admins </h2>
	<form action="checkadmin.php" method="post">
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
</form>
</div>
</div>
</body>
</html>