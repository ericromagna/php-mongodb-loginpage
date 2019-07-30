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
                <li><a href="#" class="active">Sucess</a></li>
            </ul>
            <?php 
            if(!isset($_COOKIE['userObject'])){
                echo 
                '<ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.php">Sign In</a></li>
                    <li><a class="alert-danger" href="signup.php">Sign Up</a></li>
                </ul>';
            }
            else{
                $userJSON = json_decode($_COOKIE['userObject'],true);
                $useremail = $userJSON['firstName'];
                echo 
                '<ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">' . $useremail .' </a></li>
                    <li><a class="alert-danger" href="../controllers/signout.php">Sign Out</a></li>
                </ul>';
            }
            ?>
            
        </div>
    </nav>
</header>
<section>
    <div class="signin-message">
        <h2 class="signin-title">BudZwap</h2>
        <h1 class="text-center">Sucess page</h1>
        <h3 class="text-center">You are now a member!</h3>
    </div>
</section>
<footer></footer>

</body>
</html>
