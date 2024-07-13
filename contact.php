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

    /* Email validation end */
    /*phone validation*/
    if(strlen(trim($_POST["phone"]))== 0)
    {
      $totalError++;
      $phoneError="Please enter a phone number.";
    }
    
     /*phone validation ends*/





if($totalError==0)
{
$Id=uniqid();
$Name=$_POST["name"];
$Phone=$_POST["phone"];
$Email=$_POST["email"];
$Message=$_POST["message"];



$query= "INSERT INTO contactmaster (id,name,phone , email, message) VALUES ('$Id','$Name','$Phone','$Email','$Message')";
$result=mysqli_query($connection,$query);
if($result==1)
{  
  
    header("Location: /hotel/index.php");
}


 

}
}

$riquery = "SELECT * FROM reviewmaster WHERE display=1";
$riRes = mysqli_query($connection, $riquery);


$tagLine = "Contact";
include_once("../hotel/layout/header.php");
?>

    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" name="name" class="form-control ">
                </div>
                <div class="col-md-6 form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" name="phone" class="form-control ">
                </div>
              </div>
          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control ">
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label for="message">Write Message</label>
                  <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="Send Message" name="submit" class="btn btn-primary text-white font-weight-bold">
                </div>
              </div>
            </form>

          </div>
            </div>
          </div>
        </div>
      </div>
    </section>

       <!-- END section -->
   <section class="section testimonial-section">
     <div class="container">
       <div class="row justify-content-center text-center mb-5">
         <div class="col-md-7">
           <h2 class="heading" data-aos="fade-up">People Says</h2>
       </div>
       </div>
       <?php 
         if(isset($_COOKIE['usrEmail']))
         {
       ?>
       <div class="mb-5 row text-right" >
       <a class="btn btn-primary" href="review.php" style="border:1px solid red;display: block;">Write Your Review</a>
       </div>
       <?php
         }
       ?>
       
       <div class="row">
         <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
         <?php
 while($ri = mysqli_fetch_array($riRes))
 {
   ?>  
           <div class="testimonial text-center slider-item">
             <div class="author-image mb-3">
               <img src="/hotel/images/people/<?php echo $ri["image"];?>" alt="Image placeholder" class="rounded-circle mx-auto">
             </div>
             <blockquote>
               <p>&ldquo;<?php echo $ri["review"];?>.&rdquo;</p>
             </blockquote>
             <p><em>&mdash;<?php echo $ri["name"];?>.&</em></p>
           </div>
           
           <?php
 }
           ?>
         </div>
           <!-- END slider -->
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
              <a href="room1.php" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
            </div>
          </div>
        </div>
      </section>

      <?php include_once("../hotel/layout/footer.php");?>
