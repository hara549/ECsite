<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ショッピングカート</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap">
  </head>
  <body>
    <!-- //共通ヘッダを読み込み -->
    <?php require 'header.php' ?>
    <h1>ショッピングカート</h1>
    <div class="cart">
      <table class="table_cart" rules="rows">
        <tr>
          <th></th>
          <th id="tb_name">商品名</th>
          <th id="tb_price">価格</th>
          <th id="tb_num">数量</th>
          <th id="tb_subtotal">小計</th>
        </tr>
        <?php foreach ($rows as $r) { ?>
          <tr>
            <td id="tb_image"><?php echo img_tag($r['code']) ?></td>
            <td id="tb_name"><?php echo $r['name'] ?></td>
            <td id="tb_price" class="price">￥<?php echo number_format($r['price']) ?></td>
            <td id="tb_num"><?php echo $r['num'] ?></td>
            <td id="tb_subtotal" class="price">￥<?php echo number_format($r['price'] * $r['num']) ?></td>
          </tr>
        <?php } ?>
        <tr>
          <td colspan='3'></td>
          <th id="tb_num">合計</th>
          <td id="tb_subtotal" class="price">￥<?php echo number_format($sum) ?></td>
        </tr>
      </table>
      <div class="other">
        <div class="buy">
          <div><span id="sum_buy">合計 ： </span><span class="price">￥<?php echo number_format($sum) ?></span></div>
          <a class="submit" href="buy.php">レジに進む</a>
        </div>
        <div class="empty_cart">
          <a href="empty_cart.php">カートを空にする</a>
        </div>
      </div>
    </div>
  </body>
</html>
