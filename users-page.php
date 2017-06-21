<?php
// セッションスタート
session_start();
// すでにログインしている場合、ログアウトする。
unset($_SESSION['customer']);
// DB接続
$pdo = new PDO('mysql:host=localhost;dbname=lesson4;charset=utf8', 'root', 'testes77');
$sql = $pdo->prepare('select * from customer where email=? and password=?');
$sql->execute([$_REQUEST['email'], $_REQUEST['password']]);

$pdo = null;
?>
<?php require 'common/header.php';?>
<?php require 'common/login-navbar.php';?>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <section>
                <?php
                // セッションデータの登録
                foreach ($sql->fetchAll() as $row){
                    $_SESSION['customer'] = array(
                        'id'=>$row['id'],
                        'name'=>$row['name'],
                        'email'=>$row['email'],
                        'password'=>$row['password'],
                        'birthday'=>$row['birthday'],
                        'postal_code'=>$row['postal_code'],
                        'address'=>$row['address'],
                        'phone_number'=>$row['phone_number']
                        );
                }
                    // ログイン結果の表示
                    if (isset($_SESSION['customer'])) {
                        echo '<div class="alert alert-success">', $_SESSION['customer']['name'], 'さん、ようこそ。</div>';
                    }
                ?>
            </section>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <?php require 'common/sidebar.php';?>
        </div>
    </div>
</div>


<?php require 'common/footer.php';?>