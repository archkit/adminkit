import { createIcons, icons } from "lucide";

// === Icons ===
createIcons({ icons });

// === Active navigation ===
const currentPath = location.pathname;
document.querySelectorAll(".shell-sidebar a").forEach((a) => {
  const href = a.getAttribute("href");
  if (!href || href.startsWith("http") || href === "#") return;
  if (currentPath.endsWith(href.replace(/^\//, ""))) {
    a.setAttribute("aria-current", "page");
    const details = a.closest("details");
    if (details) details.setAttribute("open", "");
  }
});

// === Theme ===
function updateThemeIcon() {
  const isDark = document.documentElement.dataset.themeMode === "dark";
  const icon = document.querySelector("[data-js-theme] [data-lucide]");
  if (icon) {
    icon.setAttribute("data-lucide", isDark ? "sun" : "moon");
    createIcons({ icons });
  }
}

function syncThemeSwitcher() {
  const html = document.documentElement;
  const style = html.dataset.themeStyle || "ink";
  const mode = html.dataset.themeMode || "light";
  document.querySelectorAll("[data-js-theme-style]").forEach((r) => (r.checked = r.value === style));
  document.querySelectorAll("[data-js-theme-mode]").forEach((r) => (r.checked = r.value === mode));
}

document.addEventListener("change", (e) => {
  const html = document.documentElement;
  if (e.target.dataset.jsThemeStyle !== undefined) {
    html.dataset.themeStyle = e.target.value;
    localStorage.setItem("theme-style", e.target.value);
  }
  if (e.target.dataset.jsThemeMode !== undefined) {
    html.dataset.themeMode = e.target.value;
    localStorage.setItem("theme-mode", e.target.value);
    updateThemeIcon();
  }
});

syncThemeSwitcher();

// === Click delegation (統合) ===
document.addEventListener("click", (e) => {
  // Theme toggle (サイドバーフッター)
  const themeBtn = e.target.closest("[data-js-theme]");
  if (themeBtn) {
    const html = document.documentElement;
    const isDark = html.dataset.themeMode === "dark";
    html.dataset.themeMode = isDark ? "light" : "dark";
    localStorage.setItem("theme-mode", isDark ? "light" : "dark");
    updateThemeIcon();
    syncThemeSwitcher();
    return;
  }

  // Modal: open
  const openTrigger = e.target.closest("[data-js-open]");
  if (openTrigger) {
    document.querySelector(`[data-js-dialog="${openTrigger.dataset.jsOpen}"]`)?.showModal();
    return;
  }

  // Modal: close
  if (e.target.closest("[data-js-close]")) {
    e.target.closest("dialog")?.close();
    return;
  }
  if (e.target.matches("dialog.c-modal")) {
    e.target.close();
    return;
  }

  // Sidebar toggle (mobile)
  const shell = document.querySelector(".shell");
  if (shell) {
    if (e.target.closest("[data-js-sidebar]")) {
      shell.classList.toggle("open");
      return;
    }
    if (shell.classList.contains("open") && !e.target.closest(".shell-sidebar")) {
      shell.classList.remove("open");
      return;
    }
  }

  // Tabs
  const tab = e.target.closest("[data-js-tab]");
  if (tab) {
    const tabs = tab.closest(".c-tabs");
    tabs.querySelectorAll("[role='tab']").forEach((t) => t.setAttribute("aria-selected", "false"));
    tabs.querySelectorAll("[role='tabpanel']").forEach((p) => (p.hidden = true));
    tab.setAttribute("aria-selected", "true");
    const panel = tabs.querySelector(`[data-js-panel="${tab.dataset.jsTab}"]`);
    if (panel) panel.hidden = false;
    return;
  }

  // Table: 行クリック遷移 (data-href)
  const row = e.target.closest("tr[data-href]");
  if (row && !e.target.closest("a, button, input, [popover]")) {
    location.href = row.dataset.href;
    return;
  }

  // Banner dismiss
  const bannerClose = e.target.closest("[data-js-banner-close]");
  if (bannerClose) {
    bannerClose.closest(".c-banner")?.remove();
    return;
  }
});

// === ミニサイドバー: details hover open ===
const isMiniMode = () => document.querySelector(".shell")?.dataset.layout === "mini";

document.querySelectorAll(".shell-sidebar nav li > details").forEach((details) => {
  const li = details.parentElement;
  const summary = details.querySelector("summary");
  const hasActivePage = details.querySelector("[aria-current='page']");

  li.addEventListener("mouseenter", () => {
    if (isMiniMode()) details.setAttribute("open", "");
  });
  li.addEventListener("mouseleave", () => {
    if (isMiniMode() && !hasActivePage) details.removeAttribute("open");
  });
  summary.addEventListener("click", (e) => {
    if (isMiniMode()) e.preventDefault();
  });
});

// === Table: チェックボックス連動 (data-js-table-check) ===
document.querySelectorAll("[data-js-table-check]").forEach((table) => {
  const key = table.dataset.jsTableCheck;
  const headerCb = table.querySelector("thead input[type='checkbox']");
  const getRowCbs = () => table.querySelectorAll("tbody input[type='checkbox']");
  const showTargets = document.querySelectorAll(`[data-js-table-check-show="${key}"]`);
  const activateTargets = document.querySelectorAll(`[data-js-table-check-activate="${key}"]`);

  const sync = () => {
    const checked = table.querySelectorAll("tbody input[type='checkbox']:checked").length;
    const total = getRowCbs().length;

    if (headerCb) {
      headerCb.checked = checked === total && total > 0;
      headerCb.indeterminate = checked > 0 && checked < total;
    }

    showTargets.forEach((el) => {
      el.hidden = checked === 0;
      const counter = el.querySelector("strong");
      if (counter) counter.textContent = checked;
    });

    activateTargets.forEach((el) => {
      el.querySelectorAll("button, a, select, input").forEach((ctrl) => {
        ctrl.disabled = checked === 0;
      });
    });
  };

  if (headerCb) {
    headerCb.addEventListener("change", () => {
      getRowCbs().forEach((cb) => (cb.checked = headerCb.checked));
      sync();
    });
  }

  table.querySelector("tbody")?.addEventListener("change", (e) => {
    if (e.target.type === "checkbox") sync();
  });
});

// === Tabs: キーボードナビゲーション (WAI-ARIA Tabs) ===
document.addEventListener("keydown", (e) => {
  const tab = e.target.closest("[role='tab']");
  if (!tab) return;

  const tablist = tab.closest("[role='tablist']");
  if (!tablist) return;

  const tabs = [...tablist.querySelectorAll("[role='tab']")];
  const index = tabs.indexOf(tab);
  let next = -1;

  if (e.key === "ArrowRight" || e.key === "ArrowDown") {
    next = (index + 1) % tabs.length;
  } else if (e.key === "ArrowLeft" || e.key === "ArrowUp") {
    next = (index - 1 + tabs.length) % tabs.length;
  } else if (e.key === "Home") {
    next = 0;
  } else if (e.key === "End") {
    next = tabs.length - 1;
  }

  if (next < 0) return;
  e.preventDefault();
  tabs[next].focus();
  tabs[next].click();
});

// tabindex 初期化: 選択中のタブのみ tabindex=0
document.querySelectorAll("[role='tablist']").forEach((tablist) => {
  tablist.querySelectorAll("[role='tab']").forEach((tab) => {
    tab.setAttribute("tabindex", tab.getAttribute("aria-selected") === "true" ? "0" : "-1");
  });
});

// tabindex 更新: タブ切替時
document.addEventListener("click", (e) => {
  const tab = e.target.closest("[role='tab']");
  if (!tab) return;
  const tablist = tab.closest("[role='tablist']");
  if (!tablist) return;
  tablist.querySelectorAll("[role='tab']").forEach((t) => {
    t.setAttribute("tabindex", t === tab ? "0" : "-1");
  });
});

// === Dropdown: キーボードナビゲーション (WAI-ARIA Menu) ===
document.addEventListener("keydown", (e) => {
  const menu = e.target.closest("[role='menu']");
  if (!menu) return;

  const items = [...menu.querySelectorAll("[role='menuitem']:not([disabled])")];
  const index = items.indexOf(document.activeElement);
  let next = -1;

  if (e.key === "ArrowDown") {
    next = index < items.length - 1 ? index + 1 : 0;
  } else if (e.key === "ArrowUp") {
    next = index > 0 ? index - 1 : items.length - 1;
  } else if (e.key === "Home") {
    next = 0;
  } else if (e.key === "End") {
    next = items.length - 1;
  }

  if (next >= 0) {
    e.preventDefault();
    items[next].focus();
  }
});

// popover 表示時に最初のメニューアイテムにフォーカス
document.addEventListener("toggle", (e) => {
  if (e.target.matches("[role='menu']") && e.newState === "open") {
    const first = e.target.querySelector("[role='menuitem']");
    if (first) requestAnimationFrame(() => first.focus());
  }
}, true);

// === Toast API ===
const TOAST_DEFAULTS = {
  maxVisible: 5,
  durations: { note: 5000, success: 5000, warning: 8000, danger: false },
};

const activeTimers = new Set();

class ToastTimer {
  #remaining; #callback; #timerId = null; #start;
  constructor(callback, duration) {
    this.#remaining = duration;
    this.#callback = callback;
    this.resume();
  }
  pause() {
    if (!this.#timerId) return;
    clearTimeout(this.#timerId);
    this.#timerId = null;
    this.#remaining -= Date.now() - this.#start;
  }
  resume() {
    if (this.#timerId) return;
    this.#start = Date.now();
    this.#timerId = setTimeout(this.#callback, this.#remaining);
  }
  clear() {
    clearTimeout(this.#timerId);
    this.#timerId = null;
    activeTimers.delete(this);
  }
}

function getToastContainer() {
  let el = document.querySelector(".c-toast-container");
  if (!el) {
    el = document.createElement("div");
    el.className = "c-toast-container";
    el.setAttribute("role", "region");
    el.setAttribute("aria-label", "通知");
    document.body.appendChild(el);
    el.addEventListener("mouseenter", () => activeTimers.forEach((t) => t.pause()));
    el.addEventListener("mouseleave", () => activeTimers.forEach((t) => t.resume()));
  }
  return el;
}

function escapeHtml(str) {
  const div = document.createElement("div");
  div.textContent = str;
  return div.innerHTML;
}

function dismissToast(el, timer) {
  timer?.clear();
  el.classList.add("out");
  el.addEventListener("animationend", () => el.remove(), { once: true });
  setTimeout(() => { if (el.parentNode) el.remove(); }, 400);
}

window.Toast = {
  show({ title, message, variant = "note", duration, action } = {}) {
    const container = getToastContainer();
    const dur = duration !== undefined ? duration : TOAST_DEFAULTS.durations[variant];

    const el = document.createElement("output");
    el.className = `c-toast${variant !== "note" ? ` ${variant}` : ""}`;

    if (variant === "danger") {
      el.setAttribute("role", "alert");
      el.setAttribute("aria-live", "assertive");
    } else {
      el.setAttribute("role", "status");
      el.setAttribute("aria-live", "polite");
    }

    if (dur) el.style.setProperty("--_duration", `${dur}ms`);

    let bodyHtml = `<strong>${escapeHtml(title)}</strong>`;
    if (message) bodyHtml += `<p>${escapeHtml(message)}</p>`;

    el.innerHTML = `
      <div class="c-toast-body">${bodyHtml}</div>
      <button class="c-toast-close" aria-label="閉じる">&times;</button>
      ${dur ? '<div class="c-toast-progress" aria-hidden="true"></div>' : ""}
    `;

    let timer = null;
    if (dur) {
      timer = new ToastTimer(() => dismissToast(el, timer), dur);
      activeTimers.add(timer);
    }

    el.querySelector(".c-toast-close").addEventListener("click", () => dismissToast(el, timer));

    if (action) {
      const btn = document.createElement("button");
      btn.className = "c-toast-action";
      btn.textContent = action.label;
      btn.addEventListener("click", () => {
        action.onClick?.();
        dismissToast(el, timer);
      });
      el.querySelector(".c-toast-body").appendChild(btn);
    }

    container.appendChild(el);

    const toasts = container.querySelectorAll(".c-toast:not(.out)");
    if (toasts.length > TOAST_DEFAULTS.maxVisible) {
      dismissToast(toasts[toasts.length - 1]);
    }

    return { dismiss: () => dismissToast(el, timer) };
  },

  clear() {
    document.querySelectorAll(".c-toast:not(.out)").forEach((el) => dismissToast(el, null));
    activeTimers.forEach((t) => t.clear());
  },
};

// === Navigation helpers ===
document.addEventListener("click", (e) => {
  if (e.target.closest("[data-js-back]")) history.back();
  if (e.target.closest("[data-js-reload]")) location.reload();
});
