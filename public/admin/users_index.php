<?php
require_once('../../includes/initialize.php');
if(!$session->is_logged_in()) { redirect_to("login.php"); }
?>


<?php 
	$users = User::find_all();
?>


<?php require_once(SITE_ROOT.DS.'public/layouts/admin_header.php'); ?>

<div class="panel-body">
	<?php output_message(); ?>
	<div class="row">
		<div class="col-sm-2">
			<p><a href=""></a></p>
			<p><a href="common_fields_index.php">Users index</a></p>
			<p><a href="common_fields_index.php">New User</a></p>
		</div>
		<div class="col-sm-10">
				<!-- display the table of all categories selected -->
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Username</th>
							<th>First Name</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>

					<?php foreach ($users as $user): ?>
						<tr>
							<td><?php echo $user->username; ?></td>
							<td><?php echo $user->first_name; ?></td>
							<td><a href="users_edit.php?id=<?php echo $user->id;?>">Edit</a></td>
							<td><a href="users_delete.php?id=<?php echo $user->id;?>">Edit</a></td>
						</tr>
					<?php endforeach; ?>

					</tbody>
				</table>

				<h5>Create new user</h5>
				<a href="users_new.php" class="btn btn-default">Create</a>

		</div>
	</div>




</div>

<?php require_once(SITE_ROOT.DS.'public/layouts/admin_footer.php'); ?>
	    
