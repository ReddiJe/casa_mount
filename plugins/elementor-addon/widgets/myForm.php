<?php


class Elementor_myForm extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hello_world_widget_2';
	}

	public function get_title() {
		return esc_html__( 'Form', 'elementor-addon' );
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
            .heroImageContainer{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                height: 90vh;
                gap: 15px;
            }

            .page-header{
                display: none;
            }

            .heroImageContainer img{
                max-height: 80%;
                width: 100%;
                object-fit: cover;
            }
        </style>
        <div class="heroImageContainer">
		<h1 class="hello-world">
			<?php echo $settings['title']; ?>
        </h1>
        <p>
            <?php echo $settings['text']; ?>
        </p>
		<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
    <input type="hidden" name="action" value="submit_contact_form">
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <textarea name="message" placeholder="Your Message" required></textarea>
    <button type="submit">Send Email</button>
</form>
        </div>
		<?php
	}
}