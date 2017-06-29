<?php session_start();?>
<?php require 'common/header.php';?>
<?php require 'common/login-navbar.php';?>

<div class="container">
    <div class="row">
        <div class="hidden-xs col-sm-2">
            <?php require 'common/sidebar.php';?>
        </div>
        <div class="col-sm-5">
            <main>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">商品詳細</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tbody>
                                <?php
                                $pdo = new PDO('mysql:host=localhost;dbname=lesson5;charset=utf8', 'root', 'testes77');
                                $sql = $pdo->prepare('select * from product where id=?');
                                $sql->execute(array($_REQUEST['id']));
                                
                                foreach ($sql->fetchAll() as $row) {
                                    echo '<form action="cart-insert.php" method="post">';
                                    echo '<tr>';
                                    echo '<td class="text-center col-xs-3">商品ID：</td><td class="text-center">', $row['id'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="text-center">商品名：</td><td class="text-center">', $row['product_name'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="text-center">価格：</td><td class="text-center">', $row['price'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<td class="text-center">個数：</td>';
                                    echo '<td class="text-center">';
                                    echo '<div class="col-xs-4 col-xs-offset-4">';
                                    echo '<select name="count" class="form-control">';
                                    for ($i=1; $i<=100; $i++) {
                                    echo '<option value="', $i, '">', $i, '</option>';
                                    }
                                    echo '</select>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<input type="hidden" name="id" value="', $row['id'], '">';
                                    echo '<input type="hidden" name="product_name" value="', $row['product_name'], '">';
                                    echo '<input type="hidden" name="price" value="', $row['price'], '">';
                                    echo '<td rowspan="2"></td><td><div class="text-center"><button type="submit" class="btn btn-primary">購入</button></div></td>';
                                    echo '</tr>';
                                    echo '</form>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
        <div class="col-sm-5">
            <section>
                <div class="panel panel-info" style="margin: 50px 0;">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">商品画像</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                            echo '<img src="', $row['file'], '" alt="', $row['product_name'], '" class="col-xs-12" />';
                            
                        $pdo=null;
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php require 'common/footer.php';?>