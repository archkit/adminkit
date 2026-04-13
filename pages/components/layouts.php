<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>レイアウト - adminkit</title>
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
            <li aria-current="page">レイアウト</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
            <a href="#" class="c-button ghost small"><i data-lucide="circle-help"></i></a>
          </div>
        </nav>

        <div class="l-stack main-content full">
          <header class="page-header">
            <h1>レイアウト</h1>
          </header>

          <!-- ================================================
               Layout Primitives
               ================================================ -->
          <section>
            <h2>Layout Primitives</h2>

            <section>
              <h3>l-stack</h3>
              <div class="l-stack demo-container">
                <div class="demo-block">Stack Item 1</div>
                <div class="demo-block">Stack Item 2</div>
                <div class="demo-block">Stack Item 3</div>
              </div>
            </section>

            <section>
              <h3>l-cluster</h3>
              <div class="l-cluster demo-container">
                <span class="c-badge primary">Tag A</span>
                <span class="c-badge success">Tag B</span>
                <span class="c-badge warning">Tag C</span>
                <span class="c-badge danger">Tag D</span>
                <span class="c-badge">Tag E</span>
              </div>
            </section>

            <section>
              <h3>l-grid</h3>
              <div class="l-grid cols-3">
                <div class="demo-block-lg">1</div>
                <div class="demo-block-lg">2</div>
                <div class="demo-block-lg">3</div>
              </div>
            </section>

            <section>
              <h3>l-sidebar</h3>
              <div class="l-sidebar demo-container">
                <div class="demo-block-muted">Main content area. This takes up the remaining space.</div>
                <div class="demo-block-lg">Sidebar</div>
              </div>
            </section>

            <section>
              <h3>l-sidebar.reverse（左サイドバー）</h3>
              <div class="l-sidebar reverse demo-container">
                <div class="demo-block-muted">Main content area.</div>
                <div class="demo-block-lg">Sidebar（左に表示）</div>
              </div>
            </section>

            <section>
              <h3>l-switcher</h3>
              <div class="l-switcher demo-container">
                <div class="demo-block-lg">Column A</div>
                <div class="demo-block-lg">Column B</div>
                <div class="demo-block-lg">Column C</div>
              </div>
            </section>
          </section>


        </div>
      </main>
    </div>
  </div>

</body>
</html>
