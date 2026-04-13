<?php
$cssCore = '/dist/adminkit.min.css';
$cssDemo = '/assets/css/demo.css';
$jsInit  = '/dist/theme-init.js';
$jsCore  = '/dist/adminkit.min.js';
$jsDemo  = '/assets/js/demo.js';

$v = fn($path) => filemtime(__DIR__ . '/..' . $path);
?>
  <link rel="stylesheet" href="<?php echo $cssCore ?>?v=<?php echo $v($cssCore) ?>">
  <link rel="stylesheet" href="<?php echo $cssDemo ?>?v=<?php echo $v($cssDemo) ?>">
  <script src="<?php echo $jsInit ?>?v=<?php echo $v($jsInit) ?>"></script>
  <script type="module" src="<?php echo $jsCore ?>?v=<?php echo $v($jsCore) ?>"></script>
  <script type="module" src="<?php echo $jsDemo ?>?v=<?php echo $v($jsDemo) ?>"></script>
