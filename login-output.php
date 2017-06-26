<?php session_start();?>
<?php require 'common/header.php';?>
<?php require 'common/login-navbar.php';?>
<?php
// すでにログインしている場合、ログアウトする。
unset($_SESSION['customer']);
// DB接続
$pdo = new PDO('mysql:host=localhost;dbname=lesson4;charset=utf8', 'root', 'testes77');
$sql = $pdo->prepare('select * from customer where email=? and password=?');
$sql->execute(array($_REQUEST['email'], $_REQUEST['password']));

$pdo = null;
?>

<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <main>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2 class="panel-title">ご登録内容</h2>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
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
                                    echo '<div class="alert alert-success">ログインに成功しました。</div>';
                                    echo '<li>いらっしゃいませ、', $_SESSION['customer']['name'], 'さん。</li>';
                                    echo '<br />';
                                    echo '<p>ログアウトしますか？</p>';
                                    echo '<li><a href="logout-output.php">ログアウト</a></li>';
                            
                                }else{
                                    echo '<div class="alert alert-danger">ログインに失敗しました。</div>';
                                }
                            
                            ?>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>


<?php require 'common/footer.php';?>