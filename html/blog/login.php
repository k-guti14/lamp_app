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