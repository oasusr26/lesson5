<?php require 'common/header.php';?>
<?php require 'common/navbar.php';?>
<?php
// セッションスタート
session_start();
// 変数を初期化
$name=$email=$password=$birthday=$postal_code=$address=$phone_number='';
// 顧客情報がセッションデータに登録されているかを調べる
if (isset($_SESSION['customer'])) {
    // 登録されていた場合、顧客情報を読み出し、各変数に登録
    $name=$_SESSION['customer']['name'];
    $email=$_SESSION['customer']['email'];
    $password=$_SESSION['customer']['password'];
    $birthday=$_SESSION['customer']['birthday'];
    $postal_code=$_SESSION['customer']['postal_code'];
    $address=$_SESSION['customer']['address'];
    $phone_number=$_SESSION['customer']['phone_number'];
}
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <fieldset>
                    <legend>新規会員登録</legend>
                    <p>赤（必須）で示されている項目は必須項目です。</p>
                    <form action="signup-output.php" method="post" class="error_check form-horizontal">
                        <div class="form-group">
                            <label for="name" class="control-label"><span class="required">お名前（※必須）</span>：（例：鈴木一郎）</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?= $name;?>" placeholder="鈴木一郎" required aria-required="true" autofocus>
                        </div>
                         <div class="form-group">        
                            <label for="birthday" class="control-label"><span class="required">生年月日（※必須）</span>：（※西暦生年月日・半角数字）</label>
                            <input type="text" id="birthday" name="birthday" class="form-control col-sm-6" value="<?= $birthday;?>" placeholder="1990/01/01" pattern="^(\d{4})/(0[1-9]|1[0-2])/(0[1-9]|[12][0-9]|3[01])$" required aria-required="true">
                        </div>
                        <div class="form-group">        
                            <label for="email" class="control-label"><span class="required">メールアドレス（※必須）</span>：（例：suzuki@xxx.com）</label>
                            <input type="email" id="email" name="email" class="form-control col-sm-6" value="<?= $email;?>" placeholder="suzuki@xxx.com" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required aria-required="true">
                        </div>
                        <div class="form-group">        
                            <label for="password" class="control-labal"><span class="required">パスワード（※必須）</span>：（※半角英数字6文字以上）</label>
                            <input type="password" id="password" name="password" value="<?= $password;?>" class="form-control password1" pattern="^([a-zA-Z0-9]{6,})$" required aria-required="true"> 
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label"><span class="required">パスワード確認（※必須）</span>：</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control password2" required aria-required="true">
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="postal_code" class="control-label"><span class="required">郵便番号（※必須）</span>：（※ハイフンあり、半角数字７ケタ）</label>
                            <input type="text" id="postal_code" name="postal_code" value="<?= $postal_code;?>" class="form-control" placeholder="ハイフンあり可、半角数字７ケタ" pattern="\d{3}-\d{4}" reqiured aria-requied="true"> 
                        </div>
                        <div class="form-group">
                            <label for="address" class="control-label"><span class="required">住所（※必須）</span>：（例：東京都新宿区西新宿x-x-x〇〇マンションxxx号室）</label>
                            <input type="text" id="address" name="address" value="<?= $address;?>" placeholder="東京都新宿区西新宿x-x-x〇〇マンションxxx号室" class="form-control" required area-required="true">
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="control-label"><span class="required">電話番号（※必須）</span>：（例：03-1234-XXXX 　※ハイフンあり）</label>
                            <input type="tel" id="phone_number" name="phone_number" value="<?= $phone_number;?>" class="form-control" placeholder="03-xxxx-xxxx" pattern="\d{2,3}-\d{3,4}-\d{3,4}" reqiured aria-reqiured="true">
                        </div>
                        
                        <button type="submit" id="submit" class="btn btn-success col-xs-4">登録</button>
                        <button type="reset" class="clear btn btn-warning col-xs-2 col-xs-offset-2">クリア</button>
                    
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</main>

<?php require 'common/footer.php';?>