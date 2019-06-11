<?php
  //共通処理呼び出し
  require 'common.php';

  //初期化
  $rows = array();
  $sum  = 0;

  //DB接続
  $pdo = connect();

  //セッションのカートが空の場合、初期化
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

  //「カートへ」ボタンより遷移の場合、セッションcartに商品をセットする
  //既にカートに入ってる場合は数量を加算する
  if (@$_POST['submit']) {
    @$_SESSION['cart'][$_POST['code']] += $_POST['num'];
  }

  //セッションcartから数量を取り出して計算
  foreach ($_SESSION['cart'] as $code => $num) {
    //prepare executeでSQLインジェクション対策
    $st = $pdo->prepare("SELECT * FROM goods WHERE code=?");
    $st->execute(array($code));
    $row = $st->fetch();
    //closeして解放
    $st->closeCursor();

    $row['num'] = strip_tags($num);
    //小計
    $sum += $num * $row['price'];
    //取得した商品情報をcartの配列に追加
    $rows[] = $row;
  }
  //画面表示
  require 'view_cart.php';

 ?>
