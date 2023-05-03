const foodGallery = document.querySelector('.gallery.food');
const interiorGallery = document.querySelector('.gallery.interior');

const galleryNav = document.querySelector('.gallery-nav');
const galleryItems = document.querySelectorAll('.gallery div');
const enlarged = document.querySelector('.enlarged');

galleryNav.addEventListener('click', (e) => {
  foodBtn = galleryNav.children[0];
  interiorBtn = galleryNav.children[1];

  if (e.target == foodBtn) {
    foodBtn.classList.add('active');
    interiorBtn.classList.remove('active');
    foodGallery.classList.remove('hidden');
    interiorGallery.classList.add('hidden');
  } else {
    interiorBtn.classList.add('active');
    foodBtn.classList.remove('active');
    foodGallery.classList.add('hidden');
    interiorGallery.classList.remove('hidden');
  }
});

foodGallery.addEventListener('click', (e) => {
  if (e.target.matches('img') && e.target.closest('.gallery > div')) {
    console.log(e.target.innerHTML);
    enlarged.classList.remove('hidden');
    enlarged.innerHTML = e.target.outerHTML;
    document.body.style.overflow = 'hidden';
  }
});

interiorGallery.addEventListener('click', (e) => {
  if (e.target.matches('img') && e.target.closest('.gallery > div')) {
    console.log(e.target.innerHTML);
    enlarged.classList.remove('hidden');
    enlarged.innerHTML = e.target.outerHTML;
    document.body.style.overflow = 'hidden';
  }
});

enlarged.addEventListener('click', () => {
  document.body.style.overflow = 'scroll';
  enlarged.classList.add('hidden');
});
