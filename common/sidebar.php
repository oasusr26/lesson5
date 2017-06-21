<aside>
    <section>
        <h2>メニュー一覧</h2>
        <ul>
            <li><a href="">商品詳細</a></li>
            <?php
            if (isset($_SESSION['customer'])) {
              echo '<li><a href="logout-output.php">ログアウト</a></li>';
            } 
            ?>
        </ul>
        
    </section>
</aside>