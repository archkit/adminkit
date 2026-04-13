<?php require_once __DIR__ . '/../../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>カテゴリ - adminkit</title>
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
            <li><a href="#">記事</a></li>
            <li aria-current="page">カテゴリ</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
          </div>
        </nav>

        <div class="l-stack main-content full">

          <header class="page-header">
            <h1>カテゴリ</h1>
            <div class="l-cluster">
              <button class="c-button primary small" data-js-open="category-dialog"><i data-lucide="plus"></i>新規追加</button>
            </div>
          </header>

          <!-- テーブル -->
          <div class="c-table-scroll">
            <table class="c-table">
              <thead>
                <tr>
                  <th>名前</th>
                  <th>スラッグ</th>
                  <th class="num">記事数</th>
                  <th class="action"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="#">お知らせ</a></td>
                  <td><code>news</code></td>
                  <td class="num">12</td>
                  <td class="action">
                    <button class="c-button ghost small" data-js-open="category-dialog"><i data-lucide="edit"></i></button>
                    <button class="c-button ghost small danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><a href="#">ブログ</a></td>
                  <td><code>blog</code></td>
                  <td class="num">24</td>
                  <td class="action">
                    <button class="c-button ghost small" data-js-open="category-dialog"><i data-lucide="edit"></i></button>
                    <button class="c-button ghost small danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><a href="#">ヘルプ</a></td>
                  <td><code>help</code></td>
                  <td class="num">8</td>
                  <td class="action">
                    <button class="c-button ghost small" data-js-open="category-dialog"><i data-lucide="edit"></i></button>
                    <button class="c-button ghost small danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><a href="#">リリースノート</a></td>
                  <td><code>release</code></td>
                  <td class="num">6</td>
                  <td class="action">
                    <button class="c-button ghost small" data-js-open="category-dialog"><i data-lucide="edit"></i></button>
                    <button class="c-button ghost small danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><a href="#">チュートリアル</a></td>
                  <td><code>tutorial</code></td>
                  <td class="num">15</td>
                  <td class="action">
                    <button class="c-button ghost small" data-js-open="category-dialog"><i data-lucide="edit"></i></button>
                    <button class="c-button ghost small danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </main>
    </div>
  </div>

  <!-- カテゴリ編集ダイアログ -->
  <dialog class="c-modal" data-js-dialog="category-dialog" aria-labelledby="cat-title">
    <section>
      <header>
        <h3 id="cat-title">カテゴリの編集</h3>
        <button class="c-button ghost small" data-js-close aria-label="閉じる"><i data-lucide="x"></i></button>
      </header>
      <div class="body">
        <div class="c-fields">
          <label>
            <span>名前</span>
            <input type="text" placeholder="カテゴリ名">
          </label>
          <label>
            <span>スラッグ</span>
            <input type="text" placeholder="category-slug">
          </label>
        </div>
      </div>
      <footer>
        <button class="c-button" data-js-close>キャンセル</button>
        <button class="c-button primary" data-js-close>保存</button>
      </footer>
    </section>
  </dialog>

  <!-- 削除確認ダイアログ -->
  <dialog class="c-modal" data-js-dialog="delete-dialog" aria-labelledby="delete-title">
    <section>
      <header>
        <h3 id="delete-title">カテゴリの削除</h3>
        <button class="c-button ghost small" data-js-close aria-label="閉じる"><i data-lucide="x"></i></button>
      </header>
      <div class="body">
        <p>このカテゴリを削除してもよろしいですか？カテゴリに属する記事は「未分類」に移動されます。</p>
      </div>
      <footer>
        <button class="c-button" data-js-close>キャンセル</button>
        <button class="c-button danger" data-js-close>削除する</button>
      </footer>
    </section>
  </dialog>

</body>
</html>
