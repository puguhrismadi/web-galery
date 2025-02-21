document.addEventListener("DOMContentLoaded", function() {
    let slides = document.querySelector(".slides");
    let index = 0;

    function autoSlide() {
        index++;
        if (index > document.querySelectorAll(".slide").length - 1) {
            index = 0;
        }
        slides.style.transform = `translateX(-${index * 100}%)`;
    }

    setInterval(autoSlide, 3000);
});
