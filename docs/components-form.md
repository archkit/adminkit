# フォームコンポーネント

---

## c-fields

> CSS: `src/css/components/fields.css`
> デモ: `/pages/components/modules.php`

### 基本構造

`.c-fields` はフォームフィールドのコンテナ。`label > span + input` のネスト構造で、ラベルと入力要素を紐づける。

```html
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
    <input type="password" placeholder="パスワードを入力...">
    <small>8文字以上で入力してください</small>
  </label>
  <label>
    <span>セレクト</span>
    <select>
      <option value="">選択してください</option>
      <option>オプション1</option>
    </select>
  </label>
  <label>
    <span>テキストエリア</span>
    <textarea placeholder="本文を入力..."></textarea>
  </label>
</div>
```

- `label > span` がラベルテキスト（`font-size: 0.875rem; font-weight: 500`）
- `label > small` が補助テキスト（ヒント・エラーメッセージ）
- `required` 属性付きの input を含む label は、span の後に自動で `*` マークが付く（`:has(:required) > span::after`）

### バリアント

| クラス | 説明 | 用途 |
|---|---|---|
| （なし） | 縦積みレイアウト（`flex-direction: column; gap: 1.25rem`） | 一般的なフォーム |
| `.horizontal` | ラベル左・入力右の横並び（`grid: 12rem 1fr`）。40rem 以下で縦積みにフォールバック | 設定画面 |
| `.inline` | 横一列（`flex-direction: row; flex-wrap: wrap`）。ボタンも含められる | フィルタバー、検索フォーム |

#### horizontal

```html
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
```

ラベル列幅は `12rem` 固定。`small` は `grid-column: 2` で入力側に配置される。`@media (max-width: 40rem)` で自動的に縦積みにフォールバック。

#### inline

```html
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
    </select>
  </label>
  <button type="submit" class="c-button primary">検索</button>
</form>
```

- 各 `label` は `flex: 1; min-width: 10rem` で伸縮
- `.c-button` は `flex-shrink: 0` で縮まない。`line-height` を input と揃えている

### 内部クラス

#### .check（チェックボックス・ラジオ）

```html
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
</div>
```

- `display: grid; grid-template-columns: auto 1fr` で input とラベルを横並び
- `small` は `grid-column: 2` でラベル側に配置
- `input` は `width: auto`（テキスト入力の `width: 100%` を上書き）

#### .toggle（トグルスイッチ）

```html
<div class="c-fields">
  <label class="toggle">
    <input type="checkbox" role="switch">
    <span>ダークモード</span>
  </label>
  <label class="toggle">
    <input type="checkbox" role="switch" checked>
    <span>公開設定</span>
    <small>プロフィールを公開します</small>
  </label>
</div>
```

- `appearance: none` でネイティブ見た目を消し、`::before` 擬似要素で丸いノブを描画
- チェック時: 背景が `--accent` に変わり、ノブが右に移動
- `role="switch"` をセマンティクスのために付与

#### .check-group（横並びグループ）

```html
<div class="c-fields">
  <fieldset>
    <legend>カテゴリ（横並び）</legend>
    <ul class="check-group">
      <li><label class="check"><input type="checkbox" checked><span>テクノロジー</span></label></li>
      <li><label class="check"><input type="checkbox"><span>デザイン</span></label></li>
      <li><label class="check"><input type="checkbox" checked><span>ビジネス</span></label></li>
    </ul>
  </fieldset>
</div>
```

- `display: flex; flex-wrap: wrap; gap: 0.5rem 1.5rem`
- チェックボックスやラジオを横に並べたいときに使用

#### fieldset なしの使用

fieldset で囲まない使い方。カード内など既にラベルがある場合に使用する。

```html
<!-- fieldset なし（カード内など既にラベルがある場合） -->
<section class="c-card">
  <h3>カテゴリ</h3>
  <div class="c-fields">
    <ul class="check-group">
      <li><label class="check"><input type="checkbox"><span>お知らせ</span></label></li>
      <li><label class="check"><input type="checkbox" checked><span>ブログ</span></label></li>
    </ul>
  </div>
</section>
```

#### fieldset + legend

```html
<div class="c-fields">
  <fieldset>
    <legend>通知方法</legend>
    <ul>
      <li><label class="check"><input type="radio" name="notify" checked><span>メール</span></label></li>
      <li><label class="check"><input type="radio" name="notify"><span>SMS</span></label></li>
      <li><label class="check"><input type="radio" name="notify"><span>プッシュ通知</span></label></li>
    </ul>
  </fieldset>
</div>
```

- `fieldset` は `border: none; padding: 0`
- `legend` がグループラベル
- `ul.horizontal` で横並びにも対応

### 特殊な input type

#### input[type="color"]

```html
<label>
  <span>カラー</span>
  <div class="l-cluster">
    <input type="color" value="#4f46e5">
  </div>
</label>
```

- `width: 2.25rem; height: 2.25rem` にサイズ制限される
- `padding: 0.25rem` で色見本の余白を確保

### エラー状態

```html
<div class="c-fields">
  <label>
    <span>メールアドレス</span>
    <input type="email" class="error" value="invalid-email" required>
    <small class="error">正しいメールアドレスを入力してください</small>
  </label>
</div>
```

- input に `.error` を付けると `border-color: var(--status-fail)`
- small に `.error` を付けると `color: var(--status-fail)`

### バリデーション

**`:user-invalid`（推奨）:**

ユーザーが操作した後にのみ発火する。ページ読み込み時に赤枠が出ない。

```html
<label>
  <span>メールアドレス</span>
  <input type="email" required aria-describedby="email-error">
  <small id="email-error" class="error-message">正しいメールアドレスを入力してください</small>
</label>
```

- `:user-invalid` で `border-color: var(--status-fail)` が自動適用
- `.error-message` は通常非表示、`:user-invalid` の兄弟要素として表示される
- `aria-describedby` でエラーメッセージを input に紐付ける

**`.error` クラス（サーバーサイドバリデーション用）:**

```html
<input type="email" class="error" value="invalid" aria-describedby="email-error">
<small id="email-error" class="error">サーバーで検証に失敗しました</small>
```

- JS やサーバーサイドでエラー状態を明示的に付与する場合に使用

**アンチパターン:**
```html
<!-- NG: :invalid を直接スタイリング -->
<!-- ページ読み込み時に required フィールドが全て赤枠になる -->

<!-- NG: aria-describedby なしでエラーメッセージを配置 -->
<!-- スクリーンリーダーでエラーが読まれない -->
<input type="email" required>
<small class="error-message">必須項目です</small>
```

### ユースケース

- 基本フォーム: `/pages/components/modules.php` > Fields > 基本フィールド
- チェック・トグル: `/pages/components/modules.php` > Fields > チェック・トグル・ラジオ
- Horizontal: `/pages/components/modules.php` > Fields > Horizontal
- Inline: `/pages/components/modules.php` > Fields > Inline
- 設定フォーム: `/pages/demo/settings.php`
- 記事編集: `/pages/demo/articles/edit.php`
- ユーザー編集: `/pages/demo/users/edit.php`

### アンチパターン

```html
<!-- NG: form に c-fields を付けてセクション全体を囲む -->
<!-- c-fields は直下の label にスタイルを当てるコンテナ。
     form に付けるとフォーム全体のレイアウト構造が c-fields に束縛され、
     ボタンや section 等を自由に配置できなくなる。
     form 内の各セクションに個別に c-fields を付けること。 -->
<form class="c-fields">
  <section>
    <h2>基本情報</h2>
    <label><span>名前</span><input type="text"></label>
  </section>
  <section>
    <h2>詳細</h2>
    <label><span>備考</span><textarea></textarea></label>
  </section>
  <button class="c-button primary">保存</button>
</form>

<!-- OK: セクションごとに c-fields を付ける -->
<form>
  <section>
    <h2>基本情報</h2>
    <div class="c-fields">
      <label><span>名前</span><input type="text"></label>
    </div>
  </section>
  <section>
    <h2>詳細</h2>
    <div class="c-fields">
      <label><span>備考</span><textarea></textarea></div>
    </div>
  </section>
  <button class="c-button primary">保存</button>
</form>
```

```html
<!-- NG: c-fields の外で .check / .toggle を使う -->
<!-- .check と .toggle のスタイルは .c-fields の子孫セレクタで定義されている。
     c-fields の外に置くと grid レイアウトや input の width: auto 等が適用されない。 -->
<label class="check">
  <input type="checkbox">
  <span>同意する</span>
</label>

<!-- OK: 必ず c-fields 内で使う -->
<div class="c-fields">
  <label class="check">
    <input type="checkbox">
    <span>同意する</span>
  </label>
</div>
```

---

## c-button

> CSS: `src/css/components/button.css`
> デモ: `/pages/components/widgets.php`

### 基本構造

```html
<button class="c-button">Default</button>
```

- `display: inline-flex; align-items: center; gap: 0.5rem`
- `position: relative`（`c-dot` の配置基点として必要）
- `border: 1px solid var(--border-muted)` + `background: var(--surface-50)`
- `font-size: 0.875rem; font-weight: 500; line-height: 1`

### バリアント

| クラス | 背景 | 文字色 | 用途 |
|---|---|---|---|
| （なし） | `--surface-50` | `--text-strong` | 汎用・キャンセル |
| `.primary` | `--accent` | `--text-on-accent` | 主要アクション |
| `.success` | `--status-ok` | `--text-on-accent` | 成功・完了 |
| `.warning` | `--status-warn` | `--text-on-accent` | 注意が必要な操作 |
| `.danger` | `--status-fail` | `--text-on-accent` | 削除・破壊的操作 |
| `.ghost` | transparent | `--text-muted` | ツールバー・補助 |
| `.small` | — | — | 小サイズ（padding/font を縮小） |
| `.full` | — | — | 幅100%（`display: flex; width: 100%`） |

色バリアント（primary/success/warning/danger）は内部変数 `--_accent` を切り替え、hover 色を `color-mix(in oklch, var(--_accent), black 15%)` で自動生成する。

#### アイコン付き

```html
<button class="c-button primary small"><i data-lucide="plus"></i>新規作成</button>
<button class="c-button ghost small"><i data-lucide="download"></i>エクスポート</button>
```

- `> svg` は `width/height: var(--icon-md)`（small 時は `--icon-sm`）
- `flex-shrink: 0` でアイコンが縮まない

#### disabled

```html
<button class="c-button" disabled>Disabled</button>
```

- `opacity: 0.5; cursor: not-allowed`

### ユースケース

- バリアント一覧: `/pages/components/widgets.php` > Button > バリアント
- サイズ・状態: `/pages/components/widgets.php` > Button > サイズ・状態
- アイコン付き: `/pages/components/widgets.php` > Button > アイコン付き
- カード内: `/pages/components/widgets.php` > Card > Danger Zone
- 通知ドット付き: `/pages/components/widgets.php` > Notification Dot（`c-button ghost` + `c-dot`）

### アンチパターン

```html
<!-- NG: ghost にバリアント色を併用する -->
<!-- ghost は transparent 背景・transparent ボーダーで定義されている。
     primary 等を併用すると ghost のスタイルが後勝ちで背景が transparent になるが、
     border-color や color の優先順位が不定になり意図しない見た目になる。
     ghost は単独で使うこと。色を付けたいなら ghost を外す。 -->
<button class="c-button ghost primary">保存</button>
<button class="c-button ghost danger">削除</button>

<!-- OK -->
<button class="c-button ghost">キャンセル</button>
<button class="c-button primary">保存</button>
<button class="c-button danger">削除</button>
```

```html
<!-- NG: c-dot を使うのに親が position: relative でない -->
<!-- c-button は position: relative を持っているので問題ないが、
     a タグ等に c-button を付け忘れると c-dot が正しく配置されない -->
<a href="#">
  <i data-lucide="bell"></i>
  <span class="c-dot count">3</span>
</a>

<!-- OK -->
<a href="#" class="c-button ghost">
  <i data-lucide="bell"></i>
  <span class="c-dot count">3</span>
</a>
```

---

## c-search

> CSS: `src/css/components/search.css`
> デモ: `/pages/components/widgets.php`

### 基本構造

```html
<div class="c-search">
  <i data-lucide="search"></i>
  <input type="search" placeholder="検索...">
</div>
```

- `position: relative; display: flex; align-items: center`
- アイコンは `position: absolute; left: 0.75rem; pointer-events: none` で入力欄の左端に重ねる
- input は `padding-left: 2.25rem` でアイコン分のスペースを確保

### バリアント

| クラス | 説明 |
|---|---|
| （なし） | 通常サイズ |
| `.small` | 小サイズ（padding/font/アイコンサイズを縮小） |

#### small

```html
<div class="c-search small">
  <i data-lucide="search"></i>
  <input type="search" placeholder="検索...">
</div>
```

- アイコン: `--icon-sm`、input の `font-size: 0.75rem`

### ユースケース

- 基本: `/pages/components/widgets.php` > Search > 基本
- Small: `/pages/components/widgets.php` > Search > Small

### アンチパターン

```html
<!-- NG: c-fields の外で c-search を使い、幅が制御できない -->
<!-- c-search の input は width: 100% だが、c-search 自体には width 指定がない。
     c-fields 内の label に入れれば label が幅を制御するが、
     単独で使う場合は親要素で幅を制御する必要がある。
     幅が無制限に広がって意図しないレイアウトになる。 -->
<section>
  <div class="c-search">
    <i data-lucide="search"></i>
    <input type="search" placeholder="検索...">
  </div>
</section>

<!-- OK: 親要素で幅を制御する -->
<section>
  <div style="max-width: 20rem">
    <div class="c-search">
      <i data-lucide="search"></i>
      <input type="search" placeholder="検索...">
    </div>
  </div>
</section>

<!-- OK: c-fields 内の label に入れる -->
<div class="c-fields inline">
  <label>
    <span class="visually-hidden">検索</span>
    <div class="c-search">
      <i data-lucide="search"></i>
      <input type="search" placeholder="検索...">
    </div>
  </label>
</div>
```

---

## c-upload

> CSS: `src/css/components/upload.css`
> デモ: `/pages/components/widgets.php`

### 基本構造

```html
<label class="c-upload">
  <i data-lucide="upload-cloud"></i>
  <p>クリックまたはドラッグ＆ドロップ</p>
  <small>PNG, JPG, GIF（最大 10MB）</small>
  <input type="file" accept="image/*">
</label>
```

- `<label>` でラップすることで、ゾーン全体のクリックで `input[type="file"]` が開く
- input は `position: absolute; clip: rect(0,0,0,0)` で視覚的に非表示
- `border: 2px dashed var(--border-muted)` で破線枠
- `display: flex; flex-direction: column; align-items: center; padding: 2rem 1.5rem`
- hover / `.dragover` 時に `border-color: var(--accent); background: var(--accent-soft)`

### バリアント

| 状態 | 説明 |
|---|---|
| デフォルト | 破線枠、muted テキスト |
| `:hover` / `.dragover` | アクセントカラーの枠 + 薄い背景 |

#### 複数ファイル

```html
<label class="c-upload">
  <i data-lucide="files"></i>
  <p>ファイルを選択またはドロップ</p>
  <small>CSV, Excel, PDF（最大 50MB）</small>
  <input type="file" multiple>
</label>
```

### dragover の制御

`.dragover` クラスは JS で付与する。ドラッグイベントのハンドリングは利用者側で実装する。

```js
const upload = document.querySelector('.c-upload');
upload.addEventListener('dragover', e => { e.preventDefault(); upload.classList.add('dragover'); });
upload.addEventListener('dragleave', () => upload.classList.remove('dragover'));
upload.addEventListener('drop', e => { e.preventDefault(); upload.classList.remove('dragover'); /* ファイル処理 */ });
```

### ユースケース

- 基本: `/pages/components/widgets.php` > Upload > 基本
- 複数ファイル: `/pages/components/widgets.php` > Upload > 複数ファイル

### アンチパターン

```html
<!-- NG: label で囲まない -->
<!-- input[type="file"] は visually-hidden されているため、
     label でラップしないとクリックでファイル選択ダイアログが開かない。
     キーボードアクセシビリティも失われる。 -->
<div class="c-upload">
  <i data-lucide="upload-cloud"></i>
  <p>クリックまたはドラッグ＆ドロップ</p>
  <input type="file">
</div>

<!-- OK: label でラップする -->
<label class="c-upload">
  <i data-lucide="upload-cloud"></i>
  <p>クリックまたはドラッグ＆ドロップ</p>
  <input type="file">
</label>
```

```html
<!-- NG: input[type="file"] を含めない -->
<!-- 見た目だけのアップロードゾーンになり、機能しない -->
<label class="c-upload">
  <i data-lucide="upload-cloud"></i>
  <p>ファイルをドロップ</p>
</label>
```

---

## c-segment

> CSS: `src/css/components/segment.css`
> デモ: `/pages/components/modules.php`

### 基本構造

```html
<div class="c-segment" role="radiogroup" aria-label="期間">
  <label><input type="radio" name="period" checked><span>日</span></label>
  <label><input type="radio" name="period"><span>週</span></label>
  <label><input type="radio" name="period"><span>月</span></label>
  <label><input type="radio" name="period"><span>年</span></label>
</div>
```

- `display: inline-flex` でコンパクトに並ぶ
- `border: 1px solid var(--border); border-radius: var(--radius); padding: 0.125rem`
- input は `clip-path: inset(50%)` で視覚的に非表示（visually-hidden パターン）
- `input:checked + span` で選択状態のスタイルを適用（`background: var(--input-bg); color: var(--text-strong)`）
- `role="radiogroup"` + `aria-label` でアクセシビリティを確保

### バリアント

| クラス | 説明 |
|---|---|
| （なし） | 通常サイズ |
| `.small` | 小サイズ（`padding: 0.25rem 0.625rem; font-size: 0.75rem`） |

#### small

```html
<div class="c-segment small" role="radiogroup" aria-label="表示">
  <label><input type="radio" name="view" checked><span>リスト</span></label>
  <label><input type="radio" name="view"><span>グリッド</span></label>
</div>
```

### ユースケース

- 期間切替: `/pages/components/modules.php` > Segment
- 表示モード切替: `/pages/components/modules.php` > Segment（small）

### アンチパターン

```html
<!-- NG: radio の name 属性を省略 -->
<!-- name がないと全ての radio が独立し、排他選択にならない。
     複数の選択肢が同時に checked になり、セグメントとして機能しない。 -->
<div class="c-segment" role="radiogroup" aria-label="期間">
  <label><input type="radio" checked><span>日</span></label>
  <label><input type="radio"><span>週</span></label>
  <label><input type="radio"><span>月</span></label>
</div>

<!-- OK: 同じ name を付ける -->
<div class="c-segment" role="radiogroup" aria-label="期間">
  <label><input type="radio" name="period" checked><span>日</span></label>
  <label><input type="radio" name="period"><span>週</span></label>
  <label><input type="radio" name="period"><span>月</span></label>
</div>
```

```html
<!-- NG: span を省略して label に直接テキストを書く -->
<!-- input:checked + span セレクタが効かず、選択状態の見た目が変わらない -->
<div class="c-segment" role="radiogroup" aria-label="期間">
  <label><input type="radio" name="period" checked>日</label>
  <label><input type="radio" name="period">週</label>
</div>

<!-- OK: input の直後に span を配置 -->
<div class="c-segment" role="radiogroup" aria-label="期間">
  <label><input type="radio" name="period" checked><span>日</span></label>
  <label><input type="radio" name="period"><span>週</span></label>
</div>
```

---

## c-toggle-group

> CSS: `src/css/components/toggle-group.css`
> デモ: `/pages/components/widgets.php`

### 基本構造

```html
<div class="c-toggle-group" role="group" aria-label="表示モード">
  <button aria-pressed="true"><i data-lucide="list"></i>リスト</button>
  <button aria-pressed="false"><i data-lucide="grid-2x2"></i>グリッド</button>
  <button aria-pressed="false"><i data-lucide="kanban"></i>ボード</button>
</div>
```

- `display: inline-flex; border: 1px solid var(--border); border-radius: var(--radius); overflow: hidden`
- 各ボタンは `border-right: 1px solid var(--border)` で区切り（`:last-child` で右端は除去）
- 選択状態は `aria-pressed="true"` で CSS を切り替え: `background: var(--accent-soft); color: var(--accent)`
- `.active` クラスでも同じ見た目になるが、**`aria-pressed` を使うべき**（アクセシビリティ）
- `button` と `a` の両方に対応
- JS による `aria-pressed` の切り替えは利用者側で実装する

### バリアント

| クラス | 説明 |
|---|---|
| （なし） | 通常サイズ |
| `.small` | 小サイズ（`padding: 0.25rem 0.625rem; font-size: 0.75rem`、アイコンは `--icon-sm`） |

#### small + テキストのみ

```html
<div class="c-toggle-group small" role="group" aria-label="期間">
  <button aria-pressed="true">日</button>
  <button aria-pressed="false">週</button>
  <button aria-pressed="false">月</button>
  <button aria-pressed="false">年</button>
</div>
```

#### リンクとしての使用

```html
<div class="c-toggle-group" role="group" aria-label="ビュー">
  <a href="?view=list" aria-pressed="true"><i data-lucide="list"></i>リスト</a>
  <a href="?view=grid" aria-pressed="false"><i data-lucide="grid-2x2"></i>グリッド</a>
</div>
```

### c-segment との使い分け

| | c-segment | c-toggle-group |
|---|---|---|
| 内部要素 | `input[type="radio"]`（隠し） | `button` / `a` |
| 状態管理 | ブラウザのネイティブ radio | `aria-pressed`（JS で切り替え） |
| フォーム送信 | 対応（name/value） | 非対応（JS でハンドリング） |
| 用途 | フィルタ・モード切替（フォーム内） | ビュー切替・ツールバー |

### ユースケース

- 基本（アイコン + テキスト）: `/pages/components/widgets.php` > Toggle Group > 基本
- Small + テキストのみ: `/pages/components/widgets.php` > Toggle Group > Small・テキストのみ

### アンチパターン

```html
<!-- NG: aria-pressed を付けない -->
<!-- 選択状態の見た目が適用されず、全てのボタンが非選択に見える。
     スクリーンリーダーにも選択状態が伝わらない。 -->
<div class="c-toggle-group" role="group" aria-label="表示モード">
  <button>リスト</button>
  <button>グリッド</button>
  <button>ボード</button>
</div>

<!-- OK: aria-pressed で状態を明示 -->
<div class="c-toggle-group" role="group" aria-label="表示モード">
  <button aria-pressed="true">リスト</button>
  <button aria-pressed="false">グリッド</button>
  <button aria-pressed="false">ボード</button>
</div>
```

```html
<!-- NG: role="group" と aria-label を省略 -->
<!-- グループとしてのセマンティクスが失われ、
     スクリーンリーダーがボタン群の目的を認識できない。 -->
<div class="c-toggle-group">
  <button aria-pressed="true">リスト</button>
  <button aria-pressed="false">グリッド</button>
</div>

<!-- OK -->
<div class="c-toggle-group" role="group" aria-label="表示モード">
  <button aria-pressed="true">リスト</button>
  <button aria-pressed="false">グリッド</button>
</div>
```

```html
<!-- NG: radio input を使う（c-segment と混同） -->
<!-- c-toggle-group は button/a 要素用。radio を使うなら c-segment を使うこと。 -->
<div class="c-toggle-group">
  <label><input type="radio" name="view"><span>リスト</span></label>
  <label><input type="radio" name="view"><span>グリッド</span></label>
</div>
```
