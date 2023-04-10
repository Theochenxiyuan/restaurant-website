const carouselBtns = document.querySelectorAll('[data-carousel-button]');
const slides = document.querySelector('[data-slides]');
let i = 0;

function switchSlides(offset) {
  const activeSlide = slides.querySelector('[data-active]');
  let newIndex = [...slides.children].indexOf(activeSlide) + offset;
  if (newIndex < 0) {
    newIndex = slides.children.length - 1;
  }
  if (newIndex >= slides.children.length) {
    newIndex = 0;
  }

  slides.children[newIndex].dataset.active = 'true';
  delete activeSlide.dataset.active;
  i = 0;
}

carouselBtns.forEach((button) => {
  button.addEventListener('click', () => {
    const offset = button.dataset.carouselButton === 'next' ? 1 : -1;
    switchSlides(offset);
  });
});

setInterval(() => {
  i++;
  if (i >= 4) {
    switchSlides(1);
  }
}, 1000);
