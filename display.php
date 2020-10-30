<?php
$Email = filter_input(INPUT_POST,'Email');
$Password = filter_input(INPUT_POST,'Password') ;
$FirstNameReg = filter_input(INPUT_POST,'FirstName');
$LastNameReg =filter_input(INPUT_POST,'LastName');
$Birthday=filter_input(INPUT_POST,'Birthday');
$EmailReg=filter_input(INPUT_POST,'EmailReg');
$PassReg=filter_input(INPUT_POST,'PassReg' );
$NameQuestion = filter_input(INPUT_POST,'NameQuestion' );
$TextBox=filter_input(INPUT_POST,'TextBox' );
$Skills=filter_input(INPUT_POST,'Skills');


$EmailERR="";
$PassERR ="";
$PassRegERR ="";
$FirstNameERR="";
$LastNameERR ="";
$BirthdayERR ="";
$NameQuestionERR="";
$TextBoxERR="";

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
    }else if (strlen($Password) < 8) {
        $PassERR = "PASSWORD MUST BE AT LEAST 8 CHARACTERS";
        }else {
        $Password = test_input($_POST["Password"]);
    }


            if (empty($_POST["FirstName"])) {
            $FirstNameERR = "Must enter a first name";
                } else {
            $FirstNameReg = test_input($_POST["FirstName"]);

}
            if (empty($_POST["LastName"])) {
            $LastNameERR = "Must enter a last name";
             } else {
            $LastNameReg = test_input($_POST["LastName"]);
}

            if (empty($_POST["Birthday"])) {
                $BirthdayERR = "Must enter a birthdate";
            } else {
                $Birthday = test_input($_POST["Birthday"]);

}
            if (empty($_POST["EmailReg"])) {
                    $EmailRegERR = "Must enter a valid email";
                } else {
                    $EmailReg = test_input($_POST["EmailReg"]);
                    if (!filter_var($EmailReg, FILTER_VALIDATE_EMAIL)) {
                        $EmailERR = "ENTER A VALID EMAIL FORMAT";
                    }
                    }


            if (empty($_POST["PassReg"])) {
                        $PassRegERR = "Password is required";
                    }else if ( strlen($PassReg) < 8) {
                            $PassRegERR = "PASSWORD MUST BE AT LEAST 8 CHARACTERS";
                        }else {
                $PassReg = test_input($_POST["PassReg"]);
                    }
                }

if (empty($_POST["NameQuestion"])) {
    $NameQuestionERR = "PLEASE ENTER QUESTION";
} else if (strlen($NameQuestion) < 3) {
    $NameQuestionERR = "MUST BE AT LEAST 3 CHARACTERS";
}else {
    $NameQuestion=test_input($_POST["NameQuestion"]);
}


if (empty($_POST[$TextBox] )) {
    $TextBoxERR = "MUST ENTER TEXT ";
} else if (strlen($TextBox) >500){
    $TextBoxERR = "MUST BE AT UNDER 500 CHARACTERS";
}else {
    $TextBox = test_input($_POST["TextBox"]);
}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<body>
<div>
<head><title>Display Form Data</title></head>
<>
<h2>Login Form</h2>
<div>
    Email : <?php echo $Email; ?>
    <span class="error">* <?php echo $EmailERR ;  ?> </span>
</div>
<div>
    Password: <?php echo $Password; ?>
    <span class="error">* <?php echo $PassERR;?></span>
</div>


<h2>Registration</h2>
<div>
        First Name: <?php echo $FirstNameReg ; ?>
        <span class="error">* <?php echo $FirstNameERR ;  ?> </span>
</div>



<div>
        Last Name: <?php echo $LastNameReg;?>
        <span class="error">* <?php echo $LastNameERR ;  ?> </span>

</div>

<div>
        Birthday:<?php echo $Birthday;?>
        <span class="error">* <?php echo $BirthdayERR ;  ?> </span>
</div>

<div>
        Email:<?php echo $EmailReg; ?>
        <span class="error">* <?php echo $EmailERR ;  ?> </span>
</div>

<div>
        Password:<?php echo $PassReg ; ?>
        <span class="error">* <?php echo $PassRegERR ; ?> </span>
</div>


<h2>Question Form</h2>

    Question Name :<?php echo $NameQuestion ;?><br>
    <span class="error"> <?php echo $NameQuestionERR ; ?> </span><br>


    Question Body : <?php echo $TextBox ; ?><br>
    <span class="error"><?php echo $TextBoxERR; ?></span><br>

    Skills: <?php
    $SkillsSTR=explode("," ,$Skills);
    for($s = 0; $s < count($SkillsSTR); $s++){
    echo " $s = $SkillsSTR[$s] <br />";
    }
?>
</body>

</html>
