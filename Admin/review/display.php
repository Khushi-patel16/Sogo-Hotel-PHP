<?php
require_once(".././AdminAuth.php");
include_once("../common/connection.php");

$id = $_GET['id'];

$query = "SELECT * FROM reviewmaster WHERE rId='$id'";
$result = mysqli_query($connection,$query);

$data = mysqli_fetch_array($result);

$displayStatus=0;

if($data['display']==0)
{
  $displayStatus=1;
}
else{
  $displayStatus=0;
}

$updateQuery = "UPDATE reviewmaster SET display=$displayStatus WHERE rId='$id'";
$updateRes = mysqli_query($connection,$updateQuery);

header("Location: /hotel/admin/review");

?>