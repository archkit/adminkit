<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ミニサイドバーレイアウト - adminkit</title>
  <?php part('resources'); ?>
</head>
<body>
  <a href="#main" class="skip-link">メインコンテンツへ</a>

  <div class="shell" data-layout="mini">
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
            <li aria-current="page">ミニサイドバー</li>
          </ol>
        </nav>

        <div class="l-stack main-content">
          <header class="page-header">
            <h1>ミニサイドバーレイアウト</h1>
          </header>

          <section>
            <h2>概要</h2>
            <p><code>data-layout="mini"</code> を使用したコンパクトなサイドバーレイアウトです。アイコンのみを常時表示し、ホバーで展開します。</p>
          </section>

          <section>
            <h2>特徴</h2>
            <ul class="c-list">
              <li>デスクトップ: 64px 幅のアイコンサイドバー</li>
              <li>ホバー時にラベルが表示され、不透明背景で重なる</li>
              <li>モバイル: 通常のサイドバーと同様にドロワー表示</li>
              <li>コンテンツ領域を最大化したい場合に最適</li>
            </ul>
          </section>

          <section>
            <h2>使い方</h2>
            <pre><code>&lt;div class="shell" data-layout="mini"&gt;
  &lt;aside class="shell-sidebar"&gt;...&lt;/aside&gt;
  &lt;div class="shell-main"&gt;
    &lt;main&gt;...&lt;/main&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
          </section>

          <section>
            <h2>サンプルコンテンツ</h2>
            <div class="l-grid cols-3">
              <div class="c-stats">
                <h3>アクティブユーザー</h3>
                <span class="c-stats-value">842</span>
              </div>
              <div class="c-stats">
                <h3>セッション</h3>
                <span class="c-stats-value">2,451</span>
              </div>
              <div class="c-stats">
                <h3>直帰率</h3>
                <span class="c-stats-value">32.4%</span>
              </div>
            </div>
          </section>
        </div>
      </main>
    </div>
  </div>

</body>
</html>
