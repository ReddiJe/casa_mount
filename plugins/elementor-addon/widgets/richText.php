<?php

class Elementor_richText extends \Elementor\Widget_Base {

	public function get_name() {
		return 'richText';
	}

	public function get_title() {
		return esc_html__( 'Rich Text', 'elementor-addon' );
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
			'subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'elementor-addon' ),
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
            'textForButton',
			[
				'label' => esc_html__( 'Text For Button', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
                'placeholder' => esc_html__( 'insert text for button', 'elementor-addon' ),
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
            
            .richText {
    display: flex;
    justify-content: center;
    align-items: start;
    flex-direction: column;
    padding: 150px;
    gap: 15px;
}

.richText h2 {
    color: #B1882F;
    font-family: NewYork;
    font-size: 3rem;
    font-weight: 400;
    text-transform: uppercase;
}

.richText .subtitle {
    color: var(--Black, #2C2D2C);
    font-family: Open Sans;
    font-size: 1.5rem;
    font-weight: 300;
    text-transform: uppercase;
}

.richText .text {
    font-size: 1.125rem;
    font-weight: 300;
}

.buttonRichText {
    padding: 10px 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #B1882F;
    color: #B1882F;
    transition: all linear 300ms;
}

.buttonRichText:hover {
    background: #B1882F;
    color: #fff;
}

        </style>
 <div class="richText wow fadeIn" id="sectionForArrow">
        <div class="titlesRichText">
            <h2>
                <?php echo $settings['title']; ?>
            </h2>
            <p class="subtitle">
                <?php echo $settings['subtitle']; ?>
            </p>
        </div>
        <p class="text">
            <?php echo $settings['text']; ?>
        </p>
        <?php if (!empty($settings['url'])) : ?>
        <a class="buttonRichText" href="<?php echo esc_url($settings['url']); ?>">
            <?php echo esc_html($settings['textForButton']); ?>
        </a>
    <?php endif; ?>
    </div>

		<?php
	}
}