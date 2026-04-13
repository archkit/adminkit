<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>サイドバーレイアウト - adminkit</title>
  <?php part('resources'); ?>
</head>
<body>
  <a href="#main" class="skip-link">メインコンテンツへ</a>

  <div class="shell" data-layout="sidebar">
    <div class="mobile-header">
      <span>adminkit</span>
      <button data-js-sidebar aria-label="メニュー"><i data-lucide="menu"></i></button>
    </div>

    <?php part('sidebar'); ?>

    <div class="shell-main">
      <main id="main">
        <nav class="main-nav" aria-label="パンくず">
          <ol class="c-breadcrumb">
            <li><a href="/index.php" aria-label="ダッシュボード"><i data-lucide="house"></i></a></li>
            <li><a href="#">レイアウト</a></li>
            <li aria-current="page">サイドバー</li>
          </ol>
        </nav>

        <div class="l-stack main-content">
          <header class="page-header">
            <h1>サイドバーレイアウト</h1>
          </header>

          <section>
            <h2>概要</h2>
            <p><code>data-layout="sidebar"</code> を使用した標準的な管理画面レイアウトです。左側に固定幅のサイドバー、右側にメインコンテンツを配置します。</p>
          </section>

          <section>
            <h2>特徴</h2>
            <ul class="c-list">
              <li>デスクトップ: 240px 幅のフルサイドバー</li>
              <li>タブレット: 64px 幅のミニサイドバー（ホバーで展開）</li>
              <li>モバイル: ハンバーガーメニューによるドロワー表示</li>
            </ul>
          </section>

          <section>
            <h2>使い方</h2>
            <pre><code>&lt;div class="shell" data-layout="sidebar"&gt;
  &lt;aside class="shell-sidebar"&gt;...&lt;/aside&gt;
  &lt;div class="shell-main"&gt;
    &lt;main&gt;...&lt;/main&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
          </section>
        </div>
      </main>
    </div>
  </div>

</body>
</html>
