<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン - adminkit</title>
  <?php part('resources'); ?>
</head>
<body>
  <main id="main" class="shell-standalone narrow">
    <form>
      <h1>adminkit</h1>
      <div class="c-fields">
        <label>
          <span>メールアドレス</span>
          <input type="email" required placeholder="you@example.com">
        </label>
        <label>
          <span>パスワード</span>
          <input type="password" required placeholder="パスワード">
        </label>
      </div>
      <button type="submit" class="c-button primary full">ログイン</button>
      <div class="c-divider" role="separator">または</div>
      <button type="button" class="c-button full">Googleでログイン</button>
      <p><a href="#">パスワードを忘れた方</a></p>
    </form>
  </main>

</body>
</html>
