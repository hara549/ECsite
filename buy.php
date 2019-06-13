<?php
  // 共通処理呼び出し
  require 'common.php';
  // 初期化
  $error = $name = $address = $tel = '';

  //購入するボタン押下時
  if (@$_POST['submit']) {
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $tel = htmlspecialchars($_POST['tel']);

    //未入力の場合エラー（複数エラー表示可能）
    if (!$name) {
      $error .= 'お名前を入力してください</br>';
    }
    if (!$address) {
      $error .= 'ご住所を入力してください</br>';
    }
    if (!$tel) {
      $error .= '電話番号を入力してください</br>';
    }
    //電話番号正規表現チェック（数字またはハイフン以外が入力されたらエラー）
    if (preg_match('/[^\d-]/', $tel)) {
      $error .= '電話番号が正しくありません</br>';
    }

    //エラーなしの場合
    if (!$error) {
      //DB接続
      $pdo = connect();
      //購入完了メッセージ生成
      $body1 = "お名前　： $name</br>"
            ."ご住所　： $address</br>"
            ."電話番号： $tel</br></br>";
      //ショッピングカートの内容を取得
      foreach ($_SESSION['cart'] as $code => $num) {
        $st = $pdo->prepare("SELECT * FROM goods WHERE code=?");
        $st->execute(array($code));
        $row = $st->fetch();
        $st->closeCursor();
        $price_fomat = number_format($row['price']);
        //購入完了メッセージにショッピングカートの内容を追加
        $body2 = "商品名： {$row['name']}</br>"
              ."価格： ￥$price_fomat</br>"
              ."数量： $num</br></br>";
      }
      //購入後、カートの中身を初期化し、画面描画
      $_SESSION['cart'] = null;
      require 'view_buy_complete.php';
      exit();
    }

  }
  //初期表示時
  require 'view_buy.php';
 ?>
