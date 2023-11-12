<?php


class Elementor_cleaningDifference extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'cleaningDifference';
    }

    public function get_title()
    {
        return esc_html__('Cleaning Difference', 'elementor-addon');
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
            'main-section',
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
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'second-section',
            [
                'label' => esc_html__('Differences', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title1',
            [
                'label' => esc_html__('Title for 1 column', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'title2',
            [
                'label' => esc_html__('Title for 2 column', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'repeater_control',
            [
                'label' => esc_html__('Dependences', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'standart',
                        'label' => esc_html__('Standart Column', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'deep',
                        'label' => esc_html__('Deep Column', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
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

?>

        <style>
            .whatTheDifference {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                justify-content: space-between;
                align-items: start;
                gap: 25px;
                padding: 25px;
                padding-right: 100px;
            }

            .whatTheDifference .column {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 25px;
                padding: 25px;
            }

            .whatTheDifference .cell {
                min-height: 150px;
                font-size: 18px;
                display: flex;
                justify-content: center;
                align-items: center;
                min-width: 350px;
            }

            .columnThree {
                border-radius: 25px;
                background: #E9EDF3;
            }

            .whatTheDifference .button {
                display: inline-flex;
                padding: 10px 30px;
                justify-content: center;
                align-items: center;
                gap: 10px;
                border-radius: 37px;
                border: 1px solid #143d80;
                color: #143d80;
            }

            .buttonBlue {

                background: #4287f5;
                color: #ffffff !important;
            }

            .richText {
                padding-bottom: 25px;
            }

            .richText {
                padding: 50px 25px 25px 25px;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 15px;
            }

            .richText h2 {
                color: black;
                text-align: center;
                font-size: 3rem;
                font-weight: 700;
            }
        </style>

        <div class="richText pageWidth">
            <h2><?php echo $settings['title']; ?></h2>
        </div>

        <div class="whatTheDifference pageWidth">
            <div class="cell topTitle"></div>
            <div class="cell topTitle"><?php echo $settings['title1']; ?></div>
            <div class="cell topTitle"><?php echo $settings['title2']; ?></div>
            <?php
            foreach ($settings['repeater_control'] as $item) {
            ?>
                <div class="cell leftTitle columnOne"><?php echo $item['description']; ?></div>
                <div class="cell text columnTwo"><?php echo $item['standart']; ?></div>
                <div class="cell text columnThree"><?php echo $item['deep']; ?></div>
            <?php } ?>
        </div>



<?php
    }
}
