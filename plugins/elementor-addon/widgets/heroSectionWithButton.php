<?php


class Elementor_heroSectionWithButton extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'heroSectionWithButton';
	}

	public function get_title()
	{
		return esc_html__('Hero Section With Link', 'elementor-addon');
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
			'subtitle',
			[
				'label' => esc_html__('Subtitle', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'buttonText',
			[
				'label' => esc_html__('Button Title', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__('insert text for button', 'elementor-addon'),
			]
		);

		$this->add_control(
			'url',
			[
				'label' => esc_html__('URL For Button', 'elementor-addon'),
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
			.richText {
				padding: 50px 25px 25px 25px;
				width: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
				gap: 15px;
			}

			.richText h2 {
				color: var(--black);
				text-align: center;
				font-size: 3rem;
				font-weight: 700;
			}

			.richText p {
				color: var(--black);
				text-align: center;
				font-size: 1.25rem;
				font-weight: 300;
				max-width: 800px;
			}

			.richText .button {
				display: flex;
				padding: 15px 50px;
				justify-content: center;
				align-items: center;
				gap: 10px;
				border-radius: 25px;
                background: var(--blueLight);
				color: #fff;
				font-size: 1.25rem;
				font-weight: 500;
                transition: all linear 500ms;
			}
			
			.button:hover {
				background: var(--blueDark);
			}

		</style>


		<div class="richText">
			<h2><?php echo $settings['title']; ?></h2>
			<p><?php echo $settings['subtitle']; ?></p>
			<a href="<?php echo $settings['url']; ?>" class="button">
				<svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M19.0156 11C19.0156 15.714 19.0156 18.071 17.6976 19.535C16.3796 21 14.2576 21 10.0156 21C5.77262 21 3.65162 21 2.33362 19.535C1.01562 18.072 1.01562 15.714 1.01562 11C1.01562 6.286 1.01562 3.929 2.33362 2.464C3.65162 1 5.77362 1 10.0156 1C14.2586 1 16.3796 1 17.6976 2.464C18.5736 3.438 18.8676 4.807 18.9656 7" stroke="white" stroke-width="1.5" stroke-linecap="round" />
					<path d="M5.01562 7C5.01562 6.535 5.01563 6.303 5.06663 6.112C5.13482 5.85787 5.26866 5.62614 5.45471 5.44009C5.64077 5.25403 5.87249 5.12019 6.12663 5.052C6.31963 5 6.55163 5 7.01562 5H13.0156C13.4806 5 13.7126 5 13.9036 5.051C14.1578 5.11919 14.3895 5.25303 14.5755 5.43909C14.7616 5.62514 14.8954 5.85687 14.9636 6.111C15.0156 6.304 15.0156 6.536 15.0156 7C15.0156 7.464 15.0156 7.697 14.9646 7.888C14.8964 8.14213 14.7626 8.37386 14.5765 8.55991C14.3905 8.74597 14.1588 8.87981 13.9046 8.948C13.7126 9 13.4796 9 13.0156 9H7.01562C6.55062 9 6.31863 9 6.12763 8.949C5.87349 8.88081 5.64177 8.74697 5.45571 8.56091C5.26966 8.37486 5.13582 8.14313 5.06763 7.889C5.01563 7.696 5.01562 7.464 5.01562 7Z" stroke="white" stroke-width="1.5" />
					<path d="M6.01562 13C6.56791 13 7.01562 12.5523 7.01562 12C7.01562 11.4477 6.56791 11 6.01562 11C5.46334 11 5.01562 11.4477 5.01562 12C5.01562 12.5523 5.46334 13 6.01562 13Z" fill="white" />
					<path d="M6.01562 17C6.56791 17 7.01562 16.5523 7.01562 16C7.01562 15.4477 6.56791 15 6.01562 15C5.46334 15 5.01562 15.4477 5.01562 16C5.01562 16.5523 5.46334 17 6.01562 17Z" fill="white" />
					<path d="M10.0156 13C10.5679 13 11.0156 12.5523 11.0156 12C11.0156 11.4477 10.5679 11 10.0156 11C9.46334 11 9.01562 11.4477 9.01562 12C9.01562 12.5523 9.46334 13 10.0156 13Z" fill="white" />
					<path d="M10.0156 17C10.5679 17 11.0156 16.5523 11.0156 16C11.0156 15.4477 10.5679 15 10.0156 15C9.46334 15 9.01562 15.4477 9.01562 16C9.01562 16.5523 9.46334 17 10.0156 17Z" fill="white" />
					<path d="M14.0156 13C14.5679 13 15.0156 12.5523 15.0156 12C15.0156 11.4477 14.5679 11 14.0156 11C13.4633 11 13.0156 11.4477 13.0156 12C13.0156 12.5523 13.4633 13 14.0156 13Z" fill="white" />
					<path d="M14.0156 17C14.5679 17 15.0156 16.5523 15.0156 16C15.0156 15.4477 14.5679 15 14.0156 15C13.4633 15 13.0156 15.4477 13.0156 16C13.0156 16.5523 13.4633 17 14.0156 17Z" fill="white" />
				</svg>
				<?php echo $settings['buttonText']; ?>
				<svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M14.0616 21.116C13.9124 20.9666 13.8285 20.764 13.8285 20.5529C13.8285 20.3417 13.9124 20.1392 14.0616 19.9898L22.2628 11.7873L0.812225 11.7873C0.600879 11.7873 0.398191 11.7033 0.248748 11.5539C0.0993056 11.4044 0.0153499 11.2017 0.0153499 10.9904C0.0153499 10.779 0.0993057 10.5763 0.248748 10.4269C0.398191 10.2775 0.600879 10.1935 0.812225 10.1935L22.2628 10.1935L14.0616 1.991C13.9208 1.83994 13.8442 1.64014 13.8479 1.4337C13.8515 1.22725 13.9351 1.03028 14.0811 0.884278C14.2271 0.738276 14.4241 0.654645 14.6305 0.651003C14.837 0.64736 15.0368 0.723991 15.1878 0.864751L24.7503 10.4273C24.8996 10.5767 24.9834 10.7792 24.9834 10.9904C24.9834 11.2015 24.8996 11.4041 24.7503 11.5535L15.1878 21.116C15.0384 21.2652 14.8359 21.3491 14.6247 21.3491C14.4136 21.3491 14.211 21.2652 14.0616 21.116Z" fill="white" />
				</svg>
			</a>
		</div>

<?php
	}
}
