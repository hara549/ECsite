<?php
  require 'common.php';
  //カートを空にして再表示
  $_SESSION['cart'] = null;
  header('Locaiton: cart.php');
 ?>
