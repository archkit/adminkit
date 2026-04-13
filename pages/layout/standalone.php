<?php require_once __DIR__ . '/../../functions.php'; ?>
<!DOCTYPE html>
<html lang="ja" data-theme-style="ink">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>スタンドアロンレイアウト - adminkit</title>
  <?php part('resources'); ?>
</head>
<body>
  <main id="main" class="shell-standalone">
    <div>
      <h1>スタンドアロンレイアウト</h1>

      <section>
        <h2>概要</h2>
        <p><code>.shell-standalone</code> を使用した中央配置レイアウトです。ログイン画面やシンプルなフォーム画面に適しています。</p>
      </section>

      <section>
        <h2>幅バリアント</h2>
        <ul class="c-list">
          <li><code>.narrow</code> — max-width: 20rem</li>
          <li>デフォルト — max-width: 24rem</li>
          <li><code>.wide</code> — max-width: 32rem</li>
        </ul>
      </section>

      <section>
        <h2>使い方</h2>
        <pre><code>&lt;main class="shell-standalone"&gt;
  &lt;form&gt;...&lt;/form&gt;
&lt;/main&gt;

&lt;!-- 幅バリアント --&gt;
&lt;main class="shell-standalone narrow"&gt;...&lt;/main&gt;
&lt;main class="shell-standalone wide"&gt;...&lt;/main&gt;</code></pre>
      </section>

      <section>
        <h2>サンプルフォーム</h2>
        <form class="c-fields" data-js-prevent-submit>
          <label>
            <span>メールアドレス</span>
            <input type="email" placeholder="you@example.com">
          </label>
          <label>
            <span>パスワード</span>
            <input type="password" placeholder="パスワード">
          </label>
          <button type="submit" class="c-button primary full">ログイン</button>
        </form>
      </section>

      <p><a href="/index.php">ダッシュボードに戻る</a></p>
    </div>
  </main>

</body>
</html>
