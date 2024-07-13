<?php
require_once(".././AdminAuth.php");
include_once("../common/connection.php");

$Id = $_POST["bkmId"];

$query = "DELETE FROM bookingmaster WHERE bkmId='$Id'";
$result = mysqli_query( $connection,$query);
if($result==1)
{
    header("Location: /hotel/admin/bookings");
}

?>