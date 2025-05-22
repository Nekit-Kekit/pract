<?php
    require "vendor/autoload.php";

    $db = new Photos\DB();
    $data = $db->get_all_photos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практика 12</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media.css">


</head>
<body>
    <header>
        <div class="popup">
            <a href="#">Главная</a>
            <a id="show_add_photo" href="#">Фото</a>
            <a href="#">Посты</a>
            <a href="#">Личный кабинет</a>
        </div>
        <div class="mobile_icon">
            <img src="icon.png " alt="">
        </div>
    </header> 
    <h1>Галерея</h1>
    <div id="grid">
        <?php foreach($data as $photo): ?>
            <?= (new Photos\Photo($photo["Image"], $photo["Text"]))->getHTML() ?>
        <?php endforeach; ?>
    </div>
    
    <div id="add_new_photo">

        <div>
            <input id="new_photo_src" type="text" placeholder="Картинка">
            <input id="new_photo_text" type="text" placeholder="Подпись">
            <button id="add_photo">Добавить</button>
            <button id="cancel">Отмена</button>
            
        </div>

        
    </div>

    <div id="popup_photo">
        <img src="" alt="">
    </div>

    <script src="script.js"></script>
</body>
</html>