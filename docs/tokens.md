# デザイントークン

→ CSS ソース: `src/css/tokens/`

---

## テーマシステム

`data-theme-style`（色味・雰囲気）と `data-theme-mode`（明暗）の2軸で制御。

```html
<html data-theme-style="ink" data-theme-mode="light">
```

### テーマ初期化

`<head>` 内の同期スクリプトで localStorage + `prefers-color-scheme` を参照。FOUC を防止する。

→ 実装: `parts/head-theme.php`

### テーマ一覧

| テーマ | 色温度 | 角丸 | アクセント | 印象 |
|---|---|---|---|---|
| Ink & Paper（デフォルト） | 暖 | 6px | インディゴ `oklch(0.50 0.19 260)` | 落ち着き、知的 |
| Stone | 中性 | 0px | ティール `oklch(0.55 0.15 165)` | 硬質、建築的 |
| Dusk | 暖寄り | 8px | ローズ `oklch(0.55 0.18 330)` | 洗練、温かみ |
| Volt | 冷寄り | 2px | ライム `oklch(0.62 0.24 145)` | 鮮烈、テック |

### テーマ追加時のチェックリスト

1. セマンティックトークン定義（下記全項目）
2. dark モード版の定義
3. WCAG コントラスト比検証

---

## セマンティックカラートークン

全テーマ共通のインターフェース。コンポーネントはこれらだけを参照する。

### サーフェス

| トークン | 用途 |
|---|---|
| `--surface-0` | ページ背景 |
| `--surface-50` | カード・セクション背景 |
| `--surface-100` | 入れ子の背景、hover |

### テキスト

| トークン | 用途 |
|---|---|
| `--text-strong` | 見出し・本文 |
| `--text-muted` | 補助テキスト |
| `--text-on-accent` | accent 背景上のテキスト色（通常は白） |

### ボーダー

| トークン | 用途 |
|---|---|
| `--border` | フォーム入力枠、カード枠 |
| `--border-muted` | 区切り線、テーブル罫線、セクション境界 |

### アクセント

| トークン | 用途 |
|---|---|
| `--accent` | アクセントカラー |
| `--accent-soft` | アクセントの薄い背景（12%） |
| `--accent-hover` | アクセントの hover |

### その他

| トークン | 用途 |
|---|---|
| `--input-bg` | フォーム入力・カード・モーダル・ドロップダウン・トーストの白背景 |
| `--radius` | 基本角丸 |

---

## ステータスカラー

テーマ非依存、モード依存（dark で明度UP）。

| トークン | Light | Dark | 用途 |
|---|---|---|---|
| `--status-ok` | `oklch(0.55 0.14 155)` | `oklch(0.65 0.14 155)` | 成功・完了 |
| `--status-warn` | `oklch(0.65 0.18 75)` | `oklch(0.75 0.18 75)` | 警告・注意 |
| `--status-fail` | `oklch(0.55 0.20 25)` | `oklch(0.65 0.20 25)` | エラー・破壊的操作 |
| `--status-note` | `oklch(0.55 0.12 230)` | `oklch(0.65 0.12 230)` | 情報・補足 |

---

## ダークナビトークン

サイドバー・トップナビ共通。テーマモード非依存（常にダーク調）。

| トークン | 用途 |
|---|---|
| `--nav-surface-0` | ナビ背景 |
| `--nav-surface-50` | ナビ hover/選択背景 |
| `--nav-surface-100` | ナビ active 背景 |
| `--nav-text-strong` | ナビ テキスト |
| `--nav-text-muted` | ナビ 補助テキスト |
| `--nav-border` | ナビ ボーダー |
| `--nav-border-muted` | ナビ 薄いボーダー |
| `--nav-accent-soft` | ナビ アクセント背景 |

---

## スペーシング

→ CSS ソース: `src/css/tokens/spacing.css`

8px ベースの倍数スケール。

| トークン | 値 | px |
|---|---|---|
| `--space-1` | 0.25rem | 4px |
| `--space-2` | 0.5rem | 8px |
| `--space-3` | 0.75rem | 12px |
| `--space-4` | 1rem | 16px |
| `--space-6` | 1.5rem | 24px |
| `--space-8` | 2rem | 32px |
| `--space-12` | 3rem | 48px |
| `--space-16` | 4rem | 64px |

---

## z-index

→ CSS ソース: `src/css/tokens/z-index.css`

100 刻み。間に挟む余地を確保。

| トークン | 値 | 用途 |
|---|---|---|
| `--z-sticky` | 100 | sticky ヘッダー、action-bar |
| `--z-dropdown` | 200 | ドロップダウン |
| `--z-overlay` | 300 | オーバーレイ |
| `--z-drawer` | 400 | ドロワー（モバイルサイドバー） |
| `--z-modal` | 500 | モーダル |
| `--z-toast` | 600 | トースト通知 |
| `--z-tooltip` | 700 | ツールチップ |

---

## タイポグラフィ

→ CSS ソース: `src/css/tokens/typography.css`

| トークン | 値 | 用途 |
|---|---|---|
| `--font-sans` | `system-ui, -apple-system, sans-serif` | 本文 |
| `--font-mono` | `ui-monospace, 'Cascadia Code', 'Fira Code', monospace` | コード |
| `--leading-tight` | 1.25 | 見出し |
| `--leading-normal` | 1.45 | 本文 |
| `--leading-none` | 1 | バッジ等の単行 |

### アイコンサイズ

| トークン | 値 | 用途 |
|---|---|---|
| `--icon-sm` | 14px | タグ内アイコン |
| `--icon-md` | 16px | ナビ・ボタン内アイコン |
| `--icon-lg` | 20px | ページ見出し横アイコン |

---

## シャドウ

原則排除。ポップアップ系のみ1トークンで許容。

| トークン | Light | Dark |
|---|---|---|
| `--shadow-popup` | `0 2px 8px oklch(0 0 0 / 0.06), 0 0 0 1px oklch(0 0 0 / 0.04)` | `0 4px 12px oklch(0 0 0 / 0.4)` |

**適用対象:**

| コンポーネント | 適用 | 理由 |
|---|---|---|
| c-dropdown | ✓ | border + 影で浮遊感を確保 |
| c-toast | ✓ | 画面端に出現、背景との分離が必要 |
| c-modal | ✗ | `::backdrop` が分離を担保 |
| c-tooltip | ✗ | 背景色反転で識別可能 |

---

## フォーカスリング

全コンポーネント共通。base 層で一括定義。

| トークン | 値 |
|---|---|
| `--focus-ring` | `2px solid var(--accent)` |
| `--focus-offset` | `2px` |

---

## アニメーション

→ CSS ソース: `src/css/tokens/motion.css`

| トークン | 値 | 用途 |
|---|---|---|
| `--duration-fast` | 120ms | hover、色変化、小さい状態変化 |
| `--duration-normal` | 200ms | ドロップダウン開閉、アコーディオン |
| `--duration-slow` | 300ms | モーダル、ドロワー、大きなレイアウト変化 |
| `--easing` | `ease` | 全共通 |

---

## ブレイクポイント

2ブレイクポイント構成。メディアクエリはデスクトップファースト（`max-width`）で記述。

| 画面 | 幅 | 用途 |
|---|---|---|
| sm | ≤ 48rem (768px) | モバイル。padding 縮小、h1 縮小 |
| md | 48–75rem | タブレット。コンテンツはデスクトップ幅、ナビはドロワー |
| lg | > 75rem (1200px) | デスクトップ。フルサイドバー |

### レスポンシブ対応表

| 対象 | BP | 内容 |
|---|---|---|
| シェル | 75rem | ドロワーナビ化 |
| main-content padding | 48rem | 1rem に縮小 |
| page-header | 48rem | flex-wrap + h1 縮小 |
| l-grid .cols-N | 48rem | 1カラム化 |
| c-fields .horizontal | 40rem | 1カラム化 |
| c-table | なし | 横スクロール |
| hidden-sm | 48rem | 非表示 |
| hidden-lg | 75rem | 非表示 |
