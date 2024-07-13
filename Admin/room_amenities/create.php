<?php
require_once(".././AdminAuth.php");
include_once("../common/connection.php");


if(isset($_POST["btnSave"]))
{
$Id = uniqid();
$amenity =$_POST["amenity"];

$query="INSERT INTO room_amenities (aId,amenity) VALUES ('$Id','$amenity')";
$result = mysqli_query($connection, $query);
        if($result==1)
        {
            header("Location: /hotel/admin/room_amenities");
        }
      }


      include_once("../layout/header.php");
?>
<?php //include_once("../layout/header.php"); ?>
    
<div class="container-fluid">
<form role="form" method="post" action=""  >
   
        <div class="card p-3">
           <div class="row">
                 <div class="col-6">
                    <label class="form-label">Amenity</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="text" name="amenity" class="form-control">
                 </div>
              </div>
           
        </div>
        <div class="text-end">
           <button type="submit" name="btnSave" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
        </div>
        </div>
     </form>

     </div>

<?php
include_once("../layout/footer.php");
?>