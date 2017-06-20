<?php require 'common/header.php';?>
<?php require 'common/navbar.php';?>

<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <main>
                <fieldset>
                <legend><b>ログイン</b></legend>
                    <form action="login-output.php" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="email" class="control-label col-sm-4">メールアドレス：</label>
                            <div class="col-sm-6">
                                <input type="email" name="email" id="email" value="<?= $email;?>" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label col-sm-4">パスワード：</label>
                            <div class="col-sm-6">
                                <input type="password" name="password" id="password" value="<?= $password;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary col-sm-2 col-sm-offset-4">ログイン</button>
                        </div>
                    </form>
                </fieldset>
                <div class="text-center">
                    <p>会員情報変更/退会はログインしてください。</p>
                </div>
            </main>
        </div>
    </div>
</div>








<?php require 'common/footer.php';?>