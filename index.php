s<?php
    session_start();
    $user_id = $_SESSION["user_id"] ?? false;
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
    
    <?php include "header.php" ?>
    <h1>Галерея</h1>
    <div id="grid">
        <?php foreach($data as $photo): ?>
            <?= (new Photos\Photo($photo["id"], $photo["Image"], $photo["Text"]))->getHTML() ?>
        <?php endforeach; ?>
    </div>
    
    <?php include "add_form.php";?>

    <div id="popup_photo">
        <img src="" alt="">
    </div>

    <script src="js.js"></script>
</body>
</html>