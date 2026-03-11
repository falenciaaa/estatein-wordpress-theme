document.addEventListener('DOMContentLoaded', function () {

  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.primary-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => nav.classList.toggle('open'));
  }

  const closeBar = document.querySelector('.close-bar');
  const bar = document.querySelector('.announcement-bar');
  if (closeBar && bar) {
    closeBar.addEventListener('click', () => bar.remove());
  }

  const filterBtns = document.querySelectorAll('.office-filter button');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });

  document.querySelectorAll('.slider-section').forEach(section => {
    const cards = section.querySelectorAll('.slider-item');
    const info = section.querySelector('.slider-info');
    const total = cards.length;
    let current = 0;

    function showCard(index) {
      cards.forEach((c, i) => c.style.display = i === index ? '' : 'none');
      if (info) info.textContent = `0${index + 1} of ${String(total).padStart(2, '0')}`;
    }

    if (total > 0) {
      showCard(0);
      const prev = section.querySelector('.slider-prev');
      const next = section.querySelector('.slider-next');
      if (prev) prev.addEventListener('click', () => { current = (current - 1 + total) % total; showCard(current); });
      if (next) next.addEventListener('click', () => { current = (current + 1) % total; showCard(current); });
    }
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.fade-in').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
  });

  document.querySelectorAll('.faq-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
      const content = btn.nextElementSibling;
      const isOpen = content.style.maxHeight;
      document.querySelectorAll('.faq-content').forEach(c => c.style.maxHeight = '');
      document.querySelectorAll('.faq-toggle').forEach(b => b.classList.remove('open'));
      if (!isOpen) {
        content.style.maxHeight = content.scrollHeight + 'px';
        btn.classList.add('open');
      }
    });
  });

});
