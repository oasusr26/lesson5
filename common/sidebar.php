<aside>
    <section>
        <h2>メニュー一覧</h2>
        <ul>
            <li><span class="aside-list-style">●</span><a href="users-page.php">商品一覧</a></li>
            <?php
            if (isset($_SESSION['customer'])) {
              echo '<li><span class="aside-list-style">●</span><a href="logout-output.php">ログアウト</a></li>';
            } 
            ?>
        </ul>
    </section>
</aside>