<?php
require_once(".././AdminAuth.php");
require_once("../common/connection.php");
    $Id = $_POST["usrId"];
    $query="DELETE FROM registration Where usrId='$Id'";
    $result = mysqli_query($connection, $query);
    header("Location: /hotel/admin/userdata");

?>