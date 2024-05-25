const showPopupBtn = document.querySelector(".login-btn");
const hidePopupBtn = document.querySelector(".popup .close");

showPopupBtn.addEventListener("click", () => {
        document.body.classList.toggle("show-popup");
});

hidePopupBtn.addEventListener("click", () =>{
    document.body.classList.toggle("show-popup");
});

document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.querySelector('.hamburger');
    const links = document.querySelector('.links');

    hamburger.addEventListener('click', function () {
        links.classList.toggle('show');
    });
});