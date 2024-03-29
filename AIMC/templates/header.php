<?php 

$server = 'http://' . $_SERVER['SERVER_NAME'] . '/AIMC/';

$user_logged = false;

?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/sweetalert"> 
<style>
a{
	text-decoration : none!important;
}
.card:hover{
	background:#9effb3;
}
 .hvr-float-shadow{
	 display:inline-block;
	 vertical-align:middle;
	 -webkit-transform:perspective(1px) translateZ(0);
	 transform:perspective(1px) translateZ(0);
	 box-shadow:0 0 1px rgba(0,0,0,0);position:relative;
	 -webkit-transition-duration:.3s;
	 transition-duration:.3s;
	 -webkit-transition-property:transform;
	 transition-property:transform
	 }
 .hvr-float-shadow:before,.woocommerce a.button:before{
	 pointer-events:none;
	 position:absolute;
	 z-index:-1;
	 content:'';
	 top:100%;
	 left:5%;
	 height:10px;
	 width:90%;
	 opacity:0;
	 background:-webkit-radial-gradient(center,ellipse,rgba(0,0,0,.35) 0,rgba(0,0,0,0) 80%);
	 background:radial-gradient(ellipse at center,rgba(0,0,0,.35) 0,rgba(0,0,0,0) 80%);
	 -webkit-transition-duration:.3s;
	 transition-duration:.3s;
	 -webkit-transition-property:transform,opacity;
	 transition-property:transform,opacity
	 }
 .hvr-float-shadow:active,
 .hvr-float-shadow:focus,
 .hvr-float-shadow:hover,
 .woocommerce a.button:active ,
 .woocommerce a.button:focus,
 .woocommerce a.button:hover{
	 -webkit-transform:translateY(-5px);
	 transform:translateY(-5px)
	 }
 .hvr-float-shadow:active:before,
 .hvr-float-shadow:focus:before,
 .hvr-float-shadow:hover:before,
 .woocommerce a.button:active:before,
 .woocommerce a.button:focus:before,
 .woocommerce a.button:hover:before
 {
	 opacity:1;
	 -webkit-transform:translateY(5px);
	 transform:translateY(5px)
	 }
</style>
	<title>Online AIMC (Agricultural Industrial Machinery Company)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="<?php echo $server; ?>css/style.css" >
 
<!-- Latest compiled and minified JavaScript -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<header class="d-flex w-100">
	<nav class="navbar navbar-expand-lg w-100 bg-light">
		<div class="navbar-collapse collapse justify-content-between">
			<ul class="navbar-nav" id="navbar">
				<li class="nav-item active">
					<a class="nav-link text-dark" href="<?php echo $server; ?>index.php"><i class="fa fa-shopping-basket text-dark"></i> AIMC</a>
				</li>
				
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
					$user_logged = true;
					if ($_SESSION['role'] == 'admin') { ?>
						<li class="nav-item">
							<a class="nav-link text-dark" href="<?php echo $server; ?>components/machines/view.php">Machines</a>
						</li>
					<?php } 
				} ?>

			</ul>
			<ul class="navbar-nav">
				<div class="d-flex my-2 my-lg-0">
				    <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				    <button id="searchBtn"class="btn btn-outline-light m-2 my-sm-0" type="button">Search</button>
				</div>
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item cart mr-4">
					<a class="nav-link btn bg-success" href="<?php echo $server; ?>templates/cart.php">
						<span class="text-white">0 </span>
						<i class="fa fa-shopping-cart text-white" style="font-size: 18px;"></i>
					</a>
				</li>

				<?php 
				if ($user_logged) { ?>
					<li class="nav-item mr-sm-2">
						<a class="nav-link btn btn-dark text-white" href="<?php echo $server; ?>components/user/logout.php"><span><i class="fa fa-sign-out text-white"></i></span>Sign Out</a>
					</li>
				<?php } else { ?>
				    <li class="nav-item mr-sm-2">
						<a class="nav-link btn btn-primary text-white" href="<?php echo $server; ?>components/user/login.php"><span><i class="fa fa-sign-in text-white"></i></span> Sign In</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</nav>
</header>

<div class="container-fluid page-container">
