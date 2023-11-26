<?php


class Elementor_blocksWithPictures extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'blocksWithPictures';
    }

    public function get_title()
    {
        return esc_html__('blocks With Pictures', 'elementor-addon');
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
            'sectionSettings',
            [
                'label' => esc_html__('Section Title', 'elementor-addon'),
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
            'sectionSettings1',
            [
                'label' => esc_html__('Your pictures', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'repeater_control',
            [
                'label' => esc_html__('Your Pictures', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => esc_html__('Image', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'elementor-addon'),
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
            .richText {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                padding: 25px;
                gap: 25px;
            }

            .richText h2 {
                font-size: 4rem;
            }

            .richText p {
                font-size: 1.5rem;
                max-width: 80%;
            }

            .cardsWhere {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                padding: 25px;
                width: 100%;
                grid-column-gap: 25px;
                grid-row-gap: 25px;
            }

            .cardsWhereCard {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 15px;
                border-radius: 1.5625rem;
                background: #FFF;
                box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
                padding: 25px;
            }

            .cardsWhereCard img {
                width: 6rem;
                height: 6rem;
            }

            @media screen and (max-width: 600px) {
                .cardsWhere {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
        </style>

        <div class="richText pageWidth">
            <h2><?php echo $settings['title'] ?></h2>
            <p><?php echo $settings['subtitle'] ?></p>
        </div>

        <div class="cardsWhere pageWidth">
            <?php foreach ($settings['repeater_control'] as $item) : ?>
                <div class="cardsWhereCard">
                    <img src="<?php echo $item['image']['url']; ?>" alt="">
                    <?php echo $item['title']; ?>
                </div>
            <?php endforeach; ?>
        </div>

<?php
    }
}
