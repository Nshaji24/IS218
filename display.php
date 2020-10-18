<?php
$Email = filter_input(INPUT_POST,'Email');
$Password = filter_input(INPUT_POST,'Password') ;
$FirstName = filter_input(INPUT_POST,'FirstName');
$LastName=filter_input(INPUT_POST,'LastName');
$Birthday=filter_input(INPUT_POST,'Birthday');
$EmailReg=filter_input(INPUT_POST,'EmailReg');
$PassReg=filter_input(INPUT_POST,'PassReg');
$EmailERR="";
$PassERR  =""; $FirstNameERR=""; $LastNameERR ="";$BirthdayERR ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Email"])) {
        $EmailERR = "Enter a valid Email Address";
    } else {
        $Email = test_input($_POST["Email"]);

        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $EmailERR = "ENTER A VALID EMAIL FORMAT";
        }

    }
    if (empty($_POST["Password"])) {
        $PassERR = "Password is required";
    } else {
        $PassERR = test_input($_POST["Password"]);
        if (!preg_match('/[^A-Za-z0-9]+/', $Password || strlen($Password < 8))) {
            $PassERR = "PASSWORD MUST BE AT LEAST 8 CHARACTERS";
        }
    }
    if (empty($_POST["FirstName"])) {
        $FirstNameERR = "Must enter a first name";
    }
    if (empty($_POST["LastName"])) {
        $LastNameERR = "Must enter a last name";
    }
    if (empty($_POST["Birthday"])) {
        $BirthdayERR = "Must enter a birthdate";
    }
    if (empty($_POST["EmailReg"])) {
        $EmailERR = "Must enter a valid email";
    }
    if (empty($_POST["PassReg"])) {
        $PassERR = "Password is required";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<html>
<head><title>Display Form Data</title></head>
<body>
<h2>Login Form</h2>
<div>
    Email : <?php echo $Email; ?>
    <span class="error">* <?php echo $EmailERR ;  ?> </span>
</div>
<div>
    Password: <?php echo $Password; ?>
    <span class="error">* <?php echo $PassERR;?></span>
</div>

<section id="Registration">
    <h2>Registration</h2>
    First Name: <?php echo $FirstName; ?>
    Last  Name:<?php echo $LastName;?>
    Birthday:<?php echo $Birthday;?>
    Email:<?php echo $EmailReg; ?>
    Password:<?php echo $PassReg; ?>
    ?>

</section>
</body>
</html>

