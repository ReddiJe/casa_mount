<?php

class Elementor_threeSteps extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'threeSteps';
    }

    public function get_title()
    {
        return esc_html__('Three Steps Section', 'elementor-addon');
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
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'step1',
            [
                'label' => esc_html__('Step 1', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title1',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'subtitle1',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'background_image1',
            [
                'label' => esc_html__('Background Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'http://localhost/wp-content/uploads/2023/11/765432.png',
                ],
            ]
        );

        $this->add_control(
            'text1',
            [
                'label' => esc_html__('Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'step2',
            [
                'label' => esc_html__('Step 2', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title2',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'subtitle2',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'background_image2',
            [
                'label' => esc_html__('Background Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'http://localhost/wp-content/uploads/2023/11/765432.png',
                ],
            ]
        );

        $this->add_control(
            'text2',
            [
                'label' => esc_html__('Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'step3',
            [
                'label' => esc_html__('Step 3', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title3',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'subtitle3',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'background_image3',
            [
                'label' => esc_html__('Background Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'http://localhost/wp-content/uploads/2023/11/765432.png',
                ],
            ]
        );

        $this->add_control(
            'text3',
            [
                'label' => esc_html__('Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
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
            .infoAboutSection {
                justify-content: center;
                font-size: 20px;
                font-weight: 400;
                line-height: 24px;
                letter-spacing: 0em;
                text-align: center;
            }

            .longTimeline {
                display: grid;
                justify-content: center;
                align-items: center;
                grid-template-columns: repeat(3, 1fr);
                padding: 100px 25px;
                gap: 15px;
                background-size: cover;
                overflow: hidden;
                border-radius: none;
            }

            .longTimeStep {
                height: 490px;
                padding: 25px;
                border-radius: 25px 0px 0px 25px;
                background-size: cover;
            }

            .longTimeStep h3,
            .longTimeStep p {
                color: #fff;
            }

            .longTimeStep h3 {
                font-size: 32px;
                font-weight: 400;
            }

            .longTimeStep p {
                font-size: 20px;
                font-weight: 300;
            }

            .longTimeStep .subtitle {
                font-size: 24px;
                font-weight: 500;
            }


            @media screen and (min-width: 1600px) {
                .longTimeline {
                    padding: 0 10%;
                }
            }

            @media screen and (max-width: 1050px) {
                .longTimeline {
                    padding: 25px;
                    grid-template-columns: repeat(1, 1fr);
                }
            }

            @media screen and (max-width: 600px) {
                .infoAboutSection h1 {
                    font-family: NewYork;
                    font-size: 25px;
                    font-weight: 400;
                    letter-spacing: 0em;
                    text-align: center;
                }

                .infoAboutSection p {
                    font-family: Open Sans;
                    font-size: 17px;
                    font-weight: 300;
                    letter-spacing: 0em;
                    text-align: center;
                }

                .longTimeStep {
                    height: auto;
                    border-radius: 20px;
                }

                .longTimeStep h1 {
                    font-family: NewYork;
                    font-size: 32px;
                    font-weight: 400;
                    line-height: 39px;
                    letter-spacing: 0em;
                    text-align: left;
                }

                .longTimeStep p {
                    color: #FFF;
                    font-size: 1rem;
                    font-weight: 300;
                }

                .longTimeline {
                    padding: 15px;
                    grid-template-columns: repeat(1, 1fr);
                }
            }
        </style>

        <div class="infoAboutSection">
            <h1>
                <?php echo $settings['title']; ?>
            </h1>
            <p>
                <?php echo $settings['subtitle']; ?>
            </p>
        </div>


        <div class="longTimeline wow fadeInUp">
            <div class="longTimeStep" style="background-image: url(<?php echo $settings['background_image1']['url']; ?>)">
                <h3>
                    <?php echo $settings['title1']; ?>
                </h3>
                <p class="subtitle">
                    <?php echo $settings['subtitle1']; ?>
                </p>
                <p>
                    <?php echo $settings['text1']; ?>
                </p>
            </div>
            <div class="longTimeStep" style="background-image: url(<?php echo $settings['background_image2']['url']; ?>);">
                <h3>
                    <?php echo $settings['title2']; ?>
                </h3>
                <p class="subtitle">
                    <?php echo $settings['subtitle2']; ?>
                </p>
                <p>
                    <?php echo $settings['text2']; ?>
                </p>
            </div>
            <div class="longTimeStep" style="background-image: url(<?php echo $settings['background_image3']['url']; ?>);">
                <h3>
                    <?php echo $settings['title3']; ?>
                </h3>
                <p class="subtitle">
                    <?php echo $settings['subtitle3']; ?>
                </p>
                <p>
                    <?php echo $settings['text3']; ?>
                </p>
            </div>
        </div>


<?php
    }
}
