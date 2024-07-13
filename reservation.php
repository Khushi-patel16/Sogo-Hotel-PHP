<?php
include_once("../hotel/common/connection.php");

$slug = $_GET['r'];
$f = $_GET['f'];
$t = $_GET['t'];

$rdQuery = "SELECT * FROM roomtypemaster WHERE rtmSlug='$slug'";
$rdResult = mysqli_query($connection, $rdQuery);
$rmData = mysqli_fetch_array($rdResult);
$rtmId=$rmData['rtmId'];
$totalRooms = $rmData['rtmRooms'];

if(!isset($_COOKIE['usrEmail']))
{
  header('location: /hotel/login.php');
}

$email = $_COOKIE['usrEmail'];
$usrQuery = "SELECT * FROM registration WHERE usrEmail='$email'";
$usrRes = mysqli_query( $connection, $usrQuery );
$usrData = mysqli_fetch_array( $usrRes );

$checkQuery = "SELECT * FROM bookingmaster WHERE rtmId='$rtmId' and isempty=0";
$checkRes = mysqli_query($connection, $checkQuery);
$roomCount = mysqli_num_rows($checkRes);
$availableRooms = $totalRooms - $roomCount;

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
$phoneex="/^[0-9]{10}+$/";
$phonevalidate= preg_match($phoneex, $_POST["phone"]);
if(!$phonevalidate)
{
    $totalError++;
    $phoneError=" Enter valid Phone.";
}
 /*phone validation ends*/




if($totalError==0)
{
$Id=uniqid();
$userId=$usrData['usrId'];
$Name=$_POST["name"];
$Phone=$_POST["phone"];
$Email=$_POST["email"];
$DCI=$_POST["dci"];
$DCO=$_POST["dco"];
$Adults=$_POST["adults"];
$Children=$_POST["children"];
$rooms =$_POST["rooms"];
$Notes=$_POST["message"];
$roomprice=$_POST["roomPrice"];
$totalprice=$_POST["totalPrice"];

$d1 = new DateTime($DCO);
$date2 = new DateTime($DCI);
$days= $d1->diff($date2);
if($days==0){
  $days=1;
}
$totalDays = $days->format("%a");

$totalDays= $_POST["totaldays"];






$query="INSERT INTO  bookingmaster (bkmId,rtmId,usrId,name,email,phone,cid,cod,adults,children,rooms,remark,Price,TotalPrice,TotalDays) VALUES ('$Id','$rtmId','$userId','$Name','$Email','$Phone','$DCI','$DCO','$Adults','$Children','$rooms','$Notes','$roomprice','$totalprice','$totalDays')";

$result=mysqli_query($connection,$query);
if($result==1)
{  
  
    header("Location: /hotel/confirmation.php?id=$Id");
}


}

}








$tagLine = "Booking";

$usrq="SELECT * from sitesettingmaster";
$usrres=mysqli_query($connection,$usrq);
$usr=mysqli_fetch_array($usrres);


include_once("../hotel/layout/header.php");
?>

<?// include_once("../hotel/layout/header.php");?>
    


    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="name">Name</label>
                  <input type="text"name="name" value="<?php echo $usrData['usrName']; ?>" id="name" class="form-control ">
                </div>
                <?php if(isset($nameError))
{
    echo '<span class="text-danger">'.$nameError.'</span>';
}?>

                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="phone">Phone</label>
                  <input type="text"name="phone" value="<?php echo $usrData['usrPhone']; ?>" id="phone" class="form-control ">
                </div>
              </div>
              <?php if(isset($phoneError))
{
    echo '<span class="text-danger">'.$phoneError.'</span>';
}?>

          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input type="email"name="email" id="email" value="<?php echo $usrData['usrEmail']; ?>" class="form-control ">
                </div>
              </div>
              <?php if(isset($emailError))
{
    echo '<span class="text-danger">'.$emailError.'</span>';
}?>


              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkin_date">Date Check In</label>
                  <input type="date" name="dci" value="<?php echo $f; ?>" min="<?php echo date('Y-m-d'); ?>" onblur="setTotalDays();" id="checkin_date1" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkout_date">Date Check Out</label>
                  <input type="date"name="dco" value="<?php echo $t; ?>" min="<?php echo date('Y-m-d'); ?>" onblur="setTotalDays();" id="checkout_date1" class="form-control">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="adults" class="font-weight-bold text-black">Adults</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <div class="input-group input-group-outline mb-3">
                       <input type="number" min="1" value="1" name="adults" class="form-control">
                    </div> 
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <label for="children" class="font-weight-bold text-black">Children</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <div class="input-group input-group-outline mb-3">
                       <input type="number" min="0" value="1" name="children" class="form-control">
                    </div>       
                  </div>
                </div>

                <div class="col-md-6 form-group">
  <label for="children" class="font-weight-bold text-black">Rooms</label>
  <div class="field-icon-wrap">
    
    <div class="input-group input-group-outline mb-3">
       <input type="number" id="roomNo" onblur="setTotalPrice();" min="0"  max="<?php echo $availableRooms; ?>" value="1" name="rooms" class="form-control">
    </div>       
  </div>
</div>
<div class="col-md-6 form-group">
  <label>Room Price</label>
  <div class="input-group input-group-outline mb-3">
    <input type="text" id="roomPrice" name="roomPrice" readonly class="form-control" value="<?php echo $rmData['rtmPrice']; ?>">
  </div>
</div>
<div class="col-md-6 form-group">
  <label>Total Price</label>
  <div class="input-group input-group-outline mb-3">
    <input type="text" id="totalPrice" name="totalPrice" readonly class="form-control" >
  </div>
</div>

<div class="col-md-6 form-group">
  <label>Total Days</label>
  <div class="input-group input-group-outline mb-3">
    <input type="number" id="totaldays" name="totaldays" readonly class="form-control" >
  </div>
</div>
              </div>

              

              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="message">Notes</label>
                  <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <button type="submit"name="submit" value="Reserve Now" class="btn btn-primary text-white py-3 px-5 font-weight-bold">Reserve </button>
                </div>
              </div>
            </form>

          </div>
          <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
            <div class="row">
              <div class="col-md-10 ml-auto contact-info">
                <p><span class="d-block">Address:</span>  <span> <?php echo $usr["ssmAddress"];?></span></p>
                <p><span class="d-block">Phone:</span>  <span> <?php echo $usr["ssmPhone"];?></span></p>
                <p><span class="d-block">Email:</span> <span> <?php echo $usr["ssmEmail"];?></span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section testimonial-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">People Says</h2>
          </div>
        </div>
        <div class="row">
          <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            
            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; Jean Smith</em></p>
            </div> 

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>
                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>


            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; Jean Smith</em></p>
            </div> 

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>
                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

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
              <a href="reservation.php" class="btn btn-outline-white-primary py-3 text-white px-5">Reserve Now</a>
            </div>
          </div>
        </div>
      </section>
      <script src="/hotel/admin/material-dashboard-master/assets/js/jquery.min.js"></script>
<script>
  
  $(document).ready(function()
  {
    setTotalPrice();
  });
  function setTotalDays()
  {
    var cid = $("#checkin_date1").val();
    var cod = $("#checkout_date1").val();
 
 
    if(cid != undefined && cid !="" && cod != undefined && cod!="")
    {
      var diffDate = (new Date(cod) - new Date(cid)) / (1000 * 60 * 60 * 24);
      if(diffDate==0)
      {
        diffDate=1;
      }
      $("#totaldays").val(diffDate);
    }
   }
  function setTotalPrice()
  {
    var totalRoom = $("#roomNo").val();
    var roomPrice = $("#roomPrice").val();
    var td = $("#totaldays").val();
    
    var totalPrice =totalRoom*roomPrice;
    totalPrice =totalPrice*td;
    $("#totalPrice").val(totalPrice);
  }
  </script>
<?php
include_once("../hotel/layout/footer.php");
?>