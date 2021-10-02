
<?php
include "db.php";

if(isset($_POST['submit'])){
	$cat_name=$_POST['cat_name'];
	$country_name=$_POST['country_name'];
	
	$query=mysql_query("INSERT INTO `categories` set country_name='$country_name', cat_name='$cat_name'") or die(mysql_error());
	
	if($query == 1){
		header("Location:add_categories.php?msg=ok");

	}elseif($query == 0){
		header("Location:add_categories.php?msg=fail");
	}
		
		}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Recipies: Admin Panel</title>
	
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
		<?php include "header.php";?>
		<div id="page-wrapper" class="container">
			<div class="row">
				<?php include "sidebar.php"?>
				<div id="content-wrapper">
				<div class="header">
				<h1 style="color:#fff;">Add Category</h1>
				</div>
					<div class="row">
						<div class="col-lg-8">
						
						<?php 
					$msg = $_REQUEST['msg'];

					if($msg == 'ok'){

							header("location:categories_list.php");
						?>
					<center>
					<h2 class="alert alert-success">Successfully Submitted !</h2>
					</center>
					<?php } if($msg == 'fail'){
						
						 header("refresh:1 ; url=add_categories.php");
					?>
					<center>
					<h2 class="alert alert-danger">PLZ Try Again !</h2>
					</center>
					<?php } ?>
						
							<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-md-4">Add Category</label>
									<div class="col-md-8">
									<input type="text" name="cat_name" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4">Add Category Country</label>
									<div class="col-md-8">
									<input type="text" name="country_name" class="form-control">
									</div>
								</div>
								<div class="form-group">
										<label class="control-label col-md-4"></label>
										<div class="col-md-8">
										  <button type="submit" name="submit" style="background:#4186ba; color:#fff;" class="btn btn-default" value="submit">Add</button>
										</div>
									</div>
							</form>	
						</div>
						<div class="col-md-4"></div>
					</div>
					
					<?php include "footer.php"; ?>
				</div>
			</div>
		</div>
	</div>
	
	
	<?php
	include "add_files.php";
	?>
</body>
</html>