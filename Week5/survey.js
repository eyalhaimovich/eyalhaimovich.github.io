const popupConfirm = document.querySelector('#popup');

//Turn Check popup on and off
const openPopup = () => {
    popup.classList.add("active");
}

popup.addEventListener('click', openPopup);

const closePopup = () => {
    popup.classList.remove("active");
}

popup.addEventListener('click', closePopup);