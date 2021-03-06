<!DOCTYPE html>
<html>
<head>
  <title>Njuskalo</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <!-- Bootstrap -->
  <script src="javascripts/jquery-3.1.0.min.js"></script>
  <script src="javascripts/bootstrap.min.js"></script>
  <link href="stylesheets/bootstrap.min.css" rel="stylesheet">
  <link href="stylesheets/mystyle.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Njuskalo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More Actons<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="categories_index.php">Categories</a></li>
            <li><a href="common_fields_index.php">Common Fields</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="my_ads_index.php">My Ads</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Other link</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo ($session->is_logged_in()) ? "logout.php" : "login.php"; ?>">
          <?php echo ($session->is_logged_in()) ? "Logout" : "Login"; ?>
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $logged_user->username; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Forum</h4>
      </div>