<?php 
require_once('../../includes/initialize.php');
// if(!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<?php require_once(SITE_ROOT.DS.'public/layouts/admin_header.php'); ?>

<div class="panel-body">

<div class="row">
	<div class="col-sm-2">Left row</div>
	<div class="col-sm-4">
<a href="http://tinypic.com?ref=a5c8xf" target="_blank"><img src="http://i44.tinypic.com/a5c8xf.jpg" border="0" alt="Image and video hosting by TinyPic"></a>


	</div>
	<div class="col-sm-2">Right row</div>
	<div class="col-sm-4">Right row</div>
</div>



	<?php 


		// $user = User::find_by_id(3);

		// $form = new Form( $user );
		// $form->render();
	?>

</div>


<?php require_once(SITE_ROOT.DS.'public/layouts/admin_footer.php'); ?>
      


