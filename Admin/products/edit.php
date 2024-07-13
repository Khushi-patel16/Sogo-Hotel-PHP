<?php
require_once(".././AdminAuth.php");
include_once("../common/connection.php");


   
$catList = "SELECT * FROM categorymaster WHERE catActive=1";
$catListRes = mysqli_query($connection, $catList);  

    
   
    $Id = $_GET["id"];
    if(isset($_POST["btnEdit"]))
{
    
    $rId =$Id;
    $catname = $_POST["catId"];
    $prdname =$_POST["name"];
    $prdprice =$_POST["price"];
    $prddes =$_POST["description"];
    
    $oldPhoto= $_POST["oldPhoto"];
    if($_FILES["prdImage"]["size"]!=0)
    {
       $directory="../../images/food/";
       $ext = pathinfo($_FILES["prdImage"]["name"], PATHINFO_EXTENSION);
       $filename = rand(000,999).".".$ext;
       $file=$directory.$filename;
       if(move_uploaded_file($_FILES["prdImage"]["tmp_name"],$file))
       {     
        $oldPhoto=$file;
        }
    }
    
    
    
    $updateQuery = "UPDATE products SET prdImage='$oldPhoto', catId='$catname', prdName='$prdname', prdPrice='$prdprice', prdDescription='$prddes' WHERE prdId='$rId'";
    $updateResult = mysqli_query($connection, $updateQuery);
    if($updateResult==1)
    {
       
        header("Location: /hotel/admin/products");
       
    }
    
    
}

$query="SELECT * FROM products Where prdId='$Id'";
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

    
<form role="form" method="post" action=""  enctype="multipart/form-data">
   <input type="hidden" name="oldPhoto"value="<?php echo $row["prdImage"]; ?>">
        <div class="card p-3">
           <div class="row">
              <div class="col-6">
              <label for="title" class="form-label">Category</label>
    <select name="catId" id="title" class="form-control">
    <?php
   while($r = mysqli_fetch_array($catListRes))
   {
      ?>
      <option value="<?php echo $r["catId"]; ?>" <?php echo $r['catId']==$row['catId']?"selected":"" ?> ><?php echo $r["catName"]; ?></option>
      <?php
   }
?>
                 </select>
                 </div>


                 <div class="col-6">
<label class="form-label">Product</label>
   <div class="input-group input-group-outline mb-3">
      <input type="text"  value="<?php echo $row["prdName"]; ?>" name="name" class="form-control">
   </div>
</div>
<div class="col-6">
<label class="form-label">Price</label>
   <div class="input-group input-group-outline mb-3">
      <input type="text" value="<?php echo $row["prdPrice"]; ?>"  name="price" class="form-control">
   </div>
</div>
<div class="col-6">
<label class="form-label">Description</label>
   <div class="input-group input-group-outline mb-3">
      <input type="text" value="<?php echo $row["prdDescription"]; ?>"  name="description" class="form-control">
   </div>
</div>
                  
                 

                 

              <div class="col-6">
              <label class="form-label">Image</label>
                 <div class="input-group input-group-outline mb-3">
                    <input type="file" value="<?php echo $row["prdImage"]; ?>"  name="prdImage" class="form-control">
                 </div>
              </div>
           
        </div>
        <div class="text-end">
           <button type="submit" name="btnEdit" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
        </div>
        </div>
     </form>





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