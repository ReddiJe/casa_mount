<?php


class Elementor_twoRowsValues extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'twoRowsValues';
    }

    public function get_title()
    {
        return esc_html__('Two Rows Values', 'elementor-addon');
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
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title1',
            [
                'label' => esc_html__('1st Row', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );


        $this->add_control(
            'repeater_field',
            [
                'label' => esc_html__('Blocks', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'price',
                        'label' => esc_html__('Price', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'text',
                        'label' => esc_html__('Text', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title2',
            [
                'label' => esc_html__('2nd Row', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'repeater_field1',
            [
                'label' => esc_html__('Blocks', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'price1',
                        'label' => esc_html__('Price', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'text1',
                        'label' => esc_html__('Text', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
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
                color: var(--black);
                text-align: center;
                font-size: 3rem;
                font-weight: 700;
            }

            .richText p {
                color: var(--black);
                text-align: center;
                font-size: 1.25rem;
                font-weight: 300;
                max-width: 800px;
            }


            .additionalServices {
                width: 100%;
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                padding: 25px 40px;
                grid-column-gap: 10px;
            }

            .additionalService {
                display: flex;
                justify-content: space-between;
                align-items: start;
                flex-direction: column;
                width: 100%;
                border-radius: 25px;
                overflow: hidden;
                background: #FFF;
                box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.15);
            }

            .additionalService img {
                width: 100%;
                max-height: 200px;
                object-fit: cover;
            }

            .adittionalServicesText {
                display: flex;
                justify-content: space-between;
                flex-direction: column;
                padding: 25px;
                gap: 25px;
            }

            .adittionalServicesText h4 {
                font-size: 1.25rem;
                color: var(--black);
            }

            .time {
                display: flex;
                justify-content: start;
                align-items: center;
                gap: 15px;
                font-weight: 300;
            }

            .pricesWithoutShadow .additionalService {
                justify-content: start;
                gap: 15px;
                box-shadow: none;
                padding: 15px;
            }

            .pricesWithoutShadow .price {
                font-size: 2.5rem;
                font-weight: 700;
            }

            .pricesWithoutShadow {
                padding-bottom: 100px;
            }

            @media screen and (max-width: 600px) {
                .additionalServices {
                    grid-template-columns: repeat(1, 1fr);
                }
            }
        </style>

        <div class="cardsWithLightBg">
            <div class="richText withLightBg">
                <h2>
                    <?php echo $settings['title']; ?>
                </h2>
                <div class="centerAlign">
                    <p>
                        <?php echo $settings['subtitle']; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="additionalServices pricesWithoutShadow">
            <?php
            if ($settings['repeater_field']) {
                foreach ($settings['repeater_field'] as $index => $item) {
            ?>
                    <div class="additionalService">
                        <p><?php echo esc_html($item['price']); ?></p>
                        <h4><?php echo esc_html($item['text']); ?></h4>
                    </div>
            <?php
                }
            }
            ?>
        </div>

        <div class="cardsWithLightBg">
            <div class="richText withLightBg">
                <div class="centerAlign">
                    <p>
                        <?php echo $settings['subtitle1']; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="additionalServices pricesWithoutShadow">
            <?php
            if ($settings['repeater_field1']) {
                foreach ($settings['repeater_field1'] as $index => $item) {
            ?>
                    <div class="additionalService">
                        <p><?php echo esc_html($item['price1']); ?></p>
                        <h4><?php echo esc_html($item['text1']); ?></h4>
                    </div>
            <?php
                }
            }
            ?>
        </div>


<?php
    }
}
