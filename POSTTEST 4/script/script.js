const hamburgerToggle = document.querySelector('.nav-hamburger input');
const nav = document.querySelector('.nav-container ul');
const button = document.querySelector('#collection .collection-button button')


hamburgerToggle.addEventListener('click', function() {
    nav.classList.toggle('slide');
})
button.addEventListener('click', function(){
    alert("Halaman belum tersedia!!!")
})