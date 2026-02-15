<?php require_once __DIR__ . '/functions.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - adminkit</title>
  <link href="css/admin.css" rel="stylesheet">
  <script type="module" src="js/admin.js"></script>
</head>

<body>
  <div class="adminkit-layout">
    <?php part('sidebar'); ?>

    <div class="contents">
      <header class="topbar fixed">
        <h1>Dashboard</h1>
        <?php part('topbar-actions'); ?>
      </header>

      <main class="adminkit">
        <section>
          <h2 class="visually-hidden">Overview</h2>
          <div class="body grid cols-4">
            <div class="c-card">Card</div>
            <div class="c-card">Card</div>
            <div class="c-card">Card</div>
            <div class="c-card">Card</div>
          </div>
        </section>

        <div class="grid cols-2">
          <section>
            <h2>Recent Users</h2>
            <div class="body">
              <p>Table component will go here.</p>
            </div>
          </section>

          <section>
            <h2>Recent Orders</h2>
            <div class="body">
              <p>Table component will go here.</p>
            </div>
          </section>
        </div>

        <section>
          <h2>Activity Log</h2>
          <div class="body">
            <p>Table component will go here.</p>
          </div>
        </section>
      </main>
    </div>
  </div>
</body>
</html>
