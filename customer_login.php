
<style type="text/css">
    
body,html {
    background-image: url('https://i.imgur.com/xhiRfL6.jpg');
    height: 100%;
}

#profile-img {
    height:180px;
}
.h-80 {
    height: 80% !important;
}


</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container h-80">
<div class="row align-items-center h-100">
    <div class="col-3 mx-auto">
        <div class="text-center">
            <img id="profile-img" class="rounded-circle profile-img-card" src="https://i.imgur.com/6b6psnA.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form  class="form-signin" action="customer_checkout.php" method="POST">
                
            
                <input type="email" name="email" id="email" class="form-control form-group" placeholder="Enter Your Email" required autofocus>
                <input type="password" name="password" id="password" class="form-control form-group" placeholder="Enter Your Password" required autofocus>

        
                <button class="btn btn-lg btn-primary btn-block btn-signin" name ="login" id ="login" type="submit">Submit</button>
                <br>
                   <a href="#"   class="form-control form-group text-black bg-white" required autofocus>Forget Password</a>
                  <a href="customer_reg.php"   class="form-control form-group text-black  bg-yellow" required autofocus>Create A New Account</a>
            </form><!-- /form -->
        </div>
    </div>
</div>
</div>




<?php 
$con =mysqli_connect("localhost","root","","ecommerce");

if(isset($_POST['login'])){
	 $email = $_POST['email'];
	 $password = $_POST['password'];

	 $sql_log ="select * from customers where customer_pass ='$password' AND customer_email ='$email'";

	 $run_log =mysqli_query($con,$sql_log);

	 $check_customer =mysqli_num_rows($run_log);

	 if($check_customer==0){

	 	echo "<script>alert('password or email is incorrect please try again')</script>";
	 	exit();
	 }else{
       
       echo "<script>window.open('index.php')</script>";
	 }

// 	 $ip =getIp();


// 	 $sql_log_cart ="select * from cart where ip_add ='$ip'";

// 	 $log_cart_run =mysqli_query($sql_log_cart);

//      $log_count =mysqli_num_rows($log_cart_run);


//     if($check_customer>0 ANd $log_count==0){
//     $_SESSION['customer_email']==$email;
//     echo "<script>alert('you logged in sucess, Thanks!')</script>";
//     echo "<script>window.open('index.php','self')</script>";

// }





}










?>





