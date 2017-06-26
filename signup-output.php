<?php
// // ログイン名の重複確認
// if (empty($sql->fetchAll())) {
//     // セッションデータが存在しているかを調べる処理
//     if (isset($_SESSION['customer'])) {
//         // セッションデータがあった場合の処理
//         // $sql = $pdo->prepare('insert into customer(name,email,password,birthday,postal_code,address,phone_number) values(?,?,?,?,?,?,?)');

//     }
//     $sql = $pdo->prepare('select * from customer where email=?');
//     $sql->execute(array($_REQUEST['email']));
    
    
//     $pdo=null;
// }else{
//     echo '<p>そちらのメールアドレスは登録されていますので、ご変更をお願いいたします。</p>';
// }



//  上記でいずれの場合も検索結果が空の場合、ログイン名を重複しているユーザーはいないので、
//  空かどうかを調べるには、empty関数を使って、空かどうかを調べる。
// empty関数の指定した式、変数が空の場合、trueを返す。
//  if (empty($sql->fetchAll())) {
//      // セッションデータが存在するかでログインしているかを確認
//      if (isset($_SESSION['customer'])) {
//          $sql = $pdo->prepare('update customer set name=?, email=?, password=?, birthday=?, postal_code=?, address=?, phone_number=? where id=?');
//          // データベースの更新
//          $sql->execute(array($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password'], $_REQUEST['birthday'], $_REQUEST['postal_code'], $_REQUEST['address'], $_REQUEST['phone_number'], $id));
        
// //         // セッションデータも最新の情報に更新
//          $_SESSION['customer'] = array(
//              'id'=>$id,
//              'name'=>$_REQUEST['name'],
//              'email'=>$_REQUEST['email'],
//              'password'=>$_REQUEST['birthday'],
//              'postal_code'=>$_REQUEST['postal_code'],
//              'address'=>$_REQUEST['address'],
//              'phone_number'=>$_REQUEST['phone_number']
//              );
        
//          echo '<p>お客様情報を更新しました。</p>';
//      }else{
//          $sql = $pdo->prepare('insert into customer values(null,?,?,?,?,?,?,?)');
//          $sql->execute(array(
//              $_REQUEST['name'], $_REQUEST['email'],
//              $_REQUEST['password'], $_REQUEST['birthday'],
//              $_REQUEST['postal_code'], $_REQUEST['address'],
//              $_REQUEST['phone_number']
//              ));
        
//          echo '<p>お客様情報を登録しました。</p>';
//      }
//  }else{
//      echo '<p>そちらのメールアドレスは既に登録されています。</p>';
//  }
?>
<?php session_start();?>
<?php require 'common/header.php';?>
<?php require 'common/login-navbar.php';?>
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
                        function h($str) {
                            return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
                        }
                        
                        try {
                        
                            $pdo = new PDO('mysql:host=localhost;dbname=lesson5;charset=utf8', 'root', 'testes77');
                            
                            //メールアドレスで重複確認
                             if (isset($_SESSION['customer'])) {
                                 $id = $_SESSION['customer']['id'];
                                 $sql = $pdo->prepare('select * from customer where id!=? and email=?');
                                 $sql->execute(array($id, $_REQUEST['email']));
                             }else{
                                 $sql = $pdo->prepare('select * from customer where email=?');
                                 $sql->execute(array($_REQUEST['email']));
                             }
                             
                            if (empty($sql->fetchAll())) {
                                if (isset($_SESSION['customer'])) {
                                    $sql=$pdo->prepare('update customer set name=?, email=?, password=?, birthday=?, postal_code=?, address=?, phone_number=?, where id=?');
                                    $sql->execute(array(
                                        h($_REQUEST['name']), h($_REQUEST['email']), $_REQUEST['password'],
                                        $_REQUEST['birthday'], $_REQUEST['postal_code'], h($_REQUEST['address']),
                                        $_REQUEST['phone_number'], $id));
                                    // セッションデータの更新
                                    $_SESSION['customer']=array(
                                        'id'=>$id, 'name'=>$_REQUEST['name'], 'email'=>$_REQUEST['email'],
                                        'password'=>$_REQUEST['password'], 'birthday'=>$_REQUEST['birthday'], 'postal_code'=>$_REQUEST['postal_code'],
                                        'address'=>$_REQUEST['address'], 'phone_number'=>$_REQUEST['phone_number']);
                                    
                                    $update = 'お客様情報を更新しました。';
                                }else{
                                    $sql=$pdo->prepare('insert into customer values (null,?,?,?,?,?,?,?)');
                                    $sql->execute(array(
                                        $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password'],
                                        $_REQUEST['birthday'], $_REQUEST['postal_code'], $_REQUEST['address'],
                                        $_REQUEST['phone_number']));
                                    
                                    $insert = 'お客様情報を登録しました。';
                                }
                            }
                            
                            $pdo=null;
                        }catch(Exception $e){
                            echo '<div class="text-center">';
                            echo '<p>ただいま障害により、大変ご迷惑をお掛けいたしております。</p>';
                            echo '<p>復旧まで今しばらくお待ちください。</p>';
                            echo '</div>';
                        }
                        // foreach ($sql->fetchAll() as $row) {
                        //     echo '<li>', $row['id'], '</li>';
                        //     echo '<li>', $row['name'], '</li>';
                        //     echo '<li>', $row['email'], '</li>';
                        //     echo '<li>', $row['password'], '</li>';
                        //     echo '<li>', $row['birthday'], '</li>';
                        //     echo '<li>', $row['postal_code'], '</li>';
                        //     echo '<li>', $row['address'], '</li>';
                        //     echo '<li>', $row['phone_number'], '</li>';
                        // }
                            // $_SESSION['customer'] = array(
                            //     'id'=>$row['id'],
                            //     'name'=>$row['name'],
                            //     'birthday'=>$row['birthday'],
                            //     'email'=>$row['email'],
                            //     'password'=>$row['password'],
                            //     'postal_code'=>$row['postal_code'],
                            //     'address'=>$row['address'],
                            //     'phone_number'=>$row['phone_number']);
                        
                            // echo '<li>', $row['id'], '</li>';
                            // echo $row['name'];
                            // echo $row['birthday'];
                            // echo '<li>', $row['email'], '</li>';
                            // echo $row['password'];
                            // echo $row['postal_code'];
                            // echo $row['address'];
                            // echo $row['phone_number'];
                            // if (isset($_SESSION['customer'])) {
                            //     echo '<li>id：', $_SESSION['customer']['id'], '</li>';
                            //     echo '<li>お名前：', $_SESSION['customer']['name'], '</li>';
                            //     echo '<li>生年月日：', $_SESSION['customer']['birthday'], '</li>';
                            //     echo '<li>メールアドレス：', $_SESSION['customer']['email'], '</li>';
                            //     echo '<li>パスワード：', $_SESSION['customer']['password'], '</li>';
                            //     echo '<li>郵便番号：', $_SESSION['customer']['postal_code'], '</li>';
                            //     echo '<li>住所：', $_SESSION['customer']['address'], '</li>';
                            //     echo '<li>電話番号：', $_SESSION['customer']['phone_number'], '</li>';
                            // }
                        ?>
                    </ul>
                </div>
            </div>
            </main>
        </div>
    </div>
</div>



<?php require 'common/footer.php';?>