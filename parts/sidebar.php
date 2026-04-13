<aside class="shell-sidebar">
  <header>
    <span>adminkit</span>
    <button data-js-sidebar aria-label="メニュー"><i data-lucide="menu"></i></button>
  </header>

  <nav aria-label="サイドバー">
    <ul>
      <li><a href="/index.php"><i data-lucide="layout-dashboard"></i><span>ダッシュボード</span><span class="c-dot"></span></a></li>
    </ul>

    <div role="group" aria-labelledby="nav-components">
      <span class="label" id="nav-components">コンポーネント</span>
      <ul>
        <li><a href="/pages/components/layouts.php"><i data-lucide="layout-grid"></i><span>レイアウト</span></a></li>
        <li><a href="/pages/components/modules.php"><i data-lucide="component"></i><span>モジュール</span></a></li>
        <li><a href="/pages/components/widgets.php"><i data-lucide="puzzle"></i><span>ウィジェット</span></a></li>
      </ul>
    </div>

    <div role="group" aria-labelledby="nav-pages">
      <span class="label" id="nav-pages">デモページ</span>
      <ul>
        <li>
          <details>
            <summary><i data-lucide="file-text"></i><span>記事</span></summary>
            <ul>
              <li><a href="/pages/demo/articles/"><i data-lucide="list"></i><span>一覧</span></a></li>
              <li><a href="/pages/demo/articles/edit.php"><i data-lucide="plus"></i><span>新規追加</span></a></li>
              <li><a href="/pages/demo/articles/categories.php"><i data-lucide="tag"></i><span>カテゴリ</span></a></li>
              <li><a href="/pages/demo/articles/comments.php"><i data-lucide="message-square"></i><span>コメント</span><span class="c-badge danger">8</span></a></li>
            </ul>
          </details>
        </li>
        <li>
          <details>
            <summary><i data-lucide="users"></i><span>ユーザー</span></summary>
            <ul>
              <li><a href="/pages/demo/users/"><i data-lucide="list"></i><span>一覧</span></a></li>
              <li><a href="/pages/demo/users/edit.php"><i data-lucide="plus"></i><span>新規追加</span></a></li>
            </ul>
          </details>
        </li>
        <li><a href="/pages/demo/settings.php"><i data-lucide="settings"></i><span>一般設定</span></a></li>
        <li><a href="/pages/demo/profile.php"><i data-lucide="user-circle"></i><span>プロフィール</span></a></li>
      </ul>
    </div>

    <div role="group" aria-labelledby="nav-layouts">
      <span class="label" id="nav-layouts">レイアウト</span>
      <ul>
        <li><a href="/pages/layout/sidebar.php"><i data-lucide="panel-left"></i><span>サイドバー</span></a></li>
        <li><a href="/pages/layout/mini.php"><i data-lucide="panel-left-close"></i><span>ミニサイドバー</span></a></li>
        <li><a href="/pages/layout/topnav.php"><i data-lucide="panel-top"></i><span>トップナビ</span></a></li>
        <li><a href="/pages/layout/standalone.php"><i data-lucide="rectangle-horizontal"></i><span>スタンドアロン</span></a></li>
        <li><a href="/pages/layout/double.php"><i data-lucide="columns-2"></i><span>ダブルサイドバー</span></a></li>
        <li><a href="/pages/layout/footer.php"><i data-lucide="panel-bottom"></i><span>フッター付き</span></a></li>
        <li><a href="/pages/layout/error.php"><i data-lucide="alert-triangle"></i><span>エラーページ</span></a></li>
        <li><a href="/pages/layout/login.php"><i data-lucide="log-in"></i><span>ログイン</span></a></li>
      </ul>
    </div>
  </nav>

  <footer>
    <a href="#"><i data-lucide="log-out"></i><span>ログアウト</span></a>
  </footer>
</aside>
