<?php require_once __DIR__ . '/functions.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Layout - adminkit</title>
  <link href="css/adminkit.css" rel="stylesheet">
  <script type="module" src="js/admin.js"></script>
</head>

<body>
  <div class="adminkit-layout">
    <?php part('sidebar'); ?>

    <div class="contents">
      <header class="topbar fixed">
        <h1>Layout</h1>
        <?php part('topbar-actions'); ?>
        <nav aria-label="breadcrumb">
          <ol>
            <li><a href="index.php">Dashboard</a></li>
            <li>Layout</li>
          </ol>
        </nav>
      </header>

      <main class="adminkit">
        <section>
          <h2>Grid</h2>
          <div class="body">
            <p>Responsive grid system with auto-fill and fixed column variants.</p>
            <section>
              <h3>Auto-fill (default)</h3>
              <div class="body">
                <div class="grid">
                  <div class="c-card">Auto</div>
                  <div class="c-card">Auto</div>
                  <div class="c-card">Auto</div>
                  <div class="c-card">Auto</div>
                  <div class="c-card">Auto</div>
                </div>
              </div>
            </section>
            <section>
              <h3>Fixed columns</h3>
              <div class="body">
                <div class="grid cols-2">
                  <div class="c-card">cols-2</div>
                  <div class="c-card">cols-2</div>
                </div>
                <div class="grid cols-3">
                  <div class="c-card">cols-3</div>
                  <div class="c-card">cols-3</div>
                  <div class="c-card">cols-3</div>
                </div>
                <div class="grid cols-4">
                  <div class="c-card">cols-4</div>
                  <div class="c-card">cols-4</div>
                  <div class="c-card">cols-4</div>
                  <div class="c-card">cols-4</div>
                </div>
              </div>
            </section>
          </div>
        </section>

        <section>
          <h2>Card</h2>
          <div class="body">
            <p>Container for grouping related content.</p>
            <div class="grid cols-3">
              <div class="c-card">Basic card</div>
              <div class="c-card">Basic card</div>
              <div class="c-card">Basic card</div>
            </div>
          </div>
        </section>

        <section>
          <h2>Section</h2>
          <div class="body">
            <p>Content sections with heading + body structure. This page itself demonstrates the section layout.</p>
            <section>
              <h3>Container</h3>
              <div class="body">
                <p>Width-constrained blocks with optional centering.</p>
                <div class="container narrow center">
                  <div class="c-card">container narrow center (40rem, centered)</div>
                </div>
                <div class="container wide center">
                  <div class="c-card">container wide center (60rem, centered)</div>
                </div>
                <div class="container narrow">
                  <div class="c-card">container narrow (40rem, left-aligned)</div>
                </div>
              </div>
            </section>
          </div>
        </section>
      </main>
    </div>
  </div>
</body>
</html>
