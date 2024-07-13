<?php
   include_once("../Admin/AdminAuth.php");
   include_once("../common/connection.php");

   $isExist=0;
   
   
   
   
  
    
    if(isset($_POST["btnUpdate"]))
    {
         $recordId = $_POST["id"];
         $oldPhoto = $_POST["photo"];
        $title = $_POST["title"];
        $tagLine = $_POST["tagline"];
        $address = $_POST["address"];
        $email= $_POST["email"];
        $contact= $_POST["contact"];
        $copyrightText= $_POST["copyrightText"];
        if($_FILES["bgImage"]["size"]!=0)
        {
         $directory = ".././Admin/images/site/";
         $ext = pathinfo($_FILES["bgImage"]["name"], PATHINFO_EXTENSION);
         $fileName = rand(11111,99999) .".". $ext;
         $file = $directory.$fileName;
         if(move_uploaded_file($_FILES["bgImage"]["tmp_name"],$file))
         {
            $oldPhoto=$fileName;
         }
        }
        
        
        
        $updateQuery = "UPDATE sitesettingmaster SET ssmTitle='$title',ssmTagline='$tagLine',
        ssmAddress='$address',ssmPhone='$contact',ssmEmail='$email',ssmCpt='$copyrightText',ssmHbg='$oldPhoto'
        WHERE ssmId='$recordId'";
        
        $updateResult=mysqli_query($connection,$updateQuery);
        if($updateResult==1)
        {
            $responseMessage="Site Setting Updated.";
        }
        else{
            $responseMessage= "Error Occurred.";
        }
    }


    if(isset($_POST["btnSave"]))
{
    $title = $_POST["title"];
    $tagLine = $_POST["tagline"];
    $address = $_POST["address"];
    $email= $_POST["email"];
    $contact= $_POST["contact"];
    $copyrightText= $_POST["copyrightText"];
    $directory = ".././Admin/images/site/";
    $ext = pathinfo($_FILES["bgImage"]["name"], PATHINFO_EXTENSION);
    $fileName = rand(11111,99999) .".". $ext;
    $file = $directory.$fileName;
    $id=uniqid();
    if(move_uploaded_file($_FILES["bgImage"]["tmp_name"],$file))
    {
      $query = "UPDATE sitesettingmaster SET ";
        $query = "INSERT INTO sitesettingmaster (ssmId,ssmTitle,ssmTagline,ssmPhone,ssmEmail,ssmAddress,ssmCpt,ssmHbg) 
                VALUES  ('$id','$title','$tagLine','$contact','$email','$address','$copyrightText','$fileName')";
        $result=mysqli_query($connection, $query);
        if($result==1)
        {
            $responseMessage="Site Setting Saved.";
        }
        else{
            $responseMessage= "Error Occurred.";
        }
    }
    else{
        $errorMessage = "Error Occurred";
    }
}
$rId="0";
$rPhoto="-";
$query1 = "SELECT * FROM sitesettingmaster ";
$result1 = mysqli_query($connection,$query1);
if(mysqli_num_rows($result1)>=1)
{
  $isExist=1;
  $rData = mysqli_fetch_array($result1);
  $rPhoto=$rData["ssmHbg"];
  $rId=$rData["ssmId"];
}

include_once(".././Admin/layout/header.php");
   ?>    
<div class="container-fluid py-4">
   <div class="row card">
    <?php
    if(isset($responseMessage))
    {
        ?>
        <span><?php echo $responseMessage;?></span>
        <?php
    }

    if(isset($errorMessage))
{
    ?>
    <span><?php echo $errorMessage;?></span>
    <?php
}
    ?>
      <div class="card-body">
         <?php
            if($isExist==0)
            {
         ?>

<?//include_once(".././Admin/layout/header.php");?>
<h3 style="color: black;">Site Setting</h3>
         <form role="form" method="post" enctype="multipart/form-data">
            <div class="col-12">
               <div class="row">
                  <div class="col-6">
                     <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Site Title</label>
                        <input type="text" name="title" class="form-control">
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Site Tagline</label>
                        <input type="text" name="tagline" class="form-control">
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control">
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control">
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Contact No</label>
                        <input type="text" name="contact" class="form-control">
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Copyright Text</label>
                        <input type="text" name="copyrightText" class="form-control">
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Background Image</label>
                        <input type="file" name="bgImage" class="form-control">
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
               <button type="submit" name="btnSave" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
            </div>
         </form>
         <?php
            }
            else{
               ?>
               <h3 style="color: light gray;">Site Setting</h3>
               <form role="form" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $rId; ?>" >
                  <input type="hidden" name="photo" value="<?php echo $rPhoto; ?>" >
   <div class="col-12">
      <div class="row">
         <div class="col-6">
         <label class="form-label">Site Title</label>
            <div class="input-group input-group-outline mb-3">
            
               <input type="text" value="<?php echo $rData["ssmTitle"]; ?>" name="title" class="form-control">
            </div>
         </div>
         <div class="col-6">
         <label class="form-label">Site Tagline</label>
            <div class="input-group input-group-outline mb-3">
               
               <input type="text" value="<?php echo $rData["ssmTagline"]; ?>" name="tagline" class="form-control">
            </div>
         </div>
         <div class="col-6">
         <label class="form-label">Address</label>
            <div class="input-group input-group-outline mb-3">
               
               <input type="text" value="<?php echo $rData["ssmAddress"]; ?>" name="address" class="form-control">
            </div>
         </div>
         <div class="col-6">
         <label class="form-label">Email</label>
            <div class="input-group input-group-outline mb-3">
               
               <input type="text" value="<?php echo $rData["ssmEmail"]; ?>" name="email" class="form-control">
            </div>
         </div>
         <div class="col-6">
         <label class="form-label">Contact No</label>
            <div class="input-group input-group-outline mb-3">
               
               <input type="text" name="contact" value="<?php echo $rData["ssmPhone"]; ?>" class="form-control">
            </div>
         </div>
         <div class="col-6">
         <label class="form-label">Copyright Text</label>
            <div class="input-group input-group-outline mb-3">
              
               <input type="text" value="<?php echo $rData["ssmCpt"]; ?>" name="copyrightText" class="form-control">
            </div>
         </div>
         <div class="col-6">
         <label class="form-label">Background Image</label>
            <div class="input-group input-group-outline mb-3">
               
               <input type="file" name="bgImage" class="form-control">
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
      <button type="submit" name="btnUpdate" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
   </div>
</form>
               <?php
            }
         ?>
      </div>
   </div>
</div>
<?php
   include_once("../Admin/layout/footer.php");    
   ?>