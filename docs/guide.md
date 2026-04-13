# adminkit 設計ガイド

管理画面・単一フォーム系UIのためのCSSフレームワーク。
セマンティクスとアウトラインの徹底、最小モジュール+レイアウトパターンの2層構造を特徴とする。

---

## 設計思想

### 2層構造

| 層 | 役割 | 例 |
|---|---|---|
| モジュール層 | 構造のみ提供。装飾なし | l-stack, l-grid, shell |
| パターン層 | 具体的な見た目・HTML構造・レスポンシブ挙動 | sidebar, topnav, sidebar-mini |

シェルモジュールは例外的に最低限の装飾を含む（パターン選択前でも利用可能にするため）。

### @layer によるカスケード制御

```css
@layer adminkit.tokens, adminkit.base, adminkit.layout, adminkit.components, adminkit.utilities;
```

- 利用者のカスタムCSSはlayer外に書けば常に優先される
- コンポーネント間の詳細度衝突もlayer順序で解決
- **同一 layer 名を複数ファイルで使わない**（Lightning CSS バンドルの制約）
- **layout レイヤーから components を上書きできない**。コンポーネントの文脈依存スタイルは components レイヤー内に書く（例: `dot.css` 内のサイドバー用ルール）

### 命名規則

| カテゴリ | プレフィックス | 例 |
|---|---|---|
| レイアウトプリミティブ | `l-` | `l-stack`, `l-grid`, `l-sidebar` |
| コンポーネント | `c-` | `c-button`, `c-modal` |
| タイポグラフィ上書き | `t-` | `t-heading2`, `t-heading3` |
| シェル | `shell-` | `shell-sidebar`, `shell-main` |
| バリアント | 複合クラス | `.c-button.primary` |
| 状態 | ARIA属性 | `[aria-selected="true"]` |
| JS対象 | `data-js-*` | `data-js-open`, `data-js-table-check` |

**スコープ内短縮名（c- プレフィックス不要）:**
- `.check`, `.toggle`（`.c-fields` 内）
- `.num`, `.action`（`.c-table` 内）
- `.circle`, `.text`（`.c-skeleton` 内）
- `.check-group`（`.c-fields` 内）

### 色バリアントの設計

**ステータストークンとバリアント名の対応:**

| トークン | バリアント名 | 用途 |
|---|---|---|
| `--status-ok` | `.success` | 成功、完了 |
| `--status-warn` | `.warning` | 警告、注意 |
| `--status-fail` | `.danger` | エラー、破壊的操作 |
| `--status-note` | （デフォルト） | 情報、補足 |

**`--_accent` プライベート変数パターン:**

複数プロパティを色で制御するコンポーネントは `--_accent` で統一。hover色は `color-mix()` で自動生成。ハードコード禁止。

```css
.c-banner {
  --_accent: var(--status-note);
  background: color-mix(in srgb, var(--_accent) 12%, transparent);
  &.success { --_accent: var(--status-ok); }
  &.warning { --_accent: var(--status-warn); }
  &.danger  { --_accent: var(--status-fail); }
}
```

**色の適用強度（コンポーネントの性質で異なる）:**

| 種別 | 適用方法 | 例 |
|---|---|---|
| アクション要素 | 全面塗り | c-button, c-badge |
| 通知要素 | 淡い背景+アクセント線 | c-alert, c-banner |
| 構造要素 | ボーダー色のみ | c-card |

### バリアント整合性

全コンポーネントに全バリアントを持たせる必要はない。用途に応じて必要なバリアントのみ実装する方針。

| バリアント | Button | Badge | Tag | Alert | Banner | Toast |
|---|---|---|---|---|---|---|
| primary | o | o | o | - | - | - |
| success | o | o | o | o | o | o |
| warning | o | o | o | o | o | o |
| danger | o | o | o | o | o | o |
| ghost | o | - | - | - | - | - |
| small | o | - | - | - | - | - |

### 単位の使い分け

- **rem**: フォントサイズ、余白、gap、min-width（テキストスケーリングに連動）
- **px**: border, border-radius, box-shadow, `--icon-*`, `--shell-sidebar-w`（固定寸法）
- アイコンサイズはトークン一元管理: `--icon-sm`(14px) / `--icon-md`(16px) / `--icon-lg`(20px)

### アイコン

Lucide Icons を使用。`<i data-lucide="icon-name"></i>` と記述し、admin.js が SVG に置換する。

```html
<i data-lucide="plus"></i>       <!-- プラス -->
<i data-lucide="edit"></i>       <!-- 編集 -->
<i data-lucide="trash-2"></i>    <!-- 削除 -->
<i data-lucide="search"></i>     <!-- 検索 -->
<i data-lucide="bell"></i>       <!-- 通知 -->
<i data-lucide="house"></i>      <!-- ホーム -->
```

アイコンサイズは CSS トークンで制御。ボタン・ナビ内のアイコンは自動的に `--icon-md`(16px) にサイズ設定される。

---

## ページテンプレート

### head の構成

```html
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ページタイトル - adminkit</title>
  <link rel="stylesheet" href="/dist/adminkit.min.css">
  <script src="/dist/theme-init.js"></script>  <!-- テーマ初期化（FOUC 防止、CSS の後に配置） -->
  <script type="module" src="/dist/adminkit.min.js"></script>
</head>
```

- `theme-init.js` は同期スクリプト。localStorage + `prefers-color-scheme` からテーマを復元し、FOUC を防止する
- `admin.js` は module（遅延実行）。Lucide アイコン、テーマ切替、サイドバー開閉等を処理

### フルページテンプレート

```html
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ページタイトル - adminkit</title>
  <link rel="stylesheet" href="/dist/adminkit.min.css">
  <script src="/dist/theme-init.js"></script>
  <script type="module" src="/dist/adminkit.min.js"></script>
</head>
<body>
  <a href="#main" class="skip-link">メインコンテンツへ</a>

  <div class="shell" data-layout="sidebar">
    <!-- モバイルヘッダー（75rem 以下でのみ表示） -->
    <div class="mobile-header">
      <span>adminkit</span>
      <button data-js-sidebar aria-label="メニュー"><i data-lucide="menu"></i></button>
    </div>

    <aside class="shell-sidebar"><!-- サイドバー --></aside>

    <div class="shell-main">
      <main id="main">
        <!-- パンくず帯（sticky） -->
        <nav class="main-nav" aria-label="パンくず">
          <ol class="c-breadcrumb">
            <li><a href="/index.php" aria-label="ダッシュボード"><i data-lucide="house"></i></a></li>
            <li><a href="/articles/">記事</a></li>
            <li aria-current="page">編集</li>
          </ol>
          <div class="l-cluster">
            <!-- 右側アクション（テーマ切替、通知等） -->
          </div>
        </nav>

        <!-- コンテンツ領域（l-stack 必須） -->
        <div class="l-stack main-content">
          <header class="page-header">
            <h1>ページタイトル</h1>
            <div class="l-cluster">
              <!-- ページレベルのアクションボタン -->
            </div>
          </header>

          <section>
            <h2>セクション見出し</h2>
            <!-- コンテンツ -->
          </section>
        </div>

        <!-- action-bar は main 直下、main-content の外（オプション） -->
      </main>

      <!-- shell-footer は shell-main 内、main の外（オプション） -->
    </div>
  </div>
</body>
</html>
```

**重要:**
- `main-content` には必ず `l-stack` クラスを併用する（セクション間の gap: 3rem が自動設定）
- `mobile-header` は `shell` 直下、`shell-sidebar` の前に配置
- `page-header` は `main-content` の中。h1 + アクションボタンを左右に分離
- `main-nav` は `main` 直下。`position: sticky; top: 0` で固定される
- `c-breadcrumb` の最後の `<li>` に `aria-current="page"`。ルートはアイコンのみ + `aria-label`

### main-nav（パンくず帯）

```html
<nav class="main-nav" aria-label="パンくず">
  <ol class="c-breadcrumb">
    <li><a href="/index.php" aria-label="ダッシュボード"><i data-lucide="house"></i></a></li>
    <li><a href="/pages/demo/articles/">記事</a></li>
    <li aria-current="page">編集</li>
  </ol>
  <div class="l-cluster">
    <a href="#" class="c-button ghost small"><i data-lucide="bell"></i><span class="c-dot count">3</span></a>
  </div>
</nav>
```

- `display: flex; justify-content: space-between` でパンくずと右側アクションを分離
- パンくずは `<ol>` でリスト化
- 右側に通知ボタン、テーマ切替等を配置

### page-header

```html
<header class="page-header">
  <h1>記事一覧</h1>
  <div class="l-cluster">
    <button class="c-button ghost small"><i data-lucide="download"></i>エクスポート</button>
    <a href="/articles/edit.php" class="c-button primary small"><i data-lucide="plus"></i>新規作成</a>
  </div>
</header>
```

- `display: flex; align-items: center; justify-content: space-between`
- 48rem 以下で `flex-wrap` が有効化され、ボタンが次の行に折り返す
- `page-header` は `main-content` の中に配置（スクロールで消える）

**アンチパターン:**
```html
<!-- NG: page-header なしで h1 を直接置く -->
<div class="l-stack main-content">
  <h1>タイトル</h1>  <!-- アクションボタンの配置場所がない -->
</div>

<!-- NG: main-nav の中に h1 を置く -->
<nav class="main-nav">
  <h1>タイトル</h1>  <!-- パンくず帯はナビゲーション用 -->
</nav>
```

---

## セクショニングとアウトライン

### 見出しルール

- **見出しレベルのスキップ禁止**（h1 → h2 → h3）
- h1 は `page-header` 内に1つだけ
- h2 はセクション見出し（装飾付き: `border-image` で左端アクセントライン）
- h3 はサブセクション見出し
- カード内・モーダル内・`shell-standalone` 内では見出し装飾をリセット

### セクション構造

```html
<!-- 正しい: section + 見出し -->
<section>
  <h2>基本情報</h2>
  <div class="c-fields">...</div>
</section>

<!-- 正しい: カードに見出しを使う場合は section で囲む -->
<section class="c-card">
  <h3>認証アプリ</h3>
  <p>説明文</p>
</section>
```

**アンチパターン:**
```html
<!-- NG: 見出しなしの section -->
<section>
  <div class="c-fields">...</div>
</section>

<!-- NG: 見出しレベルのスキップ -->
<section>
  <h2>セクション</h2>
  <section>
    <h4>サブセクション</h4> <!-- h3 を飛ばしている -->
  </section>
</section>

<!-- NG: div で意味的なセクションを作る -->
<div>
  <h2>セクション</h2>
  <p>内容</p>
</div>
```

### フォーム内のセクション分け

`<section>` + `<h2>` で行う。`<fieldset>` / `<legend>` は使わない。

**form のラッパークラス:**
- `form.contents`: `display: contents` で form をレイアウト上「透明」にする。`l-stack main-content` 直下で section を並べる場合に使用。form 自体に padding/border/background は付けられない
- `form.l-stack`: form 自体を flex column にする。タブパネル内でセクションを並べる場合に使用
- form に `c-fields` を付けない（gap: 1.25rem がセクション間にも適用され、間隔が狭くなる）

```html
<form class="contents" data-js-prevent-submit>
  <section>
    <h2>基本情報</h2>
    <div class="c-fields horizontal">...</div>
  </section>
  <section>
    <h2>公開設定</h2>
    <div class="c-fields">...</div>
  </section>
  <div class="l-cluster right">
    <button type="submit" class="c-button primary">保存</button>
  </div>
</form>
```

→ デモ: `/pages/demo/settings.php`

---

## 余白の設計

### 基本ルール

section 内は `display: flex; flex-direction: column`。**gap は使わない。**
要素間の余白は全て `* + *` 隣接セレクタの margin-top で制御する。

```css
main section > * + * { margin-top: 1rem; }       /* デフォルト間隔 */
main section > * + section { margin-top: 2.5rem; } /* section 間は広く */
main section > h2 + * { margin-top: 1.5rem; }     /* 見出し直後 */
main section > h3 + *,
main section > h4 + * { margin-top: 0.75rem; }
```

- first-child は `+` にマッチしないので自動的に margin-top: 0
- gap と margin の混在は避ける（加算が予測困難）

### main-content のセクション間隔

`main-content` は `l-stack` で `--l-stack-gap: 3rem`。セクション間に十分な間隔を確保する。

### タブパネル内のセクション間隔

タブパネル内にセクションを並べる場合、`l-stack` で囲む。tabs.css で `[role="tabpanel"] > .l-stack` の gap を 3rem に設定している。

```html
<div role="tabpanel" data-js-panel="tab-account">
  <form class="l-stack" onsubmit="return false">
    <section>...</section>
    <section>...</section>
    <div class="l-cluster right">...</div>
  </form>
</div>
```

→ デモ: `/pages/demo/profile.php`

**アンチパターン:**
```html
<!-- NG: form に c-fields クラスを付けてセクションを囲む -->
<!-- c-fields の gap: 1.25rem がセクション間にも適用され、間隔が狭くなる -->
<form class="c-fields">
  <section>...</section>
  <section>...</section>
</form>

<!-- NG: tabpanel に display: flex を直接設定する -->
<!-- hidden 属性の display: none を上書きしてしまう -->
```

---

## アクセシビリティ

### focus-visible

base 層で一括定義。個別コンポーネントでの記述は不要。
ただし `all: unset` を使用するコンポーネントではコンポーネント層で再定義が必要。

### prefers-reduced-motion

base 層で一括無効化。機能的アニメーション（c-progress, c-skeleton の「処理中」表示）はコンポーネント層で復元。

### スキップリンク

全ページに配置:
```html
<body>
  <a href="#main" class="skip-link">メインコンテンツへ</a>
  ...
  <main id="main">
```

### コントラスト比

- `--text-strong` vs `--surface-0`: AAA (7:1) 以上
- `--text-muted` vs `--surface-0`: AA (4.5:1) 以上
- `--accent` 上の白テキスト: AA (4.5:1) 以上
- **warning バッジ**: 黄色背景に白テキスト。WCAG コントラスト比は厳密には不足するが、視認性を優先して `--text-on-accent` で統一

### セマンティクス早見表

| コンポーネント | セマンティクス |
|---|---|
| サイドバーナビグループ | `role="group"` + `aria-labelledby` |
| c-dropdown | `role="menu"`, `role="menuitem"`, `aria-haspopup="menu"` |
| c-banner danger/warning | `role="alert"` |
| c-banner info/success | `role="status"` |
| c-toggle-group | `aria-pressed` で選択状態 |
| c-action-bar | `role="toolbar"` |
| c-modal | `<dialog>` 要素（ネイティブ） |
| c-tabs | `role="tablist"`, `role="tab"`, `role="tabpanel"` |
| c-divider（ラベル付き） | `role="separator"` |

### 印刷対応

→ CSS ソース: `src/css/base/print.css`

```css
@media print {
  .shell-sidebar, .skip-link { display: none !important; }
  .shell, .shell-main { display: block !important; }
  body { background: white !important; color: black !important; }
  h1, h2, h3 { break-after: avoid; }
  table, figure { break-inside: avoid; }
}
```

---

## CSS 設計ルール

### カスタムプロパティ

- クラス名と一致させる: `l-stack` → `--l-stack-gap`
- コンテンツ領域: `--content-padding-x` / `--content-padding-y`
- プライベート変数: `--_` プレフィックス（`--_accent`, `--_value`）
- テーマトークン: セマンティック名（`--surface-0`, `--text-strong`, `--accent`）
- ダークナビ用: `--nav-*` プレフィックス

### 色の設計ルール

- テーマの surface hue はアクセントカラーと統一
- `--input-bg` はフォーム入力・カード・モーダル等の「白背景」用トークン
- ステータスカラーはテーマ非依存、モード依存（dark で明度UP）
- transparent ベースの `color-mix` はダーク背景で白が透ける → 不透明な oklch 値を使う

### ビルド

- CSS: Lightning CSS でバンドル + minify
- JS: esbuild でバンドル（Lucide 含む）
- `npm run dev`: 開発ビルド（CSS + JS + theme-init コピー）
- `npm run build`: 本番ビルド（minify 追加）
- CSS/JS 変更後は必ず `npm run dev` でリビルド

| ソース | 出力 |
|---|---|
| `src/css/adminkit.css` | `dist/adminkit.min.css` |
| `src/js/adminkit.js` | `dist/adminkit.min.js`（Lucide バンドル済み） |
| `src/js/theme-init.js` | `dist/theme-init.js`（コピー） |

---

## パス規約

- 全ページのリンク・アセットパスは**ルート相対**（`/` 始まり）で統一
- CSS: `/dist/adminkit.min.css`、JS: `/dist/adminkit.min.js`
- サブディレクトリの PHP は `require_once __DIR__ . '/../../functions.php'` 等でルートの functions.php を参照

---

## JS の data 属性 API

| 属性 | 対象 | 動作 |
|---|---|---|
| `data-js-sidebar` | ボタン | モバイルドロワーの開閉 |
| `data-js-theme` | ボタン | ダーク/ライト切替 |
| `data-js-theme-style` | radio | テーマスタイル切替（Ink/Stone/Dusk/Volt） |
| `data-js-theme-mode` | radio | テーマモード切替（Light/Dark） |
| `data-js-open="id"` | ボタン | `data-js-dialog="id"` のモーダルを開く |
| `data-js-dialog="id"` | dialog | モーダル本体 |
| `data-js-close` | ボタン | 最寄りの dialog を閉じる |
| `data-js-tab="id"` | ボタン | タブ切替。`data-js-panel="id"` のパネルを表示 |
| `data-js-panel="id"` | div | タブパネル本体 |
| `data-js-banner-close` | ボタン | 最寄りの `.c-banner` を削除 |
| `data-href` | tr | 行クリックで遷移。リンク・ボタン・input は除外 |
| `data-js-table-check="key"` | table | テーブルチェックボックス連動。全選択 + 行チェック |
| `data-js-table-check-show="key"` | 任意 | 選択時に表示（`hidden` 切替 + `<strong>` にカウント） |
| `data-js-table-check-activate="key"` | 任意 | 選択時に子要素の `disabled` を解除 |
| `data-js-back` | ボタン | `history.back()` で前のページに戻る |
| `data-js-reload` | ボタン | `location.reload()` でページを再読み込み |
| `data-js-prevent-submit` | form | `event.preventDefault()` で送信を無効化（**デモ専用**: `demo.js` で実装。adminkit 本体には含まれない） |

---

## キーボードナビゲーション

### タブ（WAI-ARIA Tabs パターン）

admin.js が自動で以下のキー操作を提供:

| キー | 動作 |
|---|---|
| `ArrowRight` / `ArrowDown` | 次のタブに移動 |
| `ArrowLeft` / `ArrowUp` | 前のタブに移動 |
| `Home` | 先頭のタブに移動 |
| `End` | 末尾のタブに移動 |

- `tabindex` は自動管理: 選択中のタブのみ `tabindex="0"`、他は `tabindex="-1"`
- `role="tablist"` / `role="tab"` が正しく設定されていれば自動で有効化

### ドロップダウン（WAI-ARIA Menu パターン）

| キー | 動作 |
|---|---|
| `ArrowDown` | 次のメニューアイテムに移動 |
| `ArrowUp` | 前のメニューアイテムに移動 |
| `Home` | 先頭のメニューアイテムに移動 |
| `End` | 末尾のメニューアイテムに移動 |
| `Escape` | メニューを閉じる（Popover API） |

- popover 表示時に最初の `[role="menuitem"]` に自動フォーカス
- `role="menu"` / `role="menuitem"` が正しく設定されていれば自動で有効化

---

## 開発ルール

- 場当たり的な対処はせず、常に根本解決を試みる
- 推測で修正を繰り返さず、原因を特定してから対処する
- 指示されていない変更は行わない
- 「どんな構成でも壊れないか」を常に考える
