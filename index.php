<?php 
session_start();
$_user_id = $_SESSION['id']??0;
if($_user_id){
    header("Location: words.php");
    die();
}
include_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vocabulary</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body calss="home">

    <div class="container" id="main">

        <h1 class="miantime text-center">
            <i class="fas fa-language"></i> <br>My Vocabularies
        </h1>

        <div class="row navigation">
            <div class="col-md-6 m-auto">

                <div class="formaction text-center" >
                    <a href="#" id="login">Login</a> | <a href="#" id="register">Register Account</a>
                </div>

                <div class="formc" >
                    <form action="tasks.php" method="POST" id="form01" >
                        <h3  class="text-center">Login</h3>
                        <fieldset>
                            <label for="email">Email</label>
                            <input type="text" placeholder="Eamail Address" id="email" class="form-control" name="email">
                            <label for="password">Password</label>
                            <input type="password" placeholder="password" id="password" class="form-control" name="password">
                            <p>
                                <?php 
                                $status = $_GET['status']??0;
                                if($status){
                                    echo getStatusMessage($status);
                                }
                                ?>
                            </p>
                            <input type="submit" class="btn btn-primary mt-2" value="Submit">
                            <input type="hidden" name="action" id="action" value="login">
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>
<script src="./js/jquery-3.5.1.slim.min.js"></script>
<script src="./js/script.js"></script>
</html>