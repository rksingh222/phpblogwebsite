<?php include('path.php') ?>

<?php include( ROOT_PATH . "/app/controllers/users.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- google fonts Lora and Candal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/register.css" type="text/css">


</head>

<body>

    <?php include(ROOT_PATH . '/app/include/header.php') ?>

    <div class="auth-content">
        <form action="register.php" method="post">
            <h1 class="form-title">Register</h1>

            <?php include(ROOT_PATH . '/app/helpers/formErrors.php') ?>

            <!-- <div class="msg success error">
                <li>Username required</li>
            </div> -->
            <div>
                <label for="">Username</label>
                <input type="text" name="username" id="" class="text-input" value="<?php echo $username ?>">
            </div>
            <div>
                <label for="">email</label>
                <input type="email" name="email" id="" class="text-input" value="<?php echo $email ?>">
            </div>
            <div>
                <label for="">password</label>
                <input type="password" name="password" id="" class="text-input" value="<?php echo $password ?>">
            </div>
            <div>
                <label for="">password confirmation</label>
                <input type="password" name="password-conf" id="" class="text-input" value="<?php echo $passwordConf ?>">
            </div>
            <button type="submit" name="register-btn" class="btn big-btn">Register</button>
            <p>Or <a href=<?php echo BASE_URL . "/login.php"?>>Sign In</a></p>
        </form>
    </div>



    <!--Jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--custom script-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>