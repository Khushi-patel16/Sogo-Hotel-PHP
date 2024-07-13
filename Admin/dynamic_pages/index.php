<?php

require_once(".././AdminAuth.php");
include_once("../common/connection.php");




$query = "SELECT * FROM dynamic";
$result = mysqli_query($connection,$query);
$r = mysqli_fetch_array($result);


include_once("../layout/header.php");
?>
<div class="container-fluid pt-4 px-4">
        <div class="bg-white text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Page List</h6>
                <a href="create.php" class="btn btn-primary">Add Record</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">



<tr>
  <td>
    
<th scope="col" class="text-dark">About</th> 
  </td>
  <td>
  <?php echo $r["about"]; ?>
  </td>
</tr>



<tr>
<td>
<th scope="col" class="text-dark">Terms</th> 
</td>
<td>
<?php echo $r["terms"]; ?>
</td>
</tr>


<tr>
<td>
<th scope="col" class="text-dark">Privacy Policy</th> 
</td>
<td>
 <?php echo $r["privacy"]; ?>
</td>
</tr>


<tr>
<td>
<th scope="col" class="text-dark">Action</th> 
</td>
<td>
<a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $r["pId"]; ?>"><i class="fa fa-pen"></i></a>
    <a class="btn btn-sm btn-info" href="edit.php?id=<?php echo $r["pId"]; ?>"><i class="fa fa-eye"></i></a>
    <a class="btn btn-sm btn-danger" onclick="setData('<?php echo $r['pId']; ?>');" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></a>  
</td>
</tr>

                        
                  
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="delete.php" method="post">
      <div class="modal-body">
        <input type="hidden"  name="pId" id="id">
                Are you sure to delete the record?
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary">Delete</button>
</div>
      </form>
    </div>
  </div>
</div>
<script>
    function setData(id)
    {
        $('#id').val(id);
    }
</script>
<?php
include_once("../layout/footer.php");

?>
