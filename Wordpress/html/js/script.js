document.addEventListener("DOMContentLoaded", () => {
  const navToggle = document.querySelector(".nav-toggle");
  const globalNav = document.querySelector(".global-nav-sp");

  if (!navToggle || !globalNav) return;

  navToggle.addEventListener("click", () => {
    const isOpen = globalNav.classList.toggle("is-open");
    navToggle.classList.toggle("is-open", isOpen);
    navToggle.setAttribute("aria-expanded", String(isOpen));
    document.body.classList.toggle("is-nav-open", isOpen);
  });

  // ナビゲーションリンククリック時にメニューを閉じる（スマホ）
  globalNav.addEventListener("click", (event) => {
    const target = event.target;
    if (target instanceof Element && target.closest(".nav-link")) {
      if (globalNav.classList.contains("is-open")) {
        globalNav.classList.remove("is-open");
        navToggle.classList.remove("is-open");
        navToggle.setAttribute("aria-expanded", "false");
        document.body.classList.remove("is-nav-open");
      }
    }
  });
});

const navLinks = document.querySelectorAll('.page-sidenav__link');
const sections = document.querySelectorAll('section');

const options = {
  root: null, // ビューポートを基準にする
  rootMargin: '-50% 0px', // 画面の中央50%の位置にきたら判定
  threshold: 0
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    // セクションが画面内に入った（交差した）場合
    if (entry.isIntersecting) {
      navLinks.forEach(link => {
        link.classList.remove('is-active');
        // hrefのIDとセクションのIDが一致したらクラス付与
        if (link.getAttribute('href') === `#${entry.target.id}`) {
          link.classList.add('is-active');
        }
      });
    }
  });
}, options);

// 各セクションを監視対象に登録
sections.forEach(section => observer.observe(section));

(() => {
  const markers = document.querySelectorAll("[data-popup-target]");
  const spMarkers = document.querySelectorAll(".map-marker-sp");
  const popupWrap = document.querySelector(".map-popup");
  const overlay = document.querySelector(".map-overlay");
  const popups = document.querySelectorAll(".map-popup-item");

  const closeAll = () => {
    popupWrap.classList.remove("is-active");
    popupWrap.setAttribute("aria-hidden", "true");
    popups.forEach((p) => p.classList.remove("is-active"));
  };

  const openPopup = (id) => {
    closeAll();
    const target = document.querySelector(".map-popup-" + id);
    if (!target) return;
    popupWrap.classList.add("is-active");
    popupWrap.setAttribute("aria-hidden", "false");
    target.classList.add("is-active");
  };

  markers.forEach((marker) => {
    marker.addEventListener("click", () => openPopup(marker.dataset.popupTarget));
  });

  spMarkers.forEach((marker) => {
    marker.addEventListener("click", () => openPopup(marker.dataset.popup));
  });

  popupWrap.addEventListener("click", (e) => {
    if (e.target === overlay || e.target.closest(".map-popup-close")) closeAll();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") closeAll();
  });
})();

