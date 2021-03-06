<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/topics.php");

/*$posts = selectAll('posts', ['published' => 1]); */

$posts = array();
$postTitle = "Recent Post";


if (isset($_GET['t_id'])) {
    $postTitle = "You searched for post under '" . $_GET['topic_name'] . "'";
    $posts = getPostsByTopicId($_GET['t_id']);
} else if (isset($_POST['search-term'])) {
    $postTitle = "You searched for '" . $_POST['search-term'] . "'";
    $posts = searchPost($_POST['search-term']);
} else {
    $posts = getPublishedPost();
}

?>

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
    <!-- <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/slider.css" type="text/css">
    <link rel="stylesheet" href="css/recentpost.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    -->
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

</head>

<body>

    <?php include(ROOT_PATH . '/app/include/header.php'); ?>
    <?php include(ROOT_PATH . '/app/include/messages.php'); ?>

    <!-- Page wrapper-->
    <div class="page-wrapper">
        <!-- post slider-->
        <div class="post-slider">
            <h1 class="slider-title">Trending Posts</h1>
            <i class="fa-solid fa-chevron-left prev"></i>
            <i class="fa-solid fa-chevron-right next"></i>
            <div class="post-wrapper">
                <?php foreach ($posts as $post) : ?>
                    <div class="post">
                        <img src="<?php echo BASE_URL . "/assets/images/" . $post['image']; ?>" alt="" class="slider-image">
                        <div class="post-info">
                            <h4><a href="singlepost.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                            <i class="far fa-user"></i><?php echo $post['username']; ?>
                            &nbsp;
                            <i class="far fa-calendar"></i><?php echo date('F j, Y', strtotime($post['created_at'])); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--<div class="post">
                    <img src="assets/images/bg.jpg" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="#">One day your life will flash before your eyes</a></h4>
                        <i class="far fa-user"></i>Rahul Singh
                        &nbsp;
                        <i class="far fa-calendar"></i>June 11, 2022
                    </div>
                </div>
                <div class="post">
                    <img src="assets/images/bg.jpg" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="#">One day your life will flash before your eyes</a></h4>
                        <i class="far fa-user"></i>Rahul Singh
                        &nbsp;
                        <i class="far fa-calendar"></i>June 11, 2022
                    </div>
                </div>
                <div class="post">
                    <img src="assets/images/bg.jpg" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="#">One day your life will flash before your eyes</a></h4>
                        <i class="far fa-user"></i>Rahul Singh
                        &nbsp;
                        <i class="far fa-calendar"></i>June 11, 2022
                    </div>
                </div>
                <div class="post">
                    <img src="assets/images/bg.jpg" alt="" class="slider-image">
                    <div class="post-info">
                        <h4><a href="#">One day your life will flash before your eyes</a></h4>
                        <i class="far fa-user"></i>Rahul Singh
                        &nbsp;
                        <i class="far fa-calendar"></i>June 11, 2022
                    </div>
                </div>-->
            </div>
        </div>
        <!-- // post slider-->

        <!-- Content or Main Box -->
        <div class="content clearfix">
            <div class="main-content">
                <h1 class="recent-post-title"><?php echo $postTitle; ?></h1>
                <?php foreach ($posts as $post) : ?>
                    <div class="post clearfix">
                        <img src="<?php echo BASE_URL . "/assets/images/" . $post['image']; ?>" alt="" class="post-image">
                        <div class="post-preview">
                            <h4><a href="singlepost.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                            <i class="fa fa-user"></i><span><?php echo $post['username']; ?></span>
                            <i class="fa fa-calendar"></i><span><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                            <p class="preview-text">
                                <?php echo html_entity_decode(substr($post['body'], 0, 150) . "..."); ?>
                            </p>
                            <a href="singlepost.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--<div class="post clearfix">
                    <img src="assets/images/bg.jpg" alt="" class="post-image">
                    <div class="post-preview">
                        <h3>the strongest and sweetest song yet remain to be sung</h3>
                        <i class="fa fa-user"></i><span style="margin-left: 10px;">Rahul Singh</span>
                        <i style="margin-left:10px" class="fa fa-calendar"></i><span style="margin-left: 10px;">6 June
                            2022</span>
                        <p class="preview-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam odit
                            deleniti cupiditate voluptatibus laudantium eum.</p>
                        <a href="#" class="btn read-more">Read More</a>
                    </div>
                </div>
                <div class="post clearfix">
                    <img src="assets/images/bg.jpg" alt="" class="post-image">
                    <div class="post-preview">
                        <h3>the strongest and sweetest song yet remain to be sung</h3>
                        <i class="fa fa-user"></i><span>Rahul Singh</span>
                        <i class="fa fa-calendar"></i><span>6 June 2022</span>
                        <p class="preview-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam odit
                            deleniti cupiditate voluptatibus laudantium eum.</p>
                        <a href="#" class="btn read-more">Read More</a>
                    </div>
                </div>
                <div class="post clearfix">
                    <img src="assets/images/bg.jpg" alt="" class="post-image">
                    <div class="post-preview">
                        <h3>the strongest and sweetest song yet remain to be sung</h3>
                        <i class="fa fa-user"></i><span>Rahul Singh</span>
                        <i class="fa fa-calendar"></i><span>6 June 2022</span>
                        <p class="preview-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam odit
                            deleniti cupiditate voluptatibus laudantium eum.</p>
                        <a href="#" class="btn read-more">Read More</a>
                    </div>
                </div> -->
            </div>
            <div class="sidebar">
                <div class="section search">
                    <h2 class="section-title">Search</h2>
                    <form action="index.php" method="post">
                        <input type="text" placeholder="Search..." name="search-term" class="text-input">
                    </form>
                </div>
                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <?php foreach ($topics as $key => $topic) : ?>
                            <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&topic_name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
                        <?php endforeach; ?>


                        <!-- <li><a href="#">Quote</a></li>
                        <li><a href="#">Fiction</a></li>
                        <li><a href="#">Bography</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Life Lessons</a></li> -->
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