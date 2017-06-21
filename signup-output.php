<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=lesson4;charset=utf8', 'root', 'testes77');

// メールアドレスで重複確認
if (isset($_SESSION['customer'])) {
    $id = $_SESSION['customer']['id'];
    $sql = $pdo->prepare('select * from customer where id!=? and email=?');
    $sql->execute([$id, $_REQUEST['email']]);
}else{
    $sql = $pdo->prepare('select * fromo customer where email=?');
    $sql->execute([$_REQUEST['email']]);
}

// 上記でいずれの場合も検索結果が空の場合、ログイン名を重複しているユーザーはいないので、
// 空かどうかを調べるには、empty関数を使って、空かどうかを調べる。
// empty関数の指定した式、変数が空の場合、trueを返す。
if (empty($sql->fetchAll())) {
    // セッションデータが存在するかでログインしているかを確認
    if (isset($_SESSION['customer'])) {
        $sql = $pdo->prepare('update customer set name=?, email=?, password=?, birthday=?, postal_code=?, address=?, phone_number=? where id=?');
        // データベースの更新
        $sql->execute([$_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password'], $_REQUEST['birthday'], $_REQUEST['postal_code'], $_REQUEST['address'], $_REQUEST['phone_number'], $id]);
        
        // セッションデータも最新の情報に更新
        $_SESSION['customer'] = array(
            'id'=>$id,
            'name'=>$_REQUEST['name'],
            'email'=>$_REQUEST['email'],
            'password'=>$_REQUEST['birthday'],
            'postal_code'=>$_REQUEST['postal_code'],
            'address'=>$_REQUEST['address'],
            'phone_number'=>$_REQUEST['phone_number']
            );
        
        echo '<p>お客様情報を更新しました。</p>';
    }else{
        $sql = $pdo->prepare('insert into customer values(null,?,?,?,?,?,?,?)');
        $sql->execute([
            $_REQUEST['name'], $_REQUEST['email'],
            $_REQUEST['password'], $_REQUEST['birthday'],
            $_REQUEST['postal_code'], $_REQUEST['address'],
            $_REQUEST['phone_number']
            ]);
        
        echo '<p>お客様情報を登録しました。</p>';
    }
}else{
    echo '<p>そちらのメールアドレスは既に登録されています。</p>';
}


$pdo = null;
?>

<?php require 'common/header.php';?>
<?php require 'common/navbar.php';?>
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <main>
                <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">下記の会員情報で登録いたしました。</h2>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <?php
                        foreach ($sql->fetchAll() as $row) {
                        
                            echo '<li>お名前：', $row['name'], '</li>';
                            echo '<li>生年月日：', $row['birthday'], '</li>';
                            echo '<li>メールアドレス：', $row['email'], '</li>';
                            echo '<li>パスワード：', $row['password'], '</li>';
                            echo '<li>郵便番号：', $row['postal_code'], '</li>';
                            echo '<li>住所：', $row['address'], '</li>';
                            echo '<li>電話番号：', $row['phone_number'], '</li>';
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