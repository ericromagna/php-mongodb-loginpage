<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Sign Up Page</title>

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
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Resume</a></li>
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
                    <li><a class="alert-danger" href="controllers/signoutController.php">Sign Out</a></li>
                </ul>';
            }
            ?>
            
        </div>
    </nav>
</header>
<section>
    <div class="signin-message">
        <h2 class="signin-title">BudZwap</h2>
        <h3 class="text-center">Sign Up!</h3>
        <div id = "errorDanger" class="text-center">
            <?php 
                session_start();
                if(isset( $_SESSION['userMessageSignUp'])){
                    echo $_SESSION['userMessageSignUp'];
                }             
            ?>
        </div>
        <div class="text-center signinFields">
            <form action="http://localhost/loginpage/controllers/signupController.php"
             method="post" name="signupForm" id="signupForm">
                <div class="form-group">
                    <label for="userEmailSignUp">Email address</label>
                    <input type="email" class="form-control" id="userEmailSignUp" name="userEmailSignUp"
                     aria-describedby="emailHelp" placeholder="Enter email" >
                </div>
                <div class="form-group">
                    <label for="userPasswordSignUp">Password</label>
                    <input type="password" class="form-control" id="userPasswordSignUp" 
                    name="userPasswordSignUp" placeholder="Password" >
                </div>
                <div class="form-group">
                    <label for="userPasswordConfirmSignUp">Confirm Password</label>
                    <input type="password" class="form-control" id="userPasswordConfirmSignUp"
                     name="userPasswordConfirmSignUp" placeholder="Repeat Password" >
                </div>
                <div class="form-group">
                    <label for="firstNameSignUp">First Name</label>
                    <input type="text" class="form-control" id="firstNameSignUp"
                     name="firstNameSignUp" placeholder="First Name" >
                </div>
                <div class="form-group">
                    <label for="lastNameSignUp">Last Name</label>
                    <input type="text" class="form-control" id="lastNameSignUp"
                     name="lastNameSignUp" placeholder="Last Name" >
                </div>
                <div class="form-group">
                    <label for="dobSignUp">Date of Birth</label>
                    <input type="date" class="form-control" id="dobSignUp"
                     name="dobSignUp" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="securityQuestionSignUp">Choose a security question</label>
                    <input type="text" class="form-control" id="securityQuestionSignUp"
                     name="securityQuestionSignUp" placeholder="Security Question...">
                </div>
                <div class="form-group">
                    <label for="securityQuestionAnswerSignUp">Answer</label>
                    <input type="text" class="form-control" id="securityQuestionAnswerSignUp"
                     name="securityQuestionAnswerSignUp" placeholder="Answer for Security Question" >
                </div>
                    <button type="submit" class="btn btn-primary" name="submitSignUp" id="submitSignUp">
                        Confirm
                    </button>
            </form>
        </div>
    </div>
</section>
<footer></footer>

</body>
</html>
