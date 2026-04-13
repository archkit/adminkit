# adminkit

管理画面・単一フォーム系UIのためのCSSフレームワーク。

## 特徴

- **@layer ベース** — カスケード制御で詳細度の問題を排除
- **2層構造** — レイアウトプリミティブ + シェルパターンの組み合わせ
- **テーマシステム** — スタイル（Ink/Stone/Dusk）× モード（Light/Dark）の2軸
- **セマンティクス重視** — ARIA属性で状態管理、正しいアウトライン
- **JS 最小** — CSS Only で動くものはCSS化。バニラJSのみ同梱

## セットアップ

```bash
npm install
npm run dev    # 開発ビルド
npm run build  # 本番ビルド（minify）
```

PHP のビルトインサーバで確認:

```bash
php -S localhost:8080
```

## 使い方

```html
<link rel="stylesheet" href="/dist/adminkit.min.css">
<script src="/dist/theme-init.js"></script>
<script type="module" src="/dist/adminkit.min.js"></script>
```

## ディレクトリ構成

```
/
├── index.php                        # ダッシュボード
├── src/
│   ├── css/                         # CSS ソース
│   │   ├── adminkit.css             # エントリポイント（@layer + @import）
│   │   ├── tokens/                  # 色・余白・z-index・タイポグラフィ・モーション
│   │   ├── base/                    # reset・global・focus・motion・print
│   │   ├── layout/                  # プリミティブ・シェル・パターン
│   │   ├── components/              # 29 UI コンポーネント
│   │   └── utilities/               # ヘルパークラス
│   └── js/
│       ├── adminkit.js              # JS エントリポイント（Lucide・テーマ・Toast 等）
│       └── theme-init.js            # テーマ初期化（同期実行、FOUC 防止）
├── dist/                            # ビルド出力
│   ├── adminkit.min.css             # CSS（Lightning CSS）
│   ├── adminkit.min.js              # JS（esbuild、Lucide バンドル済み）
│   └── theme-init.js                # テーマ初期化（コピー）
├── assets/                          # デモページ専用
│   ├── css/demo.css
│   └── js/demo.js
├── pages/
│   ├── components/                  # コンポーネントギャラリー
│   ├── demo/                        # デモページ（記事・ユーザー CRUD、設定、プロフィール）
│   └── layout/                      # レイアウトパターンのデモ
├── parts/                           # PHP テンプレートパーシャル
├── docs/                            # 設計ドキュメント
├── functions.php                    # PHP ヘルパー
└── package.json                     # ビルドスクリプト
```

## コンポーネント一覧

### フォーム
fields, button, search, upload, segment, toggle-group

### 表示
card, table, list, badge, tag, avatar, stats, progress, stepper, skeleton, dot, divider

### フィードバック
alert, banner, toast, modal, dropdown, tooltip, tabs, pagination, action-bar, empty-state

## レイアウトプリミティブ

| プリミティブ | 用途 |
|---|---|
| l-stack | 垂直方向の均等間隔 |
| l-cluster | 水平方向の折り返し配置 |
| l-sidebar | メイン + サイド 2カラム |
| l-grid | 自動フィルグリッド |
| l-center | 幅制約 + 中央配置 |
| l-switcher | 幅に応じて縦横切替 |
| l-frame | アスペクト比固定 |

## シェルパターン

| パターン | data-layout | 用途 |
|---|---|---|
| サイドバー | `sidebar` | 標準的な管理画面 |
| ミニサイドバー | `mini` | アイコンのみ、ホバー展開 |
| トップナビ | `topnav` | サイドバーなし |
| ダブルサイドバー | `double` | メイン + サブサイドバー |
| スタンドアロン | — | ログイン・エラーページ |
| フッター付き | — | shell-footer を shell-main 内に配置 |

## デモページ

| ページ | パス |
|---|---|
| ダッシュボード | `/index.php` |
| 記事一覧 | `/pages/demo/articles/` |
| 記事編集（2カラム） | `/pages/demo/articles/edit.php?id=1` |
| カテゴリ | `/pages/demo/articles/categories.php` |
| コメント | `/pages/demo/articles/comments.php` |
| ユーザー一覧 | `/pages/demo/users/` |
| 一般設定 | `/pages/demo/settings.php` |
| プロフィール（タブ） | `/pages/demo/profile.php` |
| コンポーネント | `/pages/components/{layouts,modules,widgets}.php` |
| レイアウトデモ | `/pages/layout/{sidebar,mini,topnav,double,footer,standalone,error,login}.php` |

## ドキュメント

| ファイル | 内容 |
|---|---|
| [docs/guide.md](docs/guide.md) | 設計思想・セクショニング・余白・アクセシビリティ |
| [docs/tokens.md](docs/tokens.md) | デザイントークン |
| [docs/layout.md](docs/layout.md) | プリミティブ + シェルパターン |
| [docs/components-form.md](docs/components-form.md) | フォームコンポーネント |
| [docs/components-display.md](docs/components-display.md) | 表示コンポーネント |
| [docs/components-feedback.md](docs/components-feedback.md) | フィードバックコンポーネント |

## ブラウザサポート

最新2バージョンの Chrome, Edge, Safari, Firefox
