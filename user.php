<?php
    session_start();
    $user_id = $_SESSION["user_id"] ?? false;

    if($user_id){
        require "vendor/autoload.php";
        $db = new Photos\DB();
        $data = $db->get_all_user_photos($user_id); 
    }

    if(isset($_GET["error"])) {
        $error = "Неверны Логин или Пароль";
    }
    if(isset($_GET["sign_error"])) {
        $sign_error = "Логин занят";
    }
    if(isset($_GET["sign_success"])) {
        $sign_success = "Успех";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php include "header.php" ?>

     
    <h1>Галерея Пользователя</h1>
    <div id="grid">
        <?php if($user_id): ?>
            <?php foreach($data as $photo): ?>
                            <?= (new Photos\Photo($photo["id"], $photo["Image"], $photo["Text"]))->getHTML() ?>
            <?php endforeach; ?>
         <?php endif; ?>
    </div>
            
    <?php if ($user_id):?>
 
    <?php else: ?>
        <div class="form">
            <form action="login.php" method="post">
                <h1>Авторизация</h1>
                <input type="text" placeholder="Логин" name="login">
                <input type="password" placeholder="Пароль" name="password">
                <button>Вход</button>
                <?php if(isset($_GET["error"])): ?>
                    <p class="error"><?= $error ?></p>
                <?php endif ?>
            </form>

            <form action="sign_up.php" method="post">
                <h1>Регистрация</h1>
                <input type="text" placeholder="Логин" name="login">
                <input type="password" placeholder="Пароль" name="password">
                <button> Зарегистрация </button>
                
                <?php if(isset($_GET["sign_error"])): ?>
                    <p class="error"><?= $sign_error ?></p>
                <?php endif ?>

                <?php if(isset($_GET["sign_success"])): ?>
                    <p class="success"><?= $sign_success ?></p>
                <?php endif ?>
                

            </form>
        </div>
    <?php endif; ?>

    <?php include "add_form.php"; ?>


    <div id="popup_photo">
        <img src="" alt="">
    </div>

    <script src="js.js"></script>
    

</body>
</html>