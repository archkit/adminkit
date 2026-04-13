<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一般設定 - adminkit</title>
  <?php part('resources'); ?>
</head>
<body>
  <a href="#main" class="skip-link">メインコンテンツへ</a>

  <div class="shell" data-layout="sidebar">
    <!-- モバイルヘッダー -->
    <div class="mobile-header">
      <span>adminkit</span>
      <button data-js-sidebar aria-label="メニュー"><i data-lucide="menu"></i></button>
    </div>

    <?php part('sidebar'); ?>

    <div class="shell-main">
      <main id="main">
        <!-- パンくず帯 -->
        <nav class="main-nav" aria-label="パンくず">
          <ol class="c-breadcrumb">
            <li><a href="/index.php" aria-label="ダッシュボード"><i data-lucide="house"></i></a></li>
            <li><a href="#">設定</a></li>
            <li aria-current="page">一般設定</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
            <a href="#" class="c-button ghost small"><i data-lucide="circle-help"></i></a>
          </div>
        </nav>

        <div class="l-stack main-content">

          <!-- ページヘッダー -->
          <header class="page-header">
            <h1>一般設定</h1>
          </header>

          <form class="contents">
            <!-- サイト情報 -->
            <section>
              <h2>サイト情報</h2>
              <div class="c-fields horizontal">
                <label>
                  <span>サイト名</span>
                  <input type="text" value="My Application">
                </label>
                <label>
                  <span>サイトURL</span>
                  <input type="url" value="https://example.com">
                </label>
              </div>
            </section>

            <!-- 通知設定 -->
            <section>
              <h2>通知設定</h2>
              <div class="c-fields">
                <label class="toggle">
                  <input type="checkbox" role="switch" checked>
                  <span>メール通知</span>
                  <small>重要な更新をメールで受け取ります</small>
                </label>
                <label class="toggle">
                  <input type="checkbox" role="switch">
                  <span>Slack通知</span>
                  <small>Slackチャンネルに通知を送信します</small>
                </label>
              </div>
            </section>

            <!-- 危険な操作 -->
            <section>
              <h2>危険な操作</h2>
              <section class="c-card danger">
                <h3>アカウント削除</h3>
                <p>アカウントを削除すると、すべてのデータが完全に消去されます。この操作は取り消せません。</p>
                <button type="button" class="c-button danger">アカウントを削除する</button>
              </section>
            </section>

            <div class="l-cluster right">
              <button type="submit" class="c-button primary">保存</button>
            </div>
          </form>

        </div>
      </main>
    </div>
  </div>

</body>
</html>
