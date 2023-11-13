<?php

class Elementor_switchSideImage extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'switchSideImage';
	}

	public function get_title()
	{
		return esc_html__('Switch Side Image', 'elementor-addon');
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
			'text',
			[
				'label' => esc_html__('Text', 'elementor-addon'),
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
			'switch_position',
			[
				'label' => esc_html__('Switch Image Position', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Right', 'elementor-addon'),
				'label_off' => esc_html__('Left', 'elementor-addon'),
				'default' => 'left',
			]
		);

		$this->add_control(
			'textForButton',
			[
				'label' => esc_html__('Text For Button', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('insert text for button', 'elementor-addon'),
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
?>


		<style>
			.oneSideHero {
				width: 100%;
				display: flex;
				justify-content: space-between;
				align-items: center;
				gap: 25px;
				padding: 25px;
			}

			.oneSideHero img {
				width: 50%;
				height: 80vh;
				object-fit: cover;
			}

			.oneSideHero img.left {
				display: none;
			}

			.oneSideHero.left img.left {
				display: block;
			}

			.oneSideHero.left img.right {
				display: none;
			}

			.oneSideHero a {
				padding: 10px;
				margin-top: 20px;
				border: 1px solid #B1882F;
				color: #B1882F;
				background: white;
				outline: none;
				box-sizing: none;
				font-size: 1.2rem;
				font-weight: 400;
				text-align: center;
				display: block;
				width: max-content;
			}

			.oneSideHero .text h2 {
				margin-bottom: 10px;
			}

			.oneSideHero .text {
				width: 100%;
			}

			@media screen and (max-width: 600px) {
				.oneSideHero {
					flex-direction: column;
					display: flex;
					align-items: center;
					text-align: center;
				}

				.oneSideHero img {
					width: 100%;
					height: 50vh;
					object-fit: cover;
				}

				.oneSideHero.left img.right,
				.oneSideHero.right img.right {
					display: block;
				}

				.oneSideHero.left img.left,
				.oneSideHero.right img.left {
					display: none;
				}
			}

			.text h2 {
				text-align: left;
			}

			.text p {
				text-align: left;
			}
		</style>



		<div class="oneSideHero <?php
								if ('yes' === $settings['switch_position']) {
									echo 'right';
								} else {
									echo 'left';
								}
								?> ">
			<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="left">
			<div class="text">
				<h2>
					<?php echo $settings['title']; ?>
				</h2>
				<p>
					<?php echo $settings['text']; ?>
				</p>
				<?php if ($settings['url'] != "") {
				?>
					<a class="buttonRichText" href="<?php echo esc_url($settings['url']); ?>">
						<?php echo esc_html($settings['textForButton']); ?>
					</a>
				<?php
				}
				?>
			</div>
			<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" class="right">
		</div>


<?php
	}
}
