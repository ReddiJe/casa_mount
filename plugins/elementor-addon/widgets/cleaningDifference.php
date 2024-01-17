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
            ]
        );

        $this->add_control(
            'title2',
            [
                'label' => esc_html__('Title for 2 column', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
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
                        'label' => esc_html__('1st Column Text', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'deep',
                        'label' => esc_html__('2nd Column Text', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                ],
            ]
        );

        $this->add_control(
            'button-title1',
            [
                'label' => esc_html__('Text For Button On The 1st column', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('insert text for button', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'button-url1',
            [
                'label' => esc_html__('URL to embed', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'button-title2',
            [
                'label' => esc_html__('Text For Button On The 2nd column', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('insert text for button', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'button-url2',
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

            .topTitle {
                font-size: 1.5rem !important;
                font-weight: 700 !important;
                color: black;
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

            @media screen and (max-width: 900px) {
                .whatTheDifference .cell {
                    min-height: 250px;
                    min-width: 185px;
                }
            }

            @media screen and (max-width: 600px) {
                .whatTheDifference {
                    overflow: scroll;
                    width: 100%;
                }
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
            <div></div>
            <div class="cell">
                <a href="<?php echo $settings['button-url1']; ?>" class="button">
                    <?php echo $settings['button-title1']; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="21" viewBox="0 0 24 21" fill="none">
                        <path d="M13.5017 20.2748C13.3582 20.1304 13.2776 19.9347 13.2776 19.7307C13.2776 19.5266 13.3582 19.3309 13.5017 19.1866L21.3849 11.2607L0.765977 11.2607C0.562828 11.2607 0.367998 11.1796 0.224348 11.0352C0.0806995 10.8908 -2.35298e-06 10.695 -2.34406e-06 10.4907C-2.33513e-06 10.2865 0.0806995 10.0907 0.224348 9.94627C0.367998 9.80186 0.562828 9.72074 0.765977 9.72074L21.3849 9.72074L13.5017 1.79492C13.3664 1.64895 13.2927 1.45589 13.2962 1.25641C13.2997 1.05693 13.3801 0.866602 13.5204 0.725526C13.6608 0.584449 13.8501 0.503639 14.0485 0.50012C14.247 0.4966 14.439 0.570646 14.5842 0.706658L23.776 9.94661C23.9194 10.091 24 10.2867 24 10.4907C24 10.6948 23.9194 10.8905 23.776 11.0349L14.5842 20.2748C14.4406 20.419 14.2459 20.5 14.0429 20.5C13.84 20.5 13.6453 20.419 13.5017 20.2748Z" fill="#056CF2" />
                    </svg>
                </a>
            </div>
            <div class="cell">
                <a href="<?php echo $settings['button-url2']; ?>" class="button buttonBlue">
                    <?php echo $settings['button-title2']; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="21" viewBox="0 0 24 21" fill="none">
                        <path d="M13.5017 20.2748C13.3582 20.1304 13.2776 19.9347 13.2776 19.7307C13.2776 19.5266 13.3582 19.3309 13.5017 19.1866L21.3849 11.2607L0.765977 11.2607C0.562828 11.2607 0.367998 11.1796 0.224348 11.0352C0.0806995 10.8908 -2.35298e-06 10.695 -2.34406e-06 10.4907C-2.33513e-06 10.2865 0.0806995 10.0907 0.224348 9.94627C0.367998 9.80186 0.562828 9.72074 0.765977 9.72074L21.3849 9.72074L13.5017 1.79492C13.3664 1.64895 13.2927 1.45589 13.2962 1.25641C13.2997 1.05693 13.3801 0.866602 13.5204 0.725526C13.6608 0.584449 13.8501 0.503639 14.0485 0.50012C14.247 0.4966 14.439 0.570646 14.5842 0.706658L23.776 9.94661C23.9194 10.091 24 10.2867 24 10.4907C24 10.6948 23.9194 10.8905 23.776 11.0349L14.5842 20.2748C14.4406 20.419 14.2459 20.5 14.0429 20.5C13.84 20.5 13.6453 20.419 13.5017 20.2748Z" fill="#fff" />
                    </svg>
                </a>
            </div>
        </div>



<?php
    }
}
