<?php session_start();?>
<?php require 'common/header.php';?>
<?php require 'common/login-navbar.php';?>

<div class="container">
    <div class="col-sm-10">
        <?php
        if (isset($_SESSION['product'])) {
        // if (!isset($_SESSION['customer'])) {
        //     echo 'ご購入手続きを行うには、ログインしてください。';
        // }else if (empty($_SESSION['product'])){
        //     echo 'カートに商品がありません。';
        // }else{
            $id=$_REQUEST['id'];
            // カート変数の定義されているかの確認
            if(!isset($_SESSION['product'])) {
                // カート変数が未定義だった場合、
                // カート変数に空の配列を設定して、カートを空の状態に初期化
                $_SESSION['product']=[];
            }
        // }
            
            // カートに入っている個数の取得
            // 最初に$countに０を代入しておく。
            $count=0;
            
            // 次にカートに入れた商品と同じ商品があるかどうかをisset関数を使って調べる。
            if (isset($_SESSION['product']['id'])) {
                // 同じ商品がある場合には、既にカート内にある商品の個数を取得して、$countに代入する。
                $count=$_SESSION['product'][$id]['count'];
            }
            
            // カートに商品を登録する
            // 商品名と価格については、リクエストパラメーター名で取得した値をそのまま格納。
            $_SESSION['product']['id'] = array(
                'product_name'=>$_REQUEST['product_name'],
                'price'=>$_REQUEST['price'],
                // 購入個数のみ、新しく追加した個数との合計個数が登録される。
                'count'=>$count + $_REQUEST['count']
            );
        echo '<div class="alert alert-warning"><p>カートに商品を追加しました。</p></div>';
        echo '<hr>';
        require 'cart.php';
        }
        ?>
    </div>
</div>

<?php require 'common/footer.php';?>