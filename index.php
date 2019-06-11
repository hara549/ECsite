<?php
  require 'common.php';

  //DB接続
  $pdo = connect();
  $st = $pdo->query("SELECT * FROM goods");
  $goods = $st->fetchAll();

  //画面表示
  require 'view_index.php';
 ?>
