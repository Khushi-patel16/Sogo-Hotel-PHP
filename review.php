<?php
include_once("../hotel/common/connection.php");


if(isset($_POST["btnsave"]))
{
    $rid= uniqid();
     $review = $_POST["review"];
$name = $_POST["name"];
if($_FILES["image"]["size"]!=0)
{
   $directory=$_SERVER["DOCUMENT_ROOT"]."/hotel/images/people/";
   $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
   $filename = rand(000,999).".".$ext;
   $file=$directory.$filename;
  
   if(move_uploaded_file($_FILES["image"]["tmp_name"],$file))
{



$rquery="INSERT INTO reviewmaster (rId,review,name,image) VALUES (' $rid', '$review','$name','$filename')";
$rresult = mysqli_query($connection, $rquery);
        if($rresult==1)
        {
            header("Location: /hotel/index.php");
        }
      }

   }
}  


$tagLine = "Review";
 include_once("../hotel/layout/header.php");
?>



    <!-- END section -->

    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Review</label>
                  <textarea type="text"name="review" id="review" class="form-control "></textarea>
                </div>
</div>
              <div class="row">
                 <div class="col-md-12 form-group">
                   <label class="text-black font-weight-bold" for="password">Name</label>
                   <input type="text"name="name" id="name" class="form-control ">
                 </div>
                 </div>


                 <div class="row">
   <div class="col-md-12 form-group">
     <label class="text-black font-weight-bold" for="password">Profile</label>
     <input type="file"name="image" id="image" class="form-control ">
   </div>

               </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <button type="submit" name="btnsave" class="btn btn-primary text-white py-3 px-5 font-weight-bold">Save</button>
                </div>
              </div>
            </form>

          </div>
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