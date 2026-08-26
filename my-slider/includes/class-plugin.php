<?php

namespace MySlider;

defined( 'ABSPATH' ) || exit;


final class Plugin {

    /**
     * Initialize plugin.
     */
    public function init(): void {

        add_action(
            'wp_enqueue_scripts',
            array( $this, 'enqueue_assets' )
        );

        add_shortcode(
            'my_slider',
            array( $this, 'render_slider' )
        );

    }


    /**
     * Load CSS and JavaScript.
     */
    public function enqueue_assets(): void {

        wp_enqueue_style(
            'my-slider',
            MY_SLIDER_URL . 'assets/css/slider.css',
            array(),
            MY_SLIDER_VERSION
        );

        wp_enqueue_script(
            'my-slider',
            MY_SLIDER_URL . 'assets/js/slider.js',
            array(),
            MY_SLIDER_VERSION,
            true
        );

    }


    /**
     * Render slider.
     */

    public function render_slider(): string {

        ob_start();
        ?>

        <div class="my-slider">

            <div class="my-slide active">

                <img
                    src="https://picsum.photos/id/1015/1200/600"
                    alt="Mountain"
                >

                <div class="my-slide-content">

                    <h2>Beautiful Mountains</h2>

                    <p>
                        Explore beautiful mountains and amazing nature.
                    </p>

                </div>

            </div>


            <div class="my-slide">

                <img
                    src="https://picsum.photos/id/1016/1200/600"
                    alt="Nature"
                >

                <div class="my-slide-content">

                    <h2>Beautiful Nature</h2>

                    <p>
                        Discover peaceful places and beautiful landscapes.
                    </p>

                </div>

            </div>


            <div class="my-slide">

                <img
                    src="https://picsum.photos/id/1018/1200/600"
                    alt="Landscape"
                >

                <div class="my-slide-content">

                    <h2>Amazing Landscape</h2>

                    <p>
                        Experience the beauty of the natural world.
                    </p>

                </div>

            </div>


            <button
                type="button"
                class="my-slider-prev"
                aria-label="Previous slide"
            >
                &#10094;
            </button>


            <button
                type="button"
                class="my-slider-next"
                aria-label="Next slide"
            >
                &#10095;
            </button>


            <div class="my-slider-dots">

                <button
                    type="button"
                    class="my-dot active"
                    aria-label="Go to slide 1"
                ></button>

                <button
                    type="button"
                    class="my-dot"
                    aria-label="Go to slide 2"
                ></button>

                <button
                    type="button"
                    class="my-dot"
                    aria-label="Go to slide 3"
                ></button>

            </div>

        </div>

        <?php

        return ob_get_clean();
    }
}
