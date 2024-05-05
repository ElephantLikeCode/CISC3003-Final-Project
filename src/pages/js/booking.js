var containers = document.getElementsByClassName("meal-img");

containers.forEach((container) => {
    container.addEventListener('mouseover', function (event) {
        container.style.backgroundSize = '100% 100%';
    });


    container.addEventListener('mouseout', function () {
        container.style.backgroundSize = 'cover';
    });
});