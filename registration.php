<?php
include_once("../hotel/common/connection.php");

if(isset($_POST["submit"]))
{

    $totalError=0;

    /* Validation for Name start */
    if(strlen(trim($_POST["name"]))==0)
    {
        $totalError++;
        $nameError="Please enter a name.";
    }
    else if(strlen(trim($_POST["name"]))<=1)
    {
        $totalError++;
        $nameError="Name must be atleast 2 character long.";   
    }
    /* Validation for Name end */

    /* Email VAlidation start */

    if(strlen(trim($_POST["email"]))==0)
{
    $totalError++;
    $emailError="Please enter a email.";
}
else{
    $e=$_POST["email"];
    $emailQuery = "SELECT * FROM registration WHERE usrEmail='$e'";
    $emailRes = mysqli_query($connection, $emailQuery);
    if(mysqli_num_rows($emailRes)>=1)
    {
        $totalError++;
        $emailError="Email is already exist.";
    }
    $emailRegex = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/';
    if(!preg_match($emailRegex, $e))
    {
        $totalError++;
        $emailError="Invalid email address.";
    }
}

    /* Email validation end */
    /*phone validation*/
    if(strlen(trim($_POST["phone"]))== 0)
    {
      $totalError++;
      $phoneError="Please enter a phone number.";
    }
    else{
      $p=$_POST["phone"];
      $pQuery = "SELECT * FROM registration WHERE usrPhone='$p'";
      $pRes = mysqli_query($connection, $pQuery);
      if(mysqli_num_rows($pRes)>=1)
      {
          $totalError++;
          $phoneError="Phone already exists.";
      }
    }
    $phoneex="/^[0-9]{10}+$/";
    $phonevalidate= preg_match($phoneex, $_POST["phone"]);
    if(!$phonevalidate)
    {
        $totalError++;
        $phoneError=" Enter valid Phone.";
    }
     /*phone validation ends*/
    /* Password Validation start */
    if(strlen(trim($_POST["password"]))==0)
    {
        $totalError++;
        $passwordError="Please enter a password.";
    }
    $passwordExpression = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    $passwordValidate = preg_match($passwordExpression, $_POST["password"]);
    if(!$passwordValidate)
    {
        $totalError++;
        $passwordError="Password does not match their requirement.";
    }

    /* Password Validation end */

    /* Role Validation end */

    /*if(strlen($_POST["role"])==0)
    {
        $totalError++;
        $roleError="Please select a role.";
    }*/

    /* Role Validation end */



if($totalError==0)
{
$Id=uniqid();
$Name=$_POST["name"];
$Phone=$_POST["phone"];
$Email=$_POST["email"];
$Password=$_POST["password"];


$query="INSERT INTO  registration (usrId,usrName,usrPhone,usrEmail,usrPassword) VALUES ('$Id','$Name','$Phone','$Email','$Password')";
$result=mysqli_query($connection,$query);
if($result==1)
{  
  
    header("Location: /hotel/index.php");
}


 

}
}
$tagLine = "Registration";
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
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="name">Name</label>
                  <input type="text"name="name" id="name" class="form-control ">
                
               <?php if(isset($nameError))
{
    echo '<span class="text-danger">'.$nameError.'</span>';
}?>
</div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="phone">Phone</label>
                  <input type="text"name="phone" id="phone" class="form-control ">
                  <?php if(isset($phoneError))
{
    echo '<span class="text-danger">'.$phoneError.'</span>';
}?>
                </div>
              </div>




          
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
                  <button type="submit"name="submit" value="Regester Now" class="btn btn-primary text-white py-3 px-5 font-weight-bold">Register</button>
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