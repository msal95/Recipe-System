
<?php
$query=mysql_query("SELECT * FROM `dishes` order by dish_id DESC ");
	$data=mysql_fetch_array($query);
	if($data){
	$dish_name=$data['dish_name'];
	$dish_id=$data['dish_id'];
	$dish_direction=$data['dish_direction'];
	$dish_photo=$data['dish_photo'];
	$chef_id=$data['chef_id'];
	}
?>
	<?php
		$chef_query = mysql_query("select * from `chefs` where chef_id = '$chef_id' ");
		
		$chef_data = mysql_fetch_array($chef_query);
		
		$chef_name = $chef_data['chef_name'];
		$chef_photo = $chef_data['chef_photo'];
	?>


<div class="rw-row subtle large home-recipe-of-the-day">
				<div class="grid-container">
					<div class="grid desk-6">
						<div class="entry-photo">
							<div class="badge">Recipe of the day</div>
							<img src="admin/<?php echo $dish_photo; ?>" alt="" />
						</div>
					</div>
					<div class="grid desk-6">
						<h3><a href="view_recipe.php?dish_id=<?php echo $dish_id; ?>"><?php echo $dish_name; ?></a></h3>
						
						<p>

							<?php echo $dish_direction; ?> 
<center><a style="text-decoration:none;" href="view_recipe.php?dish_id=<?php echo $dish_id; ?>"><button type="button" class="btn btn-primary">Read More</button></a></center>
						</p>
						
						<div class="entry-meta clearfix">
							<div class="meta favorites"> 
								<span class="icon"><i class="the-icon fa fa-heart-o"></i></span>
								<span class="number">89 favorites</span>
							</div>
							<div class="meta likes"> 
								<span class="icon"><i class="the-icon fa fa-thumbs-o-up"></i></span>
								<span class="number">225 likes</span>
							</div>
							<div class="meta comments"> 
								<span class="icon"><i class="the-icon fa fa-comments"></i></span>
								<span class="number">26 comments</span>
							</div>
						</div>
						<div class="clear"></div>

						<div class="entry-info-author">
							<img src="admin/<?php echo $chef_photo; ?>" width="70px" />
							<div class="submited-by">Author:</div>
							<div class="author-name"><a href="#"><?php echo $chef_name; ?></a> <span class="mark green" title="Pro member!">Pro</span></div>
							<div class="total-recipes">136 recipes</div>
						</div>

					</div>
				</div>
			</div>