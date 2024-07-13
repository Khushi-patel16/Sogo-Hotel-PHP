<?php

require_once(".././AdminAuth.php");
require_once("../common/connection.php");
    $Id = $_POST["eId"];
    $query="DELETE FROM eventsmaster Where eId='$Id'";
    $result = mysqli_query($connection, $query);
    header("Location: /hotel/admin/events");
?>