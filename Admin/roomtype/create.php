<?php
include_once(".././AdminAuth.php");

include_once("../common/connection.php");
 $directory="/hotel/images/";
 if(is_dir($directory)) {
   echo "1";
 }
 else{
   echo "0";
 }



if(isset($_POST["btnSave"]))
{
$rtmId = uniqid();
$roomtitle = $_POST["title"];
$roomprice = $_POST["price"];
$totalrooms = $_POST["rooms"];
$adults= $_POST["adults"];
$children = $_POST["children"];
$status = $_POST["status"];
$description= $_POST["description"];
$slug = strtolower($roomtitle);
$slug = str_replace(" ","-", $slug);
if($_FILES["bnImage"]["size"]!=0)
{
   $directory=$_SERVER["DOCUMENT_ROOT"]."/hotel/images/rooms/";
   $ext = pathinfo($_FILES["bnImage"]["name"], PATHINFO_EXTENSION);
   $filename = rand(000,999).".".$ext;
   $file=$directory.$filename;
  
   if(move_uploaded_file($_FILES["bnImage"]["tmp_name"],$file))
{



$query="INSERT INTO roomtypemaster (rtmId,rtmTitle,rtmPrice,rtmRooms,rtmAdults,rtmChildren,rtmStatus,rtmDescription,rtmBanner,rtmSlug)
        VALUES ('$rtmId','$roomtitle','$roomprice','$totalrooms','$adults','$children','$status','$description','$filename','$slug')";
$result = mysqli_query($connection, $query);
        if($result==1)
        {
            header("Location: /hotel/admin");
        }
      }

   }
}  
include_once("../layout/header.php");
?>

<? //include("../layout/header.php");?> 

<div class="container-fluid">
<form role="form" method="post" action="" enctype="multipart/form-data">
   
        <div class="card p-3">
           <div class="row">
              <div class="col-6">
              <label class="form-label">Room Title</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="text" name="title" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Room Price</label>
                 <div class="input-group input-group-outline mb-3">
                  <input type="text" name="price" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Total Rooms</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="number" min="0" value="0" name="rooms" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Adults</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="number" min="1" value="1" name="adults" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Children</label>
                 <div class="input-group input-group-outline mb-3">
                    
                    <input type="number" min="0" value="0" name="children" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Availabality</label>
                 <div class="input-group input-group-outline mb-3">
                    
                    <input type="checkbox" name="status" class="form-check">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Description</label>
                 <div class="input-group input-group-outline mb-3">
                    
                    <input type="text" name="description" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Banner Image</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="file" name="bnImage" class="form-control">
                 </div>
              </div>
           </div>

           <div class="text-end">
   <button type="submit" name="btnSave" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
</div>
           </div>
        <!-- <div class="form-check form-check-info text-start ps-0"> -->
           <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked> -->
           <!-- <label class="form-check-label" for="flexCheckDefault"> -->
           <!-- I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a> -->
           <!-- </label> -->
        <!-- </div> -->
        
        
        
     </form>

     </div>
<?php
include_once("../layout/footer.php");
?>