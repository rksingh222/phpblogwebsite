<?php include("path.php") ?>
<?php
include(ROOT_PATH . "/app/controllers/posts.php");
if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
}
$posts = selectAll('posts', ['published' => 1]);
$topics = selectALL('topics');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?> | BlogMe</title>


    <!-- google fonts Lora and Candal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- css -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/singlepost.css" type="text/css">



</head>

<body>

    <?php include(ROOT_PATH . '/app/include/header.php') ?>

    <!-- Page wrapper-->
    <div class="page-wrapper">
        <!-- Content or Main Box -->
        <div class="content clearfix">
            <div class="div-wrapper clear">
                <div class="main-content single">
                    <h1 class="post-title"><?php echo $post['title']; ?></h1>
                    <div class="post-content">
                        <?php echo html_entity_decode($post['body']) ?>
                    </div>
                </div>
            </div>
            <div class="sidebar single">
                <div class="section popular">
                    <h2 class="section-title">
                        Popular
                    </h2>
                    <?php foreach ($posts as $p) : ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . "/assets/images/" . $p['image']; ?>" alt="">
                            <a href="#" class="title">
                                <h4><?php echo $p['title']; ?></h4>
                            </a>
                        </div>
                    <?php endforeach; ?>

                    <!--
                    <div class="post clearfix">
                        <img src="assets/images/bg.jpg" alt="">
                        <h4>how to overcome fear</h4>
                    </div>
                    <div class="post clearfix">
                        <img src="assets/images/bg.jpg" alt="">
                        <h4>how to overcome fear</h4>
                    </div>
                    <div class="post clearfix">
                        <img src="assets/images/bg.jpg" alt="">
                        <h4>how to overcome fear</h4>
                    </div>
                    <div class="post clearfix">
                        <img src="assets/images/bg.jpg" alt="">
                        <h4>how to overcome fear</h4>
                    </div> -->
                </div>
                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <?php foreach ($topics as $topic) : ?>
                            <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&topic_name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
                        <?php endforeach; ?>
                        <!--<li><a href="#">Quote</a></li>
                        <li><a href="#">Fiction</a></li>
                        <li><a href="#">Bography</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Life Lessons</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <!-- Content or Main Box -->

    </div>
    <!-- // Page wrapper-->



    <?php include(ROOT_PATH . '/app/include/footer.php') ?>

    <!--Jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Slick Carousel-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!--custom script-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>