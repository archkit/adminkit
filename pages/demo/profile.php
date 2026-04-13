<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>プロフィール - adminkit</title>
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
            <li aria-current="page">プロフィール</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
          </div>
        </nav>

        <div class="l-stack main-content">

          <header class="page-header">
            <h1>プロフィール</h1>
          </header>

          <!-- プロフィールカード -->
          <section class="c-card profile-card">
            <span class="c-avatar large" aria-label="田中太郎">田</span>
            <h2>田中太郎</h2>
            <p>管理者 &middot; tanaka@example.com</p>
          </section>

          <!-- タブ -->
          <div class="c-tabs">
            <div role="tablist" aria-label="プロフィールタブ">
              <button role="tab" aria-selected="true" data-js-tab="tab-account">アカウント</button>
              <button role="tab" aria-selected="false" data-js-tab="tab-security">セキュリティ</button>
              <button role="tab" aria-selected="false" data-js-tab="tab-notifications">通知</button>
            </div>

            <!-- アカウント -->
            <div role="tabpanel" data-js-panel="tab-account">
              <form class="l-stack" data-js-prevent-submit>
                <section>
                  <h2>基本情報</h2>
                  <div class="c-fields horizontal">
                    <label>
                      <span>名前</span>
                      <input type="text" value="田中太郎">
                    </label>
                    <label>
                      <span>メールアドレス</span>
                      <input type="email" value="tanaka@example.com">
                    </label>
                    <label>
                      <span>電話番号</span>
                      <input type="tel" value="090-1234-5678">
                    </label>
                  </div>
                </section>

                <section>
                  <h2>プロフィール</h2>
                  <div class="c-fields">
                    <label>
                      <span>自己紹介</span>
                      <textarea placeholder="自己紹介を入力..." rows="4"></textarea>
                    </label>
                    <label>
                      <span>ウェブサイト</span>
                      <input type="url" placeholder="https://...">
                    </label>
                  </div>
                </section>

                <div class="l-cluster right">
                  <button type="submit" class="c-button primary">保存</button>
                </div>
              </form>
            </div>

            <!-- セキュリティ -->
            <div role="tabpanel" data-js-panel="tab-security" hidden>
              <form class="l-stack" data-js-prevent-submit>
                <section>
                  <h2>パスワード変更</h2>
                  <div class="c-fields">
                    <label>
                      <span>現在のパスワード</span>
                      <input type="password" placeholder="現在のパスワード">
                    </label>
                    <label>
                      <span>新しいパスワード</span>
                      <input type="password" placeholder="新しいパスワード" aria-describedby="new-pw-help">
                      <small id="new-pw-help">8文字以上、英数字を含めてください</small>
                    </label>
                    <label>
                      <span>確認</span>
                      <input type="password" placeholder="もう一度入力">
                    </label>
                  </div>
                </section>

                <div class="l-cluster right">
                  <button type="submit" class="c-button primary">パスワードを変更</button>
                </div>

                <section>
                  <h2>二要素認証</h2>
                  <section class="c-card">
                    <h3>認証アプリ</h3>
                    <p>Google Authenticator や Authy 等の認証アプリを使用します。</p>
                    <div>
                      <button class="c-button small">設定する</button>
                    </div>
                  </section>
                </section>
              </form>
            </div>

            <!-- 通知 -->
            <div role="tabpanel" data-js-panel="tab-notifications" hidden>
              <form class="l-stack" data-js-prevent-submit>
                <section>
                  <h2>通知設定</h2>
                  <div class="c-fields">
                    <label class="toggle">
                      <input type="checkbox" role="switch" checked>
                      <span>メール通知</span>
                      <small>重要な更新をメールで受け取ります</small>
                    </label>
                    <label class="toggle">
                      <input type="checkbox" role="switch" checked>
                      <span>セキュリティアラート</span>
                      <small>不審なログインを検知した場合に通知します</small>
                    </label>
                    <label class="toggle">
                      <input type="checkbox" role="switch">
                      <span>マーケティング</span>
                      <small>新機能やキャンペーンの案内を受け取ります</small>
                    </label>
                    <label class="toggle">
                      <input type="checkbox" role="switch" checked>
                      <span>週次レポート</span>
                      <small>毎週月曜日にアクティビティレポートを送信します</small>
                    </label>
                  </div>
                </section>

                <div class="l-cluster right">
                  <button type="submit" class="c-button primary">保存</button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

</body>
</html>
