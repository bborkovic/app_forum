<?php
require_once('../includes/initialize.php');
if(!$session->is_logged_in()) { redirect_to("login.php"); }
?>


<?php 
	$categories = Category::find_all();
?>


<?php require_once(SITE_ROOT.DS.'public/layouts/header.php'); ?>

<div class="panel-body">
	<?php output_message(); ?>
	<h4>Categories</h4>
	<div class="row">
		<div class="col-sm-2">
			<p><a href=""></a></p>
			<p><a href="categories_index.php">Categories index</a></p>
		</div>
		<div class="col-sm-10">
				<!-- display the table of all categories selected -->
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>

					<?php foreach ($categories as $category): ?>
						<tr>
							<td><?php echo $category->name; ?></td>
							<td><?php echo $category->description; ?></td>
							<td><a href="categories_edit.php?id=<?php echo $category->id;?>">Edit</a></td>
							<td><a href="categories_delete.php?id=<?php echo $category->id;?>">Delete</a></td>
						</tr>
					<?php endforeach; ?>

					</tbody>
				</table>

				<h5>Create new Category</h5>
				<a href="categories_new.php" class="btn btn-default">Create</a>

		</div>
	</div>




</div>

<?php require_once(SITE_ROOT.DS.'public/layouts/footer.php'); ?>
	    
