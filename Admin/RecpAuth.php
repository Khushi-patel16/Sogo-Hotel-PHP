<?php

if($_COOKIE['Role'] !="Receptionist" && $_COOKIE['Role'] !="Admin")
{
     header("location: /hotel/admin");
}

?>