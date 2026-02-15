import { createIcons, icons } from "https://esm.sh/lucide";

// Restore saved theme (before icon render)
if (localStorage.getItem("theme") === "dark") {
  document.documentElement.setAttribute("data-theme", "dark");
}

createIcons({ icons });

// Update theme icon to match current state
if (document.documentElement.hasAttribute("data-theme")) {
  document.querySelector("[data-js-theme] [data-lucide]")?.setAttribute("data-lucide", "sun");
  createIcons({ icons });
}

// Active navigation
const current = location.pathname.split("/").pop() || "index.php";
document.querySelectorAll(".sidebar a").forEach((a) => {
  if (a.getAttribute("href") === current) a.classList.add("active");
});

// Close popups on outside click
document.addEventListener("click", (e) => {
  document.querySelectorAll("details.user[open], details.popup[open]").forEach((d) => {
    if (!d.contains(e.target)) d.open = false;
  });
});

// Modal: open
document.addEventListener("click", (e) => {
  const trigger = e.target.closest("[data-js-open]");
  if (!trigger) return;
  document.querySelector(`[data-js-dialog="${trigger.dataset.jsOpen}"]`)?.showModal();
});

// Modal: close (button or backdrop click)
document.addEventListener("click", (e) => {
  if (e.target.closest("[data-js-close]")) {
    e.target.closest("dialog")?.close();
    return;
  }
  if (e.target.matches("dialog.c-modal")) {
    e.target.close();
  }
});

// Theme toggle
document.addEventListener("click", (e) => {
  if (!e.target.closest("[data-js-theme]")) return;
  const isDark = document.documentElement.hasAttribute("data-theme");
  if (isDark) {
    document.documentElement.removeAttribute("data-theme");
    localStorage.setItem("theme", "light");
  } else {
    document.documentElement.setAttribute("data-theme", "dark");
    localStorage.setItem("theme", "dark");
  }
  const icon = e.target.closest("[data-js-theme]").querySelector("[data-lucide]");
  if (icon) {
    icon.setAttribute("data-lucide", isDark ? "moon" : "sun");
    createIcons({ icons });
  }
});

// Sidebar toggle (mobile)
document.addEventListener("click", (e) => {
  const app = document.querySelector(".adminkit-layout");
  if (e.target.closest("[data-js-sidebar]")) {
    app.classList.toggle("open");
    return;
  }
  if (app.classList.contains("open") && !e.target.closest(".sidebar")) {
    app.classList.remove("open");
  }
});

// Tabs
document.addEventListener("click", (e) => {
  const tab = e.target.closest("[data-js-tab]");
  if (!tab) return;
  const tabs = tab.closest(".c-tabs");
  tabs.querySelectorAll("[role='tab']").forEach((t) => t.setAttribute("aria-selected", "false"));
  tabs.querySelectorAll("[role='tabpanel']").forEach((p) => (p.hidden = true));
  tab.setAttribute("aria-selected", "true");
  tabs.querySelector(`[data-js-panel="${tab.dataset.jsTab}"]`).hidden = false;
});
