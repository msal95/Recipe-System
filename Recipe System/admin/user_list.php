
<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Recipies Admin Pannel</title>
	
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
				<h1 style="color:#fff;">Users List</h1>
				</div>
					<div class="row">
						<div class="col-lg-12">
						<table class="table table-bordered">
							<tr>
								<td style="text-align:center;">User Name</td>
								<td style="text-align:center;">Email</td>
								<td style="text-align:center;">Photo</td>
								<td style="text-align:center;">Action</td>
							</tr>
							
							<?php
							$query="SELECT * FROM `user` " ;
							$result=mysql_query($query);
							do{
								$data=mysql_fetch_array($result);
								if($data){
									$u_id=$data['u_id'];
									$u_name=$data['u_name'];
									$u_email=$data['u_email'];
									$u_photo=$data['u_photo'];
							?>
							<tr>
								<td style="text-align:center;"><?php echo $u_name; ?></td>
								<td style="text-align:center;"><?php echo $u_email; ?></td>
								<td style="text-align:center;"><a href="update_user_photo.php?u_id=<?php echo $u_id; ?>"><img src="<?php echo $u_photo; ?>" width="50px" height="50px"></a></td>
								<td style="text-align:center;">
								<a href="edit_user.php?u_id=<?php echo $u_id; ?>"><i class="fa fa-pencil-square-o" style="color:green;" aria-hidden="true"></i></a> |
								<a href="delete_user.php?u_id=<?php echo $u_id; ?>"><i class="fa fa-trash-o" style="color:red;" aria-hidden="true"></i></a>
								</td>
							</tr>
							<?php
							}} while($data);
							?>
						</table>
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