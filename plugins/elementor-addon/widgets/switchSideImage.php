<?php

class Elementor_switchSideImage extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'switchSideImage';
    }

    public function get_title()
    {
        return esc_html__('Switch Side Image', 'elementor-addon');
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
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'switch_position',
            [
                'label' => esc_html__('Switch Image Position', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Right', 'elementor-addon'),
                'label_off' => esc_html__('Left', 'elementor-addon'),
                'default' => 'left',
            ]
        );

        $this->add_control(
            'textForButton',
            [
                'label' => esc_html__('Text For Button', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('insert text for button', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => esc_html__('URL to embed', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'elementor-addon'),
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
            .heroSection {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                height: 80vh !important;
            }

            .left {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .heroSection img {
                width: 50%;
                height: 80vh;
                object-fit: cover;
            }

            .heroSection img.left {
                display: none;
            }

            .heroSection.left img.left {
                display: block;
                height: 80vh;
            }

            .heroSection.left img.right {
                display: none;
            }

            .heroText {
                display: flex;
                justify-content: center;
                align-items: start;
                flex-direction: column;
                gap: 15px;
                padding: 25px;
                max-width: calc(50% - 25px);
            }

            .heroText h1 {
                color: var(--black);
                font-size: 3.5rem;
                font-weight: 300;
                line-height: 3.5rem;
            }

            .heroText p {
                color: var(--black);
                font-size: 1.25rem;
                font-weight: 300;
            }

            .heroSectionTwo {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 25px;
                padding: 0 25px;
                height: 80vh;
            }

            .rightImage .leftImageInner {
                display: none;
            }

            .leftImage .rightImageInner {
                display: none;
            }

            .buttonHeroSection {
                display: block;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                outline: none;
                gap: 0.625rem;
                background: var(--blueLight);
                box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
                color: #fff;
                font-weight: 400;
                padding: 10px;
                border-radius: 15px;
                transition: all linear 300ms;
            }

            .buttonHeroSection:hover {
                box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.25);
                background: var(--blueDark);
            }

            .heroSectionTwo h1 {
                color: #010626;
                font-size: 3rem;
                font-weight: 700;
                line-height: 3rem;
            }

            .buttonsBlueBg {
                display: flex;
                align-items: center;
                align-content: center;
                gap: 25px;
            }

            .buttonBlueBg {
                display: flex;
                padding: 0.3125rem 0.625rem;
                justify-content: center;
                align-items: center;
                gap: 0.3125rem;
                border-radius: 0.9375rem;
                background: rgba(5, 108, 242, 0.10);
                color: #103894;
                font-size: 1.125rem;
                font-weight: 500;
                transition: all linear 300ms;
            }

            .buttonBlueBg:hover svg path {
                background: var(--blueLight);
                color: #fff;
                fill: #fff;
            }

            .heroSection.left img.right,
            .heroSection.right img.right {
                display: block;
            }

            .heroSection.left img.left,
            .heroSection.right img.left {
                display: none;
            }

            .heroSection .buttonBlueBg {
                outline: none;
                box-sizing: none;
                font-size: 1.2rem;
                font-weight: 400;
                text-align: center;
                display: block;
                width: max-content;
                color: #fff;
            }

            .heroText p a {
                color: #2c2d2c;
                text-decoration: underline;
            }

            @media screen and (max-width: 600px) {

                .heroSection {
                    flex-direction: column;
                    height: auto !important;
                    padding: 10px !important;
                    gap: 10% !important;
                }

                .heroSection img {
                    width: 100% !important;
                    height: auto !important;
                }

                .heroText {
                    padding: 0px 10px !important;
                    width: 100% !important;
                    max-width: 100% !important;
                }

                .heroText h1 {
                    font-size: 2.25rem;
                    text-align: center;
                    line-height: normal;
                    font-weight: 500;
                }

                .heroText p {
                    font-size: 1.1rem;
                    font-weight: 300;
                }

                .heroText {
                    align-items: center;
                }
            }
        </style>


        <div class="heroSection <?php
                                if ('yes' === $settings['switch_position']) {
                                    echo 'right';
                                } else {
                                    echo 'left';
                                }
                                ?> pageWidth">
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="left">
            <div class="heroText">
                <h1>
                    <?php echo $settings['title']; ?>
                </h1>
                <p>
                    <?php echo $settings['text']; ?>
                </p>
                <?php if ($settings['url'] != "") {
                ?>
                    <div class="buttonHeroSection">
                        <a class="buttonBlueBg" href="<?php echo esc_url($settings['url']); ?>">
                            <?php echo esc_html($settings['textForButton']); ?>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="right">
        </div>
<?php
    }
}
