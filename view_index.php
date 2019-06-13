<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap">
  </head>
  <body>
    <!-- //共通ヘッダを読み込み -->
    <?php require 'header.php' ?>
    <h1>商品一覧</h1>
    <!-- DBから商品一覧テーブルを作成する -->
    <table class="table_index" rules="rows">
    <?php foreach ($goods as $item) { ?>
      <tr>
        <td id="tb_image">
          <?php echo img_tag($item['code']) ?>
        </td>
        <td id="tb_name">
          <p class="name"><?php echo $item['name'] ?></p>
          <p class="comment"><?php echo $item['comment'] ?></p>
        </td>
        <td id="tb_price">
          <p class="price">￥<?php echo number_format($item['price']) ?></p>
          <form action="cart.php" method="post">
            <select class="num" name="num">
              <?php
                for ($i=1; $i <= 9; $i++) {
                  echo "<option>$i</oprion>";
                }
              ?>
            </select></br>
            <!-- データ受け渡しのため、hiddenでデータを持つ -->
            <input type="hidden" name="code" value="<?php echo $item['code'] ?>">
            <input type="submit" class="submit" name="submit" value="カートへ">
          </form>
        </td>
      </tr>
    <?php } ?>
    </table>
  </body>
</html>
