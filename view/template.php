<?php 
require_once "./view/menu.php";
require_once "./view/footer.php";
require_once "./view/chats.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./dist/css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <?= @$menu?>
    <?= $content?>
    <?= $footer ?>
    <script src="./dist/js/index.js"></script>
</body>`
</html>
