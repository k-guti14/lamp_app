<?php
  include 'lib/connect.php';

  // エラーメッセージ
  $err = null;

  if (isset($_POST['name']) && isset($_POST['password'])){
    $db = new connect();

    // 実行したいSQL
    $select = "SELECT * FROM users WHERE name=:name";
    // 第2引数でどのパラメータにどの変数を割り当てるか決める
    $stmt = $db->query($select, array(':name' => $_POST['name']));
    // レコード1件を連想配列として取得する
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result && password_verify($_POST['password'], $result['password'])){
      // 結果が存在し、パスワードも正しい場合
      session_start();
      $_SESSION['id'] = $result['id'];
      header('Location: backend.php');
    } else {
      $err = "ログインできませんでした。";
    }
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
</head>
<body>
  <form action="login.php" method="post">
    <h1 class="h3 mb-3 fw-normal">ログイン画面</h1>
<?php
  if (!is_null($err)){
    echo '<div class="alert alert-danger">'.$err.'</div>';
  }
?>
    <label class="visually-hidden">ユーザ名</label>
    <input type="text" name="name" class="form-control" placeholder="ユーザ名" required autofocus>
    <label class="visually-hidden">パスワード</label>
    <input type="password" name="password" class="form-control" placeholder="パスワード" required>
    <button class="w-100 btn btn-lg btn-primary" type="submit">ログインする</button>
  </form>
</body>
</html>