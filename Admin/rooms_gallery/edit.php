<?php
//require_once("./AdminAuth.php");
require_once(".././AdminAuth.php");
include_once("../common/connection.php");


   
$roomList = "SELECT * FROM roomtypemaster WHERE rtmStatus=1";
$roomListRes = mysqli_query($connection, $roomList);  

    
   
    $Id = $_GET["id"];
    if(isset($_POST["btnEdit"]))
{
    
    $rId =$Id;
    $roomtitle = $_POST["rtmId"];
    $oldPhoto= $_POST["oldPhoto"];
    if($_FILES["rgImage"]["size"]!=0)
    {
       $directory="../../images/gallery/";
       $ext = pathinfo($_FILES["rgImage"]["name"], PATHINFO_EXTENSION);
       $filename = rand(000,999).".".$ext;
       $file=$directory.$filename;
       if(move_uploaded_file($_FILES["rgImage"]["tmp_name"],$file))
       {     
        $oldPhoto=$file;
        }
    }
    
    
    
    $updateQuery = "UPDATE rooms_gallery SET rgImage='$oldPhoto', rtmId='$roomtitle' WHERE rgId='$rId'";
    $updateResult = mysqli_query($connection, $updateQuery);
    if($updateResult==1)
    {
       
        header("Location: /hotel/admin/rooms_gallery");
       
    }
    
    //include("../layout/header.php");
}

$query="SELECT * FROM rooms_gallery Where rgId='$Id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
 include_once("../layout/header.php");
?>
<!-- Form Start -->

<?// include("../layout/header.php");?>
 <div class="container-fluid pt-4 px-4">
     <div class="row g-4">

    
        <?php
if($result->num_rows==1)
{
        ?>

    <div class="container-fluid">
<form role="form" method="post" action=""  enctype="multipart/form-data">
   <div class="card p-3">
   <input type="hidden" name="oldPhoto"value="<?php echo $row["rgImage"]; ?>">
        <div class="col-12">
           <div class="row">
              <div class="col-4">
              <label for="title" class="form-label">Room Title</label>
    <select name="rtmId" id="title" class="form-select px-2">
    <?php
   while($r = mysqli_fetch_array($roomListRes))
   {
      ?>
      <option value="<?php echo $r["rtmId"]; ?>" <?php echo $r['rtmId']==$row['rtmId']?"selected":"" ?> ><?php echo $r["rtmTitle"]; ?></option>
      <?php
   }
?>
                 </select>
                 </div>
                  
                 

                 

              <div class="col-8">
              <label class="form-label">Image</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="file" name="rgImage" class="form-control">
                 </div>
              </div>
           
        </div>
        <div class="text-end">
           <button type="submit" name="btnEdit" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
        </div>
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