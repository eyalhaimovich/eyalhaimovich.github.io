const menu = document.querySelector('#mobile-menu');
const menuItems = document.querySelector('.navbar__menu');
const navLogo = document.querySelector('#navbar__logo');

// Toggle Mobile Menu
const mobileMenu = () => {
    menu.classList.toggle('is-active');
    menuItems.classList.toggle('active');
};

menu.addEventListener('click', mobileMenu);

// Show current item when scrolling through website
const highlightMenu = () => {
    const elem = document.querySelector('.highlight');
    const home = document.querySelector('#home-page');
    const about = document.querySelector('#about-page');
    const CV = document.querySelector('#CV-page');
    let scrollPos = window.scrollY;
    console.log(scrollPos); //find scroll position for swapping highlight

    //adds highlight to the navbar items
    if(window.innerWidth > 960 && scrollPos < 400){
        home.classList.add('highlight');
        about.classList.remove('highlight');
        return;
    } else if(window.innerWidth > 960 && scrollPos < 1100){
        about.classList.add('highlight');
        home.classList.remove('highlight');
        CV.classList.remove('highlight');
        return;
    } else if(window.innerWidth > 960 && scrollPos < 1750){
        CV.classList.add('highlight');
        about.classList.remove('highlight');
        return;
    }

    if((elem && window.innerWidth < 960 && scrollPos < 600) || elem){
        elem.classList.remove('highlight');
    }
}
window.addEventListener('scroll', highlightMenu); 
window.addEventListener('click', highlightMenu); 

// close Mobile Menu when clicking
const closeMobileMenu =  () => {
    const openMenu = document.querySelector('.is-active');
    if(window.innerWidth <= 960 && openMenu){
        menu.classList.toggle('is-active');
        menuItems.classList.remove('active');
    }
}

menuItems.addEventListener('click', closeMobileMenu);
navLogo.addEventListener('click', closeMobileMenu);