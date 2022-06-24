<?php include("../../path.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Add User</title>


    <!-- google fonts Lora and Candal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- css -->
    <!-- <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/slider.css" type="text/css">
    <link rel="stylesheet" href="css/recentpost.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    -->
   
    <link rel="stylesheet" href="../../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/admin.css" type="text/css">

</head>

<body>
    

   <!-- admin header -->
   <?php include(ROOT_PATH .  "/app/include/adminHeader.php"); ?>

    <!-- Page wrapper-->
    <div class="admin-wrapper">

        <!-- admin sidebar -->
        <?php include(ROOT_PATH. "/app/include/adminSidebar.php"); ?>

        <!-- admin content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn big-btn">Add User</a>
                <a href="index.php" class="btn big-btn">Manage User</a>
            </div>
            <div class="content">
                <h3 class="title">Add User</h3>
                <form action="" method="post">
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="username" id="" class="text-input" >
                    </div>
                    <div>
                        <label for="">email</label>
                        <input type="email" name="username" id="" class="text-input" >
                    </div>
                    <div>
                        <label for="">password</label>
                        <input type="password" name="password" id="" class="text-input" >
                    </div>
                    <div>
                        <label for="">password confirmation</label>
                        <input type="password" name="password-conf" id="" class="text-input" >
                    </div>
                    <div>
                        <label for="">Role</label>
                        <select name="" id="" class="text-input">
                            <option value="admin">Admin</option>
                            <option value="author">Author</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn big-btn">Add User</button>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- admin content -->

    </div>
    <!-- // Page wrapper-->




    <!--Jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Ck editor must be copied after Jquery min.js file and before the script.js file-->
    \
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>

    <!--custom script-->
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>