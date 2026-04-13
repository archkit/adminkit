# フィードバック・インタラクション コンポーネント

通知、ダイアログ、ナビゲーション補助など、ユーザーへのフィードバックとインタラクションに関わるコンポーネント群。

---

## c-alert

→ CSS: `src/css/components/alert.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<div class="c-alert" role="alert">
  <strong>お知らせ</strong>
  システムメンテナンスを予定しています。
</div>
```

- 左ボーダー 3px で視覚的にステータスを示す
- `--_accent` パターンでバリアント色を制御
- 背景は `color-mix(in oklch, var(--_accent) 8%, transparent)` で薄く着色
- `border-radius` は右側のみ（`0 var(--radius) var(--radius) 0`）
- `<strong>` はブロック表示（`display: block`）でタイトル行を形成

### バリアント

| クラス | 色トークン | 用途 |
|---|---|---|
| （なし） | `--status-note` | 一般的な情報通知 |
| `.success` | `--status-ok` | 完了・成功の通知 |
| `.warning` | `--status-warn` | 注意喚起 |
| `.danger` | `--status-fail` | エラー・問題の通知 |

```html
<div class="c-alert success" role="alert">
  <strong>完了</strong>
  データの保存が完了しました。
</div>
```

### ユースケース

- フォーム送信結果の表示（成功・エラー）
- セクション内の注意事項
- 特定コンテキストに紐づく通知（例: 設定画面内の警告）

### アンチパターン

- **c-banner との混同**: c-alert はコンテンツ内に埋め込むコンテキスト依存の通知。ページ全体に関わる通知には c-banner を使う。例えばシステムメンテナンス告知をページ上部に出したい場合は c-banner が適切
- **role 属性の省略**: スクリーンリーダーへの通知のため `role="alert"` を付与する

---

## c-banner

→ CSS: `src/css/components/banner.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<div class="c-banner" role="status">
  <p>新機能が追加されました。詳細はリリースノートをご確認ください。</p>
</div>
```

- ページ上部に帯状に表示する通知
- `display: flex; align-items: center; gap: 0.75rem` で横並び
- 下ボーダー 1px でコンテンツとの境界を示す
- 背景は `color-mix(in srgb, var(--_accent) 12%, transparent)`
- `<p>` は `flex: 1` で残りの幅を占有

### バリアント

| クラス | 色トークン | role 属性 |
|---|---|---|
| （なし） | `--status-note` | `role="status"` |
| `.success` | `--status-ok` | `role="status"` |
| `.warning` | `--status-warn` | `role="alert"` |
| `.danger` | `--status-fail` | `role="alert"` |

**role の使い分け**: `danger` と `warning` は `role="alert"`（即座にスクリーンリーダーに通知）、`info` と `success` は `role="status"`（次の読み上げ時に通知）。

### 閉じるボタン

```html
<div class="c-banner warning" role="alert">
  <p>この通知は閉じることができます。</p>
  <button class="c-button ghost small" data-js-banner-close aria-label="閉じる">
    <i data-lucide="x"></i>
  </button>
</div>
```

`data-js-banner-close` 属性のボタンをクリックすると、最寄りの `.c-banner` が DOM から削除される。

### ユースケース

- システムメンテナンスの事前告知
- 新機能リリースのお知らせ
- API 利用制限の警告
- サーバー接続エラーの通知

### アンチパターン

- **コンテキスト依存の通知に使う**: フォームの入力エラーなど特定セクションに紐づく通知には c-alert を使う。c-banner はページ全体に関わる情報用
- **role 属性の誤り**: `danger` に `role="status"` を使うと緊急性が伝わらない。`danger`/`warning` は `role="alert"` を使う

---

## c-toast

→ CSS: `src/css/components/toast.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

Toast は JS API 経由で生成される。HTML を直接書くことはない。

```html
<!-- JS が自動生成するコンテナ -->
<div class="c-toast-container" role="region" aria-label="通知">
  <output class="c-toast" role="status" aria-live="polite">
    <div class="c-toast-body">
      <strong>保存完了</strong>
      <p>データが正常に保存されました。</p>
    </div>
    <button class="c-toast-close" aria-label="閉じる">&times;</button>
    <div class="c-toast-progress" aria-hidden="true"></div>
  </output>
</div>
```

- 画面右下に固定表示（`position: fixed; bottom: 1.5rem; right: 1.5rem`）
- `<output>` 要素を使用（アクセシビリティ上、動的に生成された結果の通知に適する）
- `column-reverse` で新しいトーストが下に積まれる
- 最大幅 `24rem`、モバイルでは画面幅いっぱい
- Grid レイアウト: body + close ボタン + progress バーの 3 パート
- 左ボーダー 3px でステータス色を表示
- `box-shadow: var(--shadow-popup)` で浮遊感を演出

### バリアント

| variant | 色トークン | 自動消去 | role |
|---|---|---|---|
| `note` | `--status-note` | 5000ms | `status` |
| `success` | `--status-ok` | 5000ms | `status` |
| `warning` | `--status-warn` | 8000ms | `status` |
| `danger` | `--status-fail` | **無効** | `alert` |

- `danger` は自動消去されない（プログレスバーも非表示: `.c-toast.danger > .c-toast-progress { display: none }`）
- 最大同時表示数は 5 件。超過分は古いものから自動で閉じる

### アニメーション

- 表示時: 右から左にスライドイン（`toast-in`）
- 非表示時: 左から右にスライドアウト（`toast-out`）
- プログレスバー: 左から右に縮小するカウントダウン（`toast-countdown`）
- **hover で一時停止**: コンテナにマウスを乗せるとプログレスバーと自動消去タイマーの両方が停止する
- `prefers-reduced-motion: reduce` でアニメーション無効化対応

### JS API

```js
// 基本的な使い方
Toast.show({
  title: '保存しました',
  message: '任意の補足テキスト',
  variant: 'success',   // note | success | warning | danger
  duration: 5000,        // ms。false で自動消去無効
  action: { label: '元に戻す', onClick: () => {} },
});

// 全トーストをクリア
Toast.clear();
```

**パラメータ:**

| パラメータ | 型 | 必須 | 説明 |
|---|---|---|---|
| `title` | `string` | 必須 | トーストのタイトル |
| `message` | `string` | 任意 | 補足テキスト |
| `variant` | `string` | 任意 | `note`（デフォルト）/ `success` / `warning` / `danger` |
| `duration` | `number \| false` | 任意 | 自動消去までの時間（ms）。省略時は variant のデフォルト値。`false` で無効 |
| `action` | `object` | 任意 | `{ label: string, onClick: Function }` 形式のアクションボタン |

**戻り値:**

```js
const toast = Toast.show({ title: '処理中...' });
// 手動で閉じる
toast.dismiss();
```

**デフォルト duration 一覧:**

| variant | デフォルト duration |
|---|---|
| `note` | 5000ms |
| `success` | 5000ms |
| `warning` | 8000ms |
| `danger` | `false`（自動消去しない） |

### ユースケース

- CRUD 操作の完了通知
- アクション付きトースト（「元に戻す」等）
- エラー通知（danger: ユーザーが明示的に閉じるまで残る）

### アンチパターン

- **variant 省略時のデフォルト**: `variant` を省略すると `note` になる。成功通知を出したいのに variant を省略して `note` スタイルで表示されてしまうケースに注意
- **HTML を直接書く**: Toast は JS API 経由で生成する。コンテナも自動生成されるため、HTML に `c-toast-container` を書く必要はない
- **danger に duration を設定しない場合の挙動**: `danger` はデフォルトで `duration: false`。これは意図的な設計で、エラーはユーザーが内容を確認して閉じるべきため

---

## c-modal

→ CSS: `src/css/components/modal.css`
→ デモ: `/pages/components/modules.php`

### 基本構造

```html
<button class="c-button primary" data-js-open="demo-modal">モーダルを開く</button>

<dialog class="c-modal" data-js-dialog="demo-modal" aria-label="確認">
  <section>
    <header>
      <h3>確認</h3>
      <button class="c-button ghost small" data-js-close aria-label="閉じる">
        <i data-lucide="x"></i>
      </button>
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
```

**構造の要点:**

- `<dialog>` 要素が必須（ネイティブのモーダル機能を活用）
- 直下に `<section>` を配置し、`display: flex; flex-direction: column` でレイアウト
- `<section>` の中に `<header>` / `.body` / `<footer>` の 3 パート
- `max-height: calc(100dvh - 4rem)` で画面からはみ出さない
- `.body` パートのみ `overflow-y: auto` でスクロール（header/footer は固定）
- モーダル内の見出し（h2, h3, h4）は `margin: 0` にリセット

### data 属性 API

| 属性 | 対象 | 動作 |
|---|---|---|
| `data-js-open="id"` | ボタン | `data-js-dialog="id"` のモーダルを `showModal()` で開く |
| `data-js-dialog="id"` | dialog | モーダル本体 |
| `data-js-close` | ボタン | 最寄りの `<dialog>` を `close()` で閉じる |

- backdrop クリックでも閉じる（`dialog.c-modal` 自体のクリックを検知）

### スタイル詳細

- 幅: `max-width: 32rem; width: calc(100% - 2rem)`
- backdrop: `color-mix(in srgb, #000 50%, transparent)` の半透明黒
- 開閉アニメーション: `opacity` トランジション + `@starting-style` で初期値を設定
- `allow-discrete` で `display` と `overlay` のトランジションを有効化
- header: 下ボーダーで区切り、タイトルとクローズボタンを `space-between` で配置
- footer: 上ボーダーで区切り、ボタンを `flex-end` で右寄せ

### ユースケース

- 確認ダイアログ（削除確認など）
- フォーム入力（簡易的な編集モーダル）
- 詳細情報の表示

### アンチパターン

- **`<dialog>` 以外の要素を使う**: `<div>` でモーダルを自作すると、フォーカストラップ、ESC キーでの閉じ、backdrop、アクセシビリティがすべて手動実装になる。必ず `<dialog>` を使う
- **`show()` を使う**: `show()` は非モーダルで開くため、backdrop が表示されず、背面の操作もブロックされない。`showModal()` を使う（`data-js-open` は内部で `showModal()` を呼んでいる）
- **`aria-label` の省略**: `<dialog>` に `aria-label` を指定しないと、スクリーンリーダーがモーダルの目的を認識できない

---

## c-dropdown

→ CSS: `src/css/components/dropdown.css`
→ デモ: `/pages/components/modules.php`

### 基本構造

```html
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
```

**構造の要点:**

- **Popover API** ベース: `popover` 属性と `popovertarget` で JS 不要の開閉
- **CSS Anchor Positioning**: 暗黙のアンカー（`popovertarget` で紐付けた要素）を使用。`position-area: bottom span-left` でトリガーの下・左寄せに配置
- popover のデフォルトスタイルをリセット（`inset: unset; margin: 0`）
- 最小幅 `10rem`

### ARIA ロール

| 要素 | ロール | 説明 |
|---|---|---|
| `<ul popover>` | `role="menu"` | メニューコンテナ |
| `<li>` | `role="presentation"` | リスト項目のセマンティクスを除去 |
| `<button>` / `<a>` | `role="menuitem"` | メニュー項目 |
| `<li>` (区切り) | `role="separator"` | セパレーター |
| トリガーボタン | `aria-haspopup="menu"` | メニューの存在を示す |

### メニューアイテム

- `display: flex; align-items: center; gap: 0.5rem` でアイコンとテキストを横並び
- hover で `background: var(--surface-100)` + `color: var(--text-strong)`
- アイコンサイズは `--icon-sm`（14px）

### danger メニューアイテム

```html
<button role="menuitem" class="danger"><i data-lucide="trash-2"></i>削除</button>
```

- 通常時: `color: var(--status-fail)` の赤テキスト
- hover 時: `background: color-mix(in srgb, var(--status-fail) 8%, transparent)` の薄赤背景

### セパレーター

```html
<li role="separator"><hr></li>
```

`<hr>` で 1px の `--border-muted` 線を描画。上下に `0.25rem` のマージン。

### aria-expanded について

- `aria-expanded` は Popover API では自動切替されない
- 初期値 `false` で設定しておけば CSS スタイリングには影響しない
- 厳密な a11y 対応が必要な場合は popover の `toggle` イベントで JS 制御する

### キーボードナビゲーション

- 矢印キーでメニューアイテム間を移動（WAI-ARIA Menu パターン準拠）
- popover 表示時に最初のメニューアイテムに自動フォーカス

### ユースケース

- テーブル行のアクションメニュー
- ページヘッダーの「その他」メニュー
- コンテキストメニュー的な操作

### アンチパターン

- **`role="menu"` の欠落**: `<ul popover>` に `role="menu"` を付けないとスクリーンリーダーがメニューとして認識しない
- **`popovertarget` の id 不一致**: トリガーの `popovertarget` 値と `<ul>` の `id` が一致しないとメニューが開かない。ページ内で id が重複しないよう注意
- **`<a>` と `<button>` の使い分け**: ページ遷移するメニュー項目は `<a>`、アクションを実行するものは `<button>` を使う

---

## c-tooltip

→ CSS: `src/css/components/tooltip.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<button class="c-button" data-tooltip="ツールチップの内容">ホバーしてください</button>
```

- **CSS のみ** で実装（JS 不要）
- `data-tooltip` 属性にテキストを設定するだけで機能する
- `::after` 擬似要素で `content: attr(data-tooltip)` を表示
- 要素の上部中央に配置（`bottom: calc(100% + 0.5rem); left: 50%; transform: translateX(-50%)`）

### スタイル詳細

- 背景: `var(--text-strong)`（テーマに応じたダーク色）
- テキスト: `var(--surface-50)`（テーマに応じたライト色）
- フォントサイズ: `0.75rem`
- `white-space: nowrap` で改行しない
- `pointer-events: none` でツールチップ自体はクリック不可
- hover 時に `opacity: 0 → 1` のトランジション

### ユースケース

- アイコンボタンの補足説明
- アバターの名前表示
- 短い補足情報の提示

```html
<span class="c-avatar" data-tooltip="田中太郎" aria-label="田中">田</span>
```

### アンチパターン

- **長文テキスト**: `white-space: nowrap` のため、長いテキストは画面外にはみ出す。長い説明にはツールチップではなく別の UI を使う
- **`position: relative` の欠如**: `[data-tooltip]` に `position: relative` が自動設定されるが、親要素に `overflow: hidden` がある場合ツールチップが見切れる可能性がある

---

## c-tabs

→ CSS: `src/css/components/tabs.css`
→ デモ: `/pages/components/modules.php`

### 基本構造

```html
<div class="c-tabs">
  <div role="tablist" aria-label="設定タブ">
    <button role="tab" aria-selected="true" data-js-tab="tab-general">一般</button>
    <button role="tab" aria-selected="false" data-js-tab="tab-security">セキュリティ</button>
    <button role="tab" aria-selected="false" data-js-tab="tab-notify">通知</button>
  </div>
  <div role="tabpanel" data-js-panel="tab-general">
    <div class="l-stack">
      <!-- セクション内容 -->
    </div>
  </div>
  <div role="tabpanel" data-js-panel="tab-security" hidden>
    <div class="l-stack">
      <!-- セクション内容 -->
    </div>
  </div>
  <div role="tabpanel" data-js-panel="tab-notify" hidden>
    <div class="l-stack">
      <!-- セクション内容 -->
    </div>
  </div>
</div>
```

**構造の要点:**

- ARIA セレクタベースのスタイリング（クラスではなく `role` 属性でスタイル適用）
- `data-js-tab` / `data-js-panel` で JS によるタブ切替
- 非アクティブなパネルは `hidden` 属性で非表示

### data 属性 API

| 属性 | 対象 | 動作 |
|---|---|---|
| `data-js-tab="id"` | ボタン | クリックで対応パネルを表示 |
| `data-js-panel="id"` | div | タブパネル本体 |

JS の動作:
1. すべてのタブの `aria-selected` を `false` に
2. すべてのパネルの `hidden` を `true` に
3. クリックされたタブの `aria-selected` を `true` に
4. 対応するパネルの `hidden` を解除

### タブリスト

- `display: flex` で横並び
- 下ボーダー `1px solid var(--border-muted)` で区切り線

### タブボタン

- 下ボーダー 2px（`margin-bottom: -1px` でタブリストのボーダーに重なる）
- 非選択時: `color: var(--text-muted); border-bottom-color: transparent`
- hover 時: `color: var(--text-strong)`
- 選択時（`aria-selected="true"`）: `color: var(--accent); border-bottom-color: var(--accent)`

### タブパネル

- `padding: 1.5rem 0`（上下のみ）
- **重要**: パネル内の `l-stack` は `--l-stack-gap: 3rem` に設定される（`main-content` と同じセクション間隔）
- tabpanel 内にセクションが複数ある場合は `l-stack` で囲む（gap 3rem が自動設定される）
- セクションが1つだけの場合や単純なコンテンツの場合は `l-stack` 不要

### キーボードナビゲーション

- 矢印キーでタブ間を移動（WAI-ARIA Tabs パターン準拠）
- tabindex は admin.js が自動管理

### ユースケース

- 設定画面のカテゴリ分け（一般・セキュリティ・通知）
- 詳細ページの情報グループ化
- コンテンツの切り替え表示

### アンチパターン

- **tabpanel に `display: flex` を直接設定する**: `hidden` 属性は `display: none` で要素を非表示にするが、`display: flex` を直接設定すると `hidden` の `display: none` が上書きされ、非アクティブなパネルが表示されてしまう。パネル内のレイアウトは子要素の `l-stack` で制御する
- **tabpanel 内で `l-stack` を使わない**: パネル内にセクションが複数ある場合、`l-stack` を使わないとセクション間の間隔がなくなる。パネル内の `l-stack` は自動的に `--l-stack-gap: 3rem` が設定されるため、適切な間隔が確保される
- **`aria-label` の省略**: `tablist` に `aria-label` がないとスクリーンリーダーがタブグループの目的を認識できない

---

## c-pagination

→ CSS: `src/css/components/pagination.css`
→ デモ: `/pages/components/modules.php`

### 基本構造

```html
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
```

**構造の要点:**

- `<nav>` 要素で囲み、`aria-label` でナビゲーションの目的を示す
- `<ul>` 内に `<li>` でページ番号を配置
- リンク可能なページは `<a>`、無効な前後ボタンは `<span>`

### 状態

| 状態 | 属性 | スタイル |
|---|---|---|
| アクティブ | `aria-current="page"` | `background: var(--accent); color: var(--text-on-accent)` |
| 通常 | - | `color: var(--text-muted)` |
| hover | - | `background: var(--surface-100); color: var(--text-strong)` |
| 無効 | `aria-disabled="true"` | `opacity: 0.5; pointer-events: none` |

### スタイル詳細

- 各ページ番号: `min-width: 2rem; height: 2rem` の正方形に近いボタン
- `gap: 0.25rem` で項目間のスペース
- アイコンサイズ: `--icon-md`（16px）

### ユースケース

- 一覧ページのページ送り
- 検索結果のページネーション

### アンチパターン

- **`<button>` を使う**: ページ遷移を伴うため `<a>` を使う。無効状態のみ `<span>` を使用
- **`aria-current="page"` の省略**: 現在のページを視覚的にも意味的にも示すために必須

---

## c-action-bar

→ CSS: `src/css/components/action-bar.css`
→ デモ: `/pages/components/modules.php`

### 基本構造

```html
<main id="main">
  <nav class="main-nav">...</nav>
  <div class="main-content">
    <!-- コンテンツ -->
  </div>
  <!-- action-bar は main 直下、main-content の外 -->
  <div class="c-action-bar sticky" role="toolbar" aria-label="一括操作">
    <span><strong>3</strong>件選択中</span>
    <div class="l-cluster">
      <button class="c-button small">アーカイブ</button>
      <button class="c-button small danger">削除</button>
    </div>
  </div>
</main>
```

**構造の要点:**

- `main` 直下に配置（`main-content` の外側）
- `display: flex; align-items: center; justify-content: space-between`
- `role="toolbar"` でツールバーとして認識
- `[hidden]` で `display: none` になる（テーブルチェックボックス連動で表示/非表示）

### sticky 配置

```css
&.sticky {
  position: sticky;
  bottom: 0;
  z-index: var(--z-sticky);
}
```

`.sticky` クラスで画面下部に固定表示。

### テーブルチェックボックス連動

```html
<table data-js-table-check="users">...</table>

<div class="c-action-bar sticky" role="toolbar" data-js-table-check-show="users" hidden>
  <span><strong>0</strong>件選択中</span>
  <div class="l-cluster" data-js-table-check-activate="users">
    <button class="c-button small" disabled>アーカイブ</button>
    <button class="c-button small danger" disabled>削除</button>
  </div>
</div>
```

| 属性 | 動作 |
|---|---|
| `data-js-table-check-show="key"` | チェックがある時のみ表示。`<strong>` にカウントを反映 |
| `data-js-table-check-activate="key"` | チェックがある時、子要素の `disabled` を解除 |

### ユースケース

- テーブル行の一括操作（削除、アーカイブ、ステータス変更）
- フォームの保存バー（未保存変更の通知 + 保存/破棄ボタン）

### アンチパターン

- **`main-content` の中に置く**: `main-content` は `padding` 方式で幅を制限しているため、action-bar を中に置くと左右の padding が適用されてしまい、画面全幅のバーにならない。必ず `main` 直下に配置する
- **`role="toolbar"` の省略**: スクリーンリーダーがツールバーとして認識するために必要

---

## c-empty-state

→ CSS: `src/css/components/empty-state.css`
→ デモ: `/pages/components/widgets.php`

### 基本構造

```html
<div class="c-empty-state">
  <i data-lucide="inbox"></i>
  <h3>データがありません</h3>
  <p>まだ記事が投稿されていません。最初の記事を作成してみましょう。</p>
  <a href="#" class="c-button primary small"><i data-lucide="plus"></i>新規作成</a>
</div>
```

- `display: flex; flex-direction: column; align-items: center; justify-content: center`
- `text-align: center` で中央寄せ
- `padding: 3rem 1.5rem` で上下に十分な余白
- `gap: 0.75rem` で要素間の間隔

### パーツ

| 要素 | スタイル |
|---|---|
| アイコン（`svg` / `i`） | `width: 2.5rem; height: 2.5rem; opacity: 0.5` |
| 見出し（`h2` / `h3`） | `font-size: 1rem; font-weight: 600; color: var(--text-strong); border: none; padding: 0` |
| 説明文（`p`） | `font-size: 0.875rem; max-width: 24rem; color: var(--text-muted)` |
| CTA ボタン（`.c-button`） | `margin-top: 0.5rem`（追加の間隔） |

### カード内配置

```html
<section class="c-card">
  <div class="c-empty-state">
    <i data-lucide="users"></i>
    <h3>メンバーがいません</h3>
    <p>チームにメンバーを招待して共同作業を始めましょう。</p>
    <button class="c-button primary small"><i data-lucide="user-plus"></i>メンバーを招待</button>
  </div>
</section>
```

### ユースケース

- テーブルやリストにデータがない時の表示
- 検索結果が 0 件の時
- 新規ユーザーの初期状態（オンボーディング）
- フィルター適用後に該当なしの場合

### 見出しレベルについて

- empty-state 内の見出しレベルは親セクションのレベルに合わせる
- 例: h2 セクション直下なら h3、h3 サブセクション内なら h4
- CSS は h2/h3/h4 全てに対応（装飾リセット済み）

### アンチパターン

- **`h2` を使う**: `main section > h2` にはグローバルな装飾（`border-image` の下線）が付くため、empty-state 内の見出しが意図しないデザインになる。CSS で `border: none; padding: 0` をリセットしているが、`h3` を使う方が安全。セマンティクス上も、empty-state は通常セクションの中に置かれるため `h3` が適切
- **CTA ボタンの省略**: データがない状態を表示するだけでなく、次のアクション（新規作成など）へ誘導するボタンを必ず配置する
- **アイコンの省略**: 視覚的にデータの不在を伝えるため、内容に合ったアイコンを必ず配置する

---

## c-error-page

→ CSS: `src/css/components/error-page.css`
→ デモ: `/pages/layout/error.php`

### 基本構造

```html
<main class="shell-standalone">
  <section class="c-error-page">
    <h1><span class="error-code">404</span>ページが見つかりません</h1>
    <p>お探しのページは存在しないか、移動した可能性があります。</p>
    <div class="l-cluster center">
      <button data-js-back class="c-button"><i data-lucide="arrow-left"></i>前のページへ</button>
      <a href="/index.php" class="c-button primary"><i data-lucide="home"></i>ダッシュボードへ</a>
    </div>
  </section>
</main>
```

**構造の要点:**

- `shell-standalone` レイアウト内に配置（サイドバーなしの単独ページ）
- `display: flex; flex-direction: column; align-items: center; text-align: center`
- `h1` 内に `.error-code` をブロック表示し、ステータスコードを大きく見せる

### パーツ

| 要素 | スタイル |
|---|---|
| `.error-code` | `font-size: 7.5rem; font-weight: 800; color: var(--accent); opacity: 0.3` |
| `.error-code.danger` | `color: var(--status-fail); opacity: 0.4` |
| `h1`（テキスト部分） | `font-size: 1.25rem; font-weight: 600; color: var(--text-strong)` |
| `p` | `font-size: 0.9375rem; color: var(--text-muted); max-width: 26rem` |
| `.l-cluster`（ボタン群） | `margin-top: 2.5rem`（2つ目以降は `1.5rem`） |

### バリアント

| エラーコード | `.error-code` のクラス | 色 |
|---|---|---|
| 404 | （なし） | `var(--accent)` — テーマのアクセントカラー |
| 500 | `.danger` | `var(--status-fail)` — エラー色 |

### data 属性 API

| 属性 | 動作 |
|---|---|
| `data-js-back` | `history.back()` で前のページに戻る |
| `data-js-reload` | `location.reload()` でページを再読み込み |

### 500 エラーの例

```html
<main class="shell-standalone">
  <section class="c-error-page">
    <h1><span class="error-code danger">500</span>サーバーエラー</h1>
    <p>予期しないエラーが発生しました。しばらくしてからもう一度お試しください。</p>
    <div class="l-cluster center">
      <button data-js-reload class="c-button"><i data-lucide="refresh-cw"></i>再読み込み</button>
      <a href="/index.php" class="c-button primary"><i data-lucide="home"></i>ダッシュボードへ</a>
    </div>
  </section>
</main>
```

### ユースケース

- 404 Not Found: 存在しないページへのアクセス
- 500 Internal Server Error: サーバー障害時の表示
- 403 Forbidden: アクセス権限なし（`.error-code` クラスなしで `var(--accent)` 表示）

### アンチパターン

- **サイドバー付きレイアウト内に配置する**: エラーページは `shell-standalone` で単独表示する。サイドバー内に置くとナビゲーションの整合性が崩れる
- **ボタンの省略**: エラー表示だけでなく、「前のページへ」「ダッシュボードへ」など復帰導線を必ず配置する
