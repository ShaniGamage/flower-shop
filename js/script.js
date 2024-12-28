let menuBtn = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

menuBtn.addEventListener('click', function() {
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
});

userBtn.addEventListener('click', function() {
    let userBox = document.querySelector('.user-box');
    userBox.classList.toggle('active');
});
