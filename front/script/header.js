// lien de navigation du header
const navLink = document.querySelectorAll('.headerNavLink');
// localisation de la page
const windowPathname = window.location.pathname;

navLink.forEach((navLink) => {
  //check sur les liens pour comparer la localisation
  const navLinkPathname = new URL(navLink.href).pathname;
  if (windowPathname === navLinkPathname) {
    navLink.classList.add('actives'); // mises en place de la class actives
  }
});

// menu burger
const menuHamburger = document.querySelector('#openMenu');
const nav = document.querySelector('.nav');
console.log(nav);
console.log(menuHamburger);
menuHamburger.addEventListener('click', () => {
  nav.classList.toggle('showMenu');
  console.log('lolo');
});
