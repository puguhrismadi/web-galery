document.addEventListener("DOMContentLoaded", function () {
    // === Auto-slide untuk Bootstrap Carousel ===
    var agendaSlider = new bootstrap.Carousel(document.getElementById('agendaSlider'), {
        interval: 5000, /* Auto slide setiap 5 detik */
        ride: 'carousel'
    });

    var prestasiSlider = new bootstrap.Carousel(document.getElementById('prestasiSlider'), {
        interval: 5000, /* Auto slide setiap 5 detik */
        ride: 'carousel'
    });

    // === Auto-slide untuk Slider Manual (translateX) ===
    let slides = document.querySelector(".slides");
    let index = 0;

    function autoSlide() {
        index++;
        if (index > document.querySelectorAll(".slide").length - 1) {
            index = 0;
        }
        slides.style.transform = `translateX(-${index * 100}%)`;
    }

    setInterval(autoSlide, 3000); // Auto-slide setiap 3 detik untuk slider manual
});