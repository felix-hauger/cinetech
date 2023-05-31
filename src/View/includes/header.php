<header>
    <h1>Cinetech</h1>
    <nav>
        <ul>
            <li><a href="<?= BASE_PATH ?>">Homepage</a></li>
            <li><a href="<?= BASE_PATH ?>/movies">Movies</a></li>
            <li><a href="<?= BASE_PATH ?>/tv-shows">TV Shows</a></li>

            <?php if (isset($_SESSION['is_logged'])): ?>
                <li><a href="<?= BASE_PATH ?>/profile">Profile</a></li>
                <li><a href="<?= BASE_PATH ?>/logout">Log out</a></li>

            <?php else: ?>
                <li><a href="<?= BASE_PATH ?>/login">Login</a></li>
                <li><a href="<?= BASE_PATH ?>/register">Register</a></li>

            <?php endif ?>
        </ul>
    </nav>
</header>