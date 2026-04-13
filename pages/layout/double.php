<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ダブルサイドバーレイアウト - adminkit</title>
  <?php part('resources'); ?>
</head>
<body>
  <a href="#main" class="skip-link">メインコンテンツへ</a>

  <div class="shell" data-layout="double">
    <div class="mobile-header">
      <span>adminkit</span>
      <button data-js-sidebar aria-label="メニュー"><i data-lucide="menu"></i></button>
    </div>

    <?php part('sidebar'); ?>

    <!-- サブサイドバー -->
    <nav class="shell-sub-sidebar" aria-label="設定メニュー">
      <h2>設定</h2>
      <ul>
        <li><a href="#" aria-current="page">一般</a></li>
        <li><a href="#">表示</a></li>
        <li><a href="#">通知</a></li>
        <li><a href="#">セキュリティ</a></li>
        <li><a href="#">API</a></li>
        <li><a href="#">インテグレーション</a></li>
        <li><a href="#">メンバー</a></li>
        <li><a href="#">請求</a></li>
      </ul>
    </nav>

    <div class="shell-main">
      <main id="main">
        <nav class="main-nav" aria-label="パンくず">
          <ol class="c-breadcrumb">
            <li><a href="/index.php" aria-label="ダッシュボード"><i data-lucide="house"></i></a></li>
            <li><a href="#">設定</a></li>
            <li aria-current="page">一般</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
          </div>
        </nav>

        <div class="l-stack main-content">

          <header class="page-header">
            <h1>一般設定</h1>
          </header>

          <section>
            <h2>概要</h2>
            <p><code>data-layout="double"</code> を使用したダブルサイドバーレイアウトです。メインサイドバー + サブサイドバーの2段構成で、設定画面などの階層的なナビゲーションに適しています。</p>
          </section>

          <section>
            <h2>特徴</h2>
            <ul class="c-list">
              <li>メインサイドバー: アプリ全体のナビゲーション</li>
              <li>サブサイドバー: セクション内のページ切り替え</li>
              <li>3カラム Grid レイアウト</li>
            </ul>
          </section>

          <section>
            <h2>サンプルフォーム</h2>
            <div class="c-fields">
              <label>
                <span>アプリ名</span>
                <input type="text" value="My Application">
              </label>
              <label>
                <span>説明</span>
                <textarea rows="3" placeholder="アプリの説明..."></textarea>
              </label>
              <label>
                <span>タイムゾーン</span>
                <select>
                  <option>Asia/Tokyo (UTC+9)</option>
                  <option>America/New_York (UTC-5)</option>
                  <option>Europe/London (UTC+0)</option>
                </select>
              </label>
            </div>
            <div class="l-cluster right">
              <button class="c-button primary">保存</button>
            </div>
          </section>

        </div>
      </main>
    </div>
  </div>

</body>
</html>
