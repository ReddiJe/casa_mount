<?php


class Elementor_photoSlider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'photoSlider';
    }

    public function get_title()
    {
        return esc_html__('Photo SLider', 'elementor-addon');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['hello', 'world'];
    }

    protected function register_controls()
    {

        // Content Tab Start

        $this->start_controls_section(
            'top_section',
            [
                'label' => esc_html__('Top title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title1',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'subtitle1',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'bottom_section_title',
            [
                'label' => esc_html__('Bottom Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'oneAccommodation',
            [
                'label' => esc_html__('Accommodation', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => 'Default Title',
                    ],
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'label_block' => true,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
            ]
        );


        $this->end_controls_section();

        // Content Tab End


        // Style Tab Start

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Text Color', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $accommodations = $settings['oneAccommodation'];

?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
        
<style>

.splide__slide{
    width: 100%;
    height: 75vh;
    padding: 50px 200px;
}

.splide__slide img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.splide__pagination{
    display: none;
}

.splide__arrow{
    background: transparent;
    width: 4em;
}

.splide__arrow:hover,
.splide__arrow:active,
.splide__arrow:focus{
    background: transparent;
    border: none !important;
    outline: none !important;
}

.splide__arrow--prev {
    left: 3em;
}
.splide__arrow--next {
    right: 3em;
}

.splide__arrow svg {
    fill: #000;
    height: 2em;
    width: 2em;
}
        </style>
        <section class="splide" aria-labelledby="carousel-heading">

            <div class="splide__track">
                <ul class="splide__list">
                <?php foreach ($accommodations as $accommodation) { ?>
                    <li class="splide__slide"><img src="<?php echo $accommodation['image']['url']; ?>" alt=""></li>
                <?php } ?>
                </ul>
            </div>
        </section>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var splide = new Splide('.splide', {
                    rewind: true,
                });
                splide.mount();
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>



<?php
    }
}
