<?php
$pdo = new PDO('mysql:host=localhost;dbname=lesson5;charset=utf8', 'root', 'testes77');
$sql = $pdo->prepare('select * from product where id=?');
$sql->execute(array($_REQUEST['id']));

$pdo=null;
?>
<?php require 'common/header.php';?>
<?php require 'common/login-navbar.php';?>

<div class="container">
    <div class="row">
        <div class="hidden-xs col-sm-2">
            <?php require 'common/sidebar.php';?>
        </div>
        <div class="col-sm-5">
            <article>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="detail-thead">商品詳細</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td><button type="submit" class="btn btn-success">購入</button></td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>商品ID</td>
                        </tr>
                        <tr>
                            <td>商品名</td>
                        </tr>
                        <tr>
                            <td>価格</td>
                        </tr>
                        <tr>
                            <td>購入個数</td>
                        </tr>
                    </tbody>
                </table>
            </article>
        </div>
        <div class="col-sm-5">
            <h2>商品画像</h2>
            <img src="" alt="" />
        </div>
    </div>
</div>






<?php require 'common/footer.php';?>