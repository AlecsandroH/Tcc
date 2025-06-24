const openBtn = document.getElementById('openBtn');
const closeBtn = document.querySelector('.close-btn');
const popup = document.getElementById('popup');
const overlay = document.getElementById('overlay');


openBtn.addEventListener('click', () => {
    popup.style.display = 'block';
    overlay.style.display = 'block';
    popup.classList.add('show');
});


closeBtn.addEventListener('click', () => {
    popup.style.display = 'none';
    overlay.style.display = 'none';
    popup.classList.remove('show');
});


overlay.addEventListener('click', () => {
    popup.style.display = 'none';
    overlay.style.display = 'none';
    popup.classList.remove('show');
});




const openBtn2 = document.getElementById('openBtn2');
const closeBtn2 = document.querySelector('.close-btn2');
const popup2 = document.getElementById('popup2');
const overlay2 = document.getElementById('overlay2');



openBtn2.addEventListener('click', () => {
    popup2.style.display = 'block';
    overlay2.style.display = 'block';
    popup2.classList.add('show');
});


closeBtn2.addEventListener('click', () => {
    popup2.style.display = 'none';
    overlay2.style.display = 'none';
    popup2.classList.remove('show');
});


overlay2.addEventListener('click', () => {
    popup2.style.display = 'none';
    overlay2.style.display = 'none';
    popup2.classList.remove('show');
});





const openBtn3 = document.getElementById('openBtn3');
const closeBtn3 = document.querySelector('.close-btn3');
const popup3 = document.getElementById('popup3');
const overlay3 = document.getElementById('overlay3');



openBtn3.addEventListener('click', () => {
    popup3.style.display = 'block';
    overlay3.style.display = 'block';
    popup3.classList.add('show');
});


closeBtn3.addEventListener('click', () => {
    popup3.style.display = 'none';
    overlay3.style.display = 'none';
    popup3.classList.remove('show');
});


overlay3.addEventListener('click', () => {
    popup3.style.display = 'none';
    overlay3.style.display = 'none';
    popup3.classList.remove('show');
});