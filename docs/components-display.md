# Display コンポーネント

データ表示・情報提示に使うコンポーネント群。

---

## c-card

→ CSS: `src/css/components/card.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<section class="c-card">
  <h3>カードタイトル</h3>
  <p>カードの内容。</p>
</section>
```

- `display: flex; flex-direction: column; gap: 0.75rem` で子要素を縦に並べる
- `background: var(--input-bg)` / `border: 1px solid var(--border-muted)` / `border-radius: var(--radius)`
- `padding: 1.5rem`
- カード内の見出し（h2, h3, h4）は装飾・余白を自動リセット（`margin: 0; padding: 0; border: none`）

### バリアント

| クラス | 効果 |
|---|---|
| `.danger` | 左ボーダー 3px が `var(--status-fail)`（赤）。左上・左下の角丸が 0 になる |

```html
<section class="c-card danger">
  <h3>Danger Zone</h3>
  <p>この操作は取り消せません。</p>
  <div class="l-cluster">
    <button class="c-button danger">アカウントを削除</button>
  </div>
</section>
```

### ユースケース

- 情報のグループ化（プロフィール、設定セクション等）
- Danger Zone（アカウント削除等の危険な操作の囲み）
- 空状態（`c-empty-state` をカード内に配置）

### アンチパターン

- **`<div>` で囲んで見出しを使う** — カードに見出しを含める場合は `<section class="c-card">` でセクショニングすること。`<div class="c-card">` + `<h3>` はセマンティクス違反
- **danger バリアントで border-left が消える** — `border-left-width: 3px` は `.danger` クラス側で設定されるため、カスタム CSS で `border: none` 等を上書きすると左ボーダーも消える。border を個別にリセットする場合は `border-left` を維持すること

---

## c-table

→ CSS: `src/css/components/table.css`
→ デモ: `/pages/components/modules.php`

### 基本構造

```html
<div class="c-table-scroll">
  <table class="c-table">
    <thead>
      <tr>
        <th>名前</th>
        <th>メール</th>
        <th>ステータス</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>田中太郎</td>
        <td>tanaka@example.com</td>
        <td><span class="c-badge success">有効</span></td>
      </tr>
    </tbody>
  </table>
</div>
```

- `width: 100%; border-collapse: collapse; font-size: 0.875rem`
- thead: `font-size: 0.6875rem; text-transform: uppercase; letter-spacing: 0.04em; border-bottom: 3px double var(--border)`
- tbody: `border-bottom: 1px solid var(--border-muted)` + ホバー時 `background: var(--surface-50)`
- `c-table-scroll` ラッパーで `overflow-x: auto`、テーブルに `min-width: 40rem` を設定

### バリアント

| クラス / 属性 | 効果 |
|---|---|
| `.compact` | th/td の padding を `0.375rem 0.75rem` に縮小 |
| `.auto` | `width: auto`（コンテンツ幅に合わせる） |
| `.num` | td/th に付与。右揃え + `font-variant-numeric: tabular-nums` |
| `.action` | td/th に付与。右揃え + `white-space: nowrap` + `width: 1%`（幅最小化） |
| `th[aria-sort]` | ソート対応列。`cursor: pointer; user-select: none`。ascending で ▲、descending で ▼ を `::after` で表示 |

**ソート対応列:**

```html
<thead>
  <tr>
    <th aria-sort="ascending"><button>名前</button></th>
    <th aria-sort="none"><button>メール</button></th>
    <th>ロール</th> <!-- ソート不可 -->
  </tr>
</thead>
```

- ソート可能な列は `th` 内に `<button>` を配置
- `aria-sort` の値: `ascending`（昇順）/ `descending`（降順）/ `none`（未ソート）

**チェックボックス列（行選択）:**

```html
<table class="c-table" data-js-table-check="users">
  <thead>
    <tr>
      <th><input type="checkbox" aria-label="全選択"></th>
      <th>名前</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="checkbox" aria-label="田中太郎を選択"></td>
      <td>田中太郎</td>
    </tr>
  </tbody>
</table>
```

- チェックボックス列は `width: 1%; padding-inline: 0.75rem; text-align: center` で自動幅最小化
- チェック済み行は `background: var(--accent-soft)` でハイライト
- `data-js-table-check="key"` で全選択・行チェックを JS が連動制御
- `data-js-table-check-show="key"` で選択時に表示される要素を制御
- `data-js-table-check-activate="key"` で選択時に子要素の `disabled` を解除

**行クリック遷移（`data-href`）:**

```html
<tr data-href="/pages/demo/articles/detail.php?id=1">
  <td>2026年の展望</td>
  <td>田中太郎</td>
  <td class="action">
    <div class="c-dropdown">...</div>
  </td>
</tr>
```

- `data-href` で行クリック時の遷移先を指定
- リンク（`<a>`）、ボタン（`<button>`）、input のクリックは除外される

### ユースケース

- 一覧ページ（ユーザー、記事、注文等）
- ソート可能なデータテーブル
- 一括操作（チェックボックス + action bar）

### アンチパターン

- **`c-table-scroll` なしで横スクロールできない** — レスポンシブで横幅が足りない場合にテーブルがはみ出す。必ず `c-table-scroll` で囲むこと
- **action 列に `l-cluster` を使う** — `.action` 列内に `l-cluster` は不要。`> .flex` の `flex-wrap: nowrap` が既に設定されており、l-cluster の gap と競合する
- **`data-js-table-check` の key 不一致** — `data-js-table-check="users"` と `data-js-table-check-show="user"` のように key が一致しないと連動しない。全て同じ key 文字列を使うこと

---

## c-list

→ CSS: `src/css/components/list.css`
→ デモ: `/pages/components/modules.php`

### 基本構造

```html
<ul class="c-list">
  <li>項目 1</li>
  <li>項目 2</li>
  <li>項目 3</li>
</ul>
```

- `display: flex; flex-direction: column; font-size: 0.875rem`
- 各 `li` は `padding: 0.625rem 0; border-bottom: 1px solid var(--border-muted)`（最後の li は border なし）

**定義リスト（dl）:**

```html
<dl class="c-dl bordered">
  <div><dt>名前</dt><dd>田中太郎</dd></div>
  <div><dt>メール</dt><dd>tanaka@example.com</dd></div>
</dl>
```

- `c-dl` は `div` で `dt` + `dd` をグループ化。各 div 内は `flex-direction: column; gap: 0.25rem`
- dt: `font-weight: 600; font-size: 0.75rem`

### バリアント

| クラス | 対象 | 効果 |
|---|---|---|
| `.disc` | c-list | `list-style: disc` + 左 padding |
| `.decimal` | c-list | `list-style: decimal` + 左 padding |
| `.bordered` | c-list / c-dl | 外枠ボーダー + 角丸 + `background: var(--input-bg)` + li の左右 padding 追加 |
| `.striped` | c-list / c-dl | 偶数行に `background: var(--surface-50)` |
| `.interactive` | c-list | `cursor: pointer` + ホバー時にアクセントカラー 5% の背景 |
| `.horizontal` | c-dl | dt/dd を横並び。dt は `width: 10rem` 固定 |

### ユースケース

- 詳細ページのメタ情報一覧
- 設定ページの項目リスト
- 定義リストでのキー・バリュー表示

### アンチパターン

- **`c-dl` で `div` を省略する** — `dt` と `dd` を `div` でグループ化しないと、CSS の flex レイアウトが崩れる

---

## c-badge

→ CSS: `src/css/components/badge.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<span class="c-badge">Default</span>
<span class="c-badge primary">Primary</span>
<span class="c-badge success">有効</span>
<span class="c-badge warning">無効</span>
<span class="c-badge danger">エラー</span>
```

- `display: inline-flex; align-items: center; justify-content: center`
- `min-width: 1.25rem; height: 1.375rem; padding: 0 0.5rem`
- `border-radius: 999px`（ピル型）
- `font-size: 0.75rem; font-weight: 600; line-height: 1; white-space: nowrap`
- デフォルト: `background: var(--surface-50); color: var(--text-muted)`

### バリアント

| クラス | 背景 | テキスト色 |
|---|---|---|
| `.primary` | `var(--accent)` | `var(--text-on-accent)` |
| `.success` | `var(--status-ok)` | `var(--text-on-accent)` |
| `.warning` | `var(--status-warn)` | `var(--text-on-accent)` |
| `.danger` | `var(--status-fail)` | `var(--text-on-accent)` |

全カラーバリアントは `--_accent` パターンで背景色と border-color を統一設定。

### ユースケース

- テーブル内のステータス表示（有効/無効/停止等）
- KPI カードの前月比表示
- ナビゲーション内の件数表示

### アンチパターン

- **warning バリアントに白テキストを使う** — `var(--text-on-accent)` は CSS 側で設定済み。カスタムで `color: white` を上書きすると、warning の黄色背景に白テキストはコントラスト不足で WCAG 違反になる。CSS の設計に任せること

---

## c-tag

→ CSS: `src/css/components/tag.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<div class="c-tag-list">
  <span class="c-tag">Default</span>
  <span class="c-tag primary">Primary</span>
  <span class="c-tag success">Success</span>
</div>
```

- `display: inline-flex; align-items: center; gap: 0.25rem`
- `white-space: nowrap; padding: 0.25rem 0.5rem`
- `border: 1px solid var(--border-muted); border-radius: var(--radius)`
- `font-size: 0.75rem; font-weight: 500; line-height: 1`
- デフォルト: `background: var(--surface-50); color: var(--text-strong)`

**削除ボタン付き:**

```html
<span class="c-tag primary">
  React
  <button type="button" aria-label="削除"><i data-lucide="x"></i></button>
</span>
```

- 削除ボタンは `padding: 0; margin: -0.125rem -0.25rem -0.125rem 0`（タグ内に収まるよう調整）
- ホバーで `color: var(--text-strong)`

**アイコン付き:**

```html
<span class="c-tag"><i data-lucide="user"></i>ユーザー</span>
```

- svg アイコンは `width/height: var(--icon-sm); color: var(--text-muted)`

### バリアント

| クラス | 背景 | ボーダー | テキスト色 |
|---|---|---|---|
| `.primary` | `var(--accent-soft)` | accent 30% | `var(--accent)` |
| `.success` | status-ok 12% | status-ok 30% | `var(--status-ok)` |
| `.warning` | status-warn 12% | status-warn 30% | `var(--status-warn)` |
| `.danger` | status-fail 12% | status-fail 30% | `var(--status-fail)` |

カラーバリアントは badge と異なり、薄い背景 + 色付きテキストのソフトスタイル。

### c-tag-list

```html
<div class="c-tag-list">
  <!-- 複数の c-tag -->
</div>
```

- `display: flex; flex-wrap: wrap; gap: 0.375rem`
- 複数タグを並べる際の折り返し・間隔を制御

### ユースケース

- 記事のカテゴリ・タグ表示
- フィルタの選択状態表示（削除ボタン付き）
- スキル・技術スタック一覧

### アンチパターン

- **`c-tag-list` の外でフレックス配置する場合の折り返し** — `c-tag` は `white-space: nowrap` のため、親要素に `flex-wrap: wrap` がないと横に並び続けてはみ出す。複数タグを並べる場合は `c-tag-list` を使うか、親に `flex-wrap: wrap` を明示すること

---

## c-avatar

→ CSS: `src/css/components/avatar.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<span class="c-avatar" aria-label="田中">田</span>
```

- `display: inline-flex; align-items: center; justify-content: center`
- `width: 2rem; height: 2rem; border-radius: 9999px`
- `font-size: 0.75rem; font-weight: 600`
- `background: var(--surface-100); color: var(--text-muted)`
- `object-fit: cover`（img 要素として使う場合にも対応）
- `vertical-align: middle`（テキストとの垂直揃え）

### バリアント

| クラス | サイズ | フォントサイズ |
|---|---|---|
| `.small` | 1.5rem x 1.5rem | 0.625rem |
| （なし） | 2rem x 2rem | 0.75rem |
| `.large` | 3rem x 3rem | 1rem |

### ユースケース

- ユーザーアイコン（テキストイニシャル表示）
- コメント・チャットのアバター
- テーブル行内のユーザー表示

### アンチパターン

- **`aria-label` の欠落** — テキスト表示のアバターはスクリーンリーダーに「田」としか読まれない。`aria-label="田中太郎"` でフルネームを指定すること

---

## c-stats

→ CSS: `src/css/components/stats.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<div class="c-stats">
  <h3>ユーザー数</h3>
  <span class="c-stats-value">1,284</span>
  <span class="c-stats-sub">前月比 <span class="c-badge success">+12.5%</span></span>
</div>
```

- `display: flex; flex-direction: column; gap: 0.5rem`
- `background: var(--input-bg); border: 1px solid var(--border-muted); border-radius: var(--radius)`
- `padding: 1.25rem 1.5rem`
- 見出し: `font-size: 0.75rem; font-weight: 500; color: var(--text-muted)` に自動リセット
- `.c-stats-value`: `font-size: 1.75rem; font-weight: 700; line-height: 1; font-variant-numeric: tabular-nums`
- `.c-stats-sub`: `font-size: 0.75rem; color: var(--text-muted)` + flex で横並び

### バリアント

**アクセントバー付き（`.accent`）:**

```html
<div class="c-stats accent">
  <h3>アクティブユーザー</h3>
  <span class="c-stats-value">842</span>
</div>
```

- `border-left: 3px solid var(--accent); border-radius: 0 var(--radius) var(--radius) 0`

**アイコン付き（`.with-icon`）:**

```html
<div class="c-stats with-icon">
  <div class="c-stats-icon"><i data-lucide="users"></i></div>
  <div class="c-stats-body">
    <h3>総ユーザー数</h3>
    <span class="c-stats-value">1,284</span>
    <span class="c-stats-sub">前月比 +12.5%</span>
  </div>
</div>
```

- `flex-direction: row; align-items: flex-start; gap: 1rem`
- `.c-stats-icon`: `2.5rem x 2.5rem` の角丸ボックス。`background: var(--accent-soft); color: var(--accent)`。アイコンは `var(--icon-lg)`
- `.c-stats-body`: `flex-direction: column; gap: 0.5rem; min-width: 0`

### ユースケース

- ダッシュボードの KPI カード
- `l-grid cols-4` で 4 列並べるのが典型パターン
- 前月比を `c-badge` と組み合わせて表示

### 見出しレベルについて

- c-stats 内の見出しはセマンティックなセクション見出しではなく、KPI のラベルとして使用される
- 見出しレベルは親セクションの構造に合わせること（h2 セクション内なら h3）

### アンチパターン

- **`with-icon` で `.c-stats-body` を省略する** — アイコン付きレイアウトでは見出し・値・サブテキストを `.c-stats-body` で囲む必要がある。省略すると flex レイアウトが崩れる

---

## c-progress

→ CSS: `src/css/components/progress.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<progress class="c-progress" value="60" max="100" aria-label="進捗"></progress>
```

- ネイティブ `<progress>` 要素を使用（indeterminate は非対応）
- `appearance: none; width: 100%; height: 0.5rem; border-radius: 9999px`
- バー背景: `var(--border-muted)`
- バー値: `var(--_accent)`（デフォルトは `var(--accent)`）
- Webkit / Firefox 両対応（`::-webkit-progress-bar`, `::-webkit-progress-value`, `::-moz-progress-bar`）
- Webkit のバー値には `transition: width var(--duration-slow) var(--easing)` のアニメーション付き

### バリアント

| クラス | バー色 |
|---|---|
| `.success` | `var(--status-ok)` |
| `.warning` | `var(--status-warn)` |
| `.danger` | `var(--status-fail)` |

**ページトップ（`.page-top`）:**

```html
<progress class="c-progress page-top" value="30" max="100" aria-label="ページ読み込み"></progress>
```

- `position: fixed; top: 0; left: 0; height: 3px; z-index: var(--z-toast)`
- `border-radius: 0; background: transparent`
- 画面最上部に薄いバーとして固定表示

**ラベル付き（`c-progress-labeled`）:**

```html
<div class="c-progress-labeled">
  <progress class="c-progress" value="73" max="100" aria-label="ストレージ使用量"></progress>
  <span>73%</span>
</div>
```

- `display: flex; align-items: center; gap: 0.75rem`
- progress は `flex: 1`、span は `font-size: 0.75rem; font-weight: 600; min-width: 3em; text-align: right`

### ユースケース

- ファイルアップロードの進捗表示
- ストレージ使用量
- ページ読み込みインジケーター（page-top）

### アンチパターン

- **`<div>` でプログレスバーを自作する** — ネイティブ `<progress>` を使うことでアクセシビリティが自動的に確保される。div + width で自作しないこと

---

## c-stepper

→ CSS: `src/css/components/stepper.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<ol class="c-stepper">
  <li class="done">アカウント情報</li>
  <li class="active">プラン選択</li>
  <li>お支払い</li>
  <li>完了</li>
</ol>
```

- `display: flex; counter-reset: step`
- 各 `li`: `flex: 1; flex-direction: column; align-items: center; gap: 0.5rem; font-size: 0.75rem`
- 番号丸（`::before`）: `counter-increment: step; content: counter(step); 2rem x 2rem; border-radius: 50%; border: 2px solid var(--border-muted)`
- ステップ間のライン（`li + li::after`）: `border-top: 2px solid var(--border-muted)` を absolute 配置

### バリアント

| クラス | 効果 |
|---|---|
| `.done` | 番号丸が `background: var(--accent); color: var(--text-on-accent); content: "✓"`。テキストが `color: var(--text-strong)`。次のステップとの間のラインが `border-color: var(--accent)` |
| `.active` | 番号丸のボーダーとテキストが `var(--accent)`。テキストが `font-weight: 600; color: var(--text-strong)` |
| （なし） | 未着手。灰色の番号丸とミュートテキスト |

### ユースケース

- 登録フロー（アカウント作成 → プラン選択 → 支払い → 完了）
- ウィザード形式のフォーム
- 注文ステータスの可視化

### アンチパターン

- **li にクラスを付け忘れて全て未着手に見える** — `.done` と `.active` を適切に設定しないと、全ステップが灰色の未着手状態で表示される。現在のステップには `.active`、完了済みには `.done` を必ず付与すること

---

## c-skeleton

→ CSS: `src/css/components/skeleton.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<div aria-busy="true">
  <span class="c-skeleton text" aria-label="読み込み中"></span>
  <span class="c-skeleton text" aria-label="読み込み中"></span>
  <span class="c-skeleton circle" aria-label="読み込み中"></span>
</div>
```

- `display: block; width: var(--w, 100%); height: var(--h, 1rem)`
- `border-radius: var(--radius); background: var(--border-muted)`
- `::after` で shimmer アニメーション（`skeleton-shimmer` 1.5s infinite）。`linear-gradient` で光が左から右へ流れる
- `prefers-reduced-motion: reduce` でもアニメーションは維持（機能的アニメーションのため）

### バリアント

| クラス | 効果 |
|---|---|
| `.circle` | `border-radius: 9999px`。デフォルトサイズ `2rem x 2rem` |
| `.text` | `height: var(--h, 0.75rem); border-radius: 0.25rem` |

### カスタムサイズ

`--w` / `--h` カスタムプロパティでサイズを変更できる。

```html
<span class="c-skeleton" style="--w: 12rem; --h: 2rem"></span>
```

### ユースケース

- データ読み込み中のプレースホルダー
- カード内のコンテンツローディング（circle + text の組み合わせ）
- テーブル行のローディング

### アンチパターン

- **`aria-busy="true"` の欠落** — スケルトンを含むコンテナに `aria-busy="true"` を設定しないと、スクリーンリーダーがローディング中であることを認識できない。ローディング完了時に `aria-busy="false"` に切り替えること
- **`aria-label` の欠落** — 個々のスケルトン要素にも `aria-label="読み込み中"` を付与すること

---

## c-dot

→ CSS: `src/css/components/dot.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<button class="c-button ghost">
  <i data-lucide="bell"></i>通知
  <span class="c-dot"></span>
</button>
```

- `position: absolute; top: 2px; right: 2px`（親要素に `position: relative` 必須）
- `c-button` は組み込みで `position: relative` を持っているため、明示的な指定は不要
- `c-button` 以外の要素を親にする場合は `position: relative` の指定が必要
- `width/height: 8px（--_dot-size）; border-radius: 50%`
- `background: var(--status-fail)`（デフォルトは赤）
- `border: 2px solid var(--surface-0)`（背景色と同色のボーダーで視認性確保）
- `pointer-events: none`（クリックイベントを貫通）

### バリアント

| クラス | ドット色 |
|---|---|
| （なし） | `var(--status-fail)` — 赤 |
| `.accent` | `var(--accent)` |
| `.success` | `var(--status-ok)` |
| `.warning` | `var(--status-warn)` |

**数値付き（`.count`）:**

```html
<button class="c-button ghost">
  <i data-lucide="inbox"></i>受信箱
  <span class="c-dot count">3</span>
</button>
```

- `min-width: 1.25rem; height: 1.25rem; padding: 0 0.25rem; border-radius: 999px`
- `font-size: 0.625rem; font-weight: 700; color: var(--text-on-accent)`
- `top: -6px; right: -6px`（通常ドットより外側に配置）
- `display: flex; align-items: center; justify-content: center`

### サイドバー内の特殊挙動

```css
.shell-sidebar .c-dot {
  position: static;
  margin-left: auto;
}
```

サイドバー内では absolute 配置ではなく、フロー配置（`position: static`）で右端に寄せる。

### ユースケース

- ベルアイコンの通知ドット
- カートアイコンの件数表示
- サイドバーメニューの未読表示

### アンチパターン

- **親に `position: relative` がない場合の配置崩れ** — `c-dot` は `position: absolute` のため、親要素に `position: relative` がないと意図しない位置に表示される。`style="position: relative"` またはクラスで必ず指定すること

---

## c-divider

→ CSS: `src/css/components/divider.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

**通常の区切り線:**

```html
<hr>
```

ラベルなしの場合はネイティブ `<hr>` を使用する。

**ラベル付き区切り線:**

```html
<div class="c-divider" role="separator">または</div>
```

- `display: flex; align-items: center; gap: 1rem`
- `font-size: 0.75rem; color: var(--text-muted)`
- `::before` / `::after` で左右に `flex: 1; border-top: 1px solid var(--border)` の線を描画
- テキストが中央に配置され、左右に線が伸びるパターン

### バリアント

なし。ラベルの有無で使い分ける。

### ユースケース

- ログインフォームの「または」区切り（SNS ログインとメールログインの間）
- セクション間の視覚的な区切り
- フォーム内のブロック区切り

### アンチパターン

- **ラベル付きで `<hr>` を使う** — ラベル付きの場合は `<div class="c-divider">` を使う。`<hr>` にクラスを付けても `::before` / `::after` の flex レイアウトが正しく機能しない
- **`role="separator"` の欠落** — ラベル付き divider は `<div>` なのでセマンティクスがない。`role="separator"` を付与してアクセシビリティを確保すること
