<?php

class Elementor_servicesSlider extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'servicesSlider';
    }

    public function get_title()
    {
        return esc_html__('Services Slider', 'elementor-addon');
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
            'section_services',
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
            'title_position',
            [
                'label' => esc_html__('Title Position', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Right', 'elementor-addon'),
                'label_off' => esc_html__('Left', 'elementor-addon'),
                'return_value' => 'right',
                'default' => 'left',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Services', 'elementor-addon'),
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
            'repeater_field',
            [
                'label' => esc_html__('Blocks', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'text',
                        'label' => esc_html__('Text', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name' => 'time_duration',
                        'label' => esc_html__('Duration Time', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'price',
                        'label' => esc_html__('Price', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
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
            .textCenter {
                width: 100%;
                padding: 150px;
                text-align: center;
                font-size: 1.25rem;
                color: black;
                font-weight: 300;
            }

            .title h2 {
                font-size: 4rem;
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

            .price {
                display: flex;
                justify-content: start;
                align-items: center;
                gap: 15px;
                font-weight: 300;
            }

            .time-price {
                display: flex;
                justify-content: space-between;
                gap: 15px;
            }

            .title.left {
                text-align: left;
            }

            .title.right {
                text-align: right;
            }
        </style>

        <div class="title <?php echo $settings['title_position']; ?>">
            <h2><?php echo $settings['title'] ?></h2>
        </div>


        <div class="additionalServices">
            <?php
            foreach ($settings['repeater_field'] as $item) :
            ?>
                <div class="additionalService">
                    <div class="adittionalServicesText">
                        <h4><?php echo esc_html($item['text']); ?></h4>
                        <div class="time-price">
                            <p class="time">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                </svg>
                                <?php echo esc_html($item['time_duration']); ?>
                            </p>
                            <p class="price">
                                <?php echo esc_html($item['price']); ?>
                            </p>
                        </div>
                    </div>
                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var titleElement = document.querySelector('.title');
                var checkbox = document.querySelector('input[name="elementor-widget-form-field-title_position"]'); // Замените на фактическое имя поля чекбокса

                checkbox.addEventListener('change', function() {
                    if (checkbox.checked) {
                        titleElement.classList.remove('left');
                        titleElement.classList.add('right');
                    } else {
                        titleElement.classList.remove('right');
                        titleElement.classList.add('left');
                    }
                });
            });
        </script>

<?php
    }
}
