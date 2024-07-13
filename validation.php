


<?
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
}


if(isset($nameError))
{
    echo '<span class="text-danger">'.$nameError.'</span>';
}
?>
    