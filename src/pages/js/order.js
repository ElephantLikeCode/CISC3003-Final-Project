var add = document.querySelectorAll(".fa-plus-circle");
var drop = document.querySelectorAll(".fa-minus-circle");
var mealCart = document.querySelectorAll(".meal-cart");
var count;

for (var i = 0; i < add.length; i++) {
    add[i].addEventListener("click", function(){
        count = parseInt(this.previousElementSibling.innerHTML);
        count += 1;
        this.previousElementSibling.innerHTML = count;
    });
}

for (var i = 0; i < add.length; i++) {
    drop[i].addEventListener("click", function(){
        if((count = this.nextElementSibling.innerHTML) > 0) {
            count -= 1;
            this.nextElementSibling.innerHTML = count;
        }
    });
}