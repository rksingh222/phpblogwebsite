<?php include("../../path.php"); ?>
<?php include( ROOT_PATH . "/app/controllers/topics.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Manage Topic</title>


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
                <a href="create.php" class="btn big-btn">Add Topic</a>
                <a href="index.php" class="btn big-btn">Manage Topic</a>
            </div>
            <div class="content">
                <h3 class="title">Manage Topic</h3>
                <?php include(ROOT_PATH . '/app/include/messages.php'); ?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Topic</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($topics as $key => $topic): ?>
                        <tr>
                            <td><?php echo $key + 1; ?></td>
                            <td><?php echo $topic['name']; ?></td>
                            <td><a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit">edit</a></td>
                            <td><a href="index.php?del_id=<?php echo $topic['id']; ?>" class="delete">delete</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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