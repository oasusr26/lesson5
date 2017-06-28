<?php session_start();?>
<?php require 'common/header.php';?>
<?php require 'common/login-navbar.php';?>
<div class="container-fluid">
    <div class="row">
        <div class="hidden-xs col-sm-2">
            <?php require 'common/sidebar.php';?>
        </div>
        <div class="col-sm-10">
            <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="search" class="control-label col-sm-2">商品検索</label>
                    <div class="col-sm-4">
                        <input type="search" id="search" name="keyword" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>
                </div>
            </form>
            <article>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>商品画像</th><th>商品ID</th><th>商品名</th><th>価格</th><th>在庫</th><th>商品詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $pdo = new PDO('mysql:host=localhost;dbname=lesson5;charset=utf8', 'root', 'testes77');

                            if (isset($_REQUEST['keyword'])) {
                                $sql = $pdo->prepare('select * from product where product_name like ?');
                                $sql->execute(['%'.$_REQUEST['keyword'].'%']);
                            }else{
                                $sql = $pdo->prepare('select * from product');
                                $sql->execute([]);
                            }
                            
                            foreach ($sql->fetchAll() as $row) {
                                $product_id=$row['product_id'];
                                $file=$row['file'];
                        ?>
                        <tr>
                            <td><img src="<?= $file;?>" alt="<?= $row['product_name']?>" style="width: 170px;height: 170px;overflow: hidden;" class="img-thumbnail" /></td>
                            <td><?= $row['product_id'];?></td>
                            <td><?= $row['product_name'];?></td>
                            <td><?= $row['price'];?></td>
                            <td><?= $row['stock'];?></td>
                            <td><button type="button" class="btn btn-primary detail"><a href="detail.php?product_id=<?= $product_id;?>">詳細</a></button></td>
                        </tr>
                        <?php
                        }
                        $pdo = null;
                        ?>
                    </tbody>
                </table>
            </article>
        </div>
    </div>
</div>



<?php require 'common/footer.php';?>