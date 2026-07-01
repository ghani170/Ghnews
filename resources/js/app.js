import './bootstrap';
import 'preline'

const html = document.querySelector('html');
const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: light)').matches);
const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');

document.addEventListener('DOMContentLoaded', function() {
  const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
  const mobileMenu = document.getElementById('mobile-menu');
  
  mobileMenuButton.addEventListener('click', function() {
    const expanded = this.getAttribute('aria-expanded') === 'true';
    this.setAttribute('aria-expanded', !expanded);
    mobileMenu.classList.toggle('hidden');
    
    // Toggle hamburger/close icons
    const icons = this.querySelectorAll('svg');
    icons.forEach(icon => icon.classList.toggle('hidden'));
  });
});
