<?php


require_once(".././AdminAuth.php");
include_once("../common/connection.php");




$query = "SELECT * FROM reviewmaster";
$result = mysqli_query($connection,$query);
$numrow = $result->num_rows;
//$deleteId=0;

include_once("../layout/header.php");
?>

<div class="container-fluid pt-4 px-4">
        <div class="bg-white text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Review List</h6>
                <!--<a href="create.php" class="btn btn-primary">Add Record</a>-->
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <!-- <th scope="col"><input class="form-check-input" type="checkbox"></th> -->
                            <th>#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Review</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                            <!-- <td><input class="form-check-input" type="checkbox"></td> -->
                            <?php
                            while($r = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                <td>
                                    <img height="100" width="100" src="/hotel/images/people/<?php echo $r["image"]; ?>" >
                                </td>
                                <td><?php echo $r["name"]; ?></td>
                                <td><?php echo $r["review"]; ?></td>
                            
<td>
<a class="btn btn-sm btn-primary" href="display.php?id=<?php echo $r["rId"]; ?>">
    <?php
        $r["display"]==0?print "Not Approved":print "Approved";
    ?>
</a>
<!--<a class="btn btn-sm btn-info" href="Amenities.php?id=<?php //echo $r["rId"]; ?>"><i class="fa fa-list"></i></a>-->

   
</td>
                                </tr>
                                <?php
                            }
                            ?>
                        
                    </tbody>
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
        <input type="hidden"  name="rId" id="id">
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