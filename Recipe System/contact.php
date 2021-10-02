<!DOCTYPE html>
<html lang="en">

<!-- Skill Technologies Inc./help-ask-question.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:19:12 GMT -->
<!-- Skill Technologies Inc. --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Skill Technologies Inc. -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Us</title>
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
<div class="rw-container rw-section">
	<div class="rw-inner clearfix">

		<!-- Main content -->
		<div class="rw-column rw-content">
			
			<div class="rw-row page-breadcrumb">
				<a href="#">Home</a> &raquo; <span>Ask question</span>
			</div>
			<div class="rw-row page-title">
				<h1>Ask question</h1>
			</div>
			
			<div class="rw-row subtle">				
			<div class="grid-container">
				<div class="help-container">

					<div class="help-boxes clearfix">
						<div class="grid desk-4">
							<a href="help-faq.html" class="box faq">
								<span class="the-icon"><i class="sign fa fa-life-ring"></i></span>
								<span class="title">FAQ</span>
								<span class="description"><span>First of all see the frequently asked questions. The answer to your question might be there.</span></span>
							</a>
						</div>
						<div class="grid desk-4">
							<a href="help-ask-question.html" class="box ask">
								<span class="the-icon"><i class="sign fa fa-comments-o"></i></span>
								<span class="title">Ask questions</span>
								<span class="description"><span>If you can't find the answer to your question anywhere on our site then you may submit it here.</span></span>
							</a>
						</div>
						<div class="grid desk-4">
							<a href="help-all-questions.html" class="box all">
								<span class="the-icon"><i class="sign fa fa-bullhorn"></i></span>
								<span class="title">All questions</span>
								<span class="description"><span>See what people already asks. You also may help them if you know the answer.</span></span>
							</a>
						</div>
					</div>

					<div class="ask-question-form">
						<form>
							<div class="grid desk-7">
								<div class="form-label">Title</div>
								<input type="text" class="fullwidth" name="title" />
							</div>

							<div class="grid desk-5">
								<div class="form-label">Category</div>
								<select name="category" class="fullwidth">
									<option>General</option>
									<option>Submission</option>
									<option>Social connect</option>
									<option>Membership Information</option>
									<option>Cooking Questions</option>
									<option>Finding Recipes</option>
									<option>Recipe Page</option>
									<option>Technical Questions</option>
									<option>Forums</option>
								</select>
							</div>

							<div class="grid desk-12">
								<div class="form-label">Message</div>
								<textarea name="message" class="big"></textarea>
							</div>

							<div class="grid desk-12">
								<input type="submit" value="Submit" class="button primary" />
							</div>

						</form>
					</div>

				</div> <!-- .help-container -->
			</div> <!-- .grid-container -->
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

<!-- Skill Technologies Inc./help-ask-question.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:19:13 GMT -->
</html>