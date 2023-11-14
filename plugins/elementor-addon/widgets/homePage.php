<?php


class Elementor_homePage extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'homePage';
    }

    public function get_title()
    {
        return esc_html__('Home Page', 'elementor-addon');
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
            'section_title',
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
            'text',
            [
                'label' => esc_html__('Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'backgroundVideo',
            [
                'label' => esc_html__('Background Video', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
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
                    '{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->end_controls_section();

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <style>
            .firstViewContainer {
                height: 90vh;
                width: 100%;
            }

            .backgroundVideo,
            .backgroundFirstSectionImage {
                position: absolute;
                z-index: -1;
                height: 100%;
                width: 100%;
                object-fit: cover;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
            }

            .titlesFirstView {
                height: 100%;
                width: 100%;
                background: rgba(22, 25, 26, 0.80);
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 10px;
                padding: 50px;
            }

            .titlesFirstView.investors {
                background: rgba(22, 25, 26, 0);
            }

            .titlesFirstView p,
            .titlesFirstView h1 {
                width: 100%;
                text-align: right;
            }

            .titlesFirstView p {
                color: white;
                font-size: 3rem;
                text-transform: uppercase;
                font-weight: 400;
            }

            .titlesFirstView h1 {
                color: var(--Gold-Text, #F8D39E);
                text-align: right;
                font-size: 1.5rem;
                font-style: normal;
                font-weight: 300;
                line-height: normal;
            }

            .arrowDown {
                padding: 15px;
                border: 0.5px solid white;
                border-radius: 50%;
                width: 75px;
                height: 75px;
                display: flex;
                justify-content: center;
                align-items: center;
                position: absolute;
                bottom: 50px;
                animation: bounce 2s ease infinite;
                transition: all linear 300ms;
            }

            .arrowDown:hover {
                background: white;
            }

            .arrowDown:hover svg,
            .arrowDown:hover svg path {
                fill: #2c2d2c;
            }

            @keyframes bounce {
                70% {
                    transform: translateY(0%);
                }

                80% {
                    transform: translateY(-15%);
                }

                90% {
                    transform: translateY(0%);
                }

                95% {
                    transform: translateY(-7%);
                }

                97% {
                    transform: translateY(0%);
                }

                99% {
                    transform: translateY(-3%);
                }

                100% {
                    transform: translateY(0);
                }
            }

            .arrowDown.investors {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 10px;
                border: none;
                border-radius: 0;
                width: auto;
                height: auto;
            }

            .arrowDown p {
                color: #fff;
                text-align: center;
            }

            .arrowDown .top {
                font-size: 1.1rem;
                font-weight: 400;
            }

            .arrowDown .down {
                font-size: 1rem;
                font-weight: 300;
            }

            .arrowDown.investors:hover p {
                color: #2c2d2c;
            }

            @media screen and (min-width: 1600px) {
                .contactsContainer .side {
                    padding: 0px 10%;
                }
            }

            @media screen and (max-width: 768px) {
                .titlesFirstView h1 {
                    font-family: Open Sans;
                    font-size: 20px;
                    font-weight: 300;
                    letter-spacing: 0em;
                    text-align: right;
                }

                .titlesFirstView p {
                    font-family: NewYork;
                    font-size: 1.85rem;
                    font-weight: 500;
                    letter-spacing: 0em;
                    text-align: right;
                }
            }
        </style>

        <div class="firstViewContainer">
            <video class="backgroundVideo" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
                <source src="./image/firstViewBg.mp4" type="video/mp4">
            </video>
            <?php echo '<video class="backgroundVideo" autoplay loop muted poster="https://assets.codepen.io/6093409/river.jpg">
        <source src="' . esc_url($settings['backgroundVideo']['url']) . '" type="video/mp4">  </video>';  ?>
            <div class="titlesFirstView wow fadeInUp">
                <h1><?php echo $settings['title']; ?></h1>
                <p><?php echo $settings['text']; ?></p>
                <a class="arrowDown" href="#sectionForArrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="34" viewBox="0 0 20 34" fill="none">
                        <path d="M20 22.6667C18.94 22.6667 17.3571 23.7051 16.0286 24.7562C14.3143 26.1077 12.8186 27.7227 11.6771 29.5743C10.8214 30.9627 10 32.6457 10 34M10 34C10 32.6457 9.17857 30.9612 8.32286 29.5743C7.18 27.7227 5.68428 26.1077 3.97286 24.7562C2.64285 23.7051 1.05714 22.6667 -2.82391e-06 22.6667M10 34L10 7.94464e-08" stroke="white" stroke-width="0.5" />
                    </svg>
                </a>
            </div>
        </div>


<?php
    }
}
