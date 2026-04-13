<?php require_once __DIR__ . '/../../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー一覧 - adminkit</title>
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
            <li><a href="#">ユーザー管理</a></li>
            <li aria-current="page">一覧</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
            <a href="#" class="c-button ghost small"><i data-lucide="circle-help"></i></a>
            <div class="c-dropdown">
              <button class="c-button ghost small" popovertarget="nav-menu" aria-haspopup="menu" aria-expanded="false">
                <i data-lucide="ellipsis"></i>
              </button>
              <ul popover id="nav-menu" role="menu">
                <li role="presentation"><button role="menuitem"><i data-lucide="bookmark"></i>ブックマーク</button></li>
                <li role="presentation"><button role="menuitem"><i data-lucide="share-2"></i>リンクを共有</button></li>
                <li role="separator"><hr></li>
                <li role="presentation"><button role="menuitem"><i data-lucide="flag"></i>問題を報告</button></li>
              </ul>
            </div>
          </div>
        </nav>

        <div class="l-stack main-content full">

          <!-- ページヘッダー -->
          <header class="page-header">
            <h1>ユーザー一覧</h1>
            <div class="l-cluster">
              <button class="c-button ghost small"><i data-lucide="download"></i>エクスポート</button>
              <button class="c-button primary small"><i data-lucide="plus"></i>新規作成</button>
            </div>
          </header>

          <!-- フィルタ -->
          <form class="c-fields inline" role="search" aria-label="ユーザー検索">
            <label>
              <span class="visually-hidden">検索</span>
              <input type="search" placeholder="名前・メールで検索...">
            </label>
            <label>
              <span class="visually-hidden">ロール</span>
              <select>
                <option value="">すべてのロール</option>
                <option>管理者</option>
                <option>編集者</option>
                <option>閲覧者</option>
              </select>
            </label>
            <label>
              <span class="visually-hidden">ステータス</span>
              <select>
                <option value="">すべてのステータス</option>
                <option>有効</option>
                <option>無効</option>
              </select>
            </label>
            <button type="submit" class="c-button primary">検索</button>
          </form>

          <!-- テーブル -->
          <div class="c-table-scroll">
            <table class="c-table" data-js-table-check="user-bulk">
              <thead>
                <tr>
                  <th><input type="checkbox" aria-label="全選択"></th>
                  <th aria-sort="ascending"><button>名前</button></th>
                  <th aria-sort="none"><button>メール</button></th>
                  <th>ロール</th>
                  <th aria-sort="none"><button>登録日</button></th>
                  <th>ステータス</th>
                  <th class="num">投稿数</th>
                  <th class="action"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" aria-label="田中太郎を選択"></td>
                  <td><a href="/pages/demo/users/detail.php?id=1">田中太郎</a></td>
                  <td>tanaka@example.com</td>
                  <td>管理者</td>
                  <td>2025-01-15</td>
                  <td><span class="c-badge success">有効</span></td>
                  <td class="num">42</td>
                  <td class="action">
                    <div class="c-dropdown">
                      <button class="c-button ghost small" popovertarget="menu-1" aria-haspopup="menu"><i data-lucide="more-horizontal"></i></button>
                      <ul popover id="menu-1" role="menu">
                        <li role="presentation"><a href="/pages/demo/users/detail.php?id=1" role="menuitem"><i data-lucide="eye"></i>詳細</a></li>
                        <li role="presentation"><a href="/pages/demo/users/edit.php?id=1" role="menuitem"><i data-lucide="edit"></i>編集</a></li>
                        <li role="presentation"><button role="menuitem">権限変更</button></li>
                        <li role="separator"><hr></li>
                        <li role="presentation"><button role="menuitem" class="danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i>削除</button></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" aria-label="佐藤花子を選択"></td>
                  <td><a href="/pages/demo/users/detail.php?id=2">佐藤花子</a></td>
                  <td>sato@example.com</td>
                  <td>編集者</td>
                  <td>2025-03-22</td>
                  <td><span class="c-badge success">有効</span></td>
                  <td class="num">18</td>
                  <td class="action">
                    <div class="c-dropdown">
                      <button class="c-button ghost small" popovertarget="menu-2" aria-haspopup="menu"><i data-lucide="more-horizontal"></i></button>
                      <ul popover id="menu-2" role="menu">
                        <li role="presentation"><a href="/pages/demo/users/detail.php?id=2" role="menuitem"><i data-lucide="eye"></i>詳細</a></li>
                        <li role="presentation"><a href="/pages/demo/users/edit.php?id=2" role="menuitem"><i data-lucide="edit"></i>編集</a></li>
                        <li role="presentation"><button role="menuitem">権限変更</button></li>
                        <li role="separator"><hr></li>
                        <li role="presentation"><button role="menuitem" class="danger" data-js-open="delete-dialog"><i data-lucide="trash-2"></i>削除</button></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" aria-label="鈴木一郎を選択"></td>
                  <td><a href="/pages/demo/users/detail.php?id=3">鈴木一郎</a></td>
                  <td>suzuki@example.com</td>
                  <td>閲覧者</td>
                  <td>2025-06-10</td>
                  <td><span class="c-badge warning">無効</span></td>
                  <td class="num">0</td>
                  <td class="action">
                    <div class="c-dropdown">
                      <button class="c-button ghost small" popovertarget="menu-3" aria-haspopup="menu"><i data-lucide="more-horizontal"></i></button>
                      <ul popover id="menu-3" role="menu">
                        <li role="presentation"><a href="/pages/demo/users/detail.php?id=3" role="menuitem"><i data-lucide="eye"></i>詳細</a></li>
                        <li role="presentation"><a href="/pages/demo/users/edit.php?id=3" role="menuitem"><i data-lucide="edit"></i>編集</a></li>
                        <li role="presentation"><button role="menuitem">有効化</button></li>
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
        <div class="c-action-bar sticky" role="toolbar" aria-label="一括操作" data-js-table-check-show="user-bulk" hidden>
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
  <dialog class="c-modal" data-js-dialog="delete-dialog" aria-label="ユーザーの削除">
    <section>
      <header>
        <h3>ユーザーの削除</h3>
        <button class="c-button ghost small" data-js-close aria-label="閉じる"><i data-lucide="x"></i></button>
      </header>
      <div class="body">
        <p>このユーザーを削除してもよろしいですか？関連するデータもすべて削除されます。</p>
      </div>
      <footer>
        <button class="c-button" data-js-close>キャンセル</button>
        <button class="c-button danger" data-js-close>削除する</button>
      </footer>
    </section>
  </dialog>

</body>
</html>
