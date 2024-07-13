<?php

require_once(".././AdminAuth.php");
include_once("../common/connection.php");



if(isset($_POST["btnSave"]))
{
$Id = uniqid();
$date = $_POST["date"];
$title = $_POST["title"];
$description= $_POST["description"];
if($_FILES["Image"]["size"]!=0)
{
   $directory=$_SERVER["DOCUMENT_ROOT"]."/hotel/images/events/";
   $ext = pathinfo($_FILES["Image"]["name"], PATHINFO_EXTENSION);
   $filename = rand(000,999).".".$ext;
   $file=$directory.$filename;
  
   if(move_uploaded_file($_FILES["Image"]["tmp_name"],$file))
{



$query="INSERT INTO eventsmaster (eId,edate,etitle,edescription,eImage) VALUES ('$Id','$date','$title','$description','$filename')";
$result = mysqli_query($connection, $query);
        if($result==1)
        {
            header("Location: /hotel/admin/events");
        }
      }

   }
}  
include_once("../layout/header.php");
?>

<? //include("../layout/header.php");?> 

<div class="container-fluid">
<form role="form" method="post" action=""  enctype="multipart/form-data">
   
        <div class="card p-3">
           <div class="row">
              <div class="col-6">
              <label class="form-label"> Title</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="text" name="title" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Date</label>
                 <div class="input-group input-group-outline mb-3">
                  <input type="date" name="date" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Description</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="text" name="description" class="form-control">
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label"> Image</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="file" name="Image" class="form-control">
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