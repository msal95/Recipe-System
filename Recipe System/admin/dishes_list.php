
<?php
include "db.php";
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
		<?php include "header.php";?>
		<div id="page-wrapper" class="container">
			<div class="row">
				<?php include "sidebar.php"?>
				<div id="content-wrapper">
				<div class="header">
				<h1 style="color:#fff;">Dishes List</h1>
				</div>
					<div class="row">
						<div class="col-lg-12">
						<table class="table table-bordered">
						<thead>
							<tr class="active">
								<th style="text-align:center;">Dish ID</th>
								<th style="text-align:center;">Dish Name</th>
								<th style="text-align:center;">Dish Ingredients</th>
								<th style="text-align:center;">Dish direction</th>
								<th style="text-align:center;">Dish details</th>
								<th style="text-align:center;">Dish Image</th>
								<th style="text-align:center;">Country Name</th>
								<th style="text-align:center;">Dish Category</th>
								<th style="text-align:center;">Chef ID</th>
								<th style="text-align:center;">Action</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$query = "SELECT * FROM `dishes`";

							$result=mysql_query($query);
							do{
							$data=mysql_fetch_array($result);

							if($data){
								$dish_id=$data['dish_id'];
								$dish_name=$data['dish_name'];
								$dish_ingred=$data['dish_ingred'];
								$dish_direction=$data['dish_direction'];
								$dish_detail=$data['dish_detail'];
								$dish_photo=$data['dish_photo'];
								$country_name=$data['country_name'];
								$cat_id=$data['cat_id'];
								$chef_id=$data['chef_id'];

							?>
							
							
							<tr>
								<td style="text-align:center;"><?php echo $dish_id; ?></td>
								<td style="text-align:center;"><?php echo $dish_name; ?></td>
								<td style="text-align:center;"><button type="button" class="btn btn-primary" id="<?php echo $dish_id; ?>" data-toggle="modal" data-target="#mymodal<?php echo $dish_id; ?>">View</button></td>
								<td style="text-align:center;"><?php echo $dish_direction; ?></td>
								<td style="text-align:center;"><?php echo $dish_detail; ?></td>
								<td style="text-align:center;"><a href="update_dish_photo.php?dish_id=<?php echo $dish_id; ?>"><img src="<?php echo $dish_photo; ?>" width="50px" height="50px"></a></td>
								<td style="text-align:center;"><?php echo $country_name; ?></td>
								<td style="text-align:center;"><?php echo $cat_id; ?></td>
								<td style="text-align:center;"><?php echo $chef_id; ?></td>
								<td style="text-align:center;">
								 <a href="edit_dishes.php?dish_id=<?php echo $dish_id; ?>"><i class="fa fa-pencil-square-o" style="color:green;" aria-hidden="true"></i></a> |
								<a href="delete_dishes.php?dish_id=<?php echo $dish_id; ?>"><i class="fa fa-trash-o" style="color:red;" aria-hidden="true"></i></a>
								</td>
							</tr>
							
							<div class="modal fade" id="mymodal<?php echo $dish_id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
										<button class="close" data-dismiss="modal">&times;</button>
											<h4>Dish Ingredients</h4>
										</div>
										<div class="modal-body">
											<?php echo $dish_ingred; ?>
										</div>
										<div class="modal-footer">
											<button class="close" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
<?php 
	}
}while($data);
?>
						</tbody>
					</table>
					</div>
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