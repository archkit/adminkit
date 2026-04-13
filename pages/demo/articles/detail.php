<?php require_once __DIR__ . '/../../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>記事詳細 - adminkit</title>
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
            <li><a href="/pages/demo/articles/">記事</a></li>
            <li aria-current="page">詳細</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
          </div>
        </nav>

        <div class="l-stack main-content">

          <header class="page-header">
            <h1>2026年の展望 — テクノロジーと社会の変化</h1>
            <div class="l-cluster">
              <a href="/pages/demo/articles/edit.php?id=1" class="c-button small"><i data-lucide="edit"></i>編集</a>
              <button class="c-button small danger"><i data-lucide="trash-2"></i>削除</button>
            </div>
          </header>

          <!-- メタ情報 -->
          <section>
            <div class="l-cluster">
              <span class="c-badge success">公開</span>
              <span class="c-tag">ブログ</span>
              <small>田中太郎 &middot; 2026-04-10</small>
            </div>
            <div class="c-tag-list">
              <span class="c-tag">テクノロジー</span>
              <span class="c-tag">AI</span>
              <span class="c-tag">2026</span>
            </div>
          </section>

          <!-- 統計 -->
          <section>
            <h2 class="visually-hidden">統計</h2>
            <div class="l-grid cols-4">
              <div class="c-stats">
                <h3>PV</h3>
                <span class="c-stats-value">1,284</span>
              </div>
              <div class="c-stats">
                <h3>コメント</h3>
                <span class="c-stats-value">23</span>
              </div>
              <div class="c-stats">
                <h3>シェア</h3>
                <span class="c-stats-value">45</span>
              </div>
              <div class="c-stats">
                <h3>読了率</h3>
                <span class="c-stats-value">68%</span>
              </div>
            </div>
          </section>

          <!-- 本文プレビュー -->
          <section>
            <h2>本文</h2>
            <section class="c-card">
              <p>テクノロジーの進化は加速を続けています。</p>
              <p>2026年、私たちの働き方や生活はどのように変わるのでしょうか。</p>
              <p>本記事では、AIの発展、リモートワークの定着、そしてサステナビリティへの取り組みという3つの視点から、今年の展望を探ります。</p>
            </section>
          </section>

          <!-- SEO情報 -->
          <section>
            <h2>SEO</h2>
            <dl class="c-dl bordered">
              <div><dt>メタタイトル</dt><dd>2026年の展望 — テクノロジーと社会の変化 | adminkit</dd></div>
              <div><dt>メタディスクリプション</dt><dd>AI、リモートワーク、サステナビリティの3つの視点から2026年の展望を探る記事です。</dd></div>
              <div><dt>スラッグ</dt><dd>/blog/2026-outlook</dd></div>
            </dl>
          </section>

          <!-- コメント -->
          <section>
            <h2>コメント <span class="c-badge">23</span></h2>
            <ul class="c-list bordered">
              <li>
                <div class="l-cluster">
                  <span class="c-avatar small">佐</span>
                  <strong>佐藤花子</strong>
                  <small>2026-04-10 15:30</small>
                </div>
                <p>素晴らしい記事ですね。AIの部分が特に参考になりました。</p>
              </li>
              <li>
                <div class="l-cluster">
                  <span class="c-avatar small">鈴</span>
                  <strong>鈴木一郎</strong>
                  <small>2026-04-10 16:45</small>
                </div>
                <p>リモートワークのセクションについてもっと詳しく聞きたいです。</p>
              </li>
              <li>
                <div class="l-cluster">
                  <span class="c-avatar small">山</span>
                  <strong>山田次郎</strong>
                  <small>2026-04-11 09:12</small>
                </div>
                <p>サステナビリティの取り組み事例をもう少し追加していただけると嬉しいです。</p>
              </li>
            </ul>
          </section>

        </div>
      </main>
    </div>
  </div>

</body>
</html>
