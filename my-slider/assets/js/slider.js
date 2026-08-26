document.addEventListener('DOMContentLoaded', function () {

    const sliders = document.querySelectorAll('.my-slider');

    sliders.forEach(function (slider) {

        const slides = slider.querySelectorAll('.my-slide');
        const dots = slider.querySelectorAll('.my-dot');

        const nextButton = slider.querySelector('.my-slider-next');
        const prevButton = slider.querySelector('.my-slider-prev');

        let currentSlide = 0;
        let autoPlay = null;

        const AUTO_PLAY_TIME = 2500;


        /**
         * Show selected slide.
         */
        function showSlide(index) {

            slides.forEach(function (slide) {
                slide.classList.remove('active');
            });

            dots.forEach(function (dot) {
                dot.classList.remove('active');
            });


            slides[index].classList.add('active');
            dots[index].classList.add('active');

            currentSlide = index;

        }


        /**
         * Next slide.
         */
        function nextSlide() {

            const nextIndex =
                (currentSlide + 1) % slides.length;

            showSlide(nextIndex);

        }


        /**
         * Previous slide.
         */
        function previousSlide() {

            const previousIndex =
                (currentSlide - 1 + slides.length) % slides.length;

            showSlide(previousIndex);

        }


        /**
         * Start autoplay.
         *
         * Important:
         * Always clear the previous timer first.
         */
        function startAutoPlay() {

            stopAutoPlay();

            autoPlay = setInterval(function () {

                nextSlide();

            }, AUTO_PLAY_TIME);

        }


        /**
         * Stop autoplay.
         */
        function stopAutoPlay() {

            if (autoPlay !== null) {

                clearInterval(autoPlay);

                autoPlay = null;

            }

        }


        /**
         * Next button.
         */
        if (nextButton) {

            nextButton.addEventListener('click', function () {

                nextSlide();

                startAutoPlay();

            });

        }


        /**
         * Previous button.
         */
        if (prevButton) {

            prevButton.addEventListener('click', function () {

                previousSlide();

                startAutoPlay();

            });

        }


        /**
         * Dot navigation.
         */
        dots.forEach(function (dot, index) {

            dot.addEventListener('click', function () {

                showSlide(index);

                startAutoPlay();

            });

        });


        /**
         * Pause autoplay when mouse enters.
         */
        slider.addEventListener('mouseenter', function () {

            stopAutoPlay();

        });


        /**
         * Resume autoplay when mouse leaves.
         */
        slider.addEventListener('mouseleave', function () {

            startAutoPlay();

        });


        /**
         * Start autoplay.
         */
        startAutoPlay();

    });

});
