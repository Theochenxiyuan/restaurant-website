const closeBtn = document.querySelector('.close');
const itemDetails = document.querySelector('.item-details');
const detailContent = document.querySelector('.detail-content');
const menuGroup = document.querySelector('.menu-group');

const categoryGroup = document.querySelector('.category-group');
const hiddenCategories = categoryGroup.querySelectorAll(
  '.category-group li:nth-of-type(n + 4)'
);
const allCategories = categoryGroup.querySelectorAll('li');

closeBtn.addEventListener('click', () => {
  itemDetails.style.display = 'none';
  document.body.style.overflow = 'scroll';
});

menuGroup.addEventListener('click', (e) => {
  if (e.target.matches('.menu-group')) {
    return;
  }
  document.body.style.overflow = 'hidden';
  const items = menuGroup.children;
  const clickedItem = e.target.closest('.menu-item');
  itemDetails.style.display = 'block';
  for (let i = 0; i < items.length; i++) {
    if (items[i] === clickedItem) {
      detailContent.innerHTML = clickedItem.innerHTML;
    }
  }
});

categoryGroup.addEventListener('click', (e) => {
  if (e.target.closest('.expand-btn')) {
    for (let i = 0; i < hiddenCategories.length; i++) {
      if (hiddenCategories[i].style.display == '') {
        hiddenCategories[i].style.display = 'block';
      } else if (hiddenCategories[i].style.display == 'block') {
        hiddenCategories[i].style.display = '';
      }
    }
    e.target
      .closest('.expand-btn')
      .firstElementChild.classList.toggle('bi-chevron-compact-down');
    e.target
      .closest('.expand-btn')
      .firstElementChild.classList.toggle('bi-chevron-compact-up');
    return;
  } else if (e.target.closest('li')) {
    const activeCategory = categoryGroup.querySelector('.active-category');
    activeCategory.classList.remove('active-category');
    e.target.closest('li').classList.add('active-category');
  }

  if (e.target.closest('li')) {
    const activeCategory = categoryGroup
      .querySelector('.active-category')
      .innerHTML.toLowerCase()
      .replace(/\s+/g, '');
    const items = menuGroup.children;

    if (activeCategory === 'all') {
      for (let i = 0; i < items.length; i++) {
        items[i].style.display = 'block';
      }
    } else {
      for (let i = 0; i < items.length; i++) {
        items[i].style.display = 'none';
        if (items[i].dataset.category == activeCategory)
          items[i].style.display = 'block';
      }
    }
  }
});
