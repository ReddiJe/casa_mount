<?php


class Elementor_longSectionHomepage extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'longSectionHomepage';
    }

    public function get_title()
    {
        return esc_html__('Long Section', 'elementor-addon');
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
            'top_section_title',
            [
                'label' => esc_html__('Top Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'upperTitle1',
            [
                'label' => esc_html__('Top Title', 'elementor-addon'),
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

        $this->add_control(
            'text1',
            [
                'label' => esc_html__('Text', 'elementor-addon'),
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
            'title',
            [
                'label' => esc_html__('Bottom Title ', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'leftText',
            [
                'label' => esc_html__('Left Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'backgroundImage',
            [
                'label' => esc_html__('Choose Image For Background', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'title1',
            [
                'label' => esc_html__('Right Side Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image Between', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
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
        $mobile_image = wp_get_attachment_image_src($settings['backgroundImage']['id'], 'mobile-image');


?>

        <style>
            .longSectionHomepage {
                background-image: url(<?php echo esc_url($settings['backgroundImage']['url']) ?> );
                background-size: cover;
                display: flex;
                flex-direction: column;
                gap: 30vh;
            }

            .longSectionHomepage h2,
            .longSectionHomepage h3,
            .longSectionHomepage p {
                color: #fff;
            }

            .titlesLongSection {
                width: 70%;
                padding: 50px;
            }

            .titlesLongSection h2 {
                font-size: 3rem;
                font-weight: 400;
                text-transform: uppercase;
            }

            .textWowFadeIn {
                background: rgba(0, 0, 0, 0.50);
                backdrop-filter: blur(6px);
                padding: 25px 25px 25px 50px;
                width: 70%;
                font-size: 1.125rem;
                font-weight: 300;
            }

            .titlesLongSection .subtitle {
                font-size: 1.5rem;
                font-weight: 300;
                text-transform: uppercase;
            }

            .hoverMapSection {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 50px;
                padding: 100px 50px;
            }

            .between {
                width: 50%;
                float: left;
            }

            .leftText {
                display: flex;
                float: left;
                justify-content: start;
                align-items: start;
                gap: 15px;
                flex-direction: column;
            }

            .leftText h3 {
                font-size: 3rem;
                font-weight: 400;
                text-transform: uppercase;
            }

            .hoverMapSection .leftText .subtitle {
                font-size: 1.5rem;
                font-weight: 300;
                text-transform: uppercase;
            }

            .hoverMapSection .leftText .leftText {
                font-size: 1.125rem;
                font-weight: 300;
            }

            .descriptionMapHomepage {
                display: flex;
                justify-content: start;
                align-items: start;
                gap: 10px;
                flex-direction: column;
                clear: both;
            }

            .descriptionMapHomepage p {
                font-size: 1.125rem;
                font-weight: 400;
            }

            .descriptionMapHomepage p.description {
                font-weight: 300;
            }
        </style>

        <div class="longSectionHomepage">
            <div class="topBlock wow fadeIn">
                <div class="titlesLongSection">
                    <h2>
                        <?php echo $settings['upperTitle1']; ?>
                    </h2>
                    <p class="subtitle">
                        <?php echo $settings['subtitle1']; ?>
                    </p>
                </div>
                <p class="textWowFadeIn">
                    <?php echo $settings['text1']; ?>
                </p>

            </div>
            <div class="hoverMapSection wow fadeIn">
                <div class="leftText">
                    <div class="titles">
                        <h3>
                            <?php echo $settings['title']; ?>
                        </h3>
                        <p class="subtitle">
                            <?php echo $settings['subtitle']; ?>
                        </p>
                    </div>
                    <p class="leftText">
                        <?php echo $settings['leftText']; ?>
                    </p>

                </div>
                <div class="between">
                        <img src="<?php echo esc_url($settings['backgroundImage']['url']) ?>" alt="">
                    </div>
                <div class="descriptionMapHomepage">
                    <p class="title">
                        <?php echo $settings['title1']; ?>
                    </p>
                    <p class="description">
                        <?php echo $settings['description']; ?>
                    </p>
                </div>
            </div>
        </div>

<?php
    }
}
