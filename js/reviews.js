const reviewsList = document.querySelector('.reviews-list');
const filterDropdown = document.querySelector('#filter');
const sortDropdown = document.querySelector('#sort');

const writeReviewButton = document.querySelector('.write-review');
const reviewOverlay = document.querySelector('.review-overlay');
const cancelReviewButton = reviewOverlay.querySelector('.cancel-review');

const fileInput = document.getElementById('my-images');
const uploadedImages = document.querySelector('.uploaded-images');

const enlarged = document.querySelector('.enlarged');

filterDropdown.addEventListener('change', () => {
  const selectedFilter = filterDropdown.value;
  let numStars;

  if (selectedFilter === 'all') {
    numStars = null;
  } else {
    numStars = parseInt(selectedFilter, 10);
  }

  const reviews = reviewsList.querySelectorAll('.review');

  reviews.forEach((review) => {
    const rating = review.querySelector(
      '.review-rating .review-stars'
    ).textContent;
    const reviewNumStars = rating.length;

    if (numStars === null || reviewNumStars === numStars) {
      review.style.display = 'block';
    } else {
      review.style.display = 'none';
    }
  });
});

sortDropdown.addEventListener('change', () => {
  const selectedSort = sortDropdown.value;
  const reviews = Array.from(reviewsList.querySelectorAll('.review'));
  if (selectedSort === 'newest') {
    reviews.sort((a, b) => {
      const dateA = new Date(
        a
          .querySelector('.review-time')
          .textContent.replace(/(\d{2})-(\d{2})-(\d{4})/, '$3-$2-$1')
      );
      const dateB = new Date(
        b
          .querySelector('.review-time')
          .textContent.replace(/(\d{2})-(\d{2})-(\d{4})/, '$3-$2-$1')
      );
      return dateB - dateA;
    });
  } else if (selectedSort === 'oldest') {
    reviews.sort((a, b) => {
      const dateA = new Date(
        a
          .querySelector('.review-time')
          .textContent.replace(/(\d{2})-(\d{2})-(\d{4})/, '$3-$2-$1')
      );
      const dateB = new Date(
        b
          .querySelector('.review-time')
          .textContent.replace(/(\d{2})-(\d{2})-(\d{4})/, '$3-$2-$1')
      );
      return dateA - dateB;
    });
  } else if (selectedSort === 'top') {
    reviews.sort((a, b) => {
      const ratingA = a.querySelector('.review-rating .review-stars')
        .textContent.length;
      const ratingB = b.querySelector('.review-rating .review-stars')
        .textContent.length;
      const dateA = new Date(
        a
          .querySelector('.review-time')
          .textContent.replace(/(\d{2})-(\d{2})-(\d{4})/, '$3-$2-$1')
      );
      const dateB = new Date(
        b
          .querySelector('.review-time')
          .textContent.replace(/(\d{2})-(\d{2})-(\d{4})/, '$3-$2-$1')
      );
      return ratingB - ratingA || dateB - dateA;
    });
  }

  reviewsList.innerHTML = '';

  reviews.forEach((review) => {
    reviewsList.appendChild(review);
  });
});

const e = new Event('change');
sortDropdown.value = 'top';
sortDropdown.dispatchEvent(e);

writeReviewButton.addEventListener('click', () => {
  reviewOverlay.style.display = 'block';

  document.body.style.overflow = 'hidden';
});

cancelReviewButton.addEventListener('click', () => {
  reviewOverlay.style.display = 'none';

  document.body.style.overflow = 'scroll';
});

fileInput.addEventListener('change', () => {
  uploadedImages.innerHTML = '';

  if (fileInput.files.length > 2) {
    alert('You can only upload a maximum of 2 files.');
    fileInput.value = '';
    return;
  }

  for (let i = 0; i < fileInput.files.length; i++) {
    const file = fileInput.files[i];

    if (file.type.match(/image.*/)) {
      const reader = new FileReader();

      reader.addEventListener('load', (event) => {
        const img = document.createElement('img');
        img.src = event.target.result;
        uploadedImages.appendChild(img);
      });

      reader.readAsDataURL(file);
    }
  }
});

reviewsList.addEventListener('click', (e) => {
  if (e.target.matches('img')) {
    enlarged.classList.remove('hidden');
    const imgHTML = e.target.outerHTML;
    enlarged.innerHTML = imgHTML;
    document.body.style.overflow = 'hidden';
  }
});

enlarged.addEventListener('click', () => {
  document.body.style.overflow = 'scroll';
  enlarged.classList.add('hidden');
});
