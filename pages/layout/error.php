<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>エラーページ - adminkit</title>
  <?php part('resources'); ?>
</head>
<body>
  <!-- 404 -->
  <main data-error-page="404" class="shell-standalone">
    <section class="c-error-page">
      <h1><span class="error-code">404</span>ページが見つかりません</h1>
      <p>お探しのページは存在しないか、移動した可能性があります。</p>
      <div class="l-cluster center">
        <button data-js-back class="c-button"><i data-lucide="arrow-left"></i>前のページへ</button>
        <a href="/index.php" class="c-button primary"><i data-lucide="home"></i>ダッシュボードへ</a>
      </div>
      <div class="l-cluster center">
        <button class="c-button ghost small" data-js-error-switch="500">500 エラーを表示</button>
      </div>
    </section>
  </main>

  <!-- 500 -->
  <main data-error-page="500" class="shell-standalone" hidden>
    <section class="c-error-page">
      <h1><span class="error-code danger">500</span>サーバーエラー</h1>
      <p>予期しないエラーが発生しました。しばらくしてからもう一度お試しください。</p>
      <div class="l-cluster center">
        <button data-js-reload class="c-button"><i data-lucide="refresh-cw"></i>再読み込み</button>
        <a href="/index.php" class="c-button primary"><i data-lucide="home"></i>ダッシュボードへ</a>
      </div>
      <div class="l-cluster center">
        <button class="c-button ghost small" data-js-error-switch="404">404 エラーを表示</button>
      </div>
    </section>
  </main>

</body>
</html>
