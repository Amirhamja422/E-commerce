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
-->   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
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
				<form action="search.php" method="GET" enctype="multipart/form-data">
					<input type="text" name="usser_query" placeholder="search a product" />
					<input type="submit" name="search" value="Search" />
				</form>
			</div>

		</li>
	</ul>
</div>
</div>
</nav>





<?php 
$con =mysqli_connect("localhost","root","","ecommerce");
if(isset($_GET['search'])){ 
	$search_query =$_GET['usser_query'];

	$product_sql ="select * from products where product_keywords like '%$search_query%'";
	// echo "select * from products where product_keywords like '%$search_query%'";

	$product_run =mysqli_query($con,$product_sql);


	while($row_product= mysqli_fetch_array($product_run)) {

		$product_id =$row_product['product_id'];		
		$product_cat =$row_product['product_cat'];
		$pro_brand =$row_product['product_brand'];
		$pro_tile =$row_product['product_title'];
		$pro_price =$row_product['product_price'];
		$pro_imagee =$row_product['product_image'];


		echo "
		<div class='row'>
		<div class='col-sm-3 sol-lg-6'>
		<h3 style='text-align:center;'>$pro_tile</h3>
		<img src='images/$pro_imagee' alt='' width='270' height='200'/>
		<p><b>$pro_price</b>  TK</p>
		<a href='details.php?product_id=$product_id' style='float:left;'>Details</a>        
		<a href='index.php'><button style='float:right;'>Add to cart</button></a>
		</div>
		</div>
		";

	}

}

?>


</div>
</div>


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
