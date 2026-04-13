<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>フッター付きレイアウト - adminkit</title>
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
            <li aria-current="page">フッター付き</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
          </div>
        </nav>

        <div class="l-stack main-content">

          <header class="page-header">
            <h1>フッター付きレイアウト</h1>
          </header>

          <section>
            <h2>概要</h2>
            <p><code>shell-main</code> 内、<code>main</code> の**外**に <code>&lt;footer class="shell-footer"&gt;</code> を配置するパターンです。シェルレベルの要素なので action-bar 等の main 内部要素と干渉しません。</p>
          </section>

          <section>
            <h2>特徴</h2>
            <ul class="c-list">
              <li>shell-main の Grid 2行目（main の外）に配置</li>
              <li>action-bar と独立して動作</li>
              <li>コピーライト、リンク、バージョン情報などに利用</li>
            </ul>
          </section>

          <section>
            <h2>使い方</h2>
            <pre><code>&lt;div class="shell-main"&gt;
  &lt;main&gt;
    &lt;nav class="main-nav"&gt;...&lt;/nav&gt;
    &lt;div class="l-stack main-content"&gt;...&lt;/div&gt;
  &lt;/main&gt;
  &lt;footer class="shell-footer"&gt;
    &lt;p&gt;&copy; 2026 adminkit&lt;/p&gt;
  &lt;/footer&gt;
&lt;/div&gt;</code></pre>
          </section>

        </div>

      </main>
      <footer class="shell-footer">
        <p>&copy; 2026 adminkit. All rights reserved.</p>
        <nav>
          <a href="#">プライバシーポリシー</a>
          <a href="#">利用規約</a>
          <a href="#">お問い合わせ</a>
        </nav>
      </footer>
    </div>
  </div>

</body>
</html>
