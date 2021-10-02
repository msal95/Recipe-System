
<?php
include "db.php";

$target_dir="uploads/";
$target_file=$target_dir . basename(rand(1,999) . rand(1000,9999) . rand(1,999) . "_" . $_FILES["dish_photo"]["name"]);
$uploadok=1;
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST['submit']))
{
	$dish_name=$_POST['dish_name'];
	$dish_ingred=$_POST['dish_ingred'];
	$dish_direction=$_POST['dish_direction'];
	$country_name=$_POST['country_name'];
	$cat_id=$_POST['cat_id'];
	$chef_id=$_POST['chef_id'];
}
// Check File Size
if($_FILES["dish_photo"]["size"]>50000000000000){
	$uploadok=0;
}
// allow certain files formates
if($imageFileType !="jpg" && $imageFileType !="jpeg" && $imageFileType !="gif" && imageFileType !="png"){
	$uploadok=0;
}
// check if $uploadok isset to 0 by an error
if($uploadok==0){
	
}else{
	if(move_uploaded_file($_FILES["dish_photo"]["tmp_name"], $target_file)){
			$query="INSERT INTO `dishes` set dish_name='$dish_name', dish_ingred='$dish_ingred', dish_direction='$dish_direction', country_name='$country_name',
	cat_id='$cat_id', chef_id='$chef_id', dish_photo='$target_file'";
		mysql_query($query) or die(mysql_error());
	}else{
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

							header("location:add_dishes.php");
						?>
					<center>
					<h2 class="alert alert-success">Successfully Submitted !</h2>
					</center>
					<?php } if($msg == 'fail'){
						
						 header("refresh:1 ; url=add_dishes.php");
					?>
					<center>
					<h2 class="alert alert-danger">PLZ Try Again !</h2>
					</center>
					<?php } ?>
							<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
							
								<div class="form-group">
									<label class="control-label col-md-2">Dish Name</label>
									<div class="col-md-9">
									<input type="text" name="dish_name" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Chef Experties</label>
									<div class="col-md-9">
										<select class="form-control col-sm-6" name="chef_id" id="select-option" required>
											<option value="Select Chef" disabled="disabled" selected="selected">Please Select</option>
											<?php
												$query="SELECT * FROM `chefs` ";
												$result=mysql_query($query);
												do{
													$data=mysql_fetch_array($result);
													if($data){
														$chef_id=$data['chef_id'];
														$chef_level=$data['chef_level'];
												?> 
												<option value="<?php echo $chef_id ;?>"><?php echo $chef_level ;?></option>
												<?php }} while($data); ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Category</label>
									<div class="col-md-9">
										<select class="form-control col-sm-6" name="cat_id" id="select-option" required>
											<option value="Select Category" disabled="disabled" selected="selected">Please Select</option>
											<?php
												$query="SELECT * FROM `categories` ";
												$result=mysql_query($query);
												do{
													$data=mysql_fetch_array($result);
													if($data){
														$cat_id=$data['cat_id'];
														$cat_name=$data['cat_name'];
												?> 
												<option value="<?php echo $cat_id ;?>"><?php echo $cat_name ;?></option>
												<?php }} while($data); ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Category Country</label>
									<div class="col-md-9">
										<select class="form-control col-sm-6" name="country_name" id="select-option" required>
											<option value="Select Category" disabled="disabled" selected="selected">Please Select</option>
											<option value="Pakistani Dishes">Pakistani Dishes</option>
											<option value="Chinese Dishes">Chinese Dishes</option>
											<option value="Italian Dishes">Italian Dishes</option>
											<option value="Indian Dishes">Indian Dishes</option>
											<option value="Indian Dishes">Sweets</option>
											<option value="Indian Dishes">Continenetal Food</option>
										</select>
									</div>
								</div>
								
							<div class="row">
								<label class="control-label col-md-2">Dish Ingredient</label>
								<div class="col-lg-9">
									<div class="main-box clearfix">
										
										
											<textarea class="form-control ckeditor" id="exampleTextarea" name="dish_ingred" ></textarea>
										
												
									</div>
								</div>
							</div>
							<div class="row">
								<label class="control-label col-md-2">Dish Direction</label>
								<div class="col-lg-9">
									<div class="main-box clearfix">
										
										
											<textarea class="form-control ckeditor" id="exampleTextarea" name="dish_direction" ></textarea>
										
												
									</div>
								</div>
							</div>
							<div class="row">
								<label class="control-label col-md-2">Dish Detail</label>
								<div class="col-lg-9">
									<div class="main-box clearfix">
										
										
											<textarea class="form-control ckeditor" id="exampleTextarea" name="dish_detail" ></textarea>
										
												
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-2">Dish Image</label>
								<div class="col-md-9">
								<input type="file" name="dish_photo" class="form-control" required>
								</div>
							</div>	
							<div class="form-group">
								<label class="control-label col-md-2"></label>
								<div class="col-md-9">
								  <button type="submit" name="submit" style="background:#4186ba; color:#fff;" class="btn btn-default" value="submit">Add Dish</button>
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