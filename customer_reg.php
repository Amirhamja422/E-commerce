
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
            <form  class="form-signin">
                
            
                <input type="email" name="email" id="email" class="form-control form-group" placeholder="Enter Your Email" required autofocus>
                <input type="password" name="password" id="password" class="form-control form-group" placeholder="Enter Your Password" required autofocus>
<!--                 <label for="remember-me" class="text-white"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label>
 -->                

        
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Submit</button>
                <br>
                   <a href="#"   class="form-control form-group text-black bg-white" required autofocus>Forget Password</a>
                  <a href="#"   class="form-control form-group text-black  bg-yellow" required autofocus>Create A New Account</a>
            </form><!-- /form -->
        </div>
    </div>
</div>
</div>