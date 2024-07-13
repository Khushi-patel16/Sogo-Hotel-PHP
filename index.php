<?php

include_once("../hotel/common/connection.php");


$query1 = "SELECT * FROM roomtypemaster";
$result1=mysqli_query($connection, $query1);


$catQuery = "SELECT * FROM categorymaster";
$catRes = mysqli_query($connection,$catQuery);


$photoQuery = "SELECT * FROM rooms_gallery LIMIT 5";
$photoRes = mysqli_query($connection,$photoQuery);

$riquery = "SELECT * FROM reviewmaster WHERE display=1";
$riRes = mysqli_query($connection, $riquery);

$query="SELECT * FROM eventsmaster LIMIT 3";
$res= mysqli_query($connection, $query);



$tagLine = "Home";
include_once("../hotel/layout/header.php");

$flag=1;
$pFlage=1;
?>
  


    <section class="py-5 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
            <figure class="img-absolute">
              <img src="images/food-1.jpg" alt="Image" class="img-fluid">
            </figure>
            <img src="images/img_1.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
            <h2 class="heading">Welcome!</h2>
            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><a href="room1.php" class="btn btn-primary text-white py-2 mr-3">Learn More</a> <!--<span class="mr-3 font-family-serif"><em>or</em></span> <a href="https://vimeo.com/channels/staffpicks/93951774"  data-fancybox class="text-uppercase letter-spacing-1">See video</a> --></p>
          </div>
          
        </div>
      </div>
    </section>

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
    
    
    <section class="section slider-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Photos</h2>
            <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>
        <div class="row">
          
          
          

          <div class="col-md-12">
            
            <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            <?php 
while($r1= mysqli_fetch_assoc($photoRes)) {
?> 

            <div class="slider-item">
                <a href="/hotel/images/gallery/<?php echo $r1["rgImage"];?>" data-fancybox="images" data-caption="Caption for this image">
                  <img src="/hotel/images/gallery/<?php echo $r1["rgImage"];?>" height="200" width="300" alt="Image placeholder" class="img-fluid">
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
    <?php



    ?>                                                                                                                                                                                                                                                                
    
    <section class="section bg-image overlay" style="background-image: url('images/hero_3.jpg');">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-7">
        <h2 class="heading text-white" data-aos="fade">Our Restaurant Menu</h2>
        <p class="text-white" data-aos="fade" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
      </div>
    </div>
    <div class="food-menu-tabs" data-aos="fade">
      <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
        
        
        
        <?php
          while($row = mysqli_fetch_array($catRes))
          {
            ?>
              <li class="nav-item">
                  <a class="nav-link <?php $flag==1? print "active":""; ?> letter-spacing-2" onclick="setTab('<?php echo $row['catId']; ?>');" id="tab<?php echo $row["catId"]; ?>" data-toggle="tab" href="#<?php echo $row["catId"]; ?>" role="tab" aria-controls="mains" aria-selected="true">
                      <?php echo $row["catName"]; ?>
                    </a>
                </li>
            <?php
            $flag=0;
          }
        
        ?>
      </ul>
      <div class="tab-content py-5" id="myTabContent">
        
        <?php
          $catRes = mysqli_query($connection,$catQuery);
          while($row1 = mysqli_fetch_array($catRes))
          {
              $cId = $row1["catId"];
              $prdQuery = "SELECT * FROM products WHERE catId='$cId'";
              $prdRes = mysqli_query($connection,$prdQuery);
            ?>
            <div class="tab-pane <?php $pFlage==1? print "active":""; ?> text-left" id="<?php echo $row1["catId"]; ?>">
            <div class="row">
              <?php
                while($p = mysqli_fetch_array($prdRes))
                {
                  ?>
                      <div class="col-md-6">
                        <div class="food-menu mb-5">
                          <span class="d-block text-primary h4 mb-3">Rs. <?php echo $p["prdPrice"]; ?></span>
                          <h3 class="text-white"><a href="#" class="text-white"><?php echo $p["prdName"]; ?></a></h3>
                          <p class="text-white text-opacity-7">
                              <?php echo $p["prdDescription"]; ?>
                          </p>
                        </div>
                      </div>
                  <?php
                }
              ?>
            </div>
            
          </div> <!-- .tab-pane -->
          
          <?php
          $pFlage=0;
          }
        ?>
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
    

    <section class="section blog-post-entry bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Events</h2>
            <p data-aos="fade-up">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>
        <div class="row">

        <?php
while($e=mysqli_fetch_array($res)){

?>
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">

            <div class="media media-custom d-block mb-4 h-100">
              <a href="events.php" class="mb-4 d-block"><img src="/hotel/images/events/<?php echo $e["eImage"]; ?>" alt="Image placeholder" class="img-fluid"></a>
              <div class="media-body">
                <span class="meta-post">    
                  <?php
                    $cd = date_create($e["edate"]);
                    echo date_format($cd,"M d, Y"); ?>
                    </span>
                <h2 class="mt-0 mb-3"><a href="events.php"><?php echo $e["etitle"]; ?></a></h2>
                <p><?php echo $e["edescription"]; ?></p>
              </div>
            </div>

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

      <script>
          function setTab(id)
          {
            $(".tab-pane").removeClass('active');
            $("#"+id).addClass('active');
          }
      </script>

      <?php include_once("../hotel/layout/footer.php");?>
    



