<?php
?>
    <header>
        <div class="popup">
            <a href="index.php">Главная</a>
            <?php if ($user_id): ?>
            <a id="show_add_photo" href="#">Фото</a>
            <?php endif; ?>
            <a href="#">Посты</a>
            <a href="user.php">Личный кабинет</a>
        </div>
        <?php if ($user_id): ?>
            <a href="logout.php"> Выход </a>
        <?php endif; ?>
    </header> 