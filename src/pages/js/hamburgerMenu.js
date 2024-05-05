const header = document.querySelector(".header");
const btnHamburger = document.querySelector("#btnHamburger");
const hamburgerMenu = document.querySelector("#hamburgerMenu")

btnHamburger.addEventListener("click", function(){
    if(header.classList.contains("open")) {
        header.classList.remove("open");
        hamburgerMenu.classList.remove("hamburger-down");
        hamburgerMenu.classList.add("hamburger-up");
    }
    else {
        header.classList.add("open");
        hamburgerMenu.classList.remove("hamburger-up");
        hamburgerMenu.classList.add("hamburger-down");
    }
});

$