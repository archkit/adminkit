// デモページ専用スクリプト（adminkit 本体には含まない）

// --- error.php: エラーページ切り替え ---
document.addEventListener('click', e => {
  const btn = e.target.closest('[data-js-error-switch]');
  if (!btn) return;
  const target = btn.dataset.jsErrorSwitch;
  document.querySelectorAll('[data-error-page]').forEach(el => {
    el.hidden = el.dataset.errorPage !== target;
  });
});

// --- form の submit 無効化 ---
document.querySelectorAll('form[data-js-prevent-submit]').forEach(form => {
  form.addEventListener('submit', e => e.preventDefault());
});

// --- widgets.php: Toast デモ ---
document.addEventListener('click', e => {
  const btn = e.target.closest('[data-js-toast]');
  if (!btn) return;
  const type = btn.dataset.jsToast;
  const toasts = {
    note:    { title: '通知', message: 'これはデフォルトの通知です。' },
    success: { title: '保存完了', message: 'データが正常に保存されました。', variant: 'success' },
    warning: { title: '注意', message: 'ディスク使用量が上限に近づいています。', variant: 'warning' },
    danger:  { title: 'エラー', message: 'サーバーとの通信に失敗しました。', variant: 'danger' },
    action:  { title: '削除しました', message: '1件のアイテムを削除しました。', variant: 'note', action: { label: '元に戻す', onClick: () => Toast.show({ title: '復元しました', variant: 'success' }) } },
  };
  Toast.show(toasts[type]);
});
