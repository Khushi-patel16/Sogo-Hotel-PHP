<?php

include_once("../hotel/common/connection.php");
$userId = $_COOKIE['usrId'];
$bookingQuery1="SELECT * from bookingmaster WHERE usrId='$userId'";
$bookingResult1=mysqli_query($connection,$bookingQuery1);


$tagLine= "My Bookings";
include_once("../hotel/layout/header.php");

?>

<div class="container p-3">
    <div class="row">
        <?php
            while($r = mysqli_fetch_array($bookingResult1))
            {
                ?>
                    <div class="card col-md-4 p-2">
                        <h6><?php echo $r["name"];?></h6>
                        <h6><?php echo $r["email"]." | ".$r["phone"]?></h6>
                        <p><?php echo $r["cid"];?> to <?php echo $r["cod"];?></p>
                        <a href="invoice.php?id=<?php echo $r['bkmId']; ?>">Invoice</a>
                    </div>
                <?php
            }
        ?>
    </div>
</div>

<?php

include_once("../hotel/layout/footer.php");

?>