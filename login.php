<?php include("path.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


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

    <div class="auth-content" >
        <h1 class="form-title">Login</h1>
        <form action="" method="post" >
            <div>
                <label for="">Username</label>
                <input type="text" name="username" id="" class="text-input" >
            </div>
            <div>
                <label for="">password</label>
                <input type="password" name="password" id="" class="text-input" >
            </div>
           
            <button type="submit" class="btn big-btn">Login</button>
            <p>Or <a href=<?php echo BASE_URL . "/register.php"?> >Sign Up</a></p>
        </form>
    </div>


    
    <!--Jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--custom script-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>