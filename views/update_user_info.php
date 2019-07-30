<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Update Info Page</title>

    <!--jQuery validate and JavaScript Files-->
    <script src="../lib/jquery-2.1.4.js"></script>
    <script src="../lib/jquery.validate.js"></script>
    <script src="../js/global.js"></script>
    <script src="../js/validations.js"></script>

    <!--Bootstrap  css-->
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
<header>
    <nav class="navbar navbar-inverse ">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">Sucess</a></li>
            </ul>
            <?php 
            if(!isset($_COOKIE['userObject'])){
                echo 
                '<ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.php">Sign In</a></li>
                    <li><a class="alert-danger active" href="signup.php">Sign Up</a></li>
                </ul>';
            }
            else{
                $userJSON = json_decode($_COOKIE['userObject'],true);
                $useremail = $userJSON['firstName'];
                echo 
                '<ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="update_user_info.php">' . $useremail .' </a></li>
                    <li><a class="alert-danger" href="../controllers/signoutController.php">Sign Out</a></li>
                </ul>';
            }
            ?>
            
        </div>
    </nav>
</header>
<section>
    <div class="signin-message">
        <h2 class="signin-title">BudZwap</h2>
        <h3 class="text-center">Update Info</h3>
        <div id = "errorDanger" class="text-center">
            <?php 
                session_start();
                if(isset( $_SESSION['userMessageUpdate'])){
                    echo $_SESSION['userMessageUpdate'];
                }             
            ?>
        </div>
        <div class="text-center signinFields">
            <form action="http://localhost/loginpage/controllers/update_user_infoController.php"
             method="post" name="updateForm" id="updateForm">
                <div class="form-group">
                    <div class="update_icon">
                        <label for="userEmailSignUp">Email address</label>
                        <img class="icon_div" src="../img/gear-black.png">
                    </div>
                    <input type="email" class="form-control" id="userEmailUpdate" name="userEmailUpdate"
                     value="<?php
                        if(isset($_COOKIE['userObject'])){
                            $userJSON = json_decode($_COOKIE['userObject'],true);
                            $useremail = $userJSON['userEmail'];
                            echo $useremail;
                        }?>"
                     readonly >
                </div>
                <div class="form-group">
                    <a href="forgetpassword_setnewpassword.php">Change password</a>
                </div>
                <div class="form-group">
                    <label for="firstNameSignUp">First Name</label>
                    <input type="text" class="form-control" id="firstNameUpdate"
                     name="firstNameUpdate" value="<?php echo $userJSON['firstName']; ?>" >
                </div>
                <div class="form-group">
                    <label for="lastNameUpdate">Last Name</label>
                    <input type="text" class="form-control" id="lastNameUpdate"
                     name="lastNameUpdate" value="<?php echo $userJSON['lastName']; ?>" >
                </div>
                <div class="form-group">
                    <label for="dobUpdate">Date of Birth</label>
                    <input type="text" class="form-control" id="dobUpdate"
                     name="dobUpdate" value="<?php echo $userJSON['dob']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="securityQuestionUpdate">Security question</label>
                    <input type="text" class="form-control" id="securityQuestionUpdate"
                     name="securityQuestionUpdate" value="<?php echo $userJSON['securityQuestion']; ?>">
                </div>
                <div class="form-group">
                    <label for="securityQuestionAnswerUpdate">Answer</label>
                    <input type="text" class="form-control" id="securityQuestionAnswerUpdate"
                     name="securityQuestionAnswerUpdate" value="<?php echo $userJSON['answerQuestion'];?>" >
                </div>
                <button type="submit" class="btn btn-primary" name="submitUpdate" id="submitUpdate">
                    Confirm
                </button>
            </form>
            
        </div>
    </div>
</section>
<footer></footer>

</body>
</html>
