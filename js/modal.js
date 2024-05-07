// Получить модальный
let modal = document.getElementById("myModal");
let modalUpdate = document.getElementById("myModalUpdate");

// Получить кнопку, которая открывает модальный
let btn = document.getElementById("modalBtn");
let btnUpdate = document.getElementById("modalBtnUpdate");

// Получить элемент <span>, который закрывает модальный
let span = document.getElementsByClassName("close")[1];
let spanUpdate = document.getElementsByClassName("close")[2];

// Когда пользователь нажимает на кнопку, откройте модальный
btn.onclick = function() {
  modal.style.display = "block";
}

btnUpdate.onclick = function() {
  modalUpdate.style.display = "block";
}

// Когда пользователь нажимает на <span> (x), закройте модальное окно
span.onclick = function() {
  modal.style.display = "none";
}

spanUpdate.onclick = function() {
  modalUpdate.style.display = "none";
}

// Когда пользователь щелкает в любом месте за пределами модального, закройте его
window.onclick = function(event) {
  if (event.target == modal || event.target == modalUpdate) {
    modal.style.display = "none";
    modalUpdate.style.display = "none";
  }
}


let coll = document.getElementsByClassName("collapsible");
let i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    let content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}


const smoothLinks = document.querySelectorAll('a[href^="#"]');
for (let smoothLink of smoothLinks) {
    smoothLink.addEventListener('click', function (e) {
        e.preventDefault();
        const id = smoothLink.getAttribute('href');

        document.querySelector(id).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
};