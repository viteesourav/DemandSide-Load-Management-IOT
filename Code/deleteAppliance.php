<!DOCTYPE html>
<html>
<head>
	<title>Delete Appliance</title>
	<style type="text/css">
        body{
            background: rgb(58,180,125);
            background: linear-gradient(166deg, rgba(58,180,125,1) 45%, rgba(65,184,255,1) 76%);
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
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script type="text/javascript">
     	function delete_confirm(){
     		if($('.checkbox:checked').length > 0){
     			var result = confirm("Are you sure to delete selected appliances?");
        		if(result){
            		return true;
        		}else{
            		return false;
        		}
    		}else{
        		alert('Select at least 1 record to delete.');
        		return false;
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
		
	    $('.checkbox').on('click',function(){
	        if($('.checkbox:checked').length == $('.checkbox').length){
	            $('#select_all').prop('checked',true);
	        }else{
	            $('#select_all').prop('checked',false);
	        }
	    });
	});
     </script>
</head>
<body>
	<?php if(!empty($statusMsg)){ ?>
<div class="alert alert-success"><?php echo $statusMsg; ?></div>
<?php } ?>
<div class="container">
<!-- Users data list -->
<h2>Appliance List</h2>
<div align="right">
		<a href="mainpage.php" class="btn btn-primary">Home</a>
		<a href="logout.php" class="btn btn-primary">Logout</a>
	</div>	
	<hr><hr>
<form name="bulk_action_form" action="action.php" method="post" onSubmit="return delete_confirm();"/>
    <table class="table-content">
        <thead>
        <tr>
            <th><input type="checkbox" id="select_all" value=""/></th>        
            <th>Appliance</th>
            <th>Number of Units</th>
            <th>Power Rating (in Watts)</th>
        </tr>
        </thead>
        <?php
        session_start();
        // Include the database configuration file
        $con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");
        
        // Get users from the database
        $userid=$_SESSION['userid'];
		$qry= "SELECT id,Appliance, Num, Rating from $userid";
		$result=mysqli_query($con,$qry);
        
        // List all records
        if(mysqli_num_rows($result) >0){
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>        
            <td><?php echo $row['Appliance']; ?></td>
            <td><?php echo $row['Num']; ?></td>
            <td><?php echo $row['Rating']; ?></td>
        </tr>
        <?php } }else{ ?>
            <tr><td colspan="5">No records found.</td></tr>
        <?php } ?>
    </table>
    <input type="submit" class="btn btn-danger btn-block" name="bulk_delete_submit" value="DELETE"/>
</form>
<hr><hr>
</body>
</html>