<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>商品一覧ページ</title>
  <link type="text/css" rel="stylesheet" href="./css/common.css">
</head>
<body>
  <header>
    <div class="header-box">
      <a href="./top.php">
        <img class="logo" src="./images/logo.png" alt="CodeSHOP">
      </a>
      <a class="nemu" href="./logout.php">ログアウト</a>
      <a href="./cart.php" class="cart"></a>
      <p class="nemu">ユーザー名：<?php print $_SESSION['user_name']; ?></p>
    </div>
  </header>
  <div class="content">

<?php if (empty($result_msg) !== TRUE) { ?>
    <p class="success-msg"><?php print $result_msg; ?></p>
<?php } ?>
<?php foreach ($err_msg as $value) { ?>
  <p class="err-msg"><?php print $value; ?></p>
<?php } ?>
    <ul class="item-list">
<?php foreach ($data as $value)  { ?>
      <li>
        <div class="item">
          <form action="./top.php" method="post">
            <img class="item-img" src="<?php print $IMG_DIR . $value['img']; ?>" >
            <div class="item-info">
              <span class="item-name"><?php print $value['name']; ?></span>
              <span class="item-price">¥<?php print $value['price']; ?></span>
            </div>
<?php if ($value['stock'] > 0) { ?>
            <input class="cart-btn" type="submit" value="カートに入れる">
<?php } else { ?>
            <p class="sold-out" >売り切れ</p>
<?php } ?>
            <input type="hidden" name="item_id" value="<?php print $value['id']; ?>">
            <input type="hidden" name="sql_kind" value="insert_cart">
          </form>
        </div>
      </li>
<?php } ?>
    </ul>
  </div>
</body>
</html>
