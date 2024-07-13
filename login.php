<?php
include_once("../hotel/common/connection.php");



$errorMessage;
$emailMessage;
$pwdMessage;
if(isset($_POST["btnLogin"]))
{
   
   
    if($_POST["email"]=="")
    {
        $emailMessage="Email is required";
    }
    else if($_POST["password"]=="")
    {
        $pwdMessage="Password is required";
    }
    else{
        $email = $_POST["email"];
$pwd = $_POST["password"];
$query = "SELECT * FROM registration where usrEmail='$email' and usrPassword='$pwd'";
$result = mysqli_query($connection,$query);

if($result->num_rows==0)
{
    $errorMessage="Invalid Credential";
}
else
{
  
    while($r = mysqli_fetch_assoc($result))
    {
        /*if($r["AdmStatus"]==1)*/
        {
            //$_SESSION["AdmEmail"]=$r["AdmEmail"];
            setcookie("usrEmail",$r['usrEmail'],time()+ 60*60*24,"/");
            setcookie("usrId",$r['usrId'],time()+ 60*60*24,"/");
            header("Location: /hotel/index.php");
        }
       /* else
        {
            $errorMessage="Your account is de-active";
        }*/
    }
}
    }
}

/*if(isset($_POST["submit"]))
{

    $totalError=0;


    /* Email VAlidation start */

 /*   if(strlen(trim($_POST["email"]))==0)
{
    $totalError++;
    $emailError="Please enter a email.";
}

    /* Email validation end */
    /* Password Validation start */
  /* if(strlen(trim($_POST["password"]))==0)
   {
       $totalError++;
       $passwordError="Please enter a password.";
   }*/



/*if($totalError==0)
{
$Id=uniqid();
$Email=$_POST["email"];
$Password=$_POST["password"];


$query="INSERT INTO  Loginn (usrId,usrEmail,usrPassword) VALUES ('$Id','$Email','$Password')";
$result=mysqli_query($connection,$query);
if($result==1)
{  
  
    header("Location: /hotel/index.php");
}


 

}
}*/
$tagLine = "Login";
include_once("../hotel/layout/header.php");
?>

<?// include_once("../hotel/layout/header.php"); ?>

    <!-- END section -->

    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input type="email"name="email" id="email" class="form-control ">
                </div>
              
              <?php if(isset($emailError))
{
    echo '<span class="text-danger">'.$emailError.'</span>';
}?>
</div>
              <div class="row">
                 <div class="col-md-12 form-group">
                   <label class="text-black font-weight-bold" for="password">Password</label>
                   <input type="password"name="password" id="password" class="form-control ">
                 </div>
               
               <?php if(isset($passwordError))
{
    echo '<span class="text-danger">'.$passwordError.'</span>';
}?>
</div>
               </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <button type="submit" name="btnLogin" class="btn btn-primary text-white py-3 px-5 font-weight-bold">Log-In</button>
                </div>
              </div>
            </form>

          </div>
      </div>
</section>
    
    
    <section class="section bg-image overlay" style="background-image: url('images/hero_4.jpg');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
              <h2 class="text-white font-weight-bold">A Best Place To Stay. Reserve Now!</h2>
            </div>
            <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
              <a href="reservation.php" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
            </div>
          </div>
        </div>
      </section>



<?php
include_once("../hotel/layout/footer.php");
?>