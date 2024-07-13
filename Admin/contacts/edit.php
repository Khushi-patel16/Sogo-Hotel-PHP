<?php
require_once(".././RecpAuth.php");
include_once("../common/connection.php");

$id = $_GET['id'];

$query = "SELECT * FROM contactmaster WHERE id='$id'";
$result = mysqli_query($connection,$query);

$data = mysqli_fetch_array($result);

$iscom=0;

if($data['iscomplete']==0)
{
  $iscom=1;
}
else{
  $iscom=0;
}

$updateQuery = "UPDATE contactmaster SET iscomplete=$iscom WHERE id='$id'";
$updateRes = mysqli_query($connection,$updateQuery);

header("Location: /hotel/admin/contacts");

?>