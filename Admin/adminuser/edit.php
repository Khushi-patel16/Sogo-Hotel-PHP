<?php
//require_once("./AdminAuth.php");
require_once(".././AdminAuth.php");
include_once("../common/connection.php");

    $adminId = $_GET["id"];
    
    
    

    if(isset($_POST["btnEdit"]))
{
    
    $Id =$_POST["AdmUniqueId"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password= $_POST["password"];
    $status = $_POST["status"];
    
    
    
    $updateQuery = "UPDATE adminmaster SET AdmName='$name', AdmEmail='$email',AdmRole='$role',
    AdmPassword='$password',AdmStatus='$status' WHERE AdmUniqueId='$Id'";
    $updateResult=mysqli_query($connection,$updateQuery);
    
    
    $updateResult = mysqli_query($connection, $updateQuery);
    if($updateResult==1)
    {
        header("Location: /hotel/admin/adminuser");
       
    }
    
    
}

$query="SELECT * FROM adminmaster Where AdmUniqueId='$adminId'";
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
                 <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="AdmUniqueId" value="<?php echo $row["AdmUniqueId"]; ?>">
                 <div class="col-12">
           <div class="row">
              <div class="col-6">
              <label class="form-label">Name</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="text" value="<?php echo $row["AdmName"]; ?>" name="name" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Email</label>
                 <div class="input-group input-group-outline mb-3">
                  <input type="text"value="<?php echo $row["AdmEmail"]; ?>" name="email" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Role</label>
                 <div class="input-group input-group-outline mb-3">
   
                    <select class="form-control"  name="role">
<option value="">Select Role</option>
   <option value="Admin" <?php $row["AdmRole"]=="Admin"? print"selected":""; ?>>Admin</option>
   <option value="HR" <?php $row["AdmRole"]=="HR"? print"selected":""; ?>>HR</option>
   <option value="Manager" <?php $row["AdmRole"]=="Manager"? print"selected":""; ?>>Manager</option>
   <option value="Director" <?php $row["AdmRole"]=="Director"? print"selected":""; ?>>Director</option>
   <option value="Receptionist" <?php $row["AdmRole"]=="Receptionist"? print"selected":""; ?>>Receptionist</option>
</select>
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Password</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="text"value="<?php echo $row["AdmPassword"]; ?>" name="password" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Status</label>
                 <div class="input-group input-group-outline mb-3">
                    
                    <input type="checkbox" value="<?php echo $row["AdmStatus"]; ?>" name="status" class="form-check" <?php $row["AdmStatus"]==1?print "checked":print "" ?>>
                 </div>
              </div>
           </div>
        </div>
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