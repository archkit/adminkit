# adminkit

archkit Organization の管理画面 UI モジュール。
HTML / CSS / PHP のみで構成し、ビルドツールを使用しない。

## コンセプト

- サイドバー + トップバー + メインコンテンツの管理画面レイアウト
- CRUD 操作、データ一覧、フォーム入力を中心とした UI
- ダッシュボード（グラフ・KPI カード）にも対応

## 技術スタック

- **HTML**: セマンティック HTML、クラス最小限
- **CSS**: CSS Nesting、BEM 不使用、`@import` によるファイル分割
- **PHP**: テンプレートパーツの `include` のみ（`part()` ヘルパー）
- **JS**: ES Modules（esm.sh 経由）、イベントデリゲーション
- **Icons**: Lucide（esm.sh 経由で `createIcons()` で描画）

## 命名規則

| 対象 | ルール | 例 |
|---|---|---|
| CSS クラス全般 | kebab-case | `.topbar`, `.sidebar` |
| コンポーネント | `c-` プレフィックス（`.adminkit` スコープ内） | `.c-button`, `.c-modal` |
| バリアント | 素のクラス名を追加 | `.c-button.primary`, `.c-badge.danger` |
| JS 対象要素 | `data-js-*` 属性 | `data-js-open="confirm"` |

- **ID は JS 対象に使用しない** — `[data-js-*]` で代替する
- **バリアントは BEM 修飾子ではなく**、単純なクラス追加で表現する

## ファイル構成

```
css/
  admin.css       # エントリポイント（base + core + layout）
  login.css       # ログインページ用（base + core + login layout）
  base.css        # リセット + デザイントークン
  core.css        # .adminkit { コンポーネント } + ユーティリティ
  layout.css      # .adminkit-layout + .sidebar + .topbar

js/
  admin.js        # メイン JS（テーマ / ナビ / ポップアップ / モーダル / タブ）

parts/
  sidebar.php     # サイドバーパーツ
  topbar-actions.php  # トップバー右側パーツ
```

### CSS アーキテクチャ

```
base.css ─── リセット + デザイントークン（レイアウト非依存）
core.css ─── .adminkit スコープのコンポーネント + ユーティリティ
layout.css ── .adminkit-layout / .sidebar / .topbar

admin.css = base + core + layout（管理画面フルセット）
login.css = base + core + .login レイアウト（ログインページ）
```

- **admin.css**: 管理画面エントリポイント。`@import` のみ（`base.css` + `core.css` + `layout.css`）
- **login.css**: ログインページエントリポイント。`base.css` + `core.css` + `.login` レイアウト
- **base.css**: リセット + デザイントークン。レイアウト非依存。全エントリポイントで共有
- **core.css**: `.adminkit` スコープ内にコンポーネントをネスト + グローバルユーティリティ
- **layout.css**: 管理画面レイアウト固有（`.adminkit-layout` グリッド、`.sidebar`、`.topbar`）。差し替えで別レイアウトに対応可能

## ページテンプレート

```html
<?php require_once __DIR__ . '/functions.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Title - adminkit</title>
  <link href="css/admin.css" rel="stylesheet">
  <script type="module" src="js/admin.js"></script>
</head>
<body>
  <div class="adminkit-layout">
    <?php part('sidebar'); ?>
    <div class="contents">
      <header class="topbar fixed">
        <h1>Page Title</h1>
        <?php part('topbar-actions'); ?>
        <nav aria-label="breadcrumb">
          <ol>
            <li><a href="index.php">Dashboard</a></li>
            <li>Page Title</li>
          </ol>
        </nav>
      </header>
      <main class="adminkit">
        <!-- page content -->
      </main>
    </div>
  </div>
</body>
</html>
```

## レイアウト構造

```
body
  .adminkit-layout    # display: grid | height: 100dvh
    .sidebar          # サイドバー（flex column）
      .logo           # ロゴ + モバイルメニューボタン
      nav             # ナビゲーション全体（flex column）
        header        # ユーザードロップダウン（上部）
        .scroll       # スクロール可能なナビリンク
        footer        # ユーザードロップダウン（下部）
    .contents         # display: grid | grid-template-rows: auto 1fr
      .topbar         # ヘッダー + パンくず
      .adminkit       # コンテンツ領域（overflow-y: auto = スクロールコンテナ）
```

| クラス | 役割 |
|---|---|
| `.adminkit-layout` | アプリケーション全体のラッパー。CSS Grid で sidebar + contents を構成 |
| `.sidebar` | サイドバー。ロゴ・ナビゲーション・ユーザーメニューを内包 |
| `.contents` | サイドバー右側のエリア。topbar + main を縦に構成 |
| `.topbar` | トップバー。タイトル・アクション・パンくず |
| `.adminkit` | メインコンテンツ領域。スクロールコンテナ。コンポーネントのスコープ |

- `.adminkit-layout` は `height: 100dvh`（`min-height` ではない）で固定し、`.adminkit` をスクロールコンテナとして機能させる
- `.adminkit-layout.collapsed` でサイドバー幅を 64px に縮小

### .adminkit のセクション構造

```html
<main class="adminkit">
  <section>
    <h2>セクションタイトル</h2>
    <div class="body">
      <!-- コンテンツ -->
      <section>
        <h3>サブセクション</h3>
        <div class="body">...</div>
      </section>
    </div>
  </section>
</main>
```

`.adminkit` 内ではタグセレクタでスタイルを適用する（`h2`, `h3`, `p`, `section`）。

### サイドバー構造

```html
<aside class="sidebar">
  <div class="logo">
    adminkit
    <button class="sidebar-toggle" data-js-sidebar aria-label="Menu">
      <i data-lucide="menu"></i>
    </button>
  </div>

  <nav aria-label="sidebar">
    <!-- 上部ユーザードロップダウン（任意） -->
    <header>
      <details class="user">
        <summary>
          <img src="avatar.jpg" alt="User">
          <span><span>Name</span><span>Role</span></span>
          <i data-lucide="chevrons-up-down"></i>
        </summary>
        <ul>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Log out</a></li>
        </ul>
      </details>
    </header>

    <!-- スクロール可能なナビゲーション -->
    <div class="scroll">
      <ul>
        <li><a href="#"><i data-lucide="icon"></i>Link</a></li>
      </ul>

      <p class="label">セクションラベル</p>
      <ul>
        <li>
          <details>
            <summary><i data-lucide="icon"></i>Nested</summary>
            <ul>
              <li><a href="#">Sub item</a></li>
            </ul>
          </details>
        </li>
        <li><a href="#"><i data-lucide="icon"></i>Link<span class="badge danger">3</span></a></li>
      </ul>
    </div>

    <!-- 下部ユーザードロップダウン（任意） -->
    <footer>
      <details class="user">...</details>
    </footer>
  </nav>
</aside>
```

- `<header>` 内のユーザードロップダウンは**下方向**に展開
- `<footer>` 内のユーザードロップダウンは**上方向**に展開
- `.scroll` 内の `<p class="label">` はセクションラベル（sticky 表示）
- ネストナビは `<details>` でアコーディオン動作（CSS アニメーション付き）
- `.badge` はナビリンク内の通知バッジ（コンポーネント `.c-badge` とは別）

### トップバー

```html
<header class="topbar fixed">
  <h1>Page Title</h1>
  <!-- topbar-actions.php -->
  <nav aria-label="actions">
    <ul>
      <li><a href="#">Help</a></li>
      <li><button data-js-theme aria-label="Toggle theme"><i data-lucide="moon"></i></button></li>
      <li>
        <details class="popup">
          <summary><i data-lucide="bell"></i><span class="badge danger">3</span></summary>
          <ul><li><a href="#">Notification</a></li></ul>
        </details>
      </li>
    </ul>
  </nav>
  <!-- パンくず（任意） -->
  <nav aria-label="breadcrumb">
    <ol><li><a href="#">Home</a></li><li>Current</li></ol>
  </nav>
</header>
```

- `.topbar.fixed` — `position: sticky; top: 0` でスクロール時に固定
- `.popup` — `<details>` ベースのドロップダウン。通知バッジは `.badge` で表示
- パンくずは `nav[aria-label="breadcrumb"]` で `grid-column: 1 / -1` に配置

### レスポンシブ（モバイル）

`@media (max-width: 47.999rem)` で以下の動作に切り替わる:

- `.adminkit-layout` が 1 カラムに変更（サイドバーは上部に `.logo` のみ表示）
- `.sidebar > nav` が左端から `position: fixed` のドロワーとして表示
- `.adminkit-layout.open` でドロワーが開く + 背景オーバーレイ表示
- `.sidebar-toggle` ボタン（`data-js-sidebar`）でトグル
- ドロワー外クリックで自動的に閉じる

## デザイントークン

```css
:root {
  --color-primary     --color-success     --color-warning
  --color-danger      --color-info

  --surface-bg        --surface-card      --surface-border
  --text-primary      --text-secondary    --text-on-primary
}
```

`[data-theme="dark"]` でダークテーマに切り替え可能。トークンは `base.css` で定義。

## コンポーネント

コンポーネント（`c-*`）は `.adminkit` スコープ内でのみ有効。

### Button `.c-button`

```html
<button class="c-button primary">Save</button>
<button class="c-button danger"><i data-lucide="trash-2"></i> Delete</button>
<button class="c-button small ghost">Cancel</button>
```

バリアント: `primary` / `success` / `danger` / `ghost`
サイズ: `small`

### Fields `.c-fields`

```html
<!-- Vertical（デフォルト） -->
<div class="c-fields">
  <label><span>Name</span><input type="text"></label>
</div>

<!-- Horizontal -->
<div class="c-fields horizontal">
  <label><span>Name</span><input type="text"></label>
  <label><span>Bio</span><textarea></textarea></label>
</div>
```

チェックボックス / ラジオは `.check`、トグルは `.toggle` で `<label>` をラップ。
`required` 属性付きフィールドには自動で `*` マークが表示される。

### Table `.c-table`

```html
<div class="c-table-scroll">
  <table class="c-table">
    <thead><tr><th>Name</th><th class="action">Actions</th></tr></thead>
    <tbody><tr><td>Alice</td><td class="action">...</td></tr></tbody>
  </table>
</div>
```

デフォルトで striped + hover。`.c-table-scroll` でオーバーフロー対応。
`.c-table.auto` で `width: auto`（テーブル幅をコンテンツに合わせる）。

### Card `.c-card`

```html
<div class="c-card">Content</div>
```

### Badge `.c-badge`

```html
<span class="c-badge primary">New</span>
```

バリアント: `primary` / `success` / `warning` / `danger`

### Alert `.c-alert`

```html
<p class="c-alert success">
  <strong>Success</strong>
  Operation completed.
</p>
```

バリアント: (default=info) / `success` / `warning` / `danger`
内部で `color-mix()` を使用してアクセントカラーから背景を生成。

### Modal `.c-modal`

Native `<dialog>` 要素を使用。

```html
<button class="c-button" data-js-open="confirm">Open</button>
<dialog data-js-dialog="confirm" class="c-modal">
  <section>
    <header>
      <h3>Title</h3>
      <button class="c-button ghost" data-js-close aria-label="Close">
        <i data-lucide="x"></i>
      </button>
    </header>
    <div class="body"><p>Content</p></div>
    <footer>
      <button class="c-button ghost" data-js-close>Cancel</button>
      <button class="c-button primary" data-js-close>Confirm</button>
    </footer>
  </section>
</dialog>
```

- `data-js-open="name"` — トリガーボタン（`showModal()` を呼ぶ）
- `data-js-dialog="name"` — ダイアログ要素の識別
- `data-js-close` — 閉じるボタン
- `<section>` で内容をラップし、`<h3>` のアウトライン構造をスコープする（`<dialog>` はセクショニングコンテンツではないため）
- backdrop クリックでも閉じる
- `showModal()` は top layer に描画するため、DOM 位置は表示に影響しない
- フェードイン / フェードアウトアニメーション付き（`@starting-style` + `allow-discrete`）

### Tabs `.c-tabs`

```html
<div class="c-tabs">
  <div role="tablist">
    <button role="tab" aria-selected="true" data-js-tab="overview">Overview</button>
    <button role="tab" data-js-tab="details">Details</button>
  </div>
  <div role="tabpanel" data-js-panel="overview">Overview content</div>
  <div role="tabpanel" data-js-panel="details" hidden>Details content</div>
</div>
```

- `role="tablist"` / `role="tab"` / `role="tabpanel"` で ARIA セマンティクスを構成
- `data-js-tab` / `data-js-panel` でタブとパネルを紐付け
- JS でイベントデリゲーションにより切り替え

### Pagination `.c-pagination`

```html
<nav class="c-pagination" aria-label="Pagination">
  <a href="?page=1" aria-label="Previous"><i data-lucide="chevron-left"></i></a>
  <a href="?page=1">1</a>
  <a href="?page=2" aria-current="page">2</a>
  <a href="?page=3">3</a>
  <span>…</span>
  <a href="?page=10">10</a>
  <a href="?page=3" aria-label="Next"><i data-lucide="chevron-right"></i></a>
</nav>
```

- CSS のみ（静的テンプレート）。ページ切り替えは PHP 側の責務
- `aria-current="page"` でアクティブページを示す
- `aria-disabled="true"` で無効化

### Avatar `.c-avatar`

```html
<!-- Image -->
<img class="c-avatar" src="photo.jpg" alt="User">

<!-- Initials -->
<span class="c-avatar">TF</span>
```

サイズ: `small` / (default) / `large`

### Tooltip `[data-tooltip]`

```html
<button class="c-button" data-tooltip="Tooltip text">Hover me</button>
```

- CSS のみ（`::after` 疑似要素）
- `hover` / `focus-visible` で表示

## JS 設計

```js
import { createIcons, icons } from "https://esm.sh/lucide";
```

すべての操作を `document.addEventListener("click", ...)` + `e.target.closest()` のイベントデリゲーションで処理する。

| 機能 | トリガー | 動作 |
|---|---|---|
| テーマ切替 | `[data-js-theme]` | `data-theme` 属性の切替 + `localStorage` に保存 |
| テーマ復元 | ページロード時 | `localStorage` から `data-theme` を復元（FOUC 防止） |
| アクティブナビ | ページロード時 | `location.pathname` から現在のページを判定し `.active` を付与 |
| ポップアップ閉じ | 外側クリック | `details.user[open]` / `details.popup[open]` を閉じる |
| モーダル開閉 | `[data-js-open]` / `[data-js-close]` | `showModal()` / `close()` + backdrop クリック対応 |
| サイドバートグル | `[data-js-sidebar]` | `.adminkit-layout` に `.open` を切替（モバイル用） |
| タブ切替 | `[data-js-tab]` | `aria-selected` + `hidden` の切替 |

## ユーティリティ

| クラス | 用途 |
|---|---|
| `.flex` | `display: flex; align-items: center; gap: 0.5rem` |
| `.flex.end` / `.flex.center` | justify-content 制御 |
| `.grid` | auto-fill グリッド（`minmax(250px, 1fr)`） |
| `.grid.cols-2` ~ `.cols-4` | 固定カラム数（モバイルで 1 カラムにフォールバック） |
| `.container.narrow` / `.wide` | 最大幅制約（40rem / 60rem） |
| `.container.center` | `margin-inline: auto` |
| `.text-center` / `.text-right` | テキスト配置 |
| `.visually-hidden` | アクセシビリティ用の非表示 |
| `.hidden` | `display: none` |
| `.truncate` | テキスト省略 |

## コンポーネントロードマップ

### Phase 1 — 実装済み

| カテゴリ | コンポーネント |
|---|---|
| Layout | adminkit-layout, sidebar, topbar, contents |
| Navigation | sidebar nav, breadcrumb, tabs, pagination |
| Data Display | table, card, badge, avatar |
| Forms | input, select, checkbox, radio, toggle, textarea |
| Actions | button |
| Feedback | alert, tooltip |
| Overlay | modal |

### Phase 2 — 未実装

| カテゴリ | コンポーネント |
|---|---|
| Data Display | stat-card |
| Actions | dropdown, menu |
| Overlay | drawer |
| Forms | file-upload, date-picker |
| Feedback | toast, empty-state, progress, skeleton |
