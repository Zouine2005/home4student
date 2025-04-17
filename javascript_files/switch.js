

document.addEventListener("DOMContentLoaded", () => {
    const sliders = document.querySelectorAll(".slider");

    sliders.forEach(slider => {
        const slides = slider.querySelectorAll(".slide");
        let slideIndex = 0;

        if (slides.length > 0) {
            slides[slideIndex].classList.add("dislide");
        }

        const showSlide = (index) => {
            if (index >= slides.length) slideIndex = 0;
            else if (index < 0) slideIndex = slides.length - 1;
            else slideIndex = index;

            slides.forEach(slide => slide.classList.remove("dislide"));
            slides[slideIndex].classList.add("dislide");
        };

        const prevBtn = slider.querySelector(".prev");
        const nextBtn = slider.querySelector(".next");

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener("click", () => showSlide(slideIndex - 1));
            nextBtn.addEventListener("click", () => showSlide(slideIndex + 1));
        }
    });
});