<?php


class Elementor_twoColumnsValues extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'twoColumnsValues';
    }

    public function get_title()
    {
        return esc_html__('Two Columns Text', 'elementor-addon');
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
                'label' => esc_html__('Description', 'elementor-addon'),
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
                        'name' => 'title',
                        'label' => esc_html__('Title', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__('Desctription', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                    ],
                ],
            ]
        );

        $this->add_control(
            'text',
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

            .textTwoColumns {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                padding: 25px;
                gap: 25px;
            }

            .textTwoColumns ul {
                padding-left: 15px;
                list-style-type: decimal;
            }

            .textTwoColumns ul li {
                font-weight: 300;
                font-size: 1.25rem;
            }

            .textTwoColumns h4 {
                font-size: 1.5rem;
            }

            .textCenter {
                width: 100%;
                padding: 150px;
                text-align: center;
                font-size: 1.25rem;
                color: black;
                font-weight: 300;
            }

            @media screen and (min-width: 1600px) {
                .pageWidth {
                    padding: 25px 15%;
                }

                .pageWidth.heroSectionColumn {
                    padding: 150px 15%;
                }

                .pageWidth.oneArticleContainerInner {
                    padding-top: 200px;
                }
            }
        </style>

        <div class="richText pageWidth">
            <h2><?php echo $settings['title']; ?></h2>
        </div>

        <div class="textTwoColumns pageWidth">
            <?php
            foreach ($settings['repeater_control'] as $item) {
            ?>
                <div class="text">
                    <h4><?php echo $item['title']; ?></h4>
                    <ul>
                        <li><?php echo $item['description']; ?></li>
                    </ul>
                </div>
            <?php } ?>
        </div>

        <p class="textCenter pageWidth">
            <?php echo $settings['text']; ?>
        </p>

<?php
    }
}
