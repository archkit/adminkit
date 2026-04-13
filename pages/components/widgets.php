<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ウィジェット - adminkit</title>
  <?php part('resources'); ?>
</head>
<body>
  <progress class="c-progress page-top" value="40" max="100" aria-label="ページ進捗"></progress>
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
            <li aria-current="page">ウィジェット</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
            <a href="#" class="c-button ghost small"><i data-lucide="circle-help"></i></a>
          </div>
        </nav>

        <div class="l-stack main-content">
          <header class="page-header">
            <h1>ウィジェット</h1>
          </header>

          <!-- ================================================
               1. Button
               ================================================ -->
          <section>
            <h2>Button</h2>
            <section>
              <h3>バリアント</h3>
              <div class="l-cluster">
                <button class="c-button">Default</button>
                <button class="c-button primary">Primary</button>
                <button class="c-button success">Success</button>
                <button class="c-button danger">Danger</button>
                <button class="c-button ghost">Ghost</button>
              </div>
            </section>
            <section>
              <h3>サイズ・状態</h3>
              <div class="l-cluster">
                <button class="c-button small">Small</button>
                <button class="c-button primary small">Primary Small</button>
                <button class="c-button small" disabled>Disabled</button>
              </div>
            </section>
            <section>
              <h3>アイコン付き</h3>
              <div class="l-cluster">
                <button class="c-button primary small"><i data-lucide="plus"></i>新規作成</button>
                <button class="c-button ghost small"><i data-lucide="download"></i>エクスポート</button>
              </div>
            </section>
          </section>

          <!-- ================================================
               2. Badge
               ================================================ -->
          <section>
            <h2>Badge</h2>
            <div class="l-cluster">
              <span class="c-badge">Default</span>
              <span class="c-badge primary">Primary</span>
              <span class="c-badge success">Success</span>
              <span class="c-badge warning">Warning</span>
              <span class="c-badge danger">Danger</span>
            </div>
          </section>

          <!-- ================================================
               3. Alert
               ================================================ -->
          <section>
            <h2>Alert</h2>
            <div class="l-stack">
              <div class="c-alert" role="alert">
                <strong>お知らせ</strong>
                システムメンテナンスを予定しています。
              </div>
              <div class="c-alert success" role="alert">
                <strong>完了</strong>
                データの保存が完了しました。
              </div>
              <div class="c-alert warning" role="alert">
                <strong>注意</strong>
                ディスク使用量が80%を超えています。
              </div>
              <div class="c-alert danger" role="alert">
                <strong>エラー</strong>
                接続に失敗しました。再試行してください。
              </div>
            </div>
          </section>

          <!-- ================================================
               4. Banner
               ================================================ -->
          <section>
            <h2>Banner</h2>
            <div class="l-stack">
              <div class="c-banner" role="status">
                <p>新機能が追加されました。詳細はリリースノートをご確認ください。</p>
              </div>
              <div class="c-banner warning" role="status">
                <p>APIの利用制限に近づいています。</p>
              </div>
              <div class="c-banner danger" role="alert">
                <p>サーバーとの接続が不安定です。</p>
              </div>
              <div class="c-banner warning" role="status">
                <p>この通知は閉じることができます。</p>
                <button class="c-button ghost small" data-js-banner-close aria-label="閉じる"><i data-lucide="x"></i></button>
              </div>
            </div>
          </section>

          <!-- ================================================
               5. Card
               ================================================ -->
          <section>
            <h2>Card</h2>
            <div class="l-stack">
              <section class="c-card">
                <h3>デフォルトカード</h3>
                <p>カードの内容がここに入ります。情報をグループ化して表示するのに使用します。</p>
              </section>
              <section class="c-card danger">
                <h3>Danger Zone</h3>
                <p>この操作は取り消せません。アカウントを削除すると、すべてのデータが失われます。</p>
                <div class="l-cluster">
                  <button class="c-button danger">アカウントを削除</button>
                </div>
              </section>
            </div>
          </section>

          <!-- ================================================
               13. Divider
               ================================================ -->
          <section>
            <h2>Divider</h2>
            <div class="l-stack">
              <hr>
              <div class="c-divider" role="separator">または</div>
              <div class="c-divider" role="separator">セクション</div>
            </div>
          </section>

          <!-- ================================================
               14. Avatar
               ================================================ -->
          <section>
            <h2>Avatar</h2>
            <div class="l-cluster">
              <span class="c-avatar small" aria-label="小林">小</span>
              <span class="c-avatar" aria-label="田中">田</span>
              <span class="c-avatar large" aria-label="佐藤">佐</span>
            </div>
          </section>

          <!-- ================================================
               17. Tooltip
               ================================================ -->
          <section>
            <h2>Tooltip</h2>
            <div class="l-cluster">
              <button class="c-button" data-tooltip="ツールチップの内容">ホバーしてください</button>
              <button class="c-button primary" data-tooltip="保存します">保存</button>
              <span class="c-avatar" data-tooltip="田中太郎" aria-label="田中">田</span>
            </div>
          </section>

          <!-- ================================================
               18. Toast
               ================================================ -->
          <section>
            <h2>Toast</h2>
            <div class="l-cluster">
              <button class="c-button" data-js-toast="note">通知</button>
              <button class="c-button success" data-js-toast="success">成功</button>
              <button class="c-button" data-js-toast="warning">警告</button>
              <button class="c-button danger" data-js-toast="danger">エラー</button>
              <button class="c-button ghost" data-js-toast="action">アクション付き</button>
            </div>
          </section>

          <!-- ================================================
               19. Skeleton
               ================================================ -->
          <section>
            <h2>Skeleton</h2>

            <section>
              <h3>基本</h3>
              <div class="l-stack">
                <span class="c-skeleton text" aria-label="読み込み中"></span>
                <span class="c-skeleton text" aria-label="読み込み中"></span>
                <span class="c-skeleton circle" aria-label="読み込み中"></span>
              </div>
            </section>

            <section>
              <h3>カード内</h3>
              <div class="c-card">
                <div class="l-cluster">
                  <span class="c-skeleton circle" aria-label="読み込み中"></span>
                  <div class="l-stack" data-gap="0.5">
                    <span class="c-skeleton text" aria-label="読み込み中"></span>
                    <span class="c-skeleton text" aria-label="読み込み中"></span>
                  </div>
                </div>
              </div>
            </section>
          </section>

          <!-- ================================================
               20. Search
               ================================================ -->
          <section>
            <h2>Search</h2>

            <section>
              <h3>基本</h3>
              <div class="l-stack">
                <div class="c-search">
                  <i data-lucide="search"></i>
                  <input type="search" placeholder="検索...">
                </div>
              </div>
            </section>

            <section>
              <h3>Small</h3>
              <div class="c-search small">
                <i data-lucide="search"></i>
                <input type="search" placeholder="検索...">
              </div>
            </section>
          </section>

          <!-- ================================================
               21. Tag / Chip
               ================================================ -->
          <section>
            <h2>Tag / Chip</h2>

            <section>
              <h3>バリアント</h3>
              <div class="c-tag-list">
                <span class="c-tag">Default</span>
                <span class="c-tag primary">Primary</span>
                <span class="c-tag success">Success</span>
                <span class="c-tag warning">Warning</span>
                <span class="c-tag danger">Danger</span>
              </div>
            </section>

            <section>
              <h3>アイコン・削除ボタン付き</h3>
              <div class="c-tag-list">
                <span class="c-tag"><i data-lucide="user"></i>ユーザー</span>
                <span class="c-tag primary">React<button type="button" aria-label="削除"><i data-lucide="x"></i></button></span>
                <span class="c-tag success">公開済み<button type="button" aria-label="削除"><i data-lucide="x"></i></button></span>
                <span class="c-tag danger">要対応<button type="button" aria-label="削除"><i data-lucide="x"></i></button></span>
              </div>
            </section>
          </section>

          <!-- ================================================
               22. Notification Dot
               ================================================ -->
          <section>
            <h2>Notification Dot</h2>
            <div class="l-cluster">
              <button class="c-button ghost">
                <i data-lucide="bell"></i>通知
                <span class="c-dot"></span>
              </button>
              <button class="c-button ghost">
                <i data-lucide="mail"></i>メール
                <span class="c-dot accent"></span>
              </button>
              <button class="c-button ghost">
                <i data-lucide="message-square"></i>チャット
                <span class="c-dot success"></span>
              </button>
              <button class="c-button ghost">
                <i data-lucide="inbox"></i>受信箱
                <span class="c-dot count">3</span>
              </button>
              <button class="c-button ghost">
                <i data-lucide="shopping-cart"></i>カート
                <span class="c-dot count accent">12</span>
              </button>
            </div>
          </section>

          <!-- ================================================
               23. Toggle Group
               ================================================ -->
          <section>
            <h2>Toggle Group</h2>

            <section>
              <h3>基本</h3>
              <div class="l-cluster">
                <div class="c-toggle-group" role="group" aria-label="表示モード">
                  <button aria-pressed="true"><i data-lucide="list"></i>リスト</button>
                  <button aria-pressed="false"><i data-lucide="grid-2x2"></i>グリッド</button>
                  <button aria-pressed="false"><i data-lucide="kanban"></i>ボード</button>
                </div>
              </div>
            </section>

            <section>
              <h3>Small・テキストのみ</h3>
              <div class="l-cluster">
                <div class="c-toggle-group small" role="group" aria-label="期間">
                  <button aria-pressed="true">日</button>
                  <button aria-pressed="false">週</button>
                  <button aria-pressed="false">月</button>
                  <button aria-pressed="false">年</button>
                </div>
              </div>
            </section>
          </section>

          <!-- ================================================
               24. Stats Card
               ================================================ -->
          <section>
            <h2>Stats Card</h2>

            <section>
              <h3>基本</h3>
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
                  <span class="c-stats-value">¥3.4M</span>
                  <span class="c-stats-sub">前月比 <span class="c-badge warning">-2.1%</span></span>
                </div>
                <div class="c-stats">
                  <h3>CVR</h3>
                  <span class="c-stats-value">3.6%</span>
                  <span class="c-stats-sub">前月比 <span class="c-badge success">+0.4%</span></span>
                </div>
              </div>
            </section>

            <section>
              <h3>アクセントバー付き</h3>
              <div class="l-grid cols-3">
                <div class="c-stats accent">
                  <h3>アクティブユーザー</h3>
                  <span class="c-stats-value">842</span>
                </div>
                <div class="c-stats accent">
                  <h3>セッション</h3>
                  <span class="c-stats-value">2,451</span>
                </div>
                <div class="c-stats accent">
                  <h3>直帰率</h3>
                  <span class="c-stats-value">32.4%</span>
                </div>
              </div>
            </section>

            <section>
              <h3>アイコン付き</h3>
              <div class="l-grid cols-2">
                <div class="c-stats with-icon">
                  <div class="c-stats-icon"><i data-lucide="users"></i></div>
                  <div class="c-stats-body">
                    <h3>総ユーザー数</h3>
                    <span class="c-stats-value">1,284</span>
                    <span class="c-stats-sub">前月比 +12.5%</span>
                  </div>
                </div>
                <div class="c-stats with-icon">
                  <div class="c-stats-icon"><i data-lucide="shopping-bag"></i></div>
                  <div class="c-stats-body">
                    <h3>今月の注文</h3>
                    <span class="c-stats-value">568</span>
                    <span class="c-stats-sub">前月比 +8.2%</span>
                  </div>
                </div>
              </div>
            </section>
          </section>

          <!-- ================================================
               25. Progress
               ================================================ -->
          <section>
            <h2>Progress</h2>

            <section>
              <h3>バリアント</h3>
              <div class="l-stack">
                <progress class="c-progress" value="60" max="100" aria-label="デフォルト"></progress>
                <progress class="c-progress success" value="100" max="100" aria-label="成功"></progress>
                <progress class="c-progress danger" value="25" max="100" aria-label="エラー"></progress>
              </div>
            </section>

            <section>
              <h3>ラベル付き</h3>
              <div class="c-progress-labeled">
                <progress class="c-progress" value="73" max="100" aria-label="ストレージ使用量"></progress>
                <span>73%</span>
              </div>
            </section>

            <section>
              <h3>Page Top</h3>
              <p>body 直下に配置すると画面最上部に固定表示されます。このページの上部に表示されています。</p>
            </section>
          </section>

          <!-- Empty State -->
          <section>
            <h2>Empty State</h2>

            <section>
              <h3>基本</h3>
              <div class="c-empty-state">
                <i data-lucide="inbox"></i>
                <h3>データがありません</h3>
                <p>まだ記事が投稿されていません。最初の記事を作成してみましょう。</p>
                <a href="#" class="c-button primary small"><i data-lucide="plus"></i>新規作成</a>
              </div>
            </section>

            <section>
              <h3>検索結果なし</h3>
              <div class="c-empty-state">
                <i data-lucide="search-x"></i>
                <h3>検索結果が見つかりません</h3>
                <p>別のキーワードで再度お試しください。</p>
              </div>
            </section>

            <section>
              <h3>カード内</h3>
              <section class="c-card">
                <div class="c-empty-state">
                  <i data-lucide="users"></i>
                  <h3>メンバーがいません</h3>
                  <p>チームにメンバーを招待して共同作業を始めましょう。</p>
                  <button class="c-button primary small"><i data-lucide="user-plus"></i>メンバーを招待</button>
                </div>
              </section>
            </section>
          </section>

          <!-- Stepper -->
          <section>
            <h2>Stepper</h2>

            <section>
              <h3>基本（ステップ2が現在）</h3>
              <ol class="c-stepper">
                <li class="done">アカウント情報</li>
                <li class="active">プラン選択</li>
                <li>お支払い</li>
                <li>完了</li>
              </ol>
            </section>

            <section>
              <h3>完了状態</h3>
              <ol class="c-stepper">
                <li class="done">入力</li>
                <li class="done">確認</li>
                <li class="done">完了</li>
              </ol>
            </section>

            <section>
              <h3>最初のステップ</h3>
              <ol class="c-stepper">
                <li class="active">基本設定</li>
                <li>詳細設定</li>
                <li>確認</li>
              </ol>
            </section>
          </section>

          <!-- Upload -->
          <section>
            <h2>Upload</h2>

            <section>
              <h3>基本</h3>
              <label class="c-upload">
                <i data-lucide="upload-cloud"></i>
                <p>クリックまたはドラッグ＆ドロップ</p>
                <small>PNG, JPG, GIF（最大 10MB）</small>
                <input type="file" accept="image/*">
              </label>
            </section>

            <section>
              <h3>複数ファイル</h3>
              <label class="c-upload">
                <i data-lucide="files"></i>
                <p>ファイルを選択またはドロップ</p>
                <small>CSV, Excel, PDF（最大 50MB）</small>
                <input type="file" multiple>
              </label>
            </section>
          </section>

        </div>
      </main>
    </div>
  </div>

</body>
</html>
