<?php
//include_once("../hotel/common/connection.php");
//if(isset($_POST["success"]))
//{
//    header("Location: /hotel/index.php");
//}
//include_once("../hotel/layout/header.php");
?>


<style>
    .success-box{
  -border:1px solid red;
  text-align: center;
  padding: 35px 20px;
  max-width: 450px;
  border-radius: 10px;margin: 150px auto;
  background-color: #f0f0f0;
}
.success-box h4{
  font-size: 25px;font-weight: bold;margin-bottom: 25px;
}

.success-box .btn-success{
    background-color: #22b14c;
    border-radius: 50px;
    color: white;
    padding: 15px 25px;
    border: 0;
}
.bth{
    text-decoration: none;
}
</style>


<div class="success-box">

<img src="/hotel/images/site/5610944.png" width="100" class="img-fluid mb-3">
    <h4 style="color: black;">You have successfully<br> reserved your room.</b></h4>

    <a href="../hotel/index.php"  class="btn btn-success bth">Back to home</a>
</div>




<?php
//include_once("../hotel/layout/header.php");
?>
