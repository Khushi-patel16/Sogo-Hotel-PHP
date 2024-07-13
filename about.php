<?php

include_once("../hotel/common/connection.php");

$photoQuery = "SELECT * FROM rooms_gallery LIMIT 5";
$photoRes = mysqli_query($connection,$photoQuery);


$abquery = "SELECT * FROM dynamic";
$abres = mysqli_query($connection,$abquery);

$ab= mysqli_fetch_assoc($abres);


$tagLine = "Home";
include_once("../hotel/layout/header.php");
?>


    <section class="py-5 bg-light" id="next">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
            <figure class="img-absolute">
              <img src="images/food-1.jpg" alt="Free Website Template by Templateux" class="img-fluid">
            </figure>
            <img src="images/img_1.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
            <h2 class="heading">Welcome!</h2>
            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="#" class="btn btn-primary text-white py-2 mr-3">Learn More</a> <span class="mr-3 font-family-serif"><em>or</em></span> <a href="https://vimeo.com/channels/staffpicks/93951774"  data-fancybox class="text-uppercase letter-spacing-1">See video</a></p>
          </div>
          
        </div>
      </div>
    </section>



    <section class="section slider-section bg-light">
   <div class="container">
     <div class="row justify-content-center text-center mb-5">
       <div class="col-md-7">
         <h2 class="heading" data-aos="fade-up">Photos</h2>
         <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokal
       </div>
     </div>
     <div class="row">
       
       
       
       <div class="col-md-12">
         
         <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
         <?php 
while($r1= mysqli_fetch_assoc($photoRes)) {
?> 
         <div class="slider-item">
             <a href="/hotel/images/gallery/<?php echo $r1["rgImage"];?>" data-fancybox="images" caption="Caption for this image">
               <img src="/hotel/images/gallery/<?php echo $r1["rgImage"];?>" height="200" width="300"alt="Image placeholder" class="img-fluid">
             </a>
           </div>
           <?php
}?>
         
         </div>
         <!-- END slider -->
       </div>
     
     </div>
   </div>
 </section>
 <!-- END section -->

    

    <div class="section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7 mb-5">
            <h2 class="heading" data-aos="fade">About Us</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-8">
            
              <p><?php echo $ab["about"];?></p>
            </div>
            
            
          </div>
        </div>
        

      </div>
  

    
    
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

<?php 
include_once("../hotel/layout/footer.php");
?>


