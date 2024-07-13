<?php
require_once(".././RecpAuth.php");
include_once("../common/connection.php");

$query = "SELECT * FROM bookingmaster join roomtypemaster on bookingmaster.rtmId=roomtypemaster.rtmId";
$result = mysqli_query($connection,$query);
$numrow = $result->num_rows;
$deleteId=0;
$totalPrice=0;
include_once("../layout/header.php");
?>

<div class="container-fluid pt-4 px-4">
        <div class="bg-white text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Bookings</h6>
               <!-- <a href="create.php" class="btn btn-primary">Add Record</a>-->
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">

                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">RType</th>
                            <th scope="col">DCI</th>
                            <th scope="col">DCO</th>
                            <th scope="col">Adults</th>
                            <th scope="col">Children</th>
                            <th scope="col">Rooms</th>
                            <th scope="col">Notes</th>
                            <th scope="col">RoomPrice</th>
                            <th scope="col">TotalPrice</th>
                            <th scope="col">Check_out</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <!-- <td><input class="form-check-input" type="checkbox"></td> -->
                            <?php
                            while($r = mysqli_fetch_array($result)) {
                              $totalPrice+= $r["TotalPrice"];
                                ?>
                                <tr>
                                <td><?php echo $r["name"]; ?></td>
                                <td><?php echo $r["phone"]; ?></td>
                                <td><?php echo $r["email"]; ?></td>
                                <td><?php echo $r["rtmTitle"]; ?></td>
                                <td><?php echo $r["cid"]; ?></td>
                                <td><?php echo $r["cod"]; ?></td>
                                <td><?php echo $r["adults"]; ?></td>
                                <td><?php echo $r["children"]; ?></td>
                                <td><?php echo $r["rooms"]; ?></td>
                                <td><?php echo $r["remark"]; ?></td>
                                <td><?php echo $r["Price"]; ?></td>
                                <td><?php echo $r["TotalPrice"]; ?></td>
                                <td><?php echo $r["isempty"]; ?></td>


<td>
<a class="btn btn-sm btn-primary" href="edit.php?id=<?php  echo $r['bkmId'];  ?>"><i class="fa fa-pen"></i></a>
<a class="btn btn-sm btn-info" href="edit.php?id=<?php  echo $r['bkmId'];  ?>"><i class="fa fa-eye"></i></a>
<a class="btn btn-sm btn-link" href="edit.php?id=<?php  echo $r['bkmId'];  ?>"><i class="fa fa-link"></i></a>
<a class="btn btn-sm btn-danger" onclick="setData('<?php  echo $r['bkmId']; ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></a>
</td>
                                </tr>
                                <?php
                            }
                            ?>
                        <tr>
                          <th colspan="11" style="text-align: right;">Total Amount</th>
                          <th><?php echo $totalPrice; ?></th>
                        </tr>
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
        <input type="hidden" name="bkmId" id="id">
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
        $("#id").val(id);
    }
</script>
<?php

include_once("../layout/footer.php");
?>
