
<?php
	include "db.php";
	$selected_record=$_REQUEST['id'];
?>

<!DOCTYPE html>
<html lang="en">

<!-- Skill Technologies Inc./single-recipe.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:17:08 GMT -->
<!-- Skill Technologies Inc. --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Skill Technologies Inc. -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Single Recipe Page</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dosis">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/fonts/awards/awards.css" />
	<link rel="stylesheet" href="assets/css/styles.css" />
	<?php include "includes/meta.php"; ?>
</head>
<body>
<section id="rw-layout" class="rw-layout">

<!--
// ===================================^__^=================================== //
   Header
// ===================================^__^=================================== //
-->
<?php include "includes/header.php"; ?>
<!--
// ===================================^__^=================================== //
   Content
// ===================================^__^=================================== //
-->
<div class="rw-section rw-container right-sidebar">
	<div class="rw-inner clearfix">

		
<!-- Sidebar -->
<?php include "includes/sidebar.php"; ?>

		<!-- Main content -->
		<div class="rw-column rw-content">
			
			<div class="rw-row page-breadcrumb">
				<a href="#">Home</a> &raquo; <a href="#">Recipes</a> &raquo; <span>Spicy Rapid Roast Chicken</span>
			</div>
<?php
$query=mysql_query("SELECT * FROM `dishes` where dish_id='$selected_record' ");
	$data=mysql_fetch_array($query);
	if($data){
	$dish_name=$data['dish_name'];
	$dish_direction=$data['dish_direction'];
	$dish_detail=$data['dish_detail'];
	$dish_ingred=$data['dish_ingred'];
	$dish_photo=$data['dish_photo'];
	$chef_id=$data['chef_id'];
	}
?>
			<div class="rw-row page-title">
				<h1><?php echo $dish_name; ?></h1>
			</div>
			
			<div class="rw-row">

				<!--
				// ===================================^__^=================================== //
				   Entry first
				// ===================================^__^=================================== //
				-->
				<div class="entry style-columns">
				
							

	<?php
		$chef_query = mysql_query("select * from `chefs` where chef_id = '$chef_id' ");
		
		$chef_data = mysql_fetch_array($chef_query);
		
		$chef_name = $chef_data['chef_name'];
		$chef_photo = $chef_data['chef_photo'];
	?>
				
					<div class="entry-photo single-recipe-photo-cover">
						<img src="admin/<?php echo $dish_photo;?>" alt="">
						<div class="recipe-tools">
							<div class="tool like" title="Like (686)"><i class="the-icon fa fa-thumbs-o-up"></i></div>
							<div class="tool favorite active" title="Add to favorites (320)"><i class="the-icon fa fa-heart-o"></i></div>
							<div class="tool collection" title="Add to collection (47)"><i class="the-icon fa fa-bookmark-o"></i></div>
							<div class="tool print" title="Print (108)"><i class="the-icon fa fa-print"></i></div>
							<div class="tool share" title="Share (210)"><i class="the-icon fa fa-share-alt"></i></div>
						</div>
					</div>
					<div class="entry-content clearfix">

						<div class="recipe-content">
							
							<div class="single-recipe-ingredients">
								<h3 class="recipe-headlines ingredients first">Ingredients:</h3>
								<?php echo $dish_ingred; ?>
							</div>

							<h3 class="recipe-headlines preparation-mode">Preparation mode:</h3>
							<p><?php echo $dish_direction; ?></p>

							<h3 class="recipe-headlines footnotes">Footnotes:</h3>
							<p><?php echo $dish_detail; ?></p>
							
						
						</div>
						
						<div class="recipe-meta">
							<ul>
								<li>
									<div class="entry-info-author">
										<img src="admin/<?php echo $chef_photo; ?>" >
										<div class="author-name"><a href="#"><?php echo $chef_name; ?></a> <span class="mark green" title="Pro member!">Pro</span></div>
										<div><a href="#" class="follow-user button mini blue" title="851 followers">
											<i class="fa fa-plus"></i> <span class="text">Follow</span>
										</a></div>
									</div>
								</li>
								<li><i class="the-icon fa fa-calendar" title="Submited on 21 Aug 2014"></i> <span>21 Aug 2014</span></li>
								<li><div><i class="the-icon fa fa-book" title="Category"></i> <span><a href="#">Desserts</a></span></div></li>
								<li><div><i class="the-icon fa fa-tasks" title="Difficulty"></i> <span>Easy</span></div></li>
								<li><div><i class="the-icon fa fa-clock-o" title="Preparation time"></i> <span>45 minutes</span></div></li>
								<li><i class="the-icon fa fa-bar-chart" title="2560 people read this"></i> <span>2560 views</span></li>
								<li><div><i class="the-icon fa fa-heart" title="Favorited by 320 users"></i> <span>320 favorites</span></div></li>
								<li><div><i class="the-icon fa fa-thumbs-up" title="686 like this"></i> <span>686 likes</span></div></li>
							</ul>
						</div>

					</div> <!-- .entry-content -->
					<div class="clear"></div>
					
				</div> <!-- .entry -->
				<div class="clear"></div>
				

			</div> <!-- .rw-row -->

		
		
			<div class="rw-row light-gray border-tb">
				
				<h2>Comments - 1:</h2>
				<ul class="post-comments">

					<li class="comment">
						<div class="comment-avatar">
							<img src="assets/placeholder/15.jpg" class="avatar" alt="" />
						</div>
						<div class="content">
							<div class="comment-header">
								<a href="#">David Walker</a><span class="comment-time">28 January 2013</span>
								<div class="comment-vote">
									<div class="control upvote"><i class="fa fa-chevron-up"></i></div>
									<div class="counter negative">-52</div>
									<div class="control downvote"><i class="fa fa-chevron-down"></i></div>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore a ut magna aliqua	tempor.</p>
						</div>

						<a href="#" class="comment-reply"><i class="fa fa-reply"></i> Reply</a>
						
					</li><!-- comment end -->

				</ul>
				
			</div> <!-- .rw-row -->

			<div class="rw-row">
				
				<!-- <h2>Leave a Reply</h2> -->
				<div id="respond" class="comment-respond clearfix">
					<div class="grid-container">
						<form action="#" method="post"class="comment-form">
							<!-- 
							<div class="grid desk-4 alpha">
								<div class="label">Name(required)</div>
								<input name="author" type="text" class="fullwidth" />
							</div>

							<div class="grid desk-4">
								<div class="label">Email(required)</div>
								<input name="email" type="text" class="fullwidth" />
							</div>

							<div class="grid desk-4 omega">
								<div class="label">Website</div>
								<input name="url" type="text" class="fullwidth" />
							</div>
 							-->
							<div class="grid desk-12 alpha omega">
								<div class="label">Comment</div>
								<textarea name="comment"></textarea>
							</div>

							<p class="form-submit clearfix">
								<input name="submit" class="button primary" type="submit" value="Post Comment" />
								<span class="comment-form-question"><i class="fa fa-question-circle fa-2x"></i></span>
								<div class="form-allowed-tags" style="display: none;">
									<span class="ftg-title" style="display: none">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:</span>							
									<code>&lt;a href=&quot;&quot; title=&quot;&quot;&gt;</code><br />
									<code>&lt;abbr title=&quot;&quot;&gt;</code><br />
									<code>&lt;acronym title=&quot;&quot;&gt;</code><br />
									<code>&lt;b&gt;</code><br />
									<code>&lt;blockquote cite=&quot;&quot;&gt;</code><br />
									<code>&lt;cite&gt;</code><br />
									<code>&lt;code&gt;</code><br />
									<code>&lt;del datetime=&quot;&quot;&gt;</code><br />
									<code>&lt;em&gt;</code><br />
									<code>&lt;i&gt;</code><br />
									<code>&lt;q cite=&quot;&quot;&gt;</code><br />
									<code>&lt;strike&gt;</code><br />
									<code>&lt;strong&gt;</code><br />
								</div>
							</p>
							
						</form>
					</div>
				</div><!-- #respond -->

			</div> <!-- .rw-row -->

		</div> <!-- .rw-content -->

	</div> <!-- .rw-inner -->
</div> <!-- .rw-container -->

<!--
// ===================================^__^=================================== //
   Footer
// ===================================^__^=================================== //
-->
<?php include "includes/footer.php"; ?>

</section><!-- .rw-layout -->

<!-- Javascript -->
<script src="../../../code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="assets/js/min/smk-menu.min.js"></script>
<script src="assets/js/rw-sidebar.js"></script>
<script src="assets/js/min/jquery.qtip.min.js"></script>
<script src="assets/js/min/smk-accordion.min.js"></script>
<script src="assets/js/min/smk-visual-select.min.js"></script>
<script src="assets/js/min/owl.carousel.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>

<!-- Skill Technologies Inc./single-recipe.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:17:45 GMT -->
</html>