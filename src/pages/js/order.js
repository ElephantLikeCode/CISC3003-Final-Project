var add = document.querySelectorAll(".fa-plus-circle");
var drop = document.querySelectorAll(".fa-minus-circle");
var mealCart = document.querySelectorAll(".meal-cart");

for (var i = 0; i < add.length; i++) {
    add[i].addEventListener("click", function(){
        this.previousElementSibling.stepUp();
    });
}

for (var i = 0; i < add.length; i++) {
    drop[i].addEventListener("click", function(){
        this.nextElementSibling.stepDown();
    });
}