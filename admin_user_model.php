<?php

// ユーザ情報の一覧を取得する
function get_user_list($dbh) {

  try {
    // SQL文を作成
    $sql = 'SELECT username, createdate
     FROM users ORDER BY createdate';

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
