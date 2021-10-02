<?php
include "db.php";
$selected_record=$_REQUEST['dish_id'];

$query="SELECT * FROM `dishes` where dish_id='$selected_record'";
$result=mysql_query($query);
$data=mysql_fetch_array($result);
	$dish_name=$data['dish_name'];
	$dish_direction=$data['dish_direction'];
	$dish_detail=$data['dish_detail'];
	$dish_ingred=$data['dish_ingred'];
if(isset($_POST['submit'])){
	$dish_name=$_POST['dish_name'];
	$dish_ingred=$_POST['dish_ingred'];
	$dish_direction=$_POST['dish_direction'];
	$dish_detail=$_POST['dish_detail'];
	
	$query=mysql_query("UPDATE `dishes` set dish_name='$dish_name', dish_ingred='$dish_ingred', dish_direction='$dish_direction', dish_detail='$dish_detail'
 where dish_id='$selected_record' ") or die(mysql_error());
	
	if($query == 1){
		header("Location:edit_dishes.php?msg=ok");

	}elseif($query == 0){
		header("Location:edit_dishes.php?msg=fail");
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
	
	<!-- Favicon -->
	<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

	<!-- google font libraries -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="theme-wrapper">
		<?php include "header.php"; ?>
		<div id="page-wrapper" class="container">
			<div class="row">
			<?php include "sidebar.php";?>
				<div id="content-wrapper">
					<div class="row">
						<div class="col-lg-12">
							
						<?php 
					$msg = $_REQUEST['msg'];

					if($msg == 'ok'){

							header("location:dishes_list.php");
						?>
					<center>
					<h2 class="alert alert-success">Successfully Updated !</h2>
					</center>
					<?php } if($msg == 'fail'){
						
						 header("refresh:1 ; url=edit_dishes.php");
					?>
					<center>
					<h2 class="alert alert-danger">PLZ Try Again !</h2>
					</center>
					<?php } ?>
							<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
							
								<div class="form-group">
									<label class="control-label col-md-2">Dish Name</label>
									<div class="col-md-9">
									<input type="text" name="dish_name" class="form-control" value="<?php echo $dish_name;?>">
									</div>
								</div>
								
							<div class="row">
								<label class="control-label col-md-2">Dish Ingredient</label>
								<div class="col-lg-9">
									<div class="main-box clearfix">
										
										
											<textarea class="form-control ckeditor" id="exampleTextarea" name="dish_ingred" value="<?php echo $dish_ingred;?>" ><?php echo $dish_ingred;?></textarea>
										
												
									</div>
								</div>
							</div>
							<div class="row">
								<label class="control-label col-md-2">Dish Direction</label>
								<div class="col-lg-9">
									<div class="main-box clearfix">
										
										
											<textarea class="form-control ckeditor" id="exampleTextarea" name="dish_direction" value="<?php echo $dish_direction;?>" ><?php echo $dish_direction;?></textarea>
										
												
									</div>
								</div>
							</div>
							<div class="row">
								<label class="control-label col-md-2">Dish Details</label>
								<div class="col-lg-9">
									<div class="main-box clearfix">
										
										
											<textarea class="form-control ckeditor" id="exampleTextarea" name="dish_detail" value="<?php echo $dish_detail;?>" ><?php echo $dish_detail;?></textarea>
										
												
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2"></label>
								<div class="col-md-9">
								  <button type="submit" name="submit" style="background:#4186ba; color:#fff;" class="btn btn-default" value="submit">Update Dish</button>
								</div>
							</div>
						</form>
						</div>
					</div>
					<?php include "footer.php"; ?>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- global scripts -->
	<script src="js/demo-skin-changer.js"></script> <!-- only for demo -->
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.nanoscroller.min.js"></script>
	
	<script src="js/demo.js"></script> <!-- only for demo -->
	
	<!-- this page specific scripts -->
	<script src="js/jquery.hotkeys.js"></script>
	
	<script src="js/ckeditor/ckeditor.js"></script>
	
	<!-- theme scripts -->
	<script src="js/scripts.js"></script>
	<script src="js/pace.min.js"></script>
	
	<!-- this page specific inline scripts -->
	<script>
	$(function(){
		function initToolbarBootstrapBindings() {
			var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
						'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
						'Times New Roman', 'Verdana'],
				fontTarget = $('[title=Font]').siblings('.dropdown-menu');
			
			$.each(fonts, function (idx, fontName) {
				fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
			});
			$('a[title]').tooltip({container:'body'});
			$('.dropdown-menu input').click(function() {return false;})
				.change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
				.keydown('esc', function () {this.value='';$(this).change();});

			$('[data-role=magic-overlay]').each(function () { 
				var overlay = $(this), target = $(overlay.data('target')); 
				overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
			});
			if ("onwebkitspeechchange"	in document.createElement("input")) {
				var editorOffset = $('#editor').offset();
				$('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
			} else {
				$('#voiceBtn').hide();
			}
		};
		function showErrorAlert (reason, detail) {
			var msg='';
			if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
			else {
				console.log("error uploading file", reason, detail);
			}
			$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
			 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
		};
			initToolbarBootstrapBindings();	
		$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
	});
	</script>
	<script>
	$(function(){
		function initToolbarBootstrapBindings() {
			var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
						'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
						'Times New Roman', 'Verdana'],
				fontTarget = $('[title=Font]').siblings('.dropdown-menu');
			
			$.each(fonts, function (idx, fontName) {
				fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
			});
			$('a[title]').tooltip({container:'body'});
			$('.dropdown-menu input').click(function() {return false;})
				.change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
				.keydown('esc', function () {this.value='';$(this).change();});

			$('[data-role=magic-overlay]').each(function () { 
				var overlay = $(this), target = $(overlay.data('target')); 
				overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
			});
			if ("onwebkitspeechchange"	in document.createElement("input")) {
				var editorOffset = $('#editor1').offset();
				$('#voiceBtn1').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor1').innerWidth()-35});
			} else {
				$('#voiceBtn1').hide();
			}
		};
		function showErrorAlert (reason, detail) {
			var msg='';
			if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
			else {
				console.log("error uploading file", reason, detail);
			}
			$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
			 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts1');
		};
			initToolbarBootstrapBindings();	
		$('#editor1').wysiwyg({ fileUploadError: showErrorAlert} );
	});
	</script>
	
</body>
</html>