<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ショッピングカート</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <!-- //共通ヘッダを読み込み -->
    <?php require 'header.php' ?>
    <h1>ショッピングカート</h1>
    <div class="cart">
      <table>
        <tr><th></th><th>商品名</th><th>価格</th><th>数量</th><th>小計</th></tr>
        <?php foreach ($rows as $r) { ?>
          <tr>
            <td><?php echo img_tag($r['code']) ?></td>
            <td><?php echo $r['name'] ?></td>
            <td><?php echo number_format($r['price']) ?></td>
            <td><?php echo $r['num'] ?></td>
            <td>\ <?php echo number_format($r['price'] * $r['num']) ?></td>
          </tr>
        <?php } ?>
        <tr><td colspan='3'></td><td>合計</td><td>\ <?php echo number_format($sum) ?></td></tr>
      </table>
      <div class="other">
        <div class="buy">
          <div>合計：\ <?php echo number_format($sum) ?></div>
          <a href="buy.php">レジに進む</a>
        </div>
        <div class="empty_cart">
          <a href="empty_cart.php">カートを空にする</a>
        </div>
      </div>
    </div>
  </body>
</html>
