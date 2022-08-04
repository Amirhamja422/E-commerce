
<!DOCTYPE html>
<?php 
session_start();
include "functions/functions.php";
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>World Bazar.com</title>
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
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
					aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav  mt-2 mt-lg-0">
							<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item active"><a class="nav-link" href="#!">All products</a></li>
							<li class="nav-item active"><a class="nav-link" href="#!">My account</a></li>
							<li class="nav-item active"><a class="nav-link" href="#!">Sign Up</a></li>
							<li class="nav-item active"><a class="nav-link" href="#!">Shopping cart</a></li>
							<li class="nav-item active"><a class="nav-link" href="#!">Contact us</a></li>
							<li class="nav-item">
								<div id="form">
									<form action="search.php" method="POST" enctype="multipart/form-data">
										<input type="text" name="query" />
										<input type="submit" value="Search" />
									</form>
								</div>

							</li>
							<li class="nav-item active"><a class="nav-link" href="index.php" style="background:yellow; margin-left: 21px;">Back To shop</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- Page content-->

			<div id ="product_box">
				<form action="" method="POST" enctype="multipart/form-data" style="margin-top: 24px;">
					<table align="center" width="800"  bgcolor="skyblue";>

				
							<tr align="center">
								<td colspan="5"><h2>Update Your cart and checkout</h2></td>
							</tr>

							<tr align="center">
								<th>Remove</th> 
								<th>Product</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>

							<?php 


							$total = 0;

							global $con;
							$ip = getip();

							$sel_price = "select * from cart where ip_add ='$ip'";

							$run_total = mysqli_query($con,$sel_price);

							while($p_price=mysqli_fetch_array($run_total)){
								$pro_id = $p_price['p_id'];

								$product_price = "select * from products where product_id ='$pro_id'";

								$product_price_query =mysqli_query($con,$product_price);

								while($product_fetch =mysqli_fetch_array($product_price_query)){

									$product_price =array($product_fetch['product_price']);
									$product_title =$product_fetch['product_title'];
									$product_image =$product_fetch['product_image'];
									$single_product_price =$product_fetch['product_price'];

									$values = array_sum($product_price);
									$total +=$values;


									?>
									<tr align='center'>
										<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>" /></td>
										<td><?php echo $product_title;?><br>
											<img src='images/<?php echo $product_image; ?>' alt='' width='100' height='100'/>
										</td>
										<td><input type="text"  size="6" name="qty" value="<?php echo $_SESSION['qty']; ?>"/></td>
										<td><?php echo "TK"  .$single_product_price; ?></td>
										<?php
										if(isset($_POST['update_cart'])){

											$qty = $_POST['qty'];
											$update_qty ="update cart set qty ='$qty'";
											$run_qty =mysqli_query($con,$update_qty);
											echo $_SESSION['qty'] =$qty;
											echo $total =$total*$qty;

										}
										?>

									</tr>

								<?php }}?>
								<tr align="right">
									<td colspan="4" align="right"><b>Sub Total:</b></td>
									<td><?php echo $total; ?></td>
								</tr>  

								<tr align="center">
									<td colspan="2"><input type="submit" name="update_cart" value="Remove Cart"/></td>
									<td><input type="submit" name="continue" value="continue_shopping"/></td>
									<td><button><a href="customer_checkout.php">chekout</a></button></td>
								</tr>
							</table>
						</form>
				   <?php 
					// function updatecart(){
						global $con;
						$ip = getip();

						if(isset($_POST['update_cart'])){

							foreach ($_POST['remove'] as $remove_id) {
								$delet_product ="delete from cart where p_id ='$remove_id' AND ip_add ='$ip'";

								$run_delete =mysqli_query($con,$delet_product);

								if($run_delete){

									echo "<script>window.open('product_cart.php','self')</script>";

								}else{


								}
							}
						}
						if(isset($_POST['continue'])){
							echo "<script>window.open('index.php','self')</script>";
						}
					    //     echo $up_cart = updatecart();

					    // }
						?>
					</div>        
				</div>
			</div>
			<!-- Bootstrap core JS-->
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
			<!-- Core theme JS-->
			<script src="js/scripts.js"></script>
		</body>
		</html>
