<?php

// カート情報の削除
function delete_cart($dbh, $user_id) {

  try {
    // SQL文を作成
    $sql = 'DELETE from carts WHERE user_id = ?';
    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);
    // SQL文のプレースホルダに値をバインド
    $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
    // SQLを実行
    $stmt->execute();
  } catch (PDOException $e) {
    throw $e;
  }

}

// 在庫数の更新
function upadte_multiple_item_stock($dbh, $data, $date) {

  $err_msg = "";

  foreach ($data as $key => $rec) {
        if ((int)$rec['stock']===0) {
            $err_msg='商品は売り切れになりました';
        } else {
            
        
            $stock = (int)$rec['stock'] - (int)$rec['amount'];
            
            try {
              // SQL文を作成
              $sql = 'UPDATE items SET stock = ?, updatedate = ? WHERE id = ?';
              // SQL文を実行する準備
              $stmt = $dbh->prepare($sql);
              // SQL文のプレースホルダに値をバインド
              $stmt->bindValue(1, $stock, PDO::PARAM_INT);
              $stmt->bindValue(2, $date, PDO::PARAM_STR);
              $stmt->bindValue(3, $rec['id'], PDO::PARAM_INT);
              // SQLを実行
              $stmt->execute();
            } catch (PDOException $e) {
              throw $e;
            }
        }
    }
    return $err_msg;
}

?>
