<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Login Page</title>
    
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
                    <li class="active"><a href="../index.php">Sign In</a></li>
                    <li><a class="alert-danger" href="signup.php">Sign Up</a></li>
                </ul>';
            }
            else{
                $userJSON = json_decode($_COOKIE['userObject'],true);
                $username = $userJSON['firstName'];
                echo 
                '<ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="update_user_info.php">' . $username .' </a></li>
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
        <h3 class="text-center">Security Question:</h3>
        <p class="text-center">
            <?php
                session_start();
                if(isset($_SESSION['userForgetPassword'])){
                    $user = $_SESSION['userForgetPassword'];
                    echo $user['securityQuestion'];
                }
            ?>
        </p>
        <div id = "errorDanger" class="text-center">
            <?php 
                if(isset( $_SESSION['userMessageAnswer'])){
                    echo $_SESSION['userMessageAnswer'];
                }             
            ?>
        </div>
        <div class="text-center signinFields">
            <form action="http://localhost/loginpage/controllers/forgetpasswordController.php" method="post">
                <div class="form-group">
                    <label for="userPassword">Answer</label>
                    <input type="text" class="form-control" id="forgetPasswordAnswer" 
                    name="forgetPasswordAnswer" placeholder="Answer" required>
                </div>
                <button type="submit" class="btn btn-primary">Confirm</button>
            </form>
        </div>
    </div>
</section>
<footer></footer>

</body>
</html>
