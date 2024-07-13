<?php
//include_once(".././AdminAuth.php");
require_once(".././AdminAuth.php");
include_once("../common/connection.php");



if(isset($_POST["btnSave"]))
{
$catId = uniqid();
$catname = $_POST["name"];


$query="INSERT INTO categorymaster (catId,catName)
        VALUES ('$catId','$catname')";
$result = mysqli_query($connection, $query);
        if($result==1)
        {
            header("Location: /hotel/admin/categories");
        }
      }

   
 
include_once("../layout/header.php");
?>


<form class="container-fluid" role="form" method="post" action="" >
   
        <div class="card p-3">
           <div class="row">
              <div class="col-6">
              <label class="form-label">Category Name</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="text" name="name" class="form-control">
                 </div>
              </div>
           </div>
       

        <div class="text-end">
           <button type="submit" name="btnSave" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
        </div>
        </div>
     </form>


<?php
include_once("../layout/footer.php");
?>