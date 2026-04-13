<?php require_once __DIR__ . '/../../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー編集 - adminkit</title>
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
            <li><a href="list.php">ユーザー管理</a></li>
            <li aria-current="page">編集</li>
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
            <h1>ユーザー編集</h1>
            <div class="l-cluster">
              <button class="c-button primary small"><i data-lucide="save"></i>保存</button>
            </div>
          </header>

          <form class="contents">
            <section>
              <h2>基本情報</h2>
              <div class="c-fields">
                <label>
                  <span>名前</span>
                  <input type="text" value="田中太郎" required>
                </label>
                <label>
                  <span>メールアドレス</span>
                  <input type="email" value="tanaka@example.com" required>
                </label>
                <label>
                  <span>電話番号</span>
                  <input type="tel" value="090-1234-5678">
                </label>
              </div>
            </section>

            <section>
              <h2>権限</h2>
              <div class="c-fields">
                <label>
                  <span>ロール</span>
                  <select>
                    <option selected>管理者</option>
                    <option>編集者</option>
                    <option>閲覧者</option>
                  </select>
                </label>
                <label class="toggle">
                  <input type="checkbox" checked>
                  <span>アカウント有効</span>
                  <small>無効にするとログインできなくなります</small>
                </label>
              </div>
            </section>

            <section>
              <h2>プロフィール</h2>
              <div class="c-fields">
                <label>
                  <span>自己紹介</span>
                  <textarea rows="4">よろしくお願いします。</textarea>
                </label>
                <label>
                  <span>アバター</span>
                  <input type="file" accept="image/*">
                </label>
              </div>
            </section>

            <!-- アクションバー -->
            <div class="c-action-bar sticky" role="toolbar" aria-label="フォーム操作">
              <div class="l-cluster">
                <a href="list.php" class="c-button ghost">キャンセル</a>
                <button type="submit" class="c-button primary">保存</button>
              </div>
            </div>
          </form>

        </div>
      </main>
    </div>
  </div>

</body>
</html>
