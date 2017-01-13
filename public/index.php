<?php 
	// requires and includes all classes .. 
	require_once("../includes/initialize.php");

?>



<?php require_once(SITE_ROOT.DS.'public/layouts/header.php'); ?>

<div class="panel-body">
	<h4>Categories</h4>

	<?php 
		$categories = Category::find_all();
		foreach($categories as $category) {
			echo $category->name;
		}
	?>
	

	<?php echo $logged_user->id; ?>
</div>






<?php require_once(SITE_ROOT.DS.'public/layouts/footer.php'); ?>