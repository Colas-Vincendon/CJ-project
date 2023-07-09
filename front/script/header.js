const navLink = document.querySelectorAll('.nav-link'); // lien de navigation du header
const windowPathname = window.location.pathname; // localisation de la page

navLink.forEach((navLink) => {
  //check sur les liens pour comparer la localisation
  const navLinkPathname = new URL(navLink.href).pathname;
  if (windowPathname === navLinkPathname) {
    navLink.classList.add('actives'); // mises en place de la class actives
  }
});
