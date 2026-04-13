<?php require_once 'functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ダッシュボード - adminkit</title>
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
            <li aria-current="page"><a href="index.php" aria-label="ダッシュボード"><i data-lucide="house"></i></a></li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
            <a href="#" class="c-button ghost small"><i data-lucide="circle-help"></i></a>
          </div>
        </nav>

        <div class="l-stack main-content full">

          <!-- ページヘッダー -->
          <header class="page-header">
            <h1>ダッシュボード</h1>
          </header>

          <!-- KPI カード -->
          <section>
          <h2 class="visually-hidden">KPI</h2>
          <div class="l-grid cols-4">
            <div class="c-stats">
              <h3>ユーザー数</h3>
              <span class="c-stats-value">1,284</span>
              <span class="c-stats-sub">前月比 <span class="c-badge success">+12.5%</span></span>
            </div>
            <div class="c-stats">
              <h3>注文数</h3>
              <span class="c-stats-value">568</span>
              <span class="c-stats-sub">前月比 <span class="c-badge success">+8.2%</span></span>
            </div>
            <div class="c-stats">
              <h3>売上</h3>
              <span class="c-stats-value">¥3,420,000</span>
              <span class="c-stats-sub">前月比 <span class="c-badge warning">-2.1%</span></span>
            </div>
            <div class="c-stats">
              <h3>コンバージョン率</h3>
              <span class="c-stats-value">3.6%</span>
              <span class="c-stats-sub">前月比 <span class="c-badge success">+0.4%</span></span>
            </div>
          </div>
          </section>

          <!-- 最近のアクティビティ -->
          <section>
            <h2>最近のアクティビティ</h2>
            <ul class="c-list bordered">
              <li>田中太郎が新しい記事を投稿しました <small>5分前</small></li>
              <li>佐藤花子がプロフィールを更新しました <small>15分前</small></li>
              <li>鈴木一郎が新規登録しました <small>1時間前</small></li>
              <li>山田次郎が注文 #1042 を完了しました <small>2時間前</small></li>
              <li>高橋美咲がコメントを追加しました <small>3時間前</small></li>
            </ul>
          </section>

          <!-- 最近の注文 -->
          <section>
            <h2>最近の注文</h2>
            <div class="c-table-scroll">
              <table class="c-table">
                <thead>
                  <tr>
                    <th>注文ID</th>
                    <th>顧客名</th>
                    <th>商品</th>
                    <th class="num">金額</th>
                    <th>ステータス</th>
                    <th>日時</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>#1045</td>
                    <td>田中太郎</td>
                    <td>プレミアムプラン</td>
                    <td class="num">¥12,000</td>
                    <td><span class="c-badge success">完了</span></td>
                    <td>2026-04-08</td>
                  </tr>
                  <tr>
                    <td>#1044</td>
                    <td>佐藤花子</td>
                    <td>スタンダードプラン</td>
                    <td class="num">¥8,000</td>
                    <td><span class="c-badge success">完了</span></td>
                    <td>2026-04-07</td>
                  </tr>
                  <tr>
                    <td>#1043</td>
                    <td>鈴木一郎</td>
                    <td>ベーシックプラン</td>
                    <td class="num">¥3,000</td>
                    <td><span class="c-badge warning">処理中</span></td>
                    <td>2026-04-07</td>
                  </tr>
                  <tr>
                    <td>#1042</td>
                    <td>山田次郎</td>
                    <td>プレミアムプラン</td>
                    <td class="num">¥12,000</td>
                    <td><span class="c-badge success">完了</span></td>
                    <td>2026-04-06</td>
                  </tr>
                  <tr>
                    <td>#1041</td>
                    <td>高橋美咲</td>
                    <td>スタンダードプラン</td>
                    <td class="num">¥8,000</td>
                    <td><span class="c-badge">キャンセル</span></td>
                    <td>2026-04-06</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

        </div>
      </main>
    </div>
  </div>

</body>
</html>
