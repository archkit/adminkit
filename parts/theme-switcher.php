<button class="c-button ghost small" data-js-theme aria-label="テーマ切替"><i data-lucide="moon"></i></button>
<div class="c-dropdown">
  <button class="c-button ghost small" popovertarget="theme-menu" aria-haspopup="menu" aria-expanded="false">
    <i data-lucide="palette"></i>
  </button>
  <div popover id="theme-menu" role="menu" class="theme-menu">
    <div class="theme-menu-label">テーマ</div>
    <div class="c-segment" role="radiogroup" aria-label="テーマスタイル">
      <label><input type="radio" name="theme-style" value="ink" data-js-theme-style><span>Ink</span></label>
      <label><input type="radio" name="theme-style" value="stone" data-js-theme-style><span>Stone</span></label>
      <label><input type="radio" name="theme-style" value="dusk" data-js-theme-style><span>Dusk</span></label>
      <label><input type="radio" name="theme-style" value="volt" data-js-theme-style><span>Volt</span></label>
    </div>
    <div class="theme-menu-label">モード</div>
    <div class="c-segment" role="radiogroup" aria-label="テーマモード">
      <label><input type="radio" name="theme-mode" value="light" data-js-theme-mode><span>Light</span></label>
      <label><input type="radio" name="theme-mode" value="dark" data-js-theme-mode><span>Dark</span></label>
    </div>
  </div>
</div>
