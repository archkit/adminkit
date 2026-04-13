<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>トップナビレイアウト - adminkit</title>
  <?php part('resources'); ?>
</head>
<body>
  <a href="#main" class="skip-link">メインコンテンツへ</a>

  <div class="shell" data-layout="topnav">
    <header class="shell-topnav">
      <span class="logo">adminkit</span>
      <nav aria-label="メインナビゲーション">
        <a href="/index.php"><i data-lucide="layout-dashboard"></i>ダッシュボード</a>
        <a href="#" aria-current="page"><i data-lucide="panel-top"></i>トップナビ</a>
        <a href="/pages/components/widgets.php"><i data-lucide="blocks"></i>コンポーネント</a>
        <a href="/pages/demo/settings.php"><i data-lucide="settings"></i>設定</a>
      </nav>
      <div class="actions">
        <?php part('theme-switcher'); ?>
        <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
        <a href="#" class="c-button ghost small"><i data-lucide="log-out"></i></a>
      </div>
    </header>

    <div class="shell-main">
      <main id="main">
        <div class="l-stack main-content center">
          <header class="page-header">
            <h1>トップナビレイアウト</h1>
          </header>

          <section>
            <h2>概要</h2>
            <p><code>data-layout="topnav"</code> を使用したトップナビゲーションレイアウトです。画面上部にナビバーを配置し、コンテンツを全幅で表示します。</p>
          </section>

          <section>
            <h2>特徴</h2>
            <ul class="c-list">
              <li>ナビゲーション項目が少ない場合に最適</li>
              <li>コンテンツ領域が横幅いっぱいに使える</li>
              <li>公開設定画面やシンプルな管理画面に適している</li>
              <li>モバイル: ナビリンクを非表示にしてハンバーガーメニュー化（JS 制御）</li>
            </ul>
          </section>

          <section>
            <h2>使い方</h2>
            <pre><code>&lt;div class="shell" data-layout="topnav"&gt;
  &lt;header class="shell-topnav"&gt;
    &lt;span class="logo"&gt;Logo&lt;/span&gt;
    &lt;nav&gt;
      &lt;a href="#"&gt;リンク&lt;/a&gt;
    &lt;/nav&gt;
    &lt;div class="actions"&gt;...&lt;/div&gt;
  &lt;/header&gt;
  &lt;div class="shell-main"&gt;
    &lt;main&gt;...&lt;/main&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
          </section>

          <section>
            <h2>サンプルコンテンツ</h2>
            <div class="l-grid cols-4">
              <div class="c-stats">
                <h3>ユーザー数</h3>
                <span class="c-stats-value">1,284</span>
                <span class="c-stats-sub">前月比 <span class="c-badge success">+12.5%</span></span>
              </div>
              <div class="c-stats">
                <h3>注文数</h3>
                <span class="c-stats-value">568</span>
                <span class="c-stats-sub">前月比 <span class="c-badge success">+8.2%</span></span>
              </div>
              <div class="c-stats">
                <h3>売上</h3>
                <span class="c-stats-value">¥3.4M</span>
                <span class="c-stats-sub">前月比 <span class="c-badge warning">-2.1%</span></span>
              </div>
              <div class="c-stats">
                <h3>CVR</h3>
                <span class="c-stats-value">3.6%</span>
                <span class="c-stats-sub">前月比 <span class="c-badge success">+0.4%</span></span>
              </div>
            </div>
          </section>
        </div>
      </main>
    </div>
  </div>

</body>
</html>
