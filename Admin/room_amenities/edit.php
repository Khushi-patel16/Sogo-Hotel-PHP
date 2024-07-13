<?php
require_once(".././AdminAuth.php");
include_once("../common/connection.php");

$totalError=0;
   
    $Id = $_GET["id"];
    if(isset($_POST["btnEdit"]))
{

    if(strlen(trim($_POST["amenity"]))==0)
    {
        $totalError++;
        $aError="Please enter amenity.";
    }
    else{
              $p=$_POST["amenity"];
          $pQuery = "SELECT * FROM room_amenities WHERE amenity='$p'";
          $pRes = mysqli_query($connection, $pQuery);
          if(mysqli_num_rows($pRes)>=1)
          {
              $totalError++;
              $aError="amenity already exists.";
          }
        }

 if($totalError==0) 
 {       
    $rId =$Id;
    $amenity = $_POST["amenity"];
    
    
    
    $updateQuery = "UPDATE room_amenities SET amenity='$amenity' WHERE aid='$rId'";
    $updateResult = mysqli_query($connection, $updateQuery);
    if($updateResult==1)
    {
       
        echo "<script>window.location.href='/hotel/admin/room_amenities'</script>";
       // header("Location: /hotel/admin/room_amenities");
       
    }
    
    
}
}

$query="SELECT * FROM room_amenities Where aid='$Id'";
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
<div class="container">
<form role="form" method="post" action=""  enctype="multipart/form-data">
  
        <div class="col-12">
           <div class="row">    
              <div class="col-6">
              <label class="form-label">Amenity</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="text" name="amenity" value="<?php echo $row["amenity"]?>" class="form-control">
                 </div>
              </div>
           
        </div>
        <div class="">
           <button type="submit" name="btnEdit" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
        </div>
        </div>
     </form>
     </div>
  
        




<?php

}
else
{
?>
 <div class="col-sm-12 col-xl-12">
    <p class="alert alert-info">
        Record was not found.
    </p>
 </div>
<?php

}
?>
     </div>
 </div>
 <!-- Form End -->
 <?php
include_once("../layout/footer.php");
?>