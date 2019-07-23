<?php

// カートを入れる
function execute_cart_click($dbh, $item_id, $user_id) {

  try {
    //
    // カートに追加する対象商品がすでにカートに入っているかどうか確認する
    //
    // SQL文を作成
    $sql = 'SELECT item_id, amount FROM carts WHERE item_id = ? AND user_id = ?';
    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);
    // SQL文のプレースホルダに値をバインド
    $stmt->bindValue(1, $item_id, PDO::PARAM_INT);
    $stmt->bindValue(2, $user_id, PDO::PARAM_INT);
    // SQLを実行
    $stmt->execute();
    // レコードの取得
    $rows = $stmt->fetchAll();

    // 現在日時を取得します
    $date = date('Y-m-d H:i:s');

    // カートの更新処理をします
    if(empty($rows)) {
      //
      // カートに追加の対象商品がすでにカートに入っていない場合
      //
      $sql = 'INSERT INTO carts (user_id, item_id, amount,createdate, updatedate) VALUES (?, ?, 1, ?, ?)';
      // SQL文を実行する準備
      $stmt = $dbh->prepare($sql);
      // SQL文のプレースホルダに値をバインド
      $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
      $stmt->bindValue(2, $item_id, PDO::PARAM_INT);
      $stmt->bindValue(3, $date, PDO::PARAM_STR);
      $stmt->bindValue(4, $date, PDO::PARAM_STR);

      // SQLを実行
      $stmt->execute();

    } else {
      //
      // カートに追加の対象商品がすでにカートに入っている場合
      //
      $amount = $rows[0]["amount"] + 1;
      $sql = 'UPDATE carts SET amount = ? ,updatedate = ? WHERE user_id = ? AND item_id = ?';
      // SQL文を実行する準備
      $stmt = $dbh->prepare($sql);
      // SQL文のプレースホルダに値をバインド
      $stmt->bindValue(1, $amount, PDO::PARAM_INT);
      $stmt->bindValue(2, $date, PDO::PARAM_STR);
      $stmt->bindValue(3, $user_id, PDO::PARAM_INT);
      $stmt->bindValue(4, $item_id, PDO::PARAM_INT);
      // SQLを実行
      $stmt->execute();

    }
  } catch (PDOException $e) {

    throw $e;
  }

}


// 公開の商品情報の一覧を取得する
function get_item_list_all_by_status($dbh) {

  try {
    // SQL文を作成
    $sql = 'SELECT
       items.id,
       items.name, items.price,
       items.img, items.stock
       FROM items WHERE status=1';
    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);
    // SQLを実行
    $stmt->execute();
    // レコードの取得
    $rows = $stmt->fetchAll();

  } catch (PDOException $e) {
    throw $e;
  }

  return $rows;
}

?>
