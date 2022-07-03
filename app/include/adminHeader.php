<header>
    <a class="logo" href="<?php echo BASE_URL . "/index.php"; ?>">
        <h1 class="logo-text"><span>Blog</span>Me</h1>
    </a>
    <i class="fa-solid fa-bars menu-toggle"></i>

    <ul class="nav">
        <?php if(isset($_SESSION['username'])): ?>
        <li>
            <a href="#">
                <i class="fa-solid fa-user"></i>
                <?php echo $_SESSION['username']; ?>
                <i class="fa-solid fa-chevron-down"></i>
            </a>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#" class="logout">Logout</a></li>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
</header>