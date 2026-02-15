<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - adminkit</title>
  <link href="css/login.css" rel="stylesheet">
</head>

<body>
  <div class="login adminkit">
    <section>
      <header>
        <h1>adminkit</h1>
        <p>管理画面にログイン</p>
      </header>

      <div class="c-card">
        <form class="c-fields" action="" method="post">
          <label>
            <span>Email</span>
            <input type="email" placeholder="admin@example.com" required autofocus>
          </label>
          <label>
            <span>Password</span>
            <input type="password" placeholder="••••••••" required>
          </label>
          <label class="check">
            <input type="checkbox">
            <span>ログイン状態を保持する</span>
          </label>
          <button type="submit" class="c-button primary">ログイン</button>
        </form>
      </div>

      <p style="text-align: center"><a href="#">パスワードをお忘れですか？</a></p>
    </section>
  </div>
</body>
</html>
