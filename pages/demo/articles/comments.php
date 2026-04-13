<?php require_once __DIR__ . '/../../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>コメント - adminkit</title>
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
            <li aria-current="page">コメント</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
          </div>
        </nav>

        <div class="l-stack main-content full">

          <header class="page-header">
            <h1>コメント</h1>
            <div class="l-cluster">
              <span class="c-badge">8件の未承認</span>
            </div>
          </header>

          <!-- フィルタ -->
          <div class="l-cluster">
            <div class="c-toggle-group" role="group" aria-label="コメントフィルタ">
              <button aria-pressed="true">すべて <span class="c-badge">42</span></button>
              <button aria-pressed="false">未承認 <span class="c-badge warning">8</span></button>
              <button aria-pressed="false">承認済み <span class="c-badge success">31</span></button>
              <button aria-pressed="false">スパム <span class="c-badge danger">3</span></button>
            </div>
          </div>

          <!-- テーブル -->
          <div class="c-table-scroll">
            <table class="c-table" data-js-table-check="comment-bulk">
              <thead>
                <tr>
                  <th><input type="checkbox" aria-label="全選択"></th>
                  <th>投稿者</th>
                  <th>コメント</th>
                  <th>記事</th>
                  <th>日時</th>
                  <th>ステータス</th>
                  <th class="action"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" aria-label="選択"></td>
                  <td>山田次郎</td>
                  <td>素晴らしい記事ですね。参考になりました。</td>
                  <td><a href="/pages/demo/articles/detail.php?id=1">2026年の展望 — テクノロジーと社会の変化</a></td>
                  <td>2026-04-11 14:32</td>
                  <td><span class="c-badge warning">未承認</span></td>
                  <td class="action">
                    <button class="c-button ghost small success" title="承認"><i data-lucide="check"></i></button>
                    <button class="c-button ghost small danger" title="削除"><i data-lucide="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" aria-label="選択"></td>
                  <td>高橋美咲</td>
                  <td>とても分かりやすい説明でした。次の記事も楽しみにしています。</td>
                  <td><a href="/pages/demo/articles/detail.php?id=3">はじめてのガイド: アカウント設定の手順</a></td>
                  <td>2026-04-11 10:15</td>
                  <td><span class="c-badge success">承認済み</span></td>
                  <td class="action">
                    <button class="c-button ghost small danger" title="削除"><i data-lucide="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" aria-label="選択"></td>
                  <td>佐々木健</td>
                  <td>このあたりについてもう少し詳しく解説していただけると嬉しいです。</td>
                  <td><a href="/pages/demo/articles/detail.php?id=1">2026年の展望 — テクノロジーと社会の変化</a></td>
                  <td>2026-04-10 22:08</td>
                  <td><span class="c-badge warning">未承認</span></td>
                  <td class="action">
                    <button class="c-button ghost small success" title="承認"><i data-lucide="check"></i></button>
                    <button class="c-button ghost small danger" title="削除"><i data-lucide="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" aria-label="選択"></td>
                  <td>中村由美</td>
                  <td>ダッシュボードの新しいUIとても使いやすいです！</td>
                  <td><a href="/pages/demo/articles/detail.php?id=2">新機能のお知らせ: ダッシュボードのリニューアル</a></td>
                  <td>2026-04-10 16:44</td>
                  <td><span class="c-badge success">承認済み</span></td>
                  <td class="action">
                    <button class="c-button ghost small danger" title="削除"><i data-lucide="trash-2"></i></button>
                  </td>
                </tr>
                <tr>
                  <td><input type="checkbox" aria-label="選択"></td>
                  <td>spam_bot_42</td>
                  <td>Buy cheap products at example-spam.com now!!!</td>
                  <td><a href="/pages/demo/articles/detail.php?id=1">2026年の展望 — テクノロジーと社会の変化</a></td>
                  <td>2026-04-10 03:21</td>
                  <td><span class="c-badge danger">スパム</span></td>
                  <td class="action">
                    <button class="c-button ghost small danger" title="削除"><i data-lucide="trash-2"></i></button>
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
              <li><a href="#"><i data-lucide="chevron-right"></i></a></li>
            </ul>
          </nav>

        </div>
        <!-- 一括操作バー -->
        <div class="c-action-bar sticky" role="toolbar" aria-label="一括操作" data-js-table-check-show="comment-bulk" hidden>
          <span><strong>0</strong>件選択中</span>
          <div class="l-cluster">
            <button class="c-button small success">承認</button>
            <button class="c-button small">スパム</button>
            <button class="c-button small danger">削除</button>
          </div>
        </div>
      </main>
    </div>
  </div>

</body>
</html>
