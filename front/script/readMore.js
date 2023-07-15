const parentContainer =  document.querySelector('.galleryServices');

parentContainer.addEventListener('click', event=>{

    const current = event.target;

    const isReadMoreBtn = current.className.includes('readMoreBtn');

    if(!isReadMoreBtn) return;

    const currentText = event.target.parentNode.querySelector('.readMoreTxt');

    currentText.classList.toggle('readMoreTxt--show');

    current.textContent = current.textContent.includes('lire plus') ? "lire moins..." : "lire plus...";

})