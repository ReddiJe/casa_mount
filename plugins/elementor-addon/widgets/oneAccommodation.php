<?php


class Elementor_docsBlocks extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'docsBlocks';
    }

    public function get_title()
    {
        return esc_html__('Documents Page', 'elementor-addon');
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
            'top_section',
            [
                'label' => esc_html__('Top title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title1',
            [
                'label' => esc_html__('Title', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'subtitle1',
			[
				'label' => esc_html__( 'Subtitle', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'bottom_section_title',
            [
                'label' => esc_html__('Bottom Title', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'oneAccommodation',
            [
                'label' => esc_html__('Accommodation', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title', 
                        'label' => esc_html__( 'Title', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::TEXT, 
                        'default' => 'Default Title', 
                    ],
                    [
                        'name' => 'image',
                        'label' => esc_html__( 'Choose Image', 'textdomain' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'label_block' => true,
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
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $documents = $settings['documents'];

?>

        <style>
.condosOptionsContainer{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 25px;
}

.condosOptionsContainer h3{
    color: #2c2d2c;
font-size: 3rem;
font-weight: 400;
}

.condosOptionsContainer p{
    text-align: center;
    color: #2c2d2c;
font-size: 1.25rem;
font-weight: 300;
}

.condosOPtionsContainerInner{
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 25px;
}

.condosOPtionsContainerInner img{
    width: 100%;
    object-fit: contain;
}
        </style>

<div class="condosOptionsContainer">
        <h3>
            <?php echo $settings['title1'] ?>
        </h3>
        <p><?php echo $settings['subtitle1'] ?></p>
        <div class="condosOPtionsContainerInner">
            <div class="option">
                <img src="<?php echo $settings['image'] ?>" alt="">
                <p><?php echo $settings['title'] ?></p>
            </div>
        </div>
      </div>


<?php
    }
}