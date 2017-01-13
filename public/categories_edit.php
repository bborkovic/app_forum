<?php
require_once('../includes/initialize.php');
if(!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<!-- Controller -->
<?php 
		
	if( isset($_GET['id'])) {
		$category = Category::find_by_id( $_GET['id'] );
	}

	if(isset($_POST['submit'])) {
		$form = new Form($category, ["name", "description"] );
		$form->action = "categories_edit.php?id=" . $category->id;
		$form->method = "post";
		$category = $form->parsePost($_POST, true);

		if( $form->has_validation_errors() ) {
			$error_fields = implode( ", " , array_keys($form->validation_errors) );
			$session->message( ["Validation Errors! " . $error_fields, "error"] );
		} else {
			// Save Category to DB and display message if necessary
			if($category->update_ts()) {
				$session->message( ["Category {$category->name} has been saved!" , "success"] );
				redirect_to("categories_edit.php?id=$category->id");
			} else {
				$session->message( ["Error saving! " . $error->get_errors() , "error"] );
				redirect_to("categories_edit.php?id=$category->id");
			}
		}
	}

 ?>


<?php require_once(SITE_ROOT.DS.'public/layouts/header.php'); ?>


<?php
	if(!isset($form)) {
		$form = new Form($category, ["name", "description"] );
		$form->method = "post";
		$form->action = "categories_edit.php?id=" . $category->id; // Single Page submit			
	}
?>


<!-- View -->
<div class="panel-body">

<?php output_message(); ?>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-4"><?php $form->render(); ?></div>
</div>


</div>

<?php require_once(SITE_ROOT.DS.'public/layouts/footer.php'); ?>
	    
