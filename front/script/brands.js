const carouselImages = document.querySelectorAll('.carousel-image');
let currentIndex = 0;

function showImage(index) {
  carouselImages.forEach((image, i) => {
    if (i === index) {
      image.classList.add('active');
    } else {
      image.classList.remove('active');
    }
  });
}

function rotateImages() {
  currentIndex++;
  if (currentIndex >= carouselImages.length) {
    currentIndex = 0;
  }
  showImage(currentIndex);
}

setInterval(rotateImages, 3000);
