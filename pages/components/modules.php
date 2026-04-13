<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>モジュール - adminkit</title>
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
            <li aria-current="page">モジュール</li>
          </ol>
          <div class="l-cluster">
            <?php part('theme-switcher'); ?>
            <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
            <a href="#" class="c-button ghost small"><i data-lucide="circle-help"></i></a>
          </div>
        </nav>

        <div class="l-stack main-content">
          <header class="page-header">
            <h1>モジュール</h1>
          </header>

          <!-- ================================================
               6. Table
               ================================================ -->
          <section>
            <h2>Table</h2>

            <section>
              <h3>基本テーブル + ソート</h3>
              <div class="c-table-scroll">
                <table class="c-table">
                  <thead>
                    <tr>
                      <th aria-sort="ascending"><button>名前</button></th>
                      <th aria-sort="none"><button>メール</button></th>
                      <th>ロール</th>
                      <th aria-sort="none"><button>登録日</button></th>
                      <th>ステータス</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>田中太郎</td>
                      <td>tanaka@example.com</td>
                      <td>管理者</td>
                      <td>2025-01-15</td>
                      <td><span class="c-badge success">有効</span></td>
                    </tr>
                    <tr>
                      <td>佐藤花子</td>
                      <td>sato@example.com</td>
                      <td>編集者</td>
                      <td>2025-03-22</td>
                      <td><span class="c-badge success">有効</span></td>
                    </tr>
                    <tr>
                      <td>鈴木一郎</td>
                      <td>suzuki@example.com</td>
                      <td>閲覧者</td>
                      <td>2025-06-10</td>
                      <td><span class="c-badge warning">無効</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>

            <section>
              <h3>Selectable</h3>
              <div class="c-table-scroll">
                <table class="c-table" data-js-table-check="demo-select">
                  <thead>
                    <tr>
                      <th><input type="checkbox" aria-label="全選択"></th>
                      <th>名前</th>
                      <th>ロール</th>
                      <th>ステータス</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="checkbox" aria-label="田中太郎を選択"></td>
                      <td>田中太郎</td>
                      <td>管理者</td>
                      <td><span class="c-badge success">有効</span></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" aria-label="佐藤花子を選択"></td>
                      <td>佐藤花子</td>
                      <td>編集者</td>
                      <td><span class="c-badge success">有効</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>

            <section>
              <h3>Compact</h3>
              <div class="c-table-scroll">
                <table class="c-table compact">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>名前</th>
                      <th>ステータス</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr><td>001</td><td>項目A</td><td><span class="c-badge success">有効</span></td></tr>
                    <tr><td>002</td><td>項目B</td><td><span class="c-badge warning">無効</span></td></tr>
                    <tr><td>003</td><td>項目C</td><td><span class="c-badge success">有効</span></td></tr>
                  </tbody>
                </table>
              </div>
            </section>
          </section>

          <!-- ================================================
               7. Fields
               ================================================ -->
          <section>
            <h2>Fields</h2>

            <section>
              <h3>基本フィールド</h3>
              <div class="c-fields">
                <label>
                  <span>テキスト</span>
                  <input type="text" placeholder="名前を入力...">
                </label>
                <label>
                  <span>メール</span>
                  <input type="email" placeholder="email@example.com">
                </label>
                <label>
                  <span>パスワード</span>
                  <input type="password" placeholder="パスワードを入力..." aria-describedby="pw-help">
                  <small id="pw-help">8文字以上で入力してください</small>
                </label>
                <label>
                  <span>セレクト</span>
                  <select>
                    <option value="">選択してください</option>
                    <option>オプション1</option>
                    <option>オプション2</option>
                    <option>オプション3</option>
                  </select>
                </label>
                <label>
                  <span>テキストエリア</span>
                  <textarea placeholder="本文を入力..."></textarea>
                </label>
              </div>
            </section>

            <section>
              <h3>チェック・トグル・ラジオ</h3>
              <div class="c-fields">
                <label class="check">
                  <input type="checkbox">
                  <span>利用規約に同意する</span>
                </label>
                <label class="check">
                  <input type="checkbox" checked>
                  <span>メール通知を受け取る</span>
                  <small>新着情報をメールでお届けします</small>
                </label>
                <label class="toggle">
                  <input type="checkbox" role="switch">
                  <span>ダークモード</span>
                </label>
                <label class="toggle">
                  <input type="checkbox" role="switch" checked>
                  <span>公開設定</span>
                  <small>プロフィールを公開します</small>
                </label>
                <fieldset>
                  <legend>通知方法</legend>
                  <ul>
                    <li><label class="check"><input type="radio" name="notify" checked><span>メール</span></label></li>
                    <li><label class="check"><input type="radio" name="notify"><span>SMS</span></label></li>
                    <li><label class="check"><input type="radio" name="notify"><span>プッシュ通知</span></label></li>
                  </ul>
                </fieldset>
                <fieldset>
                  <legend>カテゴリ（横並び）</legend>
                  <ul class="check-group horizontal">
                    <li><label class="check"><input type="checkbox" checked><span>テクノロジー</span></label></li>
                    <li><label class="check"><input type="checkbox"><span>デザイン</span></label></li>
                    <li><label class="check"><input type="checkbox" checked><span>ビジネス</span></label></li>
                    <li><label class="check"><input type="checkbox"><span>マーケティング</span></label></li>
                  </ul>
                </fieldset>
                <fieldset>
                  <legend>優先度（横並びラジオ）</legend>
                  <ul class="check-group horizontal">
                    <li><label class="check"><input type="radio" name="priority"><span>低</span></label></li>
                    <li><label class="check"><input type="radio" name="priority" checked><span>中</span></label></li>
                    <li><label class="check"><input type="radio" name="priority"><span>高</span></label></li>
                  </ul>
                </fieldset>
              </div>
            </section>

            <section>
              <h3>その他の入力</h3>
              <div class="c-fields">
                <label>
                  <span>数値</span>
                  <input type="number" value="42" min="0" max="100" step="1">
                </label>
                <label>
                  <span>日付</span>
                  <input type="date" value="2026-04-12">
                </label>
                <label>
                  <span>日時</span>
                  <input type="datetime-local" value="2026-04-12T09:00">
                </label>
                <label>
                  <span>時刻</span>
                  <input type="time" value="09:00">
                </label>
                <label>
                  <span>カラー</span>
                  <div class="l-cluster">
                    <input type="color" value="#4f46e5">
                    <i data-lucide="pipette" style="width: var(--icon-md); height: var(--icon-md); color: var(--text-muted);"></i>
                  </div>
                </label>
                <label>
                  <span>レンジ</span>
                  <input type="range" min="0" max="100" value="60">
                </label>
              </div>
            </section>

            <section>
              <h3>Horizontal</h3>
              <div class="c-fields horizontal">
                <label>
                  <span>名前</span>
                  <input type="text" placeholder="名前を入力...">
                </label>
                <label>
                  <span>メール</span>
                  <input type="email" placeholder="email@example.com">
                </label>
              </div>
            </section>

            <section>
              <h3>Inline</h3>
              <form class="c-fields inline">
                <label>
                  <span class="visually-hidden">検索</span>
                  <input type="search" placeholder="検索...">
                </label>
                <label>
                  <span class="visually-hidden">カテゴリ</span>
                  <select>
                    <option value="">すべて</option>
                    <option>カテゴリA</option>
                    <option>カテゴリB</option>
                  </select>
                </label>
                <button type="submit" class="c-button primary">検索</button>
              </form>
            </section>

            <section>
              <h3>エラー状態（.error クラス）</h3>
              <div class="c-fields">
                <label>
                  <span>メールアドレス</span>
                  <input type="email" class="error" value="invalid-email" required aria-describedby="email-error">
                  <small id="email-error" class="error">正しいメールアドレスを入力してください</small>
                </label>
              </div>
            </section>

            <section>
              <h3>バリデーション（:user-invalid）</h3>
              <p>フィールドを操作してからフォーカスを外すと、バリデーションエラーが表示されます。</p>
              <div class="c-fields">
                <label>
                  <span>メールアドレス</span>
                  <input type="email" required aria-describedby="validate-email-error" placeholder="email@example.com">
                  <small id="validate-email-error" class="error-message">正しいメールアドレスを入力してください</small>
                </label>
                <label>
                  <span>名前</span>
                  <input type="text" required aria-describedby="validate-name-error" placeholder="名前を入力...">
                  <small id="validate-name-error" class="error-message">名前は必須です</small>
                </label>
              </div>
            </section>
          </section>

          <!-- ================================================
               8. Modal
               ================================================ -->
          <section>
            <h2>Modal</h2>
            <div class="l-cluster">
              <button class="c-button primary" data-js-open="demo-modal">モーダルを開く</button>
            </div>
            <dialog class="c-modal" data-js-dialog="demo-modal" aria-label="確認">
              <section>
                <header>
                  <h3>確認</h3>
                  <button class="c-button ghost small" data-js-close aria-label="閉じる"><i data-lucide="x"></i></button>
                </header>
                <div class="body">
                  <p>この操作を実行してもよろしいですか？</p>
                </div>
                <footer>
                  <button class="c-button" data-js-close>キャンセル</button>
                  <button class="c-button primary" data-js-close>確認</button>
                </footer>
              </section>
            </dialog>
          </section>

          <!-- ================================================
               9. Tabs
               ================================================ -->
          <section>
            <h2>Tabs</h2>
            <div class="c-tabs">
              <div role="tablist" aria-label="設定タブ">
                <button role="tab" aria-selected="true" data-js-tab="tab-general">一般</button>
                <button role="tab" aria-selected="false" data-js-tab="tab-security">セキュリティ</button>
                <button role="tab" aria-selected="false" data-js-tab="tab-notify">通知</button>
              </div>
              <div role="tabpanel" data-js-panel="tab-general">
                <p>一般設定の内容がここに表示されます。</p>
              </div>
              <div role="tabpanel" data-js-panel="tab-security" hidden>
                <p>セキュリティ設定の内容がここに表示されます。</p>
              </div>
              <div role="tabpanel" data-js-panel="tab-notify" hidden>
                <p>通知設定の内容がここに表示されます。</p>
              </div>
            </div>
          </section>

          <!-- ================================================
               10. Segment
               ================================================ -->
          <section>
            <h2>Segment</h2>
            <div class="l-cluster">
              <div class="c-segment" role="radiogroup" aria-label="期間">
                <label><input type="radio" name="period" checked><span>日</span></label>
                <label><input type="radio" name="period"><span>週</span></label>
                <label><input type="radio" name="period"><span>月</span></label>
                <label><input type="radio" name="period"><span>年</span></label>
              </div>
              <div class="c-segment small" role="radiogroup" aria-label="表示">
                <label><input type="radio" name="view" checked><span>リスト</span></label>
                <label><input type="radio" name="view"><span>グリッド</span></label>
              </div>
            </div>
          </section>

          <!-- ================================================
               11. Dropdown
               ================================================ -->
          <section>
            <h2>Dropdown</h2>
            <div class="c-dropdown">
              <button class="c-button" popovertarget="demo-dropdown" aria-haspopup="menu" aria-expanded="false">
                アクション<i data-lucide="chevron-down"></i>
              </button>
              <ul popover id="demo-dropdown" role="menu">
                <li role="presentation"><button role="menuitem"><i data-lucide="edit"></i>編集</button></li>
                <li role="presentation"><button role="menuitem"><i data-lucide="copy"></i>複製</button></li>
                <li role="presentation"><button role="menuitem"><i data-lucide="archive"></i>アーカイブ</button></li>
                <li role="separator"><hr></li>
                <li role="presentation"><button role="menuitem" class="danger"><i data-lucide="trash-2"></i>削除</button></li>
              </ul>
            </div>
          </section>

          <!-- ================================================
               12. Action Bar
               ================================================ -->
          <section>
            <h2>Action Bar</h2>
            <!-- 注: 実際のページでは main 直下（main-content の外）に配置する。ここではギャラリー表示のため例外的に main-content 内に配置 -->
            <div class="c-action-bar" role="toolbar" aria-label="保存バー">
              <span>未保存の変更があります</span>
              <div class="l-cluster">
                <button class="c-button small">破棄</button>
                <button class="c-button small primary">保存</button>
              </div>
            </div>
          </section>

          <!-- ================================================
               15. Pagination
               ================================================ -->
          <section>
            <h2>Pagination</h2>
            <nav class="c-pagination" aria-label="ページネーション">
              <ul>
                <li><span aria-disabled="true"><i data-lucide="chevron-left"></i></span></li>
                <li><a href="#" aria-current="page">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><i data-lucide="chevron-right"></i></a></li>
              </ul>
            </nav>
          </section>

          <!-- ================================================
               16. List
               ================================================ -->
          <section>
            <h2>List</h2>

            <section>
              <h3>ul / ol</h3>
              <div class="l-cluster" data-gap="2">
                <ul class="c-list disc">
                  <li>リスト項目 1</li>
                  <li>リスト項目 2</li>
                  <li>リスト項目 3</li>
                </ul>
                <ol class="c-list decimal">
                  <li>番号付き項目 1</li>
                  <li>番号付き項目 2</li>
                  <li>番号付き項目 3</li>
                </ol>
              </div>
            </section>

            <section>
              <h3>Bordered / Striped / Interactive</h3>
              <ul class="c-list bordered striped interactive">
                <li>クリック可能な項目 1</li>
                <li>クリック可能な項目 2</li>
                <li>クリック可能な項目 3</li>
                <li>クリック可能な項目 4</li>
              </ul>
            </section>

            <section>
              <h3>定義リスト (dl)</h3>
              <dl class="c-dl bordered">
                <div><dt>名前</dt><dd>田中太郎</dd></div>
                <div><dt>メール</dt><dd>tanaka@example.com</dd></div>
                <div><dt>ロール</dt><dd>管理者</dd></div>
                <div><dt>登録日</dt><dd>2025-01-15</dd></div>
              </dl>
            </section>
          </section>


        </div>
      </main>
    </div>
  </div>

</body>
</html>
