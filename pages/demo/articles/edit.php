<?php require_once __DIR__ . '/../../../functions.php'; $pageTitle = isset($_GET['id']) ? '記事編集' : '記事作成'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle ?> - adminkit</title>
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
            <li><a href="/pages/demo/articles/">記事</a></li>
            <li aria-current="page"><?php echo $pageTitle ?></li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
          </div>
        </nav>

        <div class="l-stack main-content wide">

          <header class="page-header">
            <h1><?php echo $pageTitle ?></h1>
            <?php if (isset($_GET['id'])): ?>
            <div class="l-cluster">
              <a href="#" class="c-button ghost small"><i data-lucide="eye"></i>プレビュー</a>
            </div>
            <?php endif; ?>
          </header>

          <form class="contents" data-js-prevent-submit>
            <div class="l-sidebar">

              <!-- メインエリア -->
              <div class="l-stack">
                <section>
                  <h2>基本情報</h2>
                  <div class="c-fields">
                    <label>
                      <span>タイトル</span>
                      <input type="text" value="<?php echo isset($_GET['id']) ? '2026年の展望 — テクノロジーと社会の変化' : '' ?>" placeholder="記事のタイトルを入力..." required>
                    </label>
                    <label>
                      <span>スラッグ</span>
                      <input type="text" value="<?php echo isset($_GET['id']) ? '2026-outlook' : '' ?>" placeholder="url-friendly-slug" aria-describedby="slug-help">
                      <small id="slug-help">URLに使用される識別子です</small>
                    </label>
                  </div>
                </section>

                <section>
                  <h2>本文</h2>
                  <div class="c-fields">
                    <label>
                      <span class="visually-hidden">本文</span>
                      <textarea placeholder="本文を入力..." rows="12"><?php echo isset($_GET['id']) ? "テクノロジーの進化は加速を続けています。\n\n2026年、私たちの働き方や生活はどのように変わるのでしょうか。\n\n本記事では、AIの発展、リモートワークの定着、そしてサステナビリティへの取り組みという3つの視点から、今年の展望を探ります。" : '' ?></textarea>
                    </label>
                  </div>
                </section>

                <section>
                  <h2>SEO</h2>
                  <div class="c-fields">
                    <label>
                      <span>メタタイトル</span>
                      <input type="text" value="<?php echo isset($_GET['id']) ? '2026年の展望 — テクノロジーと社会の変化 | adminkit' : '' ?>" placeholder="検索結果に表示されるタイトル" aria-describedby="meta-title-help">
                      <small id="meta-title-help">60文字以内を推奨</small>
                    </label>
                    <label>
                      <span>メタディスクリプション</span>
                      <textarea rows="3" placeholder="検索結果に表示される説明文" aria-describedby="meta-desc-help"><?php echo isset($_GET['id']) ? 'AI、リモートワーク、サステナビリティの3つの視点から2026年の展望を探る記事です。' : '' ?></textarea>
                      <small id="meta-desc-help">160文字以内を推奨</small>
                    </label>
                  </div>
                </section>

                <?php if (isset($_GET['id'])): ?>
                <section>
                  <section class="c-card danger">
                    <h3>記事の削除</h3>
                    <p>この操作は取り消せません。記事に関連するコメントもすべて削除されます。</p>
                    <div>
                      <button type="button" class="c-button danger small">この記事を削除する</button>
                    </div>
                  </section>
                </section>
                <?php endif; ?>
              </div>

              <!-- サイドバー -->
              <div class="l-stack">
                <section class="c-card">
                  <h3>公開</h3>
                  <div class="c-fields">
                    <label>
                      <span>ステータス</span>
                      <select>
                        <option <?php echo isset($_GET['id']) ? 'selected' : '' ?>>公開</option>
                        <option>下書き</option>
                        <option>アーカイブ</option>
                      </select>
                    </label>
                    <label>
                      <span>公開日時</span>
                      <input type="datetime-local" value="<?php echo isset($_GET['id']) ? '2026-04-10T09:00' : '' ?>">
                    </label>
                  </div>
                  <div class="l-cluster right">
                    <a href="/pages/demo/articles/" class="c-button small">キャンセル</a>
                    <button type="submit" class="c-button primary small">保存</button>
                  </div>
                </section>

                <section class="c-card">
                  <h3>カテゴリ</h3>
                  <div class="c-fields">
                    <ul class="check-group">
                      <li><label class="check"><input type="checkbox"><span>お知らせ</span></label></li>
                      <li><label class="check"><input type="checkbox" <?php echo isset($_GET['id']) ? 'checked' : '' ?>><span>ブログ</span></label></li>
                      <li><label class="check"><input type="checkbox"><span>ヘルプ</span></label></li>
                      <li><label class="check"><input type="checkbox"><span>リリースノート</span></label></li>
                      <li><label class="check"><input type="checkbox"><span>チュートリアル</span></label></li>
                    </ul>
                  </div>
                </section>

                <section class="c-card">
                  <h3>タグ</h3>
                  <div class="c-fields">
                    <label>
                      <span class="visually-hidden">タグ</span>
                      <input type="text" value="<?php echo isset($_GET['id']) ? 'テクノロジー, AI, 2026' : '' ?>" placeholder="カンマ区切りで入力...">
                    </label>
                    <?php if (isset($_GET['id'])): ?>
                    <div class="c-tag-list">
                      <span class="c-tag">テクノロジー <button aria-label="削除"><i data-lucide="x"></i></button></span>
                      <span class="c-tag">AI <button aria-label="削除"><i data-lucide="x"></i></button></span>
                      <span class="c-tag">2026 <button aria-label="削除"><i data-lucide="x"></i></button></span>
                    </div>
                    <?php endif; ?>
                  </div>
                </section>

                <section class="c-card">
                  <h3>アイキャッチ画像</h3>
                  <label class="c-upload">
                    <i data-lucide="image"></i>
                    <p>クリックまたはドラッグ＆ドロップ</p>
                    <small>PNG, JPG（最大 5MB）</small>
                    <input type="file" accept="image/*">
                  </label>
                </section>
              </div>

            </div>
          </form>

        </div>
      </main>
    </div>
  </div>

</body>
</html>
