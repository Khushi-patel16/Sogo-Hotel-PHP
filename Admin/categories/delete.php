<?php
//require_once(".././AdminAuth.php");
require_once(".././AdminAuth.php");
require_once("../common/connection.php");
    $Id = $_POST["catId"];
    $query="DELETE FROM categorymaster Where catId='$Id'";
    $result = mysqli_query($connection, $query);
    header("Location: /hotel/admin/categories");
?>