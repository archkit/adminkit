# adminkit 開発ルール

## 開発姿勢

- 場当たり的な対処はせず、常に根本解決を試みる
- 推測で修正を繰り返さず、原因を特定してから対処する
- 指示されていない変更は行わない
- 「どんな構成でも壊れないか」を常に考える

## 順守事項

### セクショニングとアウトライン

- 見出しレベルのスキップ禁止（h1 → h2 → h3）
- カードに見出しを使う場合は `<section class="c-card">` でセクショニング
- form 内のセクション分けは `<section>` + `<h2>`（fieldset/legend は使わない）

### CSS 設計

- **同一 layer 名を複数ファイルで使わない**（Lightning CSS バンドルの制約）
- **layout レイヤーから components を上書きできない**。コンポーネントの文脈依存スタイルは components レイヤー内に書く
- 色バリアントは `--_accent` パターンで統一。hover 色は `color-mix()` で自動生成。ハードコード禁止
- transparent ベースの `color-mix` はダーク背景で白が透ける → 不透明な oklch 値を使う
- gap と margin の混在は避ける（加算が予測困難）

### パス規約

- 全ページのリンク・アセットパスは**ルート相対**（`/` 始まり）で統一

### ビルド

- CSS/JS 変更後は必ず `npm run dev` でリビルド
- CSS エントリポイント: `src/css/adminkit.css` → 出力: `dist/adminkit.min.css`
- JS エントリポイント: `src/js/adminkit.js` → 出力: `dist/adminkit.min.js`（Lucide バンドル済み）
- `src/js/theme-init.js` → `dist/theme-init.js`（コピー、バンドルしない）

## ドキュメント

詳細は `docs/` を参照:

| ファイル | 内容 |
|---|---|
| [guide.md](docs/guide.md) | 設計思想・セクショニング・余白・アクセシビリティ・命名規則・JS API |
| [tokens.md](docs/tokens.md) | デザイントークン（色・余白・タイポ・z-index・モーション・ブレイクポイント） |
| [layout.md](docs/layout.md) | プリミティブ(7) + シェルパターン(6) + ユーティリティ |
| [components-form.md](docs/components-form.md) | fields, button, search, upload, segment, toggle-group |
| [components-display.md](docs/components-display.md) | card, table, list, badge, tag, avatar, stats, progress, stepper, skeleton, dot, divider |
| [components-feedback.md](docs/components-feedback.md) | alert, banner, toast, modal, dropdown, tooltip, tabs, pagination, action-bar, empty-state, error-page |
