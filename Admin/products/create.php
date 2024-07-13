<?php

require_once(".././AdminAuth.php");
include_once("../common/connection.php");

$catList = "SELECT * FROM categorymaster WHERE catActive=1";
$catListRes = mysqli_query($connection, $catList);

if(isset($_POST["btnSave"]))
{
$prdId = uniqid();
$catId =$_POST["catId"];
$prdname =$_POST["name"];
$prdprice =$_POST["price"];
$prddes =$_POST["description"];


if($_FILES["image"]["size"]!=0)
{
   $directory=$_SERVER["DOCUMENT_ROOT"]."/hotel/images/food/";
   $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
   $filename = rand(000,999).".".$ext;
   $file=$directory.$filename;
  
   if(move_uploaded_file($_FILES["image"]["tmp_name"],$file))
{



$query="INSERT INTO products (prdId,catId,prdName,prdPrice,prdDescription,prdImage) VALUES ('$prdId','$catId','$prdname','$prdprice','$prddes','$filename')";
$result = mysqli_query($connection, $query);
        if($result==1)
        {
            header("Location: /hotel/admin/products");
        }
      }

   }
}  
include("../layout/header.php");
?>

<div class="container-fluid">
<form role="form" method="post" action=""  enctype="multipart/form-data">
   
        <div class="card p-3">
           <div class="row">
              <div class="col-6">
              <label for="rgtitle" class="form-label">Category</label>
    <select name="catId" id="catId" class="form-select px-3">
      <?php
         while($row = mysqli_fetch_array($catListRes))
         {
            ?>
            <option value="<?php echo $row["catId"]; ?>"><?php echo $row["catName"]; ?></option>
            <?php
         }
      ?>
    </select>
                 </div>

                 <div class="col-6">
<label class="form-label">Product</label>
   <div class="input-group input-group-outline mb-3">
      <input type="text" name="name" class="form-control">
   </div>
</div>
<div class="col-6">
<label class="form-label">Price</label>
   <div class="input-group input-group-outline mb-3">
      <input type="text" name="price" class="form-control">
   </div>
</div>
<div class="col-6">
<label class="form-label">Description</label>
   <div class="input-group input-group-outline mb-3">
      <input type="text" name="description" class="form-control">
   </div>
</div>
<!--<div class="col-6">
<label class="form-label">Active</label>
   <div class="input-group input-group-outline mb-3">
      <input type="text" name="status" class="form-control">
   </div>
</div>-->
                  
                 

                 

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