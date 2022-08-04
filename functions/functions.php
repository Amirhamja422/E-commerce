,<?php

$con =mysqli_connect("localhost","root","","ecommerce");

//geating the ip address

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}



//creating the shopping cart


function cart(){
if(isset($_GET['add_cart'])){
  global $con;
  $ip = getip();
  $pro_id = $_GET['add_cart'];
  $check_pro ="select * from cart where ip_add ='$ip'  AND p_id ='$pro_id '";
  // echo "select * from cart where ip_add ='$ip'  AND p_id ='$pro_id '";
  $run_check = mysqli_query($con, $check_pro);

  if(mysqli_num_rows($run_check)>0){
  	// echo "ok";
  }else{

  	$insert_pro ="INSERT INTO `cart`(`p_id`, `ip_add`) VALUES ('$pro_id ','$ip')";
  	$run_pro = mysqli_query($con,$insert_pro);
  	echo "<script>window.open('index.php','self')</script>";
  }




}
}





// getting total price 

function total_price(){
	$total = 0;
	if(isset($_GET['add_cart'])){
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

				$values = array_sum($product_price);
				$total +=$values;
			}


		}

		echo $total;
	}
}












//getting total item addeed

function total_items(){
	if(isset($_GET['add_cart'])){
	 global $con;
     $ip = getip();

     $get_items = "select * from cart where ip_add ='$ip'";

     $run_items = mysqli_query($con,$get_items);
     $count_items = mysqli_num_rows($run_items);
     echo $count_items;




	}
}







// getting category display 
function getCats(){

	global $con;


	$cat_sql = "select * from categories";

	$cat_run =mysqli_query($con,$cat_sql);


	while($row_cats = mysqli_fetch_array($cat_run)) {

		$cat_id =$row_cats['cat_id'];		
		$cat_tile =$row_cats['cat_title'];


		echo "<li><a href='index.php?cat=$cat_id'>$cat_tile</li>";

	}
}




//getting brand display 


function getBrands(){

	global $con;


	$brand_sql = "select * from brands";

	$brand_run =mysqli_query($con,$brand_sql);


	while($row_brand = mysqli_fetch_array($brand_run)) {

		$brand_id =$row_brand['brand_id'];		
		$brand_tile =$row_brand['brand_title'];


		echo "<li><a href='index.php?brand=$brand_id'>$brand_tile</li>";

	}
}




//getting product display show

function getpro(){
	if(!isset($_GET['cat'])){ 
		if(!isset($_GET['brand'])){ 
			global $con;


			// $product_sql = "select * from products order by RAND() LIMIT 0,30";
			$product_sql = "select * from products";

			$product_run =mysqli_query($con,$product_sql);

			echo '<div class="row">';
			while($row_product= mysqli_fetch_array($product_run)) {

				$product_id =$row_product['product_id'];		
				$product_cat =$row_product['product_cat'];
				$pro_brand =$row_product['product_brand'];
				$pro_tile =$row_product['product_title'];
				$pro_price =$row_product['product_price'];
				$pro_imagee =$row_product['product_image'];


				echo "
				<div class='col-sm-3 sol-lg-6'>
				<h3 style='text-align:center;'>$pro_tile</h3>
				<img src='images/$pro_imagee' alt='' width='270' height='200'/>
				<p><b>$pro_price</b>  TK</p>
				<a href='details.php?product_id=$product_id' style='float:left;'>Details</a>        
				<a href='index.php?add_cart=$product_id'><button style='float:right;'>Add to cart</button></a>
				</div>

				";

			}
			echo '</div>';

		}
	}

}




function getCatpro(){

	if(isset($_GET['cat'])){ 

		global $con;

		$category_id = $_GET['cat'];

		$category_sql = "select * from products where product_cat ='$category_id'";

		$category_run =mysqli_query($con,$category_sql);

		$count_category =mysqli_num_rows($category_run);

		if($count_category==0){

			echo "<h2 style='padding:20px; background:red; text-align:center; padding-top:20px;'>There is no product of thise category</h2>";
		}else{

			while($row_category= mysqli_fetch_array($category_run)) {

				$category_id =$row_category['product_id'];		
				$category_cat =$row_category['product_cat'];
				$category_brand =$row_category['product_brand'];
				$category_tile =$row_category['product_title'];
				$category_price =$row_category['product_price'];
				$category_imagee =$row_category['product_image'];


				echo "
				<div class='row'>
				<div class='col-sm-3 sol-lg-6'>
				<h3 style='text-align:center;'>$category_tile</h3>
				<img src='images/$category_imagee' alt='' width='270' height='200'/>
				<p><b>$category_price</b>  TK</p>
				<a href='details.php?product_id=$category_id' style='float:left;'>Details</a>        
				<a href='index.php'><button style='float:right;'>Add to cart</button></a>
				</div>
				</div>
				";


			}}


		}



	}










	function getBrandpro(){

		if(isset($_GET['brand'])){ 

			global $con;

			$pro_brand_id = $_GET['brand'];

			$pro_brand_sql = "select * from products where product_brand ='$pro_brand_id'";

			$pro_brand_run =mysqli_query($con,$pro_brand_sql);

			$pro_count_brand =mysqli_num_rows($pro_brand_run);

			if($pro_count_brand==0){

				echo "<h2 style='padding:20px; background:red; text-align:center; padding-top:20px;'>There is no product of thise brand</h2>";
			}else{

				while($row_pro_brand= mysqli_fetch_array($pro_brand_run)) {

					$brand_id =$row_pro_brand['product_id'];		
					$brand_cat =$row_pro_brand['product_cat'];
					$product_brand =$row_pro_brand['product_brand'];
					$brand_tile =$row_pro_brand['product_title'];
					$brand_price =$row_pro_brand['product_price'];
					$product_imagee =$row_pro_brand['product_image'];


					echo "
					<div class='row'>
					<div class='col-sm-3 sol-lg-6'>
					<h3 style='text-align:center;'>$brand_tile</h3>
					<img src='images/$product_imagee' alt='' width='270' height='200'/>
					<p><b>$brand_price</b>  TK</p>
					<a href='details.php?product_id=$brand_id' style='float:left;'>Details</a>        
					<a href='index.php'><button style='float:right;'>Add to cart</button></a>
					</div>
					</div>
					";


				}}


			}



		}






















		?>