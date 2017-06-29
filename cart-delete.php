<?php session_start();?>
<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="lesson5, php, ショッピングサイト, 販売ページ">
        <meta name="description" content="ショッピングサイトの販売ページの練習サイトです。">
        <meta name="author" content="T.Ishio">
        <meta name="copyright" content="Gallary&Collection.">
        <meta name="robots" content="noindex, nofollow">
        <meta http-equiv="refresh" content="3; url=https://php-kadai-hirot.c9users.io/lesson5/cart-insert.php">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GallaryCollection</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- google_font -->
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Ravi+Prakash" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash|Tangerine" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash|Sacramento|Tangerine" rel="stylesheet">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.fademover.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
    </head>
    <body>
    <?php require 'common/login-navbar.php';?>
    
    <div class="container">
        <div class="col-sm-10">
         <?php
         unset($_SESSION['product'][$_REQUEST['id']]);
            echo '<div class="alert alert-success">';
            echo '<p>カートから商品を削除しました。</p>';
            echo '</div>';
            require 'cart.php';
         ?>
        </div>
    </div>

<?php require 'common/footer.php';?>