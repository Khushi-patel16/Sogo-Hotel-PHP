<?php
include_once(".././AdminAuth.php");

include_once("../common/connection.php");
 //$directory="/hotel/images/gallery/";

$roomList = "SELECT * FROM roomtypemaster WHERE rtmStatus=1";
$roomListRes = mysqli_query($connection, $roomList);

if(isset($_POST["btnSave"]))
{
$rgId = uniqid();
$rgtitle =$_POST["rtmId"];
if($_FILES["image"]["size"]!=0)
{
   $directory=$_SERVER["DOCUMENT_ROOT"]."/hotel/images/gallery/";
   $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
   $filename = rand(000,999).".".$ext;
   $file=$directory.$filename;
  
   if(move_uploaded_file($_FILES["image"]["tmp_name"],$file))
{



$query="INSERT INTO rooms_gallery (rgId,rtmId,rgImage) VALUES ('$rgId','$rgtitle','$filename')";
$result = mysqli_query($connection, $query);
        if($result==1)
        {
            header("Location: /hotel/admin/rooms_gallery");
        }
      }

   }
}  
include("../layout/header.php");
?>

<?// include("../layout/header.php");?>

<div class="container-fluid">
<form role="form" method="post" action=""  enctype="multipart/form-data">
   
        <div class="card p-3">
           <div class="row">
              <div class="col-6">
              <label for="rgtitle" class="form-label">Room Title</label>
    <select name="rtmId" id="rgtitle" class="form-control">
      <?php
         while($row = mysqli_fetch_array($roomListRes))
         {
            ?>
            <option value="<?php echo $row["rtmId"]; ?>"><?php echo $row["rtmTitle"]; ?></option>
            <?php
         }
      ?>
    </select>
                 </div>
                  
                 

                 

              <div class="col-6">
              <label class="form-label">Image</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="file" name="image" class="form-control">
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