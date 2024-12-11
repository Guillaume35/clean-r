(() => {
    const carousels = document.querySelectorAll(".carousel");

    carousels.forEach(carousel => {
        const next = carousel.querySelector(".carousel-right-control");
        const prev = carousel.querySelector(".carousel-left-control");
        const sliders = carousel.querySelector(".carousel-slides");
        const slides = carousel.querySelectorAll(".carousel-slide");
        const totalCount = slides.length;

        let position = 0;

        const drawControls = () => {
            if (position + 1 >= totalCount || totalCount === 0) {
                next.classList.add("hidden");
            }
            if (position + 1 < totalCount && totalCount > 0) {
                next.classList.remove("hidden");
            }
            if (position <= 0 || totalCount === 0) {
                prev.classList.add("hidden");
            }
            if (position > 0 && totalCount > 0) {
                prev.classList.remove("hidden");
            }
        }

        const changePosition = (increment) => {
            position += increment;
            let left = position * 100;
            sliders.style.marginLeft = "-"+left+"%";

            drawControls();
        }

        drawControls();

        next.addEventListener("click", (e) => {
            e.preventDefault();
            
            if (position + 1 < totalCount) {
                changePosition(1);
            }
        })

        prev.addEventListener("click", (e) => {
            e.preventDefault();

            if (position > 0) {
                changePosition(-1);
            }
        });
    })
})();