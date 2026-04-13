// テーマ初期化（FOUC 防止のため head 内で同期実行）
document.documentElement.dataset.themeStyle =
  localStorage.getItem('theme-style') || 'ink';
document.documentElement.dataset.themeMode =
  localStorage.getItem('theme-mode') ||
  (matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
