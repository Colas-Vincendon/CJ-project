// lien de navigation du header
const navLink = document.querySelectorAll('.headerNavLink');
// localisation de la page
const windowPathname = window.location.pathname;

navLink.forEach((navLink) => {
  //check sur les liens pour comparer la localisation
  console.log('windowPathname', windowPathname);
  console.log('navLink', navLink);
  console.log('new URL(navLink.href).pathname', new URL(navLink.href).pathname);
  const navLinkPathname = new URL(navLink.href).pathname;
  if (windowPathname === navLinkPathname) {
    navLink.classList.add('actives'); // mises en place de la class actives
  }
});
