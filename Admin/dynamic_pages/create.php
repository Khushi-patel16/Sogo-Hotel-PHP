<?php

require_once(".././AdminAuth.php");
include_once("../common/connection.php");

$ab="";
$tc="";
$pp="";
$id="";
$getData = "SELECT * FROM dynamic";
$dataRes = mysqli_query($connection,$getData);
$numRows = mysqli_num_rows($dataRes);
$data = mysqli_fetch_array($dataRes);
if($numRows!=0)
{
   $id=$data['pId'];
   $tc = $data['terms'];
   $ab=$data['about'];
   $pp=$data['privacy'];
}

if(isset($_POST["btnSave"]))
{
$Id = uniqid();
$ab = $_POST["about"];
$tc = $_POST["terms"];
$pp= $_POST["privacy"];



$query="INSERT INTO dynamic (pId,about,terms,privacy) VALUES ('$Id','$ab','$tc','$pp')";
$result = mysqli_query($connection, $query);
        
        
        
        
      }
if(isset($_POST['btnUpdate']))
{
   
   $id = $data['pId'];
   $ab = $_POST["about"];
   $tc = $_POST["terms"];
   $pp= $_POST["privacy"];  
   $updateQuery = "UPDATE dynamic set about='$ab',privacy='$pp',terms='$tc' WHERE pId='$id'";
   $updateRes=mysqli_query($connection,$updateQuery);
}
 
include_once("../layout/header.php");
?>

<? //include("../layout/header.php");?> 

<div class="container-fluid">
<form role="form" method="post" action=""  enctype="multipart/form-data">
   
        <div class="card p-3">
           <div class="row">
              <div class="col-6">
              <label class="form-label">About </label>
                 <div class="input-group input-group-outline mb-3">
                  <textarea name="about" id="" class="form-control" rows="10">
                     <?php echo $ab; ?>
                  </textarea>
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">T & C</label>
                 <div class="input-group input-group-outline mb-3">
                 <textarea name="terms" id="" class="form-control" rows="10">
                 <?php echo $tc; ?>
                 </textarea>
                    
                 </div>
              </div>
              <div class="col-6">
              <label class="form-label">Privacy Policy</label>
                 <div class="input-group input-group-outline mb-3">
                 <textarea name="privacy" id="" class="form-control" rows="10">
                 <?php echo $pp; ?>
                 </textarea>
                 </div>
              </div>
           </div>
        
        <div class="text-end">
         <?php
         if($numRows==0)
         {
            ?>
            <button type="submit" name="btnSave" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
            <?php
         }
         else{
            ?>
            <button type="submit" name="btnUpdate" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
        <?php
         }
         ?>
           
        </div>
        </div>
     </form>
     </div>

<?php
include_once("../layout/footer.php");
?>