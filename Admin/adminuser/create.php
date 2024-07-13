<?php
require_once(".././AdminAuth.php");
require_once(".././Common/connection.php");

if(isset($_POST["btnAdd"]))
{
    $totalError=0;

    /* Validation for Name start */
    if(strlen(trim($_POST["name"]))==0)
    {
        $totalError++;
        $nameError="Please enter a name.";
    }
    else if(strlen(trim($_POST["name"]))<=1)
    {
        $totalError++;
        $nameError="Name must be atleast 2 character long.";   
    }
    /* Validation for Name end */

    /* Email VAlidation start */

    if(strlen(trim($_POST["email"]))==0)
{
    $totalError++;
    $emailError="Please enter a email.";
}
else{
    $e=$_POST["email"];
    $emailQuery = "SELECT * FROM AdminMaster WHERE AdmEmail='$e'";
    $emailRes = mysqli_query($connection, $emailQuery);
    if(mysqli_num_rows($emailRes)>=1)
    {
        $totalError++;
        $emailError="Email is already exist.";
    }
    $emailRegex = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/'; 
    if(!preg_match($emailRegex, $e))
    {
        $totalError++;
        $emailError="Invalid email address.";
    }
}

    /* Email validation end */

    /* Password Validation start */
    if(strlen(trim($_POST["password"]))==0)
    {
        $totalError++;
        $passwordError="Please enter a password.";
    }
    $passwordExpression = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    $passwordValidate = preg_match($passwordExpression, $_POST["password"]);
    if(!$passwordValidate)
    {
        $totalError++;
        $passwordError="Password does not match their requirement.";
    }

    /* Password Validation end */

    /* Role Validation end */

    if(strlen($_POST["role"])==0)
    {
        $totalError++;
        $roleError="Please select a role.";
    }

    /* Role Validation end */
    
    
    if($totalError==0)
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role= $_POST["role"];
        $uId = uniqid();
        
        $query = "INSERT INTO AdminMaster (AdmName,AdmEmail,AdmPassword,AdmRole,AdmUniqueId) VALUES ('$name','$email','$password','$role','$uId')";
    
        $result = mysqli_query($connection, $query);
        if($result==1)
        {
            header("Location: /hotel/admin/dashboard.php");
        }
    }
    
}
include_once("../layout/header.php");
?>
<!-- Form Start -->

<?//include_once(".././Admin/layout/header.php");?>

 <div class="container-fluid pt-4 px-4">
     <div class="row g-4">
     <?php
        if(isset($result))
        {
            if($result==1)
            {
                echo '<div class="alert alert-success">New Record Added</div>';
            }
            else
            {
                echo '<div class="alert alert-danger">Error Occured</div>';
            }
        }
        
        ?>
        
      
         <div class="col-sm-12 col-xl-12">
             <div class="bg-light rounded h-100 p-4">
                 <h6 class="mb-4">Add New Data</h6>
                 <form method="post"  >
                 <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name <span class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control" id="exampleInputName"
        aria-describedby="emailHelp" >
</div>
<?php
if(isset($nameError))
{
    echo '<span class="text-danger">'.$nameError.'</span>';
}
?>
                     <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">Email address <span class="text-danger">*</span></label>
                         <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                             aria-describedby="emailHelp" >
                         <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                         </div>
                     </div>
                     <?php
 if(isset($emailError))
 {
     echo '<span class="text-danger">'.$emailError.'</span>';
 }
 ?>
                     <div class="mb-3">
                         <label for="exampleInputPassword1" class="form-label">Password <span class="text-danger">*</span></label>
                         <input type="text"  name="password" class="form-control" id="exampleInputPassword1">
                     </div>
                     <?php
if(isset($passwordError))
{
    echo '<span class="text-danger">'.$passwordError.'</span>';
}
?>
                     <div class="mb-3 form-check"  >
                         <label for="exampleInputPassword1" class="form-label">Role <span class="text-danger">*</span></label>
                         <select class="form-control"  name="role">
                         <option value="">Select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="HR">HR</option>
                            <option value="Manager">Manager</option>
                            <option value="Director">Director</option>
                            <option value="Receptionist">Receptionist</option>
                         </select>
                     </div>
                <?php     if(isset($roleError))
{
    echo '<span class="text-danger">'.$roleError.'</span>';
}
?>
                     <button type="submit" name="btnAdd" class="btn btn-primary">Add</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 <!-- Form End -->
 <?php
include_once("../layout/footer.php");
?>