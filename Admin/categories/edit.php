<?php
require_once(".././AdminAuth.php");
include_once("../common/connection.php");

    $Id = $_GET["id"];
    
    
    

    if(isset($_POST["btnEdit"]))
{
    
    $recordId =$_POST["id"];
    $catname = $_POST["name"];
    $status = $_POST["status"];
    
    
    $updateQuery = "UPDATE categorymaster SET catName='$catname',catActive='$status' WHERE catId='$recordId'";
    $updateResult=mysqli_query($connection,$updateQuery);
    
    
    $updateResult = mysqli_query($connection, $updateQuery);
    if($updateResult==1)
    {
        header("Location: /hotel/admin/roomtype");
       
    }
    
    
}

$query="SELECT * FROM categorymaster Where catId='$Id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);

include_once("../layout/header.php");
?>
<!-- Form Start -->


 <div class="container-fluid pt-4 px-4">
     <div class="row g-4">

    
        <?php
if($result->num_rows==1)
{
        ?>
         <div class="col-sm-12 col-xl-12">
             <div class="bg-white rounded h-100 p-4">
                 <h6 class="mb-4">Edit Data</h6>
                 <form method="post" >
                    <input type="hidden" name="id" value="<?php echo $row["catId"]; ?>">
                   
                 <div class="col-12">
           <div class="row">
              <div class="col-6">
              <label class="form-label">Category</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="text" value="<?php echo $row["catName"]; ?>" name="name" class="form-control">
                 </div>
              </div>
                 </div>
              <div class="col-6">
              <label class="form-label">Availabality</label>
                 <div class="input-group input-group-outline mb-3">
                    
                    <input type="checkbox" value="<?php echo $row["catActive"]; ?>" name="status" class="form-check" <?php $row["catActive"]==1?print "checked":print "" ?>>
                 </div>
              </div>
           </div>
        </div>
        <div class="text-end">
           <button type="submit" name="btnEdit" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
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