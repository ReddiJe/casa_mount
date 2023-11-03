<?php


class Elementor_myForm extends \Elementor\Widget_Base {

	public function get_name() {
		return 'myForm';
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
.contactUsForm {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 25px;
    padding: 150px;
}

.contactUsForm h3 {
    color: #B1882F;
    font-size: 3rem;
    font-weight: 400;
    text-transform: uppercase;
}

.contactUsForm p {
    color: var(--Black, #2C2D2C);
    font-size: 1.5rem;
    font-weight: 300;
    text-transform: uppercase;
    width: 800px;
    text-align: center;
}

.contactUsForm .inputContainer {
    max-width: 100%;
	width: 100%;
}

.contactUsForm .inputContainer input,
.contactUsForm .inputContainer textarea {
    width: 100%;
    border-bottom: none;
    background: var(--Light-gray, #FBFBFB);
	margin-bottom: 10px;
}

.contactUsForm button {
    padding: 10px;
    border: 1px solid #B1882F;
    color: #B1882F;
    background: white;
    outline: none;
    box-sizing: none;
    font-size: 1.2rem;
    font-weight: 400;
}

@media (max-width: 900px) {
    .contactUsForm {
        padding: 20px;
    }

    .contactUsForm h3 {
        font-size: 1.5rem;
    }

    .contactUsForm p {
        font-size: 1rem;
    }

	.contactUsForm .containerInput {
        max-width: 100%; 
    }

    .contactUsForm button {
        width: 100%; 
    }
}
        </style>

        <div class="contactUsForm">
		<h3>
			<?php echo $settings['title']; ?>
        </h3>
        <p>
            <?php echo $settings['text']; ?>
        </p>

		<form action="" method="post" class="inputContainer">
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