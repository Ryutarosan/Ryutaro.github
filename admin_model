<?php

// ユーザ情報を登録する
function insert_item($dbh, $name, $price, $img, $date, $status, $stock) {

  try {
    // SQLを作成
    $sql = 'INSERT INTO items (name, price, img, createdate, updatedate, status,stock)
      VALUES (?, ?, ?, ?, ?, ?, ?)';
    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);
    // SQL文のプレースホルダに値をバインド
    $stmt->bindValue(1, $name,    PDO::PARAM_STR);
    $stmt->bindValue(2, $price, PDO::PARAM_INT);
    $stmt->bindValue(3, $img, PDO::PARAM_STR);
    $stmt->bindValue(4, $date, PDO::PARAM_STR);
    $stmt->bindValue(5, $date, PDO::PARAM_STR);
    $stmt->bindValue(6, $status, PDO::PARAM_INT);
    $stmt->bindValue(7, $stock, PDO::PARAM_INT);
    // SQLを実行
    $stmt->execute();
    // レコードの取得
    //$rows = $stmt->fetchAll();

  } catch (PDOException $e) {
    throw $e;
  }
}

// 在庫情報を登録する
function insert_item_stock($dbh, $item_id, $stock, $date) {

  try {
    // SQL文を作成
    $sql = 'INSERT INTO items (id, stock, createdate, updatedate)
      VALUES (?, ?, ?, ?)';
    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);
    // SQL文のプレースホルダに値をバインド
    $stmt->bindValue(1, $item_id, PDO::PARAM_INT);
    $stmt->bindValue(2, $stock, PDO::PARAM_INT);
    $stmt->bindValue(3, $date, PDO::PARAM_STR);
    $stmt->bindValue(4, $date, PDO::PARAM_STR);
    // SQLを実行
    $stmt->execute();

  } catch (PDOException $e) {
    throw $e;
  }

}

// 在庫数の更新
function upadte_item_stock($dbh, $item_id, $update_stock, $date) {

  try {
    // SQL文を作成
    $sql = 'UPDATE items SET stock = ?, updatedate = ? WHERE id = ?';

    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);
    // SQL文のプレースホルダに値をバインド
    $stmt->bindValue(1, $update_stock, PDO::PARAM_INT);
    $stmt->bindValue(2, $date, PDO::PARAM_STR);
    $stmt->bindValue(3, $item_id, PDO::PARAM_INT);
    // SQLを実行
    $stmt->execute();
    // レコードの取得
    //$rows = $stmt->fetchAll();

  } catch (PDOException $e) {
    throw $e;
  }

}

// ステータスをの更新
function upadte_item_status($dbh, $item_id, $change_status, $date) {

  try {
    // SQL文を作成
    $sql = 'UPDATE items SET status = ?, updatedate = ? WHERE id = ?';
    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);
    // SQL文のプレースホルダに値をバインド
    $stmt->bindValue(1, $change_status, PDO::PARAM_INT);
    $stmt->bindValue(2, $date, PDO::PARAM_STR);
    $stmt->bindValue(3, $item_id, PDO::PARAM_INT);
    // SQLを実行
    $stmt->execute();

  } catch (PDOException $e) {
    throw $e;
  }

}

// 商品情報を削除
function delete_item($dbh, $item_id) {

  try {
    // SQL文を作成
    $sql = 'DELETE from items WHERE id = ?';
    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);
    // SQL文のプレースホルダに値をバインド
    $stmt->bindValue(1, $item_id, PDO::PARAM_INT);
    // SQLを実行
    $stmt->execute();
    // レコードの取得
    //$rows = $stmt->fetchAll();

  } catch (PDOException $e) {
    throw $e;
  }

}

// 在庫情報を削除
function delete_item_stock($dbh, $item_id) {

  try {
    // SQL文を作成
    $sql = 'DELETE from items WHERE id = ?';
    // SQL文を実行する準備
    $stmt = $dbh->prepare($sql);
    // SQL文のプレースホルダに値をバインド
    $stmt->bindValue(1, $item_id, PDO::PARAM_INT);
    // SQLを実行
    $stmt->execute();
    // レコードの取得
    //$rows = $stmt->fetchAll();

  } catch (PDOException $e) {
    throw $e;
  }

}

// 商品情報を取得
function get_item_list_all($dbh) {

  try {
    // SQL文を作成
    $sql = 'SELECT id, name, price,
        img, status, stock
      FROM items';
      

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
