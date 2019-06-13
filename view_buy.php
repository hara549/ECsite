<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>購入ページ</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c&display=swap">
  </head>
  <body>
    <!-- 共通ヘッダ読み込み -->
    <?php require 'header.php' ?>
    <h1>購入ページ</h1>

    <!-- エラー表示領域 -->
    <?php if ($error) echo "<span class=\"error\">$error</span>" ?>
    <!-- 入力フォーム -->
    <form action="buy.php" method="post">
      <p>
        お名前</br>
        <input type="text" name="name" value="<?php echo $name ?>">
      </p>
      <p>
        ご住所</br>
        <input type="text" name="address" value="<?php echo $address ?>">
      </p>
      <p>
        電話番号</br>
        <input type="text" name="tel" value="<?php echo $tel ?>">
      </p>
      <p>
        <input type="submit" name="submit" value="購入する">
      </p>
    </form>

  </body>
</html>
