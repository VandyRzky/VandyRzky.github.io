const hamburgerToggle = document.querySelector('.nav-hamburger input');
const nav = document.querySelector('.nav-container ul')

hamburgerToggle.addEventListener('click', function() {
    nav.classList.toggle('slide');
})