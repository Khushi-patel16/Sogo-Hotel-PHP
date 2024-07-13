<?php
require_once(".././AdminAuth.php");
include_once("../common/connection.php");

$Id = $_POST["id"];
$query = "DELETE FROM products WHERE prdId='$Id'";
$result = mysqli_query( $connection,$query);


if($result==1)
{
    header("Location: /hotel/admin/products");
}

?>