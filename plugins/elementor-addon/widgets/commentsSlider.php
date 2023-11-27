<?php


class Elementor_commentsSlider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'commentsSlider';
    }

    public function get_title()
    {
        return esc_html__('Comments Slider', 'elementor-addon');
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
            'section',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'commentSection',
            [
                'label' => esc_html__('Comments', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'comments',
            [
                'label' => esc_html__('Comments', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'name',
                        'label' => esc_html__('Name', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'spaceholder' => esc_html__('Write Name', ''),
                    ],
                    [
                        'name' => 'date',
                        'label' => esc_html__('Date', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::DATE_TIME,
                    ],
                    [
                        'name' => 'text',
                        'label' => esc_html__('Text', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'link',
                        'label' => esc_html__('URL', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::URL,
                    ],
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Avatar', 'textdomain'),
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
        $accommodations = $settings['comments'];

?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

        <style>
            .title {
                font-family: Urbanist;
                font-size: 48px;
                font-weight: 400;
                line-height: 59px;
                letter-spacing: 0em;
                text-align: center;
            }

            .subtitle {
                font-family: Urbanist;
                font-size: 20px;
                font-weight: 300;
                line-height: 24px;
                letter-spacing: 0em;
                text-align: center;
            }

            .reviewInner {
                display: flex;
                justify-content: center;
                align-items: start;
                gap: 25px;
                width: 100%;
                padding: 25px;
            }

            .reviewInner img {
                height: 100px;
                width: 100px;
                border-radius: 50px;
                object-fit: cover;
            }

            .reviewInnerText {
                display: flex;
                justify-content: start;
                align-items: start;
                flex-direction: column;
                gap: 25px;
                max-width: 800px;
            }

            .reviewText {
                font-size: 1.25rem;
            }

            .nameCompanyDate a {
                color: var(--blue);
            }

            .splide__arrow svg {
                fill: var(--blue) !important;
            }

            .splide__arrow--prev {
                left: 4em;
            }

            .splide__arrow--next {
                right: 4em;
            }

            .date {
                margin-bottom: 10px;
            }

            a {
                text-decoration: underline !important;
            }

            @media screen and (max-width: 600px) {
                .nameCompanyDate {
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                }

                .title {
                    font-size: 32px;
                    line-height: 39px;
                }

                .subtitle {
                    font-size: 16px;
                    line-height: 20px;
                    text-align: center;
                }

                .name {
                    text-align: center;
                    justify-content: center;
                }

                .date {
                    margin-left: 50px;
                    margin-bottom: 10px;
                    text-align: center;
                    justify-content: center;
                }

                .reviewInner {
                    gap: 10px;
                    padding: 20px 25px;
                    text-align: center;
                    justify-content: center;
                }

                .reviewText {
                    font-size: 1rem;
                }

                .reviewInnerText {
                    gap: 15px;
                }

                .reviewInner img {
                    display: none;
                }

                .nameCompanyDate {
                    width: 100%;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                }

                .splide__arrow {
                    top: 70%;
                    width: 2em;
                }

                .splide__arrow--prev {
                    left: 0;
                }

                .splide__arrow--next {
                    right: 0;
                }
            }
        </style>


        <section class="splide" aria-labelledby="carousel-heading">

            <h1 class="title"><?php echo $settings['title']; ?></h1>
            <p class="subtitle"><?php echo $settings['subtitle']; ?></p>




            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($accommodations as $accommodation) { ?>
                        <li class="splide__slide">
                            <div class="reviewHomepage">
                                <div class="reviewInner">
                                    <img src="<?php echo $accommodation['image']['url']; ?>" alt="">
                                    <div class="reviewInnerText">
                                        <div class="nameCompanyDate">
                                            <p><b><?php echo esc_html($accommodation['name']); ?></b></p>
                                            <p class="date"><?php echo esc_html($accommodation['date']); ?>
                                                <a href="<?php echo esc_html($accommodation['link']['url']); ?>">Google</a>
                                            </p>
                                        </div>
                                        <p class="reviewText">
                                            <?php echo esc_html($accommodation['text']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
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
