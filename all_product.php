<!DOCTYPE html>

<?php 

include "functions/functions.php";


?>




<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Simple Sidebar - Start Bootstrap Template</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="css/styles.css" rel="stylesheet" />
</head>
<body>
	<div class="d-flex" id="wrapper">
		<!-- Sidebar-->
		<div class="border-end bg-white" id="sidebar-wrapper">

			<div class="sidebar-heading border-bottom bg-light" style="
			font-weight: bold;
			">  <a class="navbar-brand" href="index.php">
				<img src="images/e-commerce-logo-with-pointer-and-shopping-bag-free-vector.jpg" width="30" height="30" alt="">
			</a>World Bazar</div>            
			<div class="list-group">

				<ul id="cats">
					<?php getCats();?>
				</ul>


				<div class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Brand</div>



				<ul id="brand">
					<?php getBrands();?>
				</ul>

			</div>
		</div>
		<!-- Page content wrapper-->
		<div id="page-content-wrapper">
			<!-- Top navigation-->
			<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
				<div class="container-fluid">
<!--                         <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
-->                   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav  mt-2 mt-lg-0">
		<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
		<li class="nav-item active"><a class="nav-link" href="all_product.php">All products</a></li>
		<li class="nav-item active"><a class="nav-link" href="my_account.php">My account</a></li>
		<li class="nav-item active"><a class="nav-link" href="sign_up.php">Sign Up</a></li>
		<li class="nav-item active"><a class="nav-link" href="shopping_cart.php">Shopping cart</a></li>
		<li class="nav-item active"><a class="nav-link" href="contact.php">Contact us</a></li>
		<li class="nav-item">
			<div id="form">
				<form action="search.php" method="POST" enctype="multipart/form-data">
					<input type="text" name="query" />
					<input type="submit" value="Search" />
				</form>
			</div>

		</li>
	</ul>
</div>
</div>
</nav>
<!-- Page content-->

<div class="product-box">
	<?php  getpro(); ?>
	<?php  getCatpro(); ?>
	<?php getBrandpro(); ?>
</div>
</div>
</div>


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
