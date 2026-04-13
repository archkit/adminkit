# レイアウト

---

## レイアウトプリミティブ

→ CSS ソース: `src/css/layout/primitives.css`

### l-stack

垂直方向の均等間隔。

```html
<div class="l-stack">
  <section>...</section>
  <section>...</section>
</div>
```

```css
.l-stack { display: flex; flex-direction: column; gap: var(--l-stack-gap, 1rem); }
```

gap のカスタマイズ: `style="--l-stack-gap: 2rem"`

**main-content 内の l-stack:**
- 直下: `--l-stack-gap: 3rem`（セクション間隔）
- ネスト時: `--l-stack-gap: 1rem` に自動リセット

**l-stack の gap 自動設定:**

| コンテキスト | --l-stack-gap | 設定元 |
|---|---|---|
| `main-content` 直下 | 3rem | shell.css |
| `main-content` 内のネスト | 1rem（リセット） | shell.css |
| `[role="tabpanel"]` 直下 | 3rem | tabs.css |
| その他 | 1rem（デフォルト） | primitives.css |

**アンチパターン:**
```html
<!-- NG: l-stack と margin-top の併用 -->
<!-- gap と margin が加算され予測困難 -->
<div class="l-stack">
  <section style="margin-top: 2rem">...</section>
</div>

<!-- NG: main-content に l-stack を付け忘れる -->
<div class="main-content">  <!-- セクション間の gap が適用されない -->
```

### l-cluster

水平方向の折り返し配置。

```html
<div class="l-cluster">
  <button class="c-button">キャンセル</button>
  <button class="c-button primary">保存</button>
</div>
```

| バリアント | 効果 |
|---|---|
| `.center` | `justify-content: center` |
| `.right` | `justify-content: flex-end` |

→ デモ: `/pages/components/layouts.php`

### l-sidebar

メイン + サイド 2カラム。HTML の記述順はメイン → サイド（アクセシビリティ的にメインコンテンツが先）。

```html
<!-- 右サイドバー（デフォルト） -->
<div class="l-sidebar">
  <div class="l-stack"><!-- メインエリア --></div>
  <div class="l-stack"><!-- サイドバー（右） --></div>
</div>

<!-- 左サイドバー -->
<div class="l-sidebar reverse">
  <div class="l-stack"><!-- メインエリア --></div>
  <div class="l-stack"><!-- サイドバー（左に表示） --></div>
</div>
```

- 1番目の子: `flex-grow: 999; min-inline-size: 55%`（メイン）
- 2番目の子: `flex-basis: var(--l-sidebar-w, 16rem); flex-grow: 1`（サイド）
- `.reverse`: `flex-direction: row-reverse` で視覚的にサイドを左に配置（HTML の論理順序は変わらない）
- 幅が足りない場合は自動的に1カラムに折り返し

→ デモ: `/pages/components/layouts.php`, `/pages/demo/articles/edit.php?id=1`

**アンチパターン:**
```html
<!-- NG: 子要素が3つ以上 -->
<div class="l-sidebar">
  <div>メイン</div>
  <div>サイド</div>
  <div>余分</div> <!-- first-child/last-child ルールが崩れる -->
</div>

<!-- NG: 左サイドバーのために HTML の順序を入れ替える -->
<div class="l-sidebar">
  <div>サイド</div>  <!-- メインより先にサイドを書く -->
  <div>メイン</div>
</div>
<!-- → .reverse を使う -->
```

### l-grid

自動フィルグリッド。

```html
<div class="l-grid"><!-- auto-fill で自動折り返し --></div>
<div class="l-grid cols-2"><!-- 固定2カラム --></div>
<div class="l-grid cols-3"><!-- 固定3カラム --></div>
```

- デフォルト: `repeat(auto-fill, minmax(15.625rem, 1fr))`
- `.cols-2` / `.cols-3` / `.cols-4`: 固定カラム（48rem 以下で1カラム化）

→ デモ: `/pages/components/layouts.php`

### l-center

幅制約 + 中央配置。

```html
<div class="l-center" style="--l-center-max: 40rem">...</div>
```

### l-switcher

幅に応じて縦横自動切替。

```html
<div class="l-switcher" style="--l-switcher-threshold: 30rem">
  <div>左</div>
  <div>右</div>
</div>
```

### l-frame

アスペクト比固定コンテナ。

```html
<div class="l-frame" style="--l-frame-ratio: 16 / 9">
  <img src="..." alt="...">
</div>
```

---

## シェル

→ CSS ソース: `src/css/layout/shell.css`

### 共通構造

```
body:has(.shell) → overflow: hidden（body スクロール無効化）
.shell → CSS Grid, height: 100dvh
├── .shell-sidebar → flex column, ダーク調
└── .shell-main → Grid
    ├── main → flex column
    │   ├── nav.main-nav → sticky パンくず帯
    │   ├── .main-content → flex: 1, overflow-y: auto
    │   └── .c-action-bar → sticky bottom（オプション）
    └── footer.shell-footer → auto height（オプション）
```

**main-content のコンテンツ幅:**

| クラス | 幅 | 配置 | 用途 |
|---|---|---|---|
| （なし） | 60rem | 左寄せ | 詳細、編集、設定 |
| `.center` | 60rem | 中央寄せ | トップナビ等 |
| `.wide` | 80rem | 左寄せ | 幅広コンテンツ |
| `.full` | 制限なし | — | ダッシュボード、一覧 |

**action-bar の配置:**
- `main-content` の**外**、`main` 直下に配置
- `main-content` 内に置くと padding 方式の幅制限と干渉する

**shell-footer の配置:**
- `shell-main` 内、`main` の**外**に配置
- action-bar と独立して動作する

### sidebar パターン

`data-layout="sidebar"` — 左サイドバー + メインエリア。

```html
<div class="shell" data-layout="sidebar">
  <aside class="shell-sidebar">...</aside>
  <div class="shell-main">
    <main>...</main>
  </div>
</div>
```

→ CSS: `src/css/layout/patterns/sidebar.css`
→ デモ: `/pages/layout/sidebar.php`

**サイドバーの設計:**
- 常にダーク調（テーマモード非依存）。`--nav-*` トークンを参照
- `color: var(--text-strong)` の明示的再代入が必要
- nav の `overflow-y: auto` でスクロール。`scrollbar-width: thin` + ホバー表示
- `li > a` / `summary` は `position: relative` + `display: flex`（バッジ配置用）
- アコーディオンのアニメーション: `interpolate-size: allow-keywords`
- ツリーライン: `::details-content` の `border-left`
- レスポンシブ: 75rem 以下でモバイルドロワー

**サイドバーのバッジ/ドット:**

`li > a` 内にバッジ（c-badge）やドット（c-dot）を配置できる。`margin-left: auto` が CSS で自動適用されるため、右端に寄る。アコーディオン summary には付けない（chevron と競合）。

```html
<!-- c-badge: 件数表示（右端寄せ） -->
<li><a href="/comments.php">
  <i data-lucide="message-square"></i>
  <span>コメント</span>
  <span class="c-badge danger">8</span>
</a></li>

<!-- c-dot: 通知ドット（右端寄せ、position: static に自動切替） -->
<li><a href="/index.php">
  <i data-lucide="layout-dashboard"></i>
  <span>ダッシュボード</span>
  <span class="c-dot"></span>
</a></li>
```

→ デモ: `/parts/sidebar.php`

**アンチパターン:**
```html
<!-- NG: summary にバッジを付ける（chevron と重なる） -->
<summary>
  <i data-lucide="file-text"></i><span>記事</span>
  <span class="c-badge">5</span>
</summary>

<!-- NG: c-dot を li > a の外に置く（flex の margin-left: auto が効かない） -->
<li>
  <a href="/index.php"><i data-lucide="home"></i><span>ホーム</span></a>
  <span class="c-dot"></span>
</li>
```

**サブメニュー（アコーディオン）:**

```html
<li>
  <details>
    <summary><i data-lucide="file-text"></i><span>記事</span></summary>
    <ul>
      <li><a href="/articles/"><i data-lucide="list"></i><span>一覧</span></a></li>
      <li><a href="/articles/edit.php"><i data-lucide="plus"></i><span>新規追加</span></a></li>
      <li><a href="/articles/categories.php"><i data-lucide="tag"></i><span>カテゴリ</span></a></li>
    </ul>
  </details>
</li>
```

- `<details>` でネイティブの開閉を実現
- ツリーラインは `::details-content` の `border-left` で描画
- `interpolate-size: allow-keywords` で `height: 0 → auto` のアニメーション
- アクティブページの details は JS で自動的に `open` 属性が付与される

**ナビグループ:**

```html
<nav aria-label="サイドバー">
  <ul>
    <li><a href="/"><i data-lucide="layout-dashboard"></i><span>ダッシュボード</span></a></li>
  </ul>

  <div role="group" aria-labelledby="nav-pages">
    <span class="label" id="nav-pages">デモページ</span>
    <ul>
      <li><a href="/articles"><i data-lucide="file-text"></i><span>記事</span></a></li>
      <li><a href="/users"><i data-lucide="users"></i><span>ユーザー</span></a></li>
    </ul>
  </div>
</nav>
```

- グループラベルには `<span class="label">` を使用（`<h2>` 等の見出し要素は使わない）
- `aria-labelledby` で `role="group"` のラベルを紐付け
- グループ不要なら `nav > ul` のみで十分

### mini パターン

`data-layout="mini"` — アイコンのみ表示、ホバーで展開。

```html
<div class="shell" data-layout="mini">
  <aside class="shell-sidebar">...</aside>
  <div class="shell-main">...</div>
</div>
```

→ CSS: `src/css/layout/patterns/sidebar-mini.css`
→ デモ: `/pages/layout/mini.php`

**設計:**
- 明示指定時のみ有効（自動切替なし）
- 縦スクロール非対応（`overflow: visible` でホバー展開を優先）
- ホバー展開時の背景は不透明な oklch 値
- ヘッダーは `::first-letter` で自動1文字表示
- サブメニュー `li:hover` は親の幅拡張を継承しないようリセット

**アンチパターン:**
```html
<!-- NG: mini でサブメニュー li にバッジを付ける -->
<!-- ホバー展開で位置がずれる -->
```

### topnav パターン

`data-layout="topnav"` — サイドバーなし、上部ナビゲーション。

```html
<div class="shell" data-layout="topnav">
  <header class="shell-topnav">...</header>
  <div class="shell-main">...</div>
</div>
```

→ CSS: `src/css/layout/patterns/topnav.css`
→ デモ: `/pages/layout/topnav.php`

### double パターン

`data-layout="double"` — メインサイドバー + サブサイドバーの3カラム。

```html
<div class="shell" data-layout="double">
  <aside class="shell-sidebar">...</aside>
  <nav class="shell-sub-sidebar" aria-label="設定メニュー">
    <h2>設定</h2>
    <ul>
      <li><a href="#" aria-current="page">一般</a></li>
      <li><a href="#">表示</a></li>
    </ul>
  </nav>
  <div class="shell-main">...</div>
</div>
```

→ デモ: `/pages/layout/double.php`

**設計:**
- Grid: `240px 200px 1fr`
- サブサイドバーはライトテーマ（メインサイドバーと視覚的に区別）
- 設定画面など階層的なナビゲーションに適する

### standalone パターン

シェル外ページ（ログイン、エラー等）。

```html
<main class="shell-standalone">
  <form>...</form>
</main>
```

- デフォルト: `max-width: 40rem`
- `.narrow`: `max-width: 24rem`（ログイン等）
- `.wide`: `max-width: 56rem`

→ デモ: `/pages/layout/standalone.php`, `/pages/layout/login.php`

### エラーページ（c-error-page）

→ CSS: `src/css/components/error-page.css`
→ デモ: `/pages/layout/error.php`

`shell-standalone` 内で使用するエラーページ用コンポーネント。

```html
<main class="shell-standalone">
  <section class="c-error-page">
    <h1><span class="error-code">404</span>ページが見つかりません</h1>
    <p>お探しのページは存在しないか、移動した可能性があります。</p>
    <div class="l-cluster center">
      <button data-js-back class="c-button">前のページへ</button>
      <a href="/index.php" class="c-button primary">ダッシュボードへ</a>
    </div>
  </section>
</main>
```

- `.error-code`: エラーコード番号。`display: block` で h1 内の上段に大きく表示。テーマのアクセントカラーを装飾的に使用
- `.error-code.danger`: 500 系エラー用。`--status-fail` で赤系表示
- `section` でセクショニング。`h1` は見出しとして先頭に配置

### footer パターン

```html
<div class="shell-main">
  <main>...</main>
  <footer class="shell-footer">
    <p>&copy; 2026 adminkit</p>
    <nav><a href="#">プライバシーポリシー</a></nav>
  </footer>
</div>
```

→ デモ: `/pages/layout/footer.php`

**アンチパターン:**
```html
<!-- NG: footer を main の中に置く -->
<!-- action-bar と干渉する -->
<main>
  <div class="main-content">...</div>
  <footer class="shell-footer">...</footer>
</main>
```

---

## ユーティリティクラス

→ CSS ソース: `src/css/utilities/helpers.css`

| クラス | 用途 |
|---|---|
| `.visually-hidden` | スクリーンリーダーには表示、視覚的に非表示 |
| `.visually-hidden-focusable` | フォーカス時に表示（スキップリンク等） |
| `.hidden` | 完全非表示 |
| `.hidden-sm` | モバイル以下で非表示（< 48rem） |
| `.hidden-lg` | デスクトップ以上で非表示（>= 75rem） |
| `.truncate` | 1行テキスト省略 |
| `.line-clamp-2` / `.line-clamp-3` | 複数行テキスト省略 |
| `.text-center` / `.text-right` | テキスト揃え |
| `.contents` | `display: contents`（form 等のラッパーを透過） |
| `.gap-0` ~ `.gap-8` | gap ユーティリティ |
| `.center` / `.wide` / `.full` | main-content の幅制御 |
