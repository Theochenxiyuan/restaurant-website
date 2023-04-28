const menuBtn = document.querySelector('button.menu');
const menu = document.querySelector('nav.menu');
const overlay = document.querySelector('.overlay');

function showMenu() {
  menu.classList.toggle('menu-show');
  overlay.classList.toggle('hidden');
  if (document.body.style.overflow == 'hidden') {
    document.body.style.overflow = 'scroll';
  } else {
    document.body.style.overflow = 'hidden';
  }
}
menuBtn.addEventListener('click', () => {
  showMenu();
});

overlay.addEventListener('click', () => {
  showMenu();
});
