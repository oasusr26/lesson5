<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=lesson5;charset=utf8', 'root', 'testes77');

if (isset($_REQUEST['keyword'])) {
    $sql = $pdo->prepare('select * from product where trade_name like ?');
    $sql->execute(['%'.$_REQUEST['keyword'].'%']);
}else{
    $sql = $pdo->prepare('select * from product');
    $sql->execute();
}

$pdo = null;
?>
<?php require 'common/header.php';?>
<?php require 'common/login-navbar.php';?>
<div class="container-fluid">
    <div class="row">
        <div class="hidden-xs col-sm-2">
            <?php require 'common/sidebar.php';?>
        </div>
        <div class="col-sm-10">
            <article>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>商品画像</th><th>商品ID</th><th>商品名</th><th>価格</th><th>在庫</th><th>商品詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            foreach ($sql->fetchAll() as $row) {
                                $product_id=$row['product_id'];
                            ?>
                            
                            <td><img scr="images/<?= $id;?>.jpg" alt="" /></td><td><?= $product_id;?></td><td><?= $row['product_name'];?></td><td><?= $row['price'];?></td><td><?= $row['stock'];?></td><td><button type="button" class="btn"><a href="detail.php?id=<?= $id;?>">詳細</a></button></td>
                            <?php
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </article>
        </div>
    </div>
</div>



<?php require 'common/footer.php';?>