const menuToggler = document.getElementById('side-menu-toggler');
const sideMenu = document.getElementById('side-menu');

if (sideMenu.classList.contains('show')) {
    menuToggler.classList.add('toggler-hidden');
    console.log(sideMenu.classList.values());
} else {
    menuToggler.classList.remove('toggler-hidden');
}