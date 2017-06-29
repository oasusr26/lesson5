<?php
session_start();
$id=$_REQUEST['id'];
?>
<?php require 'common/header.php';?>
<?php require 'common/login-navbar.php';?>

<div class="container">
    <div class="col-sm-10">
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=lesson5;charset=utf8', 'root', 'testes77');
        $sql = $pdo->prepare('select * from customer');
        $sql->execute([]);
        
        // セッションデータの取得
        foreach ($sql->fetchAll() as $row) {
            $_SESSION['customer'] = array(
                'name'=>$row['name'],
                'email'=>$row['email'],
                'password'=>$row['password'],
                'birthday'=>$row['birthday'],
                'postal_code'=>$row['postal_code'],
                'address'=>$row['address'],
                'phone_number'=>$row['phone_number']
                );
        }
        
        	echo '<p>お名前：', $_SESSION['customer']['name'], '</p>';
        	echo '<p>メールアドレス：', $_SESSION['customer']['email'], '</p>';
        	echo '<p>パスワード：', $_SESSION['customer']['password'], '</p>';
        	echo '<p>生年月日：', $_SESSION['customer']['birthday'], '</p>';
        	echo '<p>郵便番号：', $_SESSION['customer']['postal_code'], '</p>';
        	echo '<p>ご住所：', $_SESSION['customer']['address'], '</p>';
        	echo '<p>電話番号：', $_SESSION['customer']['phone_number'], '</p>';
        	echo '<hr>';
        	
        	
        // 	ショッピングを始めた時点ではカート変数は定義されていないため、
        // カート変数が未定義の場合、からの配列を設定して初期化する。
        	if (!isset($_SESSION['product'])) {
        	    $_SESSION['product']=[];
        	}
        
        // すでにカートに入っている商品と同じ商品を入れた場合に、個数を合計する処理を行う。
        // $countに０を代入
        	$count=0;
        // カートに入れた商品があるかどうかを調べる
        	if(isset($_SESSION['product']['id'])) {
        	   // 同じ商品がある場合には、すでにカート内にある商品の個数を取得して、$countに代入
        	    $count=$_SESSION['product'][$id]['count'];
        	}
        
        // カートに商品を登録
        // 今までのカートの構造から、商品名、価格、個数を登録
        	$_SESSION['product'][$id] = array(
        	   // 商品名と価格は、リクエストパラメータで取得した値をそのまま格納
        	    'product_name'=>$_REQUEST['product_name'],
        	    'price'=>$_REQUEST['price'],
        	   // 個数については、$countで取得した個数を加算して、格納。
        	   //すでにカートに入っている個数に新しく追加した個数を加えて、合計個数を登録。
        	    'count'=>$count + $_REQUEST['count']
        	    );
        	if (empty($_SESSION['product'])) {
        	echo '<div class="alert alert-success"><p>カートに商品を追加しました。</p></div>';
        	}
        	require 'cart.php';
        	echo '<hr>';
        	echo '<p>内容をご確認いただき、購入を確定してください。</p>';
        	echo '<a href="purchase-output.php">購入を確定する</a>';
        	echo '<button type="reset"><a href="users-page.php">リセット</a></button>';
        ?>

    </div>
</div>

<?php require 'common/footer.php';?>