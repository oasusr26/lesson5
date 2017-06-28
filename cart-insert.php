<?php session_start();?>
<?php require 'common/header.php';?>
<?php require 'common/login-navbar.php';?>

<div class="container">
    <div class="col-sm-10">
        <div class="alert alert-warning"><p>ご購入確認</p></div>
        <form action="cart.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="email" class="control-label">配送先メールアドレス</label>
                <input type="email">
                
            </div>
                
        </form>
    </div>
</div>

<?php require 'common/footer.php';?>