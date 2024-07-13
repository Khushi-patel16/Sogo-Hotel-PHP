<?php
require_once(".././AdminAuth.php");

require_once("../common/connection.php");
    $Id = $_POST["rtmId"];
    $query="DELETE FROM roomtypemaster Where rtmId='$Id'";
    $result = mysqli_query($connection, $query);
    header("Location: /hotel/admin/roomtype");
?>