<?php require_once __DIR__ . '/../../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー詳細 - adminkit</title>
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
            <li><a href="/pages/demo/users/">ユーザー</a></li>
            <li aria-current="page">田中太郎</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
          </div>
        </nav>

        <div class="l-stack main-content">

          <header class="page-header">
            <div class="l-cluster">
              <span class="c-avatar large" aria-label="田中太郎">田</span>
              <div>
                <h1>ユーザー詳細</h1>
                <small>管理者 <span class="c-badge success">有効</span></small>
              </div>
            </div>
            <div class="l-cluster">
              <a href="/pages/demo/users/edit.php?id=1" class="c-button small"><i data-lucide="edit"></i>編集</a>
              <button class="c-button small danger"><i data-lucide="trash-2"></i>削除</button>
            </div>
          </header>

          <!-- 基本情報 -->
          <section>
            <h2>基本情報</h2>
            <dl class="c-dl bordered">
              <div><dt>名前</dt><dd>田中太郎</dd></div>
              <div><dt>メールアドレス</dt><dd>tanaka@example.com</dd></div>
              <div><dt>電話番号</dt><dd>090-1234-5678</dd></div>
              <div><dt>ロール</dt><dd>管理者</dd></div>
              <div><dt>登録日</dt><dd>2025-01-15</dd></div>
              <div><dt>最終ログイン</dt><dd>2026-04-10 14:32</dd></div>
            </dl>
          </section>

          <!-- 統計 -->
          <section>
            <h2>アクティビティ</h2>
            <div class="l-grid cols-3">
              <div class="c-stats">
                <h3>投稿数</h3>
                <span class="c-stats-value">42</span>
              </div>
              <div class="c-stats">
                <h3>コメント数</h3>
                <span class="c-stats-value">128</span>
              </div>
              <div class="c-stats">
                <h3>ログイン回数</h3>
                <span class="c-stats-value">356</span>
              </div>
            </div>
          </section>

          <!-- 最近のアクティビティ -->
          <section>
            <h2>最近のアクティビティ</h2>
            <ul class="c-list bordered">
              <li>記事「2026年の展望」を投稿しました <small>2時間前</small></li>
              <li>プロフィール画像を変更しました <small>昨日</small></li>
              <li>記事「新機能のお知らせ」にコメントしました <small>3日前</small></li>
              <li>ユーザー「佐藤花子」の権限を変更しました <small>1週間前</small></li>
            </ul>
          </section>

          <!-- 権限 -->
          <section>
            <h2>権限</h2>
            <div class="c-tag-list">
              <span class="c-tag primary">ダッシュボード閲覧</span>
              <span class="c-tag primary">ユーザー管理</span>
              <span class="c-tag primary">コンテンツ編集</span>
              <span class="c-tag primary">設定変更</span>
              <span class="c-tag primary">ログ閲覧</span>
            </div>
          </section>

        </div>
      </main>
    </div>
  </div>

</body>
</html>
