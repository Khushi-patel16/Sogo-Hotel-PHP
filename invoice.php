<?php

include_once("../hotel/common/connection.php");
$id = $_GET['id'];
$IQuery1="SELECT * from bookingmaster 
            JOIN roomtypemaster as rtm on bookingmaster.rtmId = rtm.rtmId
            WHERE bkmId='$id'";
$IResult1=mysqli_query($connection,$IQuery1);
$r = mysqli_fetch_array($IResult1);

$usrq="SELECT * from sitesettingmaster";
$usrres=mysqli_query($connection,$usrq);
$usr=mysqli_fetch_array($usrres);


//$tagLine= "My Bookings";
//include_once("../hotel/layout/header.php");

?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
<div class="container">
    <div class="row m-3 mx-auto">
        <div class="col-md-8" style="border:1px solid red;">
       
        <div class="row">
            <div class="col-md-12">
                <h2><?php $usr["ssmTitle"];?></h2>
            </div>
            <div class="col-md-12">
                <p><?php echo $usr["ssmAddress"];?></p>       
                <p><?php echo $usr["ssmEmail"]." | ".$usr["ssmPhone"];?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h2><?php echo $r["name"];?></h2>
            </div>
            <div class="col-md-6">
                <p><?php echo $r["email"]." | ".$r["phone"];?></p>
            </div>
        </div>
            
        <div class="row">
            <div class="col-md-6">
                <h5>Check In : 
                    
                    
                    
                    <?php 
    $cd = date_create($r["cid"]);
    echo date_format($cd,"d-M-Y");
?>
                </h5>
            </div>
            <div class="col-md-6">
                <h5>Check Out :
                <?php 
                    $cd = date_create($r["cod"]);
                    echo date_format($cd,"d-M-Y");
                ?>
                </h5>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-12">
            <table class="table">
    <tr>
        <th>Type</th>
        <th>Adults</th>
        <th>Children</th>
        <th>Price</th>
        <th>Total Days</th>
        <th>Amount</th>
    </tr>
    
    <tr>
        <td><?php echo $r["rtmTitle"];?></td>
        <td><?php echo $r["adults"];?></td>
        <td><?php echo $r["children"];?></td>
        <td><?php echo $r["Price"];?></td>
        <td><?php echo $r["TotalDays"];?></td>
        <td><?php echo $r["TotalPrice"];?></td>
    </tr>
    <tr>
        <th colspan="5">IGST</th>
        <th>0</th>
    </tr>
    <tr>
        <th colspan="5">SGST</th>
        <th>0</th>
</tr>
<tr>
        <th colspan="5">Total Amount</th>
        <th>
            <?php echo $r["TotalPrice"]; ?>
        </th>
    </tr>
</table>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="container p-3">
    <!--<div class="row">
        <?php
            /*while($r = mysqli_fetch_array($IResult1))
            {
                ?>
                    <div class="card col-md-4 p-2">
                        <h6>Name:<?php echo $r["name"];?></h6>
                        <h6><?php echo $r["email"]." | ".$r["phone"];?></h6>
                        <p>CID:<?php echo $r["cid"];?> to COD: <?php echo $r["cod"];?></p>
                        <h6>Adults:<?php echo $r["adults"];?></h6>
                        <h6>Children:<?php echo $r["children"];?></h6>
                        <h6>Rooms:<?php echo $r["rooms"];?></h6>
                        <h6>Total Price:<?php echo $r["TotalPrice"];?></h6>

                        
                    </div>
                <?php
            }*/
        ?>
    </div>-->
</div>
