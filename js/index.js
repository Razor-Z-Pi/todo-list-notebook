const sideMenu = document.querySelector('aside');
const menuBtn = document.getElementById('menu-btn');
const closeBtn = document.getElementById('close-btn');

const darkMode = document.querySelector('.dark-mode');

if (parseInt(localStorage.getItem("dark")) === 1) {
    darkWhiteMode();
}

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});

darkMode.addEventListener('click', () => {
    if (parseInt(localStorage.getItem("dark")) === 1) {
        localStorage.setItem("dark", 0);
        console.log(localStorage.getItem("dark"));
        darkWhiteMode();
    } else {
        localStorage.setItem("dark", 1);
        console.log(localStorage.getItem("dark"));
        darkWhiteMode();
    }
})

function darkWhiteMode() {
    document.body.classList.toggle('dark-mode-variables');
    darkMode.querySelector('span:nth-child(1)').classList.toggle('active');
    darkMode.querySelector('span:nth-child(2)').classList.toggle('active');
}