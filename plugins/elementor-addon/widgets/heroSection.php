<?php


class Elementor_heroSection extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'heroSection';
	}

	public function get_title()
	{
		return esc_html__('Hero Section', 'elementor-addon');
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
			]
		);

		$this->add_control(
			'text',
			[
				'label' => esc_html__('Text', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
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
			.heroImageContainer {
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
				height: 90vh;
				gap: 15px;
			}

			.page-header {
				display: none;
			}

			.heroImageContainer img {
				max-height: 80%;
				width: 100%;
				object-fit: cover;
			}

			@media screen and (min-width: 1600px) {
				.heroImageContainer {
					padding: 0 10%;
				}
			}

			@media screen and (max-width: 600px) {
				.heroImageContainer {
					padding: 15px;
					grid-template-columns: repeat(1, 1fr);
				}
			}
		</style>

		<div class="heroImageContainer">
			<h1 class="hello-world">
				<?php echo $settings['title']; ?>
			</h1>
			<p>
				<?php echo $settings['text']; ?>
			</p>
			<?php echo '<img src="' . esc_url($settings['image']['url']) . '" alt="">'; ?>
		</div>
<?php
	}
}
