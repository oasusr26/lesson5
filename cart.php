<?php
// 最初にカートが空かどうかを判定。
// カートが空なのは、まだ1個も商品を追加していない場合と、カートからすべての商品を削除した場合。
if (!empty($_SESSION['product'])) {
    // カート変数のカート内にある商品の配列に何も商品が入っていないときは、配列は空の状態で、このときempty関数はtrueを返す。
?>
  <table class="table">
      <thead>
          <tr>
              <th class="text-center">商品ID</th><th class="text-center">商品名</th><th class="text-center">価格</th><th class="text-center">個数</th><th class="text-center">小計</th><th></th>
          </tr>
      </thead>
      <tbody>
          <?php
          $total=0;
          foreach ($_SESSION['product'] as $id=>$product) {
            echo '<tr>';
            echo '<td>', $id, '</td>';
            echo '<td><a href="detail.php?id=', $id, '">', $product['product_name'], '</a></td>';
            echo '<td>', $product['price'], '</td>';
            echo '<td>', $product['count'], '</td>';
            // 価格×個数（小計欄）
            $subtotal=$product['price'] * $product['count'];
            // 合計＝サブ合計＋小計
            $total+=$subtotal;
            echo '<td>', $subtotal, '</td>';
            echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
            echo '</tr>';
          }
          echo '<tr>';
          echo '<td rowspan="4">合計</td><td></td><td></td><td></td><td>', $total, '</td>';
          echo '</tr>';
          ?>
      </tbody>
  </table>
  
<?php    
}else{
    echo '<div class="alert alert-warning">';
    echo '<p>カートに商品がありません。</p>';
    echo '</div>';
}
?>