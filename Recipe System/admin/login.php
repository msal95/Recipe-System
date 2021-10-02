
<?php
include "db.php";
session_start();
	$flg_submit = false;
	
	$flg_login = 0;
	
	if(isset($_POST['submit'])){
				
		$flg_submit = true;
		
		$admin_email = $_POST['admin_email'];
		$admin_password = $_POST['admin_password'];
		
		
		$result = mysql_query("SELECT * FROM `admin` where admin_email = '$admin_email' AND admin_password = '$admin_password'") or die(mysql_error());
		
			if(mysql_num_rows($result)){
				
				$row = mysql_fetch_assoc($result);
				
				$flg_login = 1;
				
				
				$_SESSION['admin_id'] = $row['admin_id'];
				
				header("location:index.php");
			}
			else{
				
                     header("location:login.php?msg=fail");
			}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Recipies: Admin Pannel</title>
	
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
	
	<!-- RTL support - for demo only -->
	<script src="js/demo-rtl.js"></script>
	<!-- 
	If you need RTL support just include here RTL CSS file <link rel="stylesheet" type="text/css" href="css/libs/bootstrap-rtl.min.css" />
	And add "rtl" class to <body> element - e.g. <body class="rtl"> 
	-->
	
	<!-- libraries -->
	<link rel="stylesheet" type="text/css" href="css/libs/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/nanoscroller.css" />

	<!-- global styles -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css" />

	<!-- this page specific styles -->
    <link rel="stylesheet" href="css/libs/fullcalendar.css" type="text/css" />
    <link rel="stylesheet" href="css/libs/fullcalendar.print.css" type="text/css" media="print" />
    <link rel="stylesheet" href="css/compiled/calendar.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/libs/morris.css" type="text/css" />
	<link rel="stylesheet" href="css/libs/daterangepicker.css" type="text/css" />
	<link rel="stylesheet" href="css/libs/jquery-jvectormap-1.2.2.css" type="text/css" />
	
	<!-- Favicon -->
	<link type="image/x-icon" href="favicon.png" rel="shortcut icon" />

	<!-- google font libraries -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="theme-wrapper">
		<div  class="container">
					<div class="row">
					<div class="col-md-1"></div>
						<div class="col-lg-8" style="padding:14%;">
						<div class="header">
						<h1 style="color:#fff;">LOGIN PANNEL</h1>
						</div>
					
							<form class="form-horizontal" method="POST" action="">
								<div class="form-group">
									<label class="control-label col-md-4">Email</label>
									<div class="col-md-8">
									  <input type="email" name="admin_email" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Password</label>
									<div class="col-md-8">
									  <input type="password" name="admin_password" class="form-control" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4"></label>
									<div class="col-md-8">
									  <button type="submit" name="submit" style="background:#4186ba; color:#fff;" class="btn btn-default" value="submit">LOGIN</button>
									  <button type="reset" name="reset" style="background:#d6524d; color:#fff;" class="btn btn-default" value="Reset">Reset</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<?php include "footer.php"; ?>
				</div>
			</div>
	
	
	<?php
	include "add_files.php";
	?>
</body>
</html>