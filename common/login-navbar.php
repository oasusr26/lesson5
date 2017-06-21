<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#target">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><h1>Gallary&Collection</h1></a>
            </div>
            <div class="collapse navbar-collapse" id="target">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="users-page.php">HOME</a></li>
                    <li><a href="#">カート<span class="glyphicon glyphicon-shopping-cart" style="padding-left: 3px;vertical-align: top; font-size: 16px;" aria-hidden="true"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            session_start();
                            $pdo = new PDO('mysql:host=localhost;dbname=lesson4;charset=utf8', 'root', 'testes77');
                            $sql = $pdo->prepare('select * from customer where email=? and password=?');
                            $sql->execute([$_REQUEST['email'], $_REQUEST['password']]);

                            foreach($sql->fetchAll() as $row) {
                                $_SESSION['customer'] = array('name'=>$row['name']);
                            }
                            echo $_SESSION['customer']['name'];
                            ?>
                            さんの情報<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">個人情報</a></li>
                            <li><a href="#">個人編集</a></li>
                            <li><a href="#">お気に入り</a></li>
                            <li><a href="#">購入履歴</a></li>
                            </ul>
                    </li>
                    <li><a href="logout-output.php">ログアウト</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">会社情報<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">経営理念</a></li>
                            <li><a href="#">会社概要</a></li>
                            <li><a href="#">アクセス</a></li>
                            <li><a href="#">沿革</a></li>
                        </ul>
                    </li>
                    <li><a href="#">お問い合わせ</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>