<?php

class Elementor_switchSideImage extends \Elementor\Widget_Base {

	public function get_name() {
		return 'switchSideImage';
	}

	public function get_title() {
		return esc_html__( 'Switch Side Image', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
            ]
		);

        $this->add_control(
            'text',
			[
				'label' => esc_html__( 'Text', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
		);

        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'switch_position',
			[
				'label' => esc_html__( 'Switch Image Position', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Right', 'elementor-addon' ),
				'label_off' => esc_html__( 'Left', 'elementor-addon' ),
				'default' => 'left',
			]
		);

		$this->end_controls_section();

		// Content Tab End

		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
				],
			]
		);



		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		

        <style>

.oneSideHero{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 25px;
        padding: 25px;
    }

.oneSideHero img{
        width: 50%;
        height: 80vh;
        object-fit: cover;
    }
	.oneSideHero img.left{
		display: none;
	}

	.oneSideHero.left img.left{
		display: block;
	}

	.oneSideHero.left img.right{
		display: none;
	}


        </style>



<div class="oneSideHero <?php 		
		if ( 'yes' === $settings['switch_position'] ) {
			echo 'right';
		} else {
			echo 'left';
		} 
		?> ">
	<img src="<?php echo esc_url( $settings['image']['url'] );?>" alt="" class="left">
    <div class="text">
        <h2>
            <?php echo $settings['title']; ?>
        </h2>
        <p>
            <?php echo $settings['text']; ?>
        </p>
    </div>
	<img src="<?php echo esc_url( $settings['image']['url'] );?>" alt="" class="right">
</div>


<?php
    }
}