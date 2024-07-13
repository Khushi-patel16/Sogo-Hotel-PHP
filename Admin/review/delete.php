<?php
require_once(".././AdminAuth.php");
require_once("../common/connection.php");
    $Id = $_POST["rId"];
    $query="DELETE FROM reviewmaster Where rId='$Id'";
    $result = mysqli_query($connection, $query);
    header("Location: /hotel/admin/review");
?>