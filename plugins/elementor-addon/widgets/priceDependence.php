<?php


class Elementor_priceDependence extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'priceDependence';
    }

    public function get_title()
    {
        return esc_html__('Price Dependence', 'elementor-addon');
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

        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'dependencies',
            [
                'label' => esc_html__('Dependencies', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'repeater_control',
            [
                'label' => esc_html__('Repeater Control', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'number',
                        'label' => esc_html__('Number', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => esc_html__('Hello world', 'elementor-addon'),
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__('Hello world', 'elementor-addon'),
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
            .title {
                justify-content: center;
                text-align: center;
            }

            .subtitle {
                justify-content: center;
                text-align: center;
            }

            .additionalServices {
                width: 100%;
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                padding: 25px;
                grid-column-gap: 25px;
            }

            .additionalService {
                display: flex;
                justify-content: space-between;
                align-items: start;
                flex-direction: column;
                width: 100%;
                border-radius: 15px;
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
        </style>

        <h1 class="title"><?php echo $settings['title']; ?></h1>
        <p class="subtitle"><?php echo $settings['subtitle'] ?></p>

        <div class="additionalServices">
            <?php
            foreach ($settings['repeater_control'] as $item) {
            ?>
                <div class="additionalService">
                    <p><?php echo $item['number']; ?></p>
                    <h4><?php echo $item['description']; ?></h4>
                </div>
            <?php
            }
            ?>
        </div>

<?php
    }
}
