<?php

require_once(".././AdminAuth.php");
include_once("../common/connection.php");

$query = "SELECT * FROM bookingmaster
          join roomtypemaster on bookingmaster.rtmId = roomtypemaster.rtmId";

$fd="";
$td="";
$rt="";
if(isset($_POST['btnSearch']))
{
  $fd = $_POST['fromDate'];
  $td = $_POST['toDate'];
  $rt = $_POST['roomType'];
  if($fd!="" && $td =="")
  {
      if($rt == "All")
      {
        $query = "SELECT * FROM bookingmaster
          join roomtypemaster on bookingmaster.rtmId = roomtypemaster.rtmId
          WHERE bookingmaster.cid>='$fd'";
      }
      else{
        $query = "SELECT * FROM bookingmaster
          join roomtypemaster on bookingmaster.rtmId = roomtypemaster.rtmId
          WHERE bookingmaster.cid>='$fd' and bookingmaster.rtmId='$rt'";
      }
  }
  else if($fd=="" && $td !="")
  {
    if($rt=="All")
    {
      $query = "SELECT * FROM bookingmaster
  join roomtypemaster on bookingmaster.rtmId = roomtypemaster.rtmId
  WHERE bookingmaster.cid<='$td'";
    }
    else{
      $query = "SELECT * FROM bookingmaster
  join roomtypemaster on bookingmaster.rtmId = roomtypemaster.rtmId
  WHERE bookingmaster.cid<='$td' and bookingmaster.rtmId='$rt'";
    }
  }
  else if($fd!="" && $td !="")
  {
      if($rt=="All")
      {
        $query = "SELECT * FROM bookingmaster
        join roomtypemaster on bookingmaster.rtmId = roomtypemaster.rtmId
        WHERE bookingmaster.cid>='$fd' and bookingmaster.cid<='$td'";
      } 
      else
      {
        $query = "SELECT * FROM bookingmaster
        join roomtypemaster on bookingmaster.rtmId = roomtypemaster.rtmId
        WHERE bookingmaster.cid>='$fd' and bookingmaster.cid<='$td' and bookingmaster.rtmId='$rt'";
      }
  }
  else{
      if($rt == "All")
      {
        $query = "SELECT * FROM bookingmaster
        join roomtypemaster on bookingmaster.rtmId = roomtypemaster.rtmId";
      }
      else
      {
        $query = "SELECT * FROM bookingmaster
join roomtypemaster on bookingmaster.rtmId = roomtypemaster.rtmId
WHERE bookingmaster.rtmId='$rt'";
      }
  }
  
  

}
$result = mysqli_query($connection,$query);

$rtm = "SELECT * FROM roomtypemaster";
$res = mysqli_query($connection,$rtm);


include_once("../layout/header.php");
?>

<div class="container-fluid pt-4 px-4">
        <div class="bg-white  rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Bookings Report  </h6>
               <!-- <a href="create.php" class="btn btn-primary">Add Record</a>-->
            </div>
            <form method="post">
            <div class="row p-3">
            <div class="col-md-3 form-group">
  <label class="text-black font-weight-bold" for="fromDate">From Date</label>
  <input type="date"name="fromDate" value="<?php echo $fd; ?>"  id="checkout_date1" class="form-control" style="border:1px solid gray !important;">
</div>
<div class="col-md-3 form-group">
  <label class="text-black font-weight-bold" for="checkout_date">To Date</label>
  <input type="date"name="toDate" value="<?php echo $td; ?>" id="toDate" class="form-control" style="border:1px solid gray !important;">
</div>
<div class="col-md-3 form-group">
  <label>Room Type</label>
  <select class="form-select" name="roomType">
    <option value="All">All</option>
   <?php
    while($s = mysqli_fetch_array($res))
    {
      ?>
      <option value="<?php echo $s['rtmId']; ?>" <?php $rt==$s["rtmId"]?print "selected":print ""; ?>><?php echo $s['rtmTitle']; ?></option>
      <?php
    }
   ?>
   
  </select>
</div>
<div class="col-md-2">
  <button class="btn btn-primary" name="btnSearch">Search</button>
</div>
            </div>
            </form>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">

                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">DCI</th>
                            <th scope="col">Room</th>
                            <th scope="col">TotalPrice</th>
                            <th scope="col">TotalDays</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <!-- <td><input class="form-check-input" type="checkbox"></td> -->
                            <?php
                            while($r = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                <td><?php echo $r["name"]; ?></td>
                                <td><?php echo $r["phone"]; ?></td>
                                <td><?php echo $r["email"]; ?></td>
                                <td><?php echo $r["cid"]; ?></td>
                                <td><?php echo $r["rtmTitle"]; ?></td>
                                <td><?php echo $r["TotalPrice"]; ?></td>
                                <td><?php echo $r["TotalDays"]; ?></td>


<!--<td>
<a class="btn btn-sm btn-primary" href="edit.php?id=<?php // echo $r['bkmId'];  ?>"><i class="fa fa-pen"></i></a>
<a class="btn btn-sm btn-info" href="edit.php?id=<?php  //echo $r['bkmId'];  ?>"><i class="fa fa-eye"></i></a>
<a class="btn btn-sm btn-link" href="edit.php?id=<?php  //echo $r['bkmId'];  ?>"><i class="fa fa-link"></i></a>
<a class="btn btn-sm btn-danger" onclick="setData('<?php  //echo $r['bkmId']; ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></a>
</td>-->
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
<!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>-->
<!--<script>
    function setData(id)
    {
        $("#id").val(id);
    }
</script>-->
<?php

include_once("../layout/footer.php");
?>
