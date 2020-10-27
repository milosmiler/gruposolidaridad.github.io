

let menu = document.querySelector('.burger');
console.log(menu);

menu.addEventListener('click', OpenMenu);

function OpenMenu() {
    let menu = document.querySelector('header nav');
    menu.classList.add('active');
}