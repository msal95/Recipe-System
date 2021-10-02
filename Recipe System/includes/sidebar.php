<?php
include "db.php";
$dish_name=$_REQUEST['dish_name'];
?>
<div class="rw-column rw-sidebar">
	<div class="the-sidebar">
		<!-- Widget -->
		<aside class="widget widget-search">

			<div class="widget-title"><h3>Search</h3></div>

			<form method="get" class="search-form" action="">
				<input type="text" class="search-field fullwidth" name="dish_name" placeholder="Type keyword and press enter" value="">
				<button type="submit" class="btn btn-primary" name="submit">Search</button>
			</form>
			
<?php
if(isset($_GET['submit'])){
?>
<table class="table-bordered">
	<tr>
		<td>Dish Name</td>
		<td>Dish Category</td>
		<td>Chef Name</td>
		<td>Action</td>
	</tr>
	<?php
	$query="SELECT * FROM `dishes` where dish_name LIKE '%$dish_name%' ";
	$result=mysql_query($query);
	do{
		$data=mysql_fetch_array($result);
		if($data){
			$dish_id=$data['dish_id'];
			$dish_name=$data['dish_name'];
			$cat_id=$data['cat_id'];
			$chef_id=$data['chef_id'];
			$dish_direction=$data['dish_direction'];
			$dish_ingred=$data['dish_ingred'];
			$dish_detail=$data['dish_detail'];
	?>
	<tr>
		<td><?php echo $dish_name; ?></td>
		<td><?php echo $cat_id; ?></td>
		<td><?php echo $chef_id; ?></td>
		<td><a href="search_recipe.php?id=<?php echo $dish_id ?>">View</a></td>
	</tr>
	<?php }} while($data); ?>
<?php } ?>
</table>

		</aside> <!-- .widget -->
		<!-- / Widget -->

		<!-- Widget -->
		<aside class="widget widget-posts">
		
			<div class="widget-title"><h3>Most popular recipes</h3></div>

			<div class="widget-posts-list">
<?php
$query=mysql_query("SELECT * FROM `dishes` order by dish_id DESC ");
do{
	$data=mysql_fetch_array($query);
	if($data){
	$dish_name=$data['dish_name'];
	$dish_id=$data['dish_id'];
	$dish_direction=$data['dish_direction'];
	$dish_photo=$data['dish_photo'];
?>
				<!-- Entry -->
				<div class="post">
					<div class="entry-photo">
						<img src="admin/<?php echo $dish_photo; ?>" alt="" />
					</div>
					<div class="entry-title">
						<a href="view_recipe.php?dish_id=<?php echo $dish_id; ?>"><?php echo $dish_name; ?></a>
					</div>
					<div class="entry-controls minimal">
						<a href="#" class="control entry-to-favorites" title="Add to favorites"> <i class="fa fa-heart-o"></i> </a><span class="control-tip">127</span>
						<a href="#" class="control entry-like" title="I like this!"> <i class="fa fa-thumbs-o-up"></i> </a> <span class="control-tip">322</span>
						<a href="#" class="control entry-comments" title="Comments"> <i class="fa fa-comments"></i> </a> <span class="control-tip">102</span>
					</div>
				</div> <!-- .entry -->
	<?php }} while ($data);?>		
			</div>

		</aside> <!-- .widget -->
		<!-- / Widget -->

		<!-- Widget -->
		<aside class="widget widget-categories">

			<div class="widget-title"><h3>Categories</h3></div>
	<?php
	$query=mysql_query("SELECT * FROM `categories`");
	while($row=mysql_fetch_array($query)){
	?>
			<ul>
				<li><a href="#"><?php echo $row['cat_name']; ?> <span class="mark light-gray">157</span></a></li>
			</ul>
	<?php } ?>
		</aside> <!-- .widget -->
		<!-- / Widget -->

	
		

	</div> <!-- .the-sidebar -->
</div> <!-- .rw-sidebar -->
