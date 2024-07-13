<?php
require_once(".././AdminAuth.php");
include_once("../common/connection.php");

$Id = $_POST["id"];
$query = "DELETE FROM rooms_gallery WHERE rgId='$Id'";
$result = mysqli_query( $connection,$query);
//$row = mysqli_fetch_array($result);
//echo $row['rgId'];
if($result==1)
{
    header("Location: /hotel/admin/rooms_gallery");
}

?>