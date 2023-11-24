<?php


class Elementor_hoverBlocks extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'hoverBlocks';
    }

    public function get_title()
    {
        return esc_html__('Hover Blocks', 'elementor-addon');
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

        $this->start_controls_section(
            'sectionFacilitiesList',
            [
                'label' => esc_html__('Facilities List', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'facilities',
            [
                'name' => 'facilities',
                'label' => esc_html__('Facilities', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'facility_title',
                        'label' => esc_html__('Facility Title', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                    ],
                    [
                        'name' => 'facility_description',
                        'label' => esc_html__('Facility Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'label_block' => true,
                    ],
                    [
                        'name' => 'facility_image',
                        'label' => esc_html__('Choose Image', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'label_block' => true,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'background_image',
                        'label' => esc_html__('Choose Image', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'label_block' => true,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'facility_url',
                        'label' => esc_html__('URL', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'input_type' => 'url',
                        'label_block' => true,
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
        $facilities = $settings['facilities'];

?>

        <style>
            .hoverCardsContainer {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                padding: 25px;
                grid-column-gap: 25px;
                width: 100%;
            }

            .card {
                overflow: hidden;
                height: 300px;
                border-radius: 25px;
                background: #FFF;
                box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.15);
                position: relative;
                cursor: pointer;
            }

            .cardInner {
                height: 100%;
                position: relative;
            }

            .text{
                position: relative;
                height: 100%;
                width: 100%;
            }

            .bgCard {
                z-index: 1;
                position: absolute;
                width: 100%;
                height: 100%;
                object-fit: contain;
            }

            .cardInner h3 {
                position: absolute;
                z-index: 2;
                padding: 0 15%;
                width: 100%;
                max-width: 100%;
                text-align: center;
                top: 13%;
                font-size: 1.5rem;
            }

            .imgCard {
                position: absolute;
                width: 100%;
                bottom: 0;
                z-index: 3;
                object-fit: contain;
                left: 0;
                max-height: 80%;
            }

            .cardInnerHover {
                position: absolute;
                top: 100%;
                height: 100%;
                width: 100%;
                background: var(--blueLight);
                color: #fff;
                padding: 15px;
                z-index: 5;
                transition: all linear 500ms;
                font-size: 18px;
                font-weight: 300;
            }

            .text h3 {
                color: #2c2d2c;
            }

            .cardInnerHover p {
                color: #FFF;
                font-family: Urbanist;
                font-size: 20px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }

            .card:hover .cardInnerHover {
                top: 0;
            }
        </style>

        <div class="hoverCardsContainer pageWidth">
            <?php
            foreach ($facilities as $facility) {
                $facility_image = $facility['facility_image']['url'];
                $background_image = $facility['background_image']['url'];
                $facility_url = $facility['facility_url'];
            ?>
                <a href="<?php echo $facility_url; ?>" class="card">
                    <div class="cardInner">
                        <div class="text">
                        <img src="<?php echo $facility_image; ?>" alt="" class="imgCard">
                            <h3>
                                <?php echo $facility['facility_title']; ?>
                            </h3>
                            <img src="<?php echo $background_image; ?>" alt="" class="bgCard">
                        </div>
                        <div class="cardInnerHover">
                            <p><?php echo $facility['facility_description']; ?></p>
                            <p class="link">More &gt;</p>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>

<?php
    }
}
