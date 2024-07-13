<?php
require_once("./AdminAuth.php");
include_once("../common/connection.php");

    $adminId = $_GET["id"];
    
    
    

    if(isset($_POST["btnEdit"]))
{
    
    $recordId =$_POST["id"];
    $roomtitle = $_POST["title"];
    $roomprice = $_POST["price"];
    $totalrooms = $_POST["rooms"];
    $adults= $_POST["adults"];
    $children = $_POST["children"];
    $status = $_POST["status"];
    $description= $_POST["description"];
    $oldPhoto= $_POST["oldPhoto"];
    $slug = strtolower($roomtitle);
      $slug = str_replace(" ","-", $slug);
    if($_FILES["bnImage"]["size"]!=0)
    {
       $directory=".././Admin/images/site/";
       $ext = pathinfo($_FILES["bnImage"]["name"], PATHINFO_EXTENSION);
       $filename = rand(000,999).".".$ext;
       $file=$directory.$filename;
       if(move_uploaded_file($_FILES["bnImage"]["tmp_name"],$file))
       {     
        $oldPhoto=$fileName;
        }
    }
    //$query1 = "SELECT * FROM roomtypemaster ";
    //$result1 = mysqli_query($connection,$query1);
    //if(mysqli_num_rows($result1)>=1)
    //{
    //  $isExist=1;
    //  $rData = mysqli_fetch_array($result1);
    //  $rPhoto=$rData["rtmBanner"];
    //  $rId=$rData["rtmId"];
    //}
    
    
    
    $updateQuery = "UPDATE roomtypemaster SET rtmBanner='$oldPhoto', rtmTitle='$roomtitle',rtmPrice='$roomprice',
    rtmRooms='$totalrooms',rtmAdults='$adults',rtmChildren='$children',rtmStatus='$status',rtmDescription='$description',
    rtmSlug='$slug' WHERE rtmId='$recordId'";
    $updateResult=mysqli_query($connection,$updateQuery);
    
    
    $updateResult = mysqli_query($connection, $updateQuery);
    if($updateResult==1)
    {
        header("Location: /hotel/admin/roomtype");
       
    }
    
    
}

$query="SELECT * FROM roomtypemaster Where rtmId='$adminId'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);

include_once("../layout/header.php");
?>
<!-- Form Start -->

<? //include("../layout/header.php");?>
 <div class="container-fluid pt-4 px-4">
     <div class="row g-4">

    
        <?php
if($result->num_rows==1)
{
        ?>
         <div class="col-sm-12 col-xl-12">
             <div class="bg-white rounded h-100 p-4">
                 <h6 class="mb-4">Edit Data</h6>
                 <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row["rtmId"]; ?>">
                    <input type="hidden" name="oldPhoto" value="<?php echo $row["rtmBanner"]; ?>">
                 <div class="col-12">
           <div class="row">
              <div class="col-6">
              <label class="form-label">Room Title</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="text" value="<?php echo $row["rtmTitle"]; ?>" name="title" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Room Price</label>
                 <div class="input-group input-group-outline mb-3">
                  <input type="text"value="<?php echo $row["rtmPrice"]; ?>" name="price" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Total Rooms</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="number" value="<?php echo $row["rtmRooms"]; ?>"min="0" value="0" name="rooms" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Adults</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="number"value="<?php echo $row["rtmAdults"]; ?>" min="1" value="1" name="adults" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Children</label>
                 <div class="input-group input-group-outline mb-3">
                    
                    <input type="number"value="<?php echo $row["rtmChildren"]; ?>" min="0" value="0" name="children" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Availabality</label>
                 <div class="input-group input-group-outline mb-3">
                    
                    <input type="checkbox" value="<?php echo $row["rtmStatus"]; ?>" name="status" class="form-check" <?php $row["rtmStatus"]==1?print "checked":print "" ?>>
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Description</label>
                 <div class="input-group input-group-outline mb-3">
                    
                    <input type="text"value="<?php echo $row["rtmDescription"]; ?>" name="description" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Banner Image</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="file"value="<?php echo $row["rtmBanner"]; ?>" name="bnImage" class="form-control">
                 </div>
              </div>
           </div>
        </div>
        <!-- <div class="form-check form-check-info text-start ps-0"> -->
           <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked> -->
           <!-- <label class="form-check-label" for="flexCheckDefault"> -->
           <!-- I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a> -->
           <!-- </label> -->
        <!-- </div> -->
        <div class="text-end">
           <button type="submit" name="btnEdit" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
        </div>
                 </form>
             </div>
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