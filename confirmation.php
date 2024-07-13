<?php
include_once("../hotel/common/connection.php");
include_once("../hotel/MailClass.php");

$id=$_GET['id'];



$Query = "SELECT * FROM bookingmaster WHERE bkmId='$id'";
$res = mysqli_query($connection, $Query);
$r = mysqli_fetch_array($res);

if(isset($_POST["submit"]))

{


$totalError=0;

if($totalError==0)
{


    
    

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
    $isTemp=0;



    $updateQuery="UPDATE bookingmaster SET name ='$Name',phone='$Phone',email='$Email',cid='$DCI',cod='$DCO',adults='$Adults',children='$Children',rooms='$rooms',remark='$Notes',isTemp=$isTemp,Price='$roomprice',TotalPrice='$totalprice' WHERE bkmId='$id'";
    $updateResult = mysqli_query($connection, $updateQuery);
    if($updateResult==1)
    {
        $m = new MailClass();
        $resp = $m->sendMail($id,$connection);
        var_dump($resp);
        header("Location: /hotel/success.php");
    }


}

}








$tagLine = "Confirmation";

$usrq="SELECT * from sitesettingmaster";
$usrres=mysqli_query($connection,$usrq);
$usr=mysqli_fetch_array($usrres);


include_once("../hotel/layout/header.php");
?>

    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            
            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="name">Name</label>
                  <input type="text"name="name" value="<?php echo $r['name']; ?>" id="name" class="form-control ">
                </div>
                <?php if(isset($nameError))
{
    echo '<span class="text-danger">'.$nameError.'</span>';
}?>

                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="phone">Phone</label>
                  <input type="text"name="phone" value="<?php echo  $r['phone']; ?>" id="phone" class="form-control ">
                </div>
              </div>
              <?php if(isset($phoneError))
{
    echo '<span class="text-danger">'.$phoneError.'</span>';
}?>

          
              <div class="row">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="email">Email</label>
                  <input type="email"name="email" id="email" value="<?php echo  $r['email']?>" class="form-control ">
                </div>
              </div>
              <?php if(isset($emailError))
{
    echo '<span class="text-danger">'.$emailError.'</span>';
}?>


              <div class="row">
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkin_date">Date Check In</label>
                  <input type="date" name="dci" id="checkin_date1" value="<?php echo  $r['cid'];?>" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                  <label class="text-black font-weight-bold" for="checkout_date">Date Check Out</label>
                  <input type="date"name="dco" id="checkout_date1"value="<?php echo  $r['cod'];?>"  class="form-control">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="adults" class="font-weight-bold text-black">Adults</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <div class="input-group input-group-outline mb-3">
                       <input type="number"  value="<?php echo  $r['adults'];?>"  name="adults" class="form-control">
                    </div> 
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <label for="children" class="font-weight-bold text-black">Children</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <div class="input-group input-group-outline mb-3">
                       <input type="number"  value="<?php echo  $r['children'];?>"  name="children" class="form-control">
                    </div>       
                  </div>
                </div>

                <div class="col-md-6 form-group">
  <label for="children" class="font-weight-bold text-black">Rooms</label>
  <div class="field-icon-wrap">
    
    <div class="input-group input-group-outline mb-3">
       <input type="number" id="roomNo" value="<?php echo  $r['rooms'];?>" name="rooms" class="form-control">
    </div>       
  </div>
</div>
<div class="col-md-6 form-group">
  <label>Room Price</label>
  <div class="input-group input-group-outline mb-3">
    <input type="text" id="roomPrice" name="roomPrice" readonly class="form-control" value="<?php echo  $r['Price'];?>" >
  </div>
</div>
<div class="col-md-6 form-group">
  <label>Total Price</label>
  <div class="input-group input-group-outline mb-3">
    <input type="text" id="totalPrice" name="totalPrice" value="<?php echo  $r['TotalPrice'];?>"  readonly class="form-control" >
  </div>
</div>
              </div>

              

              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label class="text-black font-weight-bold" for="message">Notes</label>
                  <textarea name="message" id="message"  class="form-control " cols="30" rows="8">
                  <?php echo  $r['remark'];?>
                  </textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <button type="submit"name="submit" class="btn btn-primary text-white py-3 px-5 font-weight-bold">Confirm </button>
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
    
    
      <script src="/hotel/admin/material-dashboard-master/assets/js/jquery.min.js"></script>
  
<?php
include_once("../hotel/layout/footer.php");
?>