<?php

if($_COOKIE['Role'] !="Admin")
{
     header("location: /hotel/admin");
}

?>