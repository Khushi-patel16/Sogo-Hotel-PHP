<?php
include_once(".././AdminAuth.php");

include_once("../common/connection.php");
$rtmId = $_GET['id'];
$data="";
if(isset($_POST["btnSave"])){
    $amnt = $_POST["room_amenities"];
    foreach($amnt as $key => $value){
        $data = $data.$value.", ";
    }
    $updateQuery = "UPDATE roomtypemaster set rtmAmenities='$data' WHERE rtmId='$rtmId'";
    $result = mysqli_query($connection, $updateQuery);    
    header("Location: /hotel/admin/roomtype");
}

$roomsDataQuery = "SELECT * FROM roomtypemaster WHERE rtmId='$rtmId'";
$roomDataRes = mysqli_query($connection, $roomsDataQuery);
$roomData = mysqli_fetch_array($roomDataRes);
$rd = explode(",", $roomData["rtmAmenities"]);

$amenitiesQuery = "SELECT * FROM room_amenities";
$amenitiesRes = mysqli_query($connection, $amenitiesQuery);

include_once("../layout/header.php");
?>

<? //include("../layout/header.php");?> 
<div class="container">
    <div class="">
        
        <div class="col-md-12 m-auto card">
            <div class="card-header">
            <h5><?php echo $roomData["rtmTitle"]; ?> Amenities</h5>
            </div>
            <div class="card-body">
            <form role="form" method="post" action=""  enctype="multipart/form-data">
       <div class="row">
            <?php
                while ($row = mysqli_fetch_array($amenitiesRes)) {
                    ?>
                    <div class="col-4">
                        <label class="form-label"><?php echo $row['amenity']; ?></label>
                        <div class="input-group input-group-outline mb-3">
                            <?php
                            $r = strstr($roomData["rtmAmenities"],$row["aid"]);
                            ?>
                            <input type="checkbox" <?php strlen($r)>=1? print "checked":"" ?> value="<?php echo $row['aid']; ?>" name="room_amenities[]" class="form-check">
                        </div>
                        </div>
                    <?php
                }
            
            ?>
       </div>
    <div class="text-end">
       <button type="submit" name="btnSave" class="btn btn-lg bg-gradient-primary btn-lg mt-4 mb-0">Save</button>
    </div>
 </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once("../layout/footer.php");
?>