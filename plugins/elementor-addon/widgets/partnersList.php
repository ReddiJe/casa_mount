<?php


class Elementor_partnersList extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'partnersList';
    }

    public function get_title()
    {
        return esc_html__('Partners List', 'elementor-addon');
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
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'textdomain'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
            'url',
            [
                'label' => esc_html__('URL to embed', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'elementor-addon'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_partners_list',
            [
                'label' => esc_html__('Partners List', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'partners',
            [
                'label' => esc_html__('Partners', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                      'name' => 'partner_image',
                      'label' => esc_html__( 'Choose Image', 'textdomain' ),
                      'type' => \Elementor\Controls_Manager::MEDIA,
                      'label_block' => true,
                      'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                      ],
                    ],
                    [
                        'name' => 'partner_url',
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
        $partners = $settings['partners'];


?>

        <style>
            .partnersSectionContainer {
                background-image: url(<?php echo esc_url($settings['backgroundImage']['url']) ?>);
                background-size: cover;
                padding-bottom: 300px;
                background-position: center bottom;
            }

            .partnersContainer {
                display: flex;
                align-items: center;
                align-content: center;
                gap: 1.5625rem;
                flex-wrap: wrap;
            }

            .partnersContainer img {
                padding: 15px;
                background: white;
                box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
                height: 60px;
            }
        </style>

<div class="partnersSectionContainer richText wow fadeIn">
            <h2><?php echo $settings['title']; ?></h2>
<div class="partnersContainer">
                <?php
                foreach ($partners as $partner) {
?> 
                    <img src="<?php echo $partner['partner_image']['url']; ?>" >
        <?php echo $partner['partner_url']; ?>
        <?php
                    } ?>
            </div>
        </div>

<?php
    }
}