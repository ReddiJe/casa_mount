<?php


class Elementor_ourServices extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'ourServices';
	}

	public function get_title()
	{
		return esc_html__('Our Services', 'elementor-addon');
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
			'repeater_field',
			[
				'label' => esc_html__('Blocks', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'text',
						'label' => esc_html__('Text', 'elementor-addon'),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
					],
					[
						'name' => 'time_duration',
						'label' => esc_html__('Duration Time', 'elementor-addon'),
						'type' => \Elementor\Controls_Manager::TEXT,
					],
					[
						'name' => 'image',
						'label' => esc_html__('Choose Image', 'textdomain'),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
				],
				'default' => [
					[
						'image' => [
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
			.title {
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				text-align: center;
				padding: 25px;
				gap: 25px;
			}

			.title h2 {
				font-size: 4rem;
			}

			.additionalServices {
				width: 100%;
				display: grid;
				grid-template-columns: repeat(4, 1fr);
				padding: 25px;
				grid-column-gap: 25px;
			}

			.additionalService {
				display: flex;
				justify-content: space-between;
				align-items: start;
				flex-direction: column;
				width: 100%;
				border-radius: 25px;
				overflow: hidden;
				background: #FFF;
				box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0.15);
			}

			.additionalService img {
				width: 100%;
				max-height: 200px;
				object-fit: cover;
			}

			.adittionalServicesText {
				display: flex;
				justify-content: space-between;
				flex-direction: column;
				padding: 25px;
				gap: 25px;
			}

			.adittionalServicesText h4 {
				font-size: 1.25rem;
				color: var(--black);
			}

			.time {
				display: flex;
				justify-content: start;
				align-items: center;
				gap: 15px;
				font-weight: 300;
			}

			@media screen and (max-width: 600px) {
				.additionalService {
					margin-bottom: 10px;
				}

				.additionalServices {
					grid-template-columns: repeat(1, 1fr);
					padding: 15px 15px !important;
					border-radius: 10px;
				}

				.additionalServicesText {
					padding: 15px;
					gap: 15px;
				}
			}
		</style>

		<div class="title">
			<h2><?php echo $settings['title'] ?></h2>
		</div>

		<div class="additionalServices">
			<?php
			foreach ($settings['repeater_field'] as $item) :
			?>
				<div class="additionalService">
					<div class="adittionalServicesText">
						<h4><?php echo esc_html($item['text']); ?></h4>
						<p class="time">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
								<path d="M10 0C8.02219 0 6.08879 0.586489 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17316C0.00433267 8.00043 -0.1937 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8078C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C19.9969 7.34879 18.9423 4.80706 17.0676 2.93237C15.1929 1.05768 12.6512 0.00311358 10 0ZM10 18.8235C8.25487 18.8235 6.54893 18.306 5.09791 17.3365C3.64689 16.367 2.51596 14.9889 1.84813 13.3766C1.18029 11.7643 1.00556 9.99021 1.34602 8.27861C1.68647 6.56702 2.52683 4.99481 3.76083 3.76082C4.99482 2.52683 6.56702 1.68647 8.27862 1.34601C9.99021 1.00555 11.7643 1.18029 13.3766 1.84812C14.9889 2.51595 16.367 3.64689 17.3365 5.09791C18.306 6.54893 18.8235 8.25487 18.8235 10C18.8209 12.3393 17.8905 14.5821 16.2363 16.2363C14.5821 17.8905 12.3394 18.8209 10 18.8235ZM16.0784 10C16.0784 10.156 16.0165 10.3056 15.9061 10.4159C15.7958 10.5263 15.6462 10.5882 15.4902 10.5882H10C9.84399 10.5882 9.69437 10.5263 9.58406 10.4159C9.47374 10.3056 9.41177 10.156 9.41177 10V4.5098C9.41177 4.35379 9.47374 4.20417 9.58406 4.09386C9.69437 3.98354 9.84399 3.92157 10 3.92157C10.156 3.92157 10.3056 3.98354 10.4159 4.09386C10.5263 4.20417 10.5882 4.35379 10.5882 4.5098V9.41176H15.4902C15.6462 9.41176 15.7958 9.47374 15.9061 9.58405C16.0165 9.69437 16.0784 9.84399 16.0784 10Z" fill="#010626" />
							</svg>
							<?php echo esc_html($item['time_duration']); ?>
						</p>
					</div>
					<img src="<?php echo esc_url($item['image']['url']); ?>" alt="">
				</div>
			<?php endforeach; ?>
		</div>

<?php
	}
}
