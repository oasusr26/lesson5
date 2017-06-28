<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

try {
    $pdo =new PDO('mysql:host=localhost;dbname=lesson5;charset=utf8', 'root', 'testes77');
    
    $sql=$pdo->prepare('insert into product values (?,?,?,?,?)');
    $sql->execute(array(
        $_REQUEST['product_id'], h($_REQUEST['product_name']),
        $_REQUEST['price'], $_REQUEST['stock'], $_REQUEST['file']
        ));
    
    
    
    // $sql=$pdo->prepare('select * from product where product_id=?');
    // $sql->execute(array($_REQUEST['product_id']));
    
    
    $pdo=null;
    
}catch(Exception $e){
    $error = '<div class="alert alert-warning"><p>現在システムエラーです。しばらく経ってから、</p></div>';
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>管理者メニュー</title>
        <link rel="stylesheet" href="">
        <style>
        main {
            margin: 50px 0;
        }
        
        .error {
            color: #dc143c;
        }
            
        small p {
            color: #fff;
            background-color: #302833;
            padding: 30px 0;
        }
        </style>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        /*global $*/ 
        window.onload = function() {
            $("#file_name").click(function() {
            
                var product_id = $("#product_id").val();
                var file_name = $("#file_name").val();
                
                if (product_id !== file_name) {
                    $(".error").html("商品IDとファイル名は同じ数字にしてください。");
                }
            });
        };
        </script>
    </head>
    <body>
        <div id="header">
            <header>
                <nav class="navbar navbar-default navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-avbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div><!-- /#header -->
        <div class="container">
            <main>
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">管理者メニュー</h3>
                    </div>
                    <div class="panel-body">
                        <form action="admin-site.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label for="product_id" class="control-label col-sm-2">商品ID</label>
                                <div class="col-sm-6">
                                    <input type="text" id="product_id" name="product_id" class="form-control" pattern="[1-9][0-9]*" required aria-required autofocus>
                                    <p class="error"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_name" class="control-label col-sm-2">商品名</label>
                                <div class="col-sm-6">
                                    <input type="text" id="product_name" name="product_name" class="form-control" required aria-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price" class="control-label col-sm-2">価格</label>
                                <div class="col-sm-6">
                                    <input type="text" id="price" name="price" class="form-control" pattern="[1-9][0-9]*" required aria-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stock" class="control-label col-sm-2">在庫数</label>
                                <div class="col-sm-1">
                                    <select name="stock" id="stock" class="form-control">
                                        <?php
                                        for ($i=1; $i<=100; $i++) {
                                            echo '<option value="', $i, '">', $i, '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" class="control-label col-sm-2">商品画像ファイル名</label>
                                <div class="col-sm-4">
                                    <?php
                                    if (is_uploaded_file($_FILES['file']['tmp_name'])){
                                        // 入力画面からアップロードされたものだったときの処理
                                        if (!file_exists('images')) {
                                            // ファイルが存在してない場合、imagesファイルを作成
                                            mkdir('images');
                                        }
                                    
                                    
                                        // アップロードされたファイルを保存
                                        // basename関数でファイル名（$_FILES['file']['name']）を取得
                                        $file = 'images/' . basename($_FILES['file']['name']);
                                        
                                        // アップロードされた一時的なファイルを保存先のファイルに移動
                                        // ove_uploaded_file(一時的なファイル, 保存先のファイル)
                                        if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
                                            echo '<div class="alert alert-success">';
                                            echo '<p>', $file, 'のアップロードに成功しました。</p>';
                                            echo '</div>';
                                        }else{
                                            echo '<div class="alert alert-danger">';
                                            echo 'アップロードに失敗しました。';
                                            echo '</div>';
                                        }
                                    }else{
                                        echo 'ファイルを選択してください。';
                                    }
                                    ?>
                                    <input type="file" id="file" name="file"  required aria-required>
                                    <input type="hidden" name="file" value="<?= $file;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary col-sm-3">登録</button>
                                    <button type="reset" class="btn btn-warning col-sm-offset-1 col-sm-2">クリア</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main><!-- /main -->
        </div><!-- /.container -->
        <div id="footer">
            <div class="text-center">
                <footer>
                        <small><p>管理者メニュ―</p></small>
                </footer>
            </div>
        </div><!-- /#footer -->
        <script type="text/javascript" src="js/footerFixed.js"></script>
    </body>
</html>
