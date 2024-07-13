<?php

include_once("../hotel/common/connection.php");


$query1 = "SELECT * FROM roomtypemaster";
$result1=mysqli_query($connection, $query1);

$tagLine = "Rooms";

include_once("../hotel/layout/header.php");

?>

<section class="section">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-7">
        <h2 class="heading" data-aos="fade-up">Rooms &amp; Suites</h2>
        <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, 
          far from the countries Vokalia and Consonantia, there live the blind texts. 
          Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
      </div>
    </div>
    <div class="row">
      
    <?php
      while($row = mysqli_fetch_assoc($result1)) {
        ?>
        
        <div class="col-md-6 col-lg-4" data-aos="fade-up">
<a href="/hotel/rooms.php?r=<?php echo $row['rtmSlug']; ?>" class="room">
  <figure class="img-wrap">
    <img src="/hotel/images/rooms/<?php echo $row["rtmBanner"]; ?>" alt="Free website template" class="img-fluid mb-3">
  </figure>
  <div class="p-3 text-center room-info">
    <h2><?php echo $row["rtmTitle"]; ?></h2>
    <span class="text-uppercase letter-spacing-1"><?php echo $row["rtmPrice"]; ?></span>
  </div>
</a>
      </div>
        <?php
      }
    ?>                                                                            
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
   
    







<?php

include_once("../hotel/layout/footer.php");

?>