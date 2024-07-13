<?php
require_once(".././AdminAuth.php");
require_once("../common/connection.php");
    $Id = $_POST["pId"];
    $query="DELETE FROM dynamic Where pId='$Id'";
    $result = mysqli_query($connection, $query);
    header("Location: /hotel/admin/dynamic_pages");
?>