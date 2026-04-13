<?php require_once __DIR__ . '/../../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>記事一覧 - adminkit</title>
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
            <li aria-current="page">一覧</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
          </div>
        </nav>

        <div class="l-stack main-content full">

          <header class="page-header">
            <h1>記事一覧</h1>
            <div class="l-cluster">
              <button class="c-button ghost small"><i data-lucide="download"></i>エクスポート</button>
              <a href="/pages/demo/articles/edit.php" class="c-button primary small"><i data-lucide="plus"></i>新規作成</a>
            </div>
          </header>

          <!-- フィルタ -->
          <form class="c-fields inline" role="search" aria-label="記事検索">
            <label>
              <span class="visually-hidden">検索</span>
              <div class="c-search">
                <i data-lucide="search"></i>
                <input type="search" placeholder="タイトル・本文で検索...">
              </div>
            </label>
            <label>
              <span class="visually-hidden">カテゴリ</span>
              <select>
                <option value="">すべてのカテゴリ</option>
                <option>お知らせ</option>
                <option>ブログ</option>
                <option>ヘルプ</option>
              </select>
            </label>
            <label>
              <span class="visually-hidden">ステータス</span>
              <select>
                <option value="">すべてのステータス</option>
                <option>公開</option>
                <option>下書き</option>
                <option>アーカイブ</option>
              </select>
            </label>
            <button type="submit" class="c-button primary">検索</button>
          </form>

          <!-- テーブル -->
          <div class="c-table-scroll">
            <table class="c-table" data-js-table-check="article-bulk">
              <thead>
                <tr>
                  <th><input type="checkbox" aria-label="全選択"></th>
                  <th aria-sort="none"><button>タイトル</button></th>
                  <th>カテゴリ</th>
                  <th>著者</th>
                  <th aria-sort="descending"><button>公開日</button></th>
                  <th>ステータス</th>
                  <th class="num">PV</th>
                  <th class="action"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" aria-label="選択"></td>
                  <td><a href="/pages/demo/articles/detail.php?id=1">2026年の展望 — テクノロジーと社会の変化</a></td>
                  <td><span class="c-tag">ブログ</span></td>
                  <td>田中太郎</td>
                  <td>2026-04-10</td>
                  <td><span class="c-badge success">公開</span></td>
                  <td class="num">1,284</td>
                  <td class="action">
                    <div class="c-dropdown">
                      <button class="c-button ghost small" popovertarget="art-menu-1" aria-haspopup="menu"><i data-lucide="more-horizontal"></i></button>
                      <ul popover id="art-menu-1" role="menu">
                        <li role="presentation"><a href="/pages/demo/articles/edit.php?id=1" role="menuitem"><i data-lucide="edit"></i>編集</a></li>
                        <li role="presentation"><a href="/pages/demo/articles/detail.php?id=1" role="menuitem"><i data-lucide="eye"></i>プレビュー</a></li>
                        <li role="presentation"><button role="menuitem"><i data-lucide="copy"></i>複製</button></li>
                        <li role="separator"><hr></li>
                        <li role="presentation"><button role="menuitem" class="danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i>削除</button></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" aria-label="選択"></td>
                  <td><a href="/pages/demo/articles/detail.php?id=2">新機能のお知らせ: ダッシュボードのリニューアル</a></td>
                  <td><span class="c-tag">お知らせ</span></td>
                  <td>佐藤花子</td>
                  <td>2026-04-08</td>
                  <td><span class="c-badge success">公開</span></td>
                  <td class="num">856</td>
                  <td class="action">
                    <div class="c-dropdown">
                      <button class="c-button ghost small" popovertarget="art-menu-2" aria-haspopup="menu"><i data-lucide="more-horizontal"></i></button>
                      <ul popover id="art-menu-2" role="menu">
                        <li role="presentation"><a href="/pages/demo/articles/edit.php?id=2" role="menuitem"><i data-lucide="edit"></i>編集</a></li>
                        <li role="presentation"><a href="/pages/demo/articles/detail.php?id=2" role="menuitem"><i data-lucide="eye"></i>プレビュー</a></li>
                        <li role="presentation"><button role="menuitem"><i data-lucide="copy"></i>複製</button></li>
                        <li role="separator"><hr></li>
                        <li role="presentation"><button role="menuitem" class="danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i>削除</button></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" aria-label="選択"></td>
                  <td><a href="/pages/demo/articles/detail.php?id=3">はじめてのガイド: アカウント設定の手順</a></td>
                  <td><span class="c-tag">ヘルプ</span></td>
                  <td>田中太郎</td>
                  <td>2026-04-05</td>
                  <td><span class="c-badge success">公開</span></td>
                  <td class="num">2,341</td>
                  <td class="action">
                    <div class="c-dropdown">
                      <button class="c-button ghost small" popovertarget="art-menu-3" aria-haspopup="menu"><i data-lucide="more-horizontal"></i></button>
                      <ul popover id="art-menu-3" role="menu">
                        <li role="presentation"><a href="/pages/demo/articles/edit.php?id=3" role="menuitem"><i data-lucide="edit"></i>編集</a></li>
                        <li role="presentation"><a href="/pages/demo/articles/detail.php?id=3" role="menuitem"><i data-lucide="eye"></i>プレビュー</a></li>
                        <li role="presentation"><button role="menuitem"><i data-lucide="copy"></i>複製</button></li>
                        <li role="separator"><hr></li>
                        <li role="presentation"><button role="menuitem" class="danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i>削除</button></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" aria-label="選択"></td>
                  <td><a href="/pages/demo/articles/detail.php?id=4">メンテナンスのお知らせ（4月15日）</a></td>
                  <td><span class="c-tag">お知らせ</span></td>
                  <td>鈴木一郎</td>
                  <td></td>
                  <td><span class="c-badge">下書き</span></td>
                  <td class="num">—</td>
                  <td class="action">
                    <div class="c-dropdown">
                      <button class="c-button ghost small" popovertarget="art-menu-4" aria-haspopup="menu"><i data-lucide="more-horizontal"></i></button>
                      <ul popover id="art-menu-4" role="menu">
                        <li role="presentation"><a href="/pages/demo/articles/edit.php?id=4" role="menuitem"><i data-lucide="edit"></i>編集</a></li>
                        <li role="presentation"><a href="/pages/demo/articles/detail.php?id=4" role="menuitem"><i data-lucide="eye"></i>プレビュー</a></li>
                        <li role="separator"><hr></li>
                        <li role="presentation"><button role="menuitem" class="danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i>削除</button></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" aria-label="選択"></td>
                  <td><a href="/pages/demo/articles/detail.php?id=5">APIドキュメント v2 の変更点まとめ</a></td>
                  <td><span class="c-tag">ブログ</span></td>
                  <td>佐藤花子</td>
                  <td>2026-03-01</td>
                  <td><span class="c-badge warning">アーカイブ</span></td>
                  <td class="num">4,120</td>
                  <td class="action">
                    <div class="c-dropdown">
                      <button class="c-button ghost small" popovertarget="art-menu-5" aria-haspopup="menu"><i data-lucide="more-horizontal"></i></button>
                      <ul popover id="art-menu-5" role="menu">
                        <li role="presentation"><a href="/pages/demo/articles/edit.php?id=5" role="menuitem"><i data-lucide="edit"></i>編集</a></li>
                        <li role="presentation"><button role="menuitem"><i data-lucide="undo-2"></i>復元</button></li>
                        <li role="separator"><hr></li>
                        <li role="presentation"><button role="menuitem" class="danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i>削除</button></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- ページネーション -->
          <nav class="c-pagination" aria-label="ページネーション">
            <ul>
              <li><span aria-disabled="true"><i data-lucide="chevron-left"></i></span></li>
              <li><a href="#" aria-current="page">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i data-lucide="chevron-right"></i></a></li>
            </ul>
          </nav>


        </div>
        <!-- 一括操作バー -->
        <div class="c-action-bar sticky" role="toolbar" aria-label="一括操作" data-js-table-check-show="article-bulk" hidden>
          <span><strong>0</strong>件選択中</span>
          <div class="l-cluster">
            <button class="c-button small">エクスポート</button>
            <button class="c-button small danger">削除</button>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- 削除確認ダイアログ -->
  <dialog class="c-modal" data-js-dialog="delete-dialog" aria-labelledby="delete-title">
    <section>
      <header>
        <h3 id="delete-title">記事の削除</h3>
        <button class="c-button ghost small" data-js-close aria-label="閉じる"><i data-lucide="x"></i></button>
      </header>
      <div class="body">
        <p>この記事を削除してもよろしいですか？この操作は取り消せません。</p>
      </div>
      <footer>
        <button class="c-button" data-js-close>キャンセル</button>
        <button class="c-button danger" data-js-close>削除する</button>
      </footer>
    </section>
  </dialog>

</body>
</html>
