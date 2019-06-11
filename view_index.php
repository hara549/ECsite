<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>商品一覧</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <!-- //共通ヘッダを読み込み -->
    <?php require 'header.php' ?>
    <h1>商品一覧</h1>
    <!-- DBから商品一覧テーブルを作成する -->
    <table rules="rows">
    <?php foreach ($goods as $item) { ?>
      <tr>
        <td>
          <?php echo img_tag($item['code']) ?>
        </td>
        <td>
          <p class="name"><?php echo $item['name'] ?></p>
          <p class="comment"><?php echo $item['comment'] ?></p>
        </td>
        <td>
          <p class="price">\ <?php echo number_format($item['price']) ?></p>
          <form action="cart.php" method="post">
            <select class="num" name="num">
              <?php
                for ($i=0; $i <= 9; $i++) {
                  echo "<option>$i</oprion>";
                }
              ?>
            </select></br>
            <!-- データ受け渡しのため、hiddenでデータを持つ -->
            <input type="hidden" name="code" value="<?php echo $item['code'] ?>">
            <input type="submit" name="submit" value="カートへ">
          </form>
        </td>
      </tr>
    <?php } ?>
    </table>
  </body>
</html>
