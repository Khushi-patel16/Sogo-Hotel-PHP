<?php
include_once("../hotel/common/connection.php");

$query = "SELECT * FROM sitesettingmaster";
$result = mysqli_query($connection, $query);
$numRows = $result->num_rows;
$data=mysqli_fetch_array($result);
$imagePath = "../hotel/Admin/images/site/".$data["ssmHbg"];

$slug = $_GET['r'];
$rdQuery = "SELECT * FROM roomtypemaster WHERE rtmSlug='$slug'";
$rdResult = mysqli_query($connection, $rdQuery);
$rmData = mysqli_fetch_array($rdResult);
$amenities = explode(",", $rmData['rtmAmenities']);
$rtmId=$rmData['rtmId'];
$totalRooms = $rmData['rtmRooms'];
$aList= array();
foreach($amenities as $a) {
    if(strlen($a) > 0){
        $aid = trim($a);
        $q1="SELECT * FROM room_amenities WHERE aid='$aid'";
        $r1 = mysqli_query($connection, $q1);
        $r2=mysqli_fetch_array($r1);
        if($r2 != null){
            array_push($aList, $r2['amenity']);
            }
        }
    }

$rgQuery ="SELECT * FROM rooms_gallery WHERE rtmId='$rtmId'";
$rgres = mysqli_query($connection,$rgQuery);
//$rgdata = mysqli_fetch_assoc($rgres); 
$checkIn="";
$checkOut="";
if(isset($_POST['btnCheck']))
{
    $checkIn=$_POST['checkIn'];
    $checkOut=$_POST['checkOut']; 
    $adults=$_POST['adults'];
    $child=$_POST['children'];

     // $id = $_GET['id'];
           //$Query = "SELECT * FROM bookingmaster";
     $Query = "SELECT SUM(rooms) as totalRooms FROM bookingmaster WHERE rtmId = '$rtmId'  AND cod <= '$checkIn'";
     $res = mysqli_query($connection, $Query);
     $r = mysqli_fetch_array($res);
      $freeRoom = $r['totalRooms'];
    

      $checkQuery = "SELECT SUM(rooms) as totalRooms FROM bookingmaster WHERE rtmId='$rtmId' and isempty=0";
      $checkRes = mysqli_query($connection, $checkQuery);
      $checkRes1 = mysqli_fetch_array($checkRes);
      $roomCount = $checkRes1['totalRooms'];
      $availableRooms = $totalRooms - $roomCount + $freeRoom;

    
}

$tagLine = "Rooms";

include_once("../hotel/layout/header.php");
?>


 <section class="section bg-light pb-0"  >
      <div class="container">
       
        <div class="row check-availabilty" id="next">
          <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

            <form method="post">
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="date" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $checkIn; ?>" name="checkIn" required id="checkin_date1" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="date" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $checkOut; ?>" name="checkOut" required id="checkout_date1" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="adults" class="font-weight-bold text-black">Adults</label>
                      <div class="field-icon-wrap">
                        <input type="number" max="<?php echo $rmData['rtmAdults']; ?>" min = 0 name="adults" id="adults" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="children" class="font-weight-bold text-black">Children</label>
                      <div class="field-icon-wrap">
                        <input type="number" max="<?php echo $rmData['rtmChildren']; ?>" min = 0 name="children" id="children" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 align-self-end">
                  <button name="btnCheck" class="btn btn-primary btn-block text-white">Check Availabilty</button>
                </div>
                <?php
                if(isset($availableRooms)){
                  ?>
                  
                  <span class="text-success"><?php echo $availableRooms ?> Rooms is available</span>
                  <a href="/hotel/reservation.php?r=<?php echo $rmData['rtmSlug']; ?>&f=<?php echo $checkIn; ?>&t=<?php echo $checkOut; ?>">Click here for booking</a>
                  
                  <?php
                }
                ?>
              </div>
            </form>
          </div>


        </div>
      </div>
    </section>

<section class="p-3">
<h3><?php echo $rmData["rtmTitle"]; ?>
  
</h3>
<div class="row">
    <div class="col-md-6">
    <img src="/hotel/images/rooms/<?php echo $rmData["rtmBanner"]; ?>" alt="<?php $rmData['rtmTitle']; ?>" class="img-fluid mb-3">
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-12">
                <div class="row border p-2 bg-secondary text-white">
                <div class="col-4">
                    <h5>Price</h5>
                    <h6><?php echo $rmData['rtmPrice']; ?></h6>
                </div>
                <div class="col-4">
                    <h5>Adults</h5>
                    <h6><?php echo $rmData['rtmAdults']; ?></h6>
                </div>
                <div class="col-4">
                    <h5>Children</h5>
                    <h6><?php echo $rmData['rtmChildren']; ?></h6>
                </div>
                </div>
            </div>
            <div class="col-12">
                <?php echo $rmData["rtmDescription"]; ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <h3>Rooms Amenities</h3>
        <?php
            foreach($aList as $a)
            {
                ?>
                    <span class="badge bg-info text-white"><?php echo $a; ?></span>
                <?php
            }
        ?>
        
    </div>

    <div class="col-md-12">
    <h3>Rooms photos</h3>
    <div class="row">
    <?php
        while($a = mysqli_fetch_array($rgres)){
            ?>
            <div class="col-md-3">
            <img style="height: 300px; width:500px;object-fit:cover;" src="/hotel/images/gallery/<?php echo $a["rgImage"];?>" alt="<?php $rmData['rtmTitle']; ?>" class="img-fluid mb-3">
            </div>
            <?php
        }
        /*foreach($rgres as $a)
        {
            ?>
                <img src="/hotel/images/gallery/<?php if ($aid==$rtmid){
                
                
                echo $a["rgImage"];} ?>" alt="<?php $rmData['rtmTitle']; ?>" class="img-fluid mb-3">
            <?php
        }*/
    ?>
    </div>
</div>
</section>

<?php
include_once("../hotel/layout/footer.php");

?>