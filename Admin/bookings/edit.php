<?php
require_once(".././RecpAuth.php");
include_once("../common/connection.php");

$totalError=0;
   
    $Id = $_GET["id"];
    if(isset($_POST["btnEdit"]))
{

    $updateQuery = "UPDATE bookingmaster SET isempty=1 WHERE bkmId='$Id'";
    $updateResult = mysqli_query($connection, $updateQuery);
    if($updateResult==1)
    {
       
        echo "<script>window.location.href='/hotel/admin/bookings'</script>";
       // header("Location: /hotel/admin/room_amenities");
       
    }


    //$delete = "DELETE FROM bookingmaster WHERE bkmId='$Id'";
    // $result = mysqli_query( $connection,$delete);
    
    
//}
}

$query="SELECT * FROM bookingmaster Where bkmId='$Id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);

?>
<!-- Form Start -->
 <div class="container-fluid pt-4 px-4">
     <div class="row g-4">

    
        <?php
if($result->num_rows==1)
{
        ?>






<?php include_once("../layout/header.php"); ?>
<div class="container-fluid">
<form role="form" method="post" action="" >
  
        <div class="card p-3">
           <div class="row">    
              <div class="col-12">
              <label class="form-label">CheckOut</label>
                <!-- <div class="input-group input-group-outline mb-3">
                 <input type="number" name="isempty" onclick="setTotalDays();" id="checkin_date1" class="form-control">  
                 <input type="number" name="isempty" value="<?php //echo $row["isempty"]?>" class="form-control">
                 </div>
              </div>-->
           
        </div>
        <div class="">
           <button type="submit" name="btnEdit" onclick="setisempty();" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
        </div>
        </div>
     </form>
     </div>
  
        




<?php

}
?>

     </div>
 </div>

<script>
 function setisempty()
  {
    var isempty = $("#isempty").val(1);
  }

  </script>
 <!-- Form End -->
 <?php
include_once("../layout/footer.php");
?>