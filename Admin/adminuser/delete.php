<?php
require_once(".././AdminAuth.php");
require_once("../common/connection.php");
    $Id = $_POST["AdmUniqueId"];
    $query="DELETE FROM adminmaster Where AdmUniqueId='$Id'";
    $result = mysqli_query($connection, $query);
    header("Location: /hotel/admin/adminuser");

?>