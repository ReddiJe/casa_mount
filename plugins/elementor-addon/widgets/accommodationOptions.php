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

        $this->add_control(
			'url',
			[
				'label' => esc_html__( 'URL to embed', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-addon' ),
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
                      'name' => 'image',
                      'label' => esc_html__( 'Choose Image', 'textdomain' ),
                      'type' => \Elementor\Controls_Manager::MEDIA,
                      'label_block' => true,
                      'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                      ],
                    ],
                    [
                        'label' => esc_html__( 'Subtitle', 'elementor-addon' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Hello world', 'elementor-addon' ),
                    ],
                    [
                        'label' => esc_html__('Title', 'elementor-addon'),
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
        $documents = $settings['documents'];

?>

        <style>
    .accommodationOptionsContainer {
    padding: 100px 25px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 25px;
}

.accommodationsContainer {
    display: inline-flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 25px;
}

.accomodation {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 15px;
    background: #FFF;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    border-radius: 15px;
    transition: all linear 300ms;
}

.accomodation:hover{
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.75);
}

.accomodation img {
    width: 100%;
    height: 300px;
    object-fit: cover;
}

.accomodationText {
    padding: 15px;
    display: flex;
    justify-content: start;
    align-items: start;
    flex-direction: column;
    width: 100%;
    gap: 15px;
}

.accomodationText a {
    width: 100%;
    display: flex;
    justify-content: end;
    align-items: center;
    gap: 10px;
    color: #B1882F;
}

.accomodationText h3 {
    color: #2c2d2c;
    font-family: Open Sans;
    font-size: 1.75rem;
    font-weight: 600;
}

.accomodationText p {
    color: #2c2d2c;
    font-size: 1.25rem;
    font-weight: 300;
}
        </style>


<div class="accommodationOptionsContainer">
        <h2><?php echo $settings['title1']; ?></h2>
        <p><?php echo $settings['subtitle1']; ?></p>
        <div class="accommodationsContainer">
            <div class="accomodation">
                <img src="./image/aaccommodation.jpeg" alt="">
                <div class="accomodationText">
                    <h3>
                    <?php echo $settings['title']; ?>
                    </h3>
                    <p><?php echo $settings['subtitle']; ?></p>
                    <a href="<?php echo $settings['url']; ?>">Go To Options
                        <svg xmlns="http://www.w3.org/2000/svg" width="77" height="15" viewBox="0 0 77 15" fill="none">
                            <path d="M76.7071 8.20711C77.0976 7.81658 77.0976 7.18342 76.7071 6.79289L70.3431 0.428932C69.9526 0.0384078 69.3195 0.0384078 68.9289 0.428932C68.5384 0.819457 68.5384 1.45262 68.9289 1.84315L74.5858 7.5L68.9289 13.1569C68.5384 13.5474 68.5384 14.1805 68.9289 14.5711C69.3195 14.9616 69.9526 14.9616 70.3431 14.5711L76.7071 8.20711ZM0 8.5H76V6.5H0V8.5Z" fill="#B1882F"/>
                            </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
    }
}