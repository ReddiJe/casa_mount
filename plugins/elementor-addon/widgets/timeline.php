<?php

class Elementor_timeline extends \Elementor\Widget_Base {

	public function get_name() {
		return 'timeline';
	}

	public function get_title() {
		return esc_html__( 'Timeline', 'elementor-addon' );
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
                'label' => esc_html__('Subtitle', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Hello world', 'elementor-addon'),
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'step1',
			[
				'label' => esc_html__( 'Step1', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);

		$this->add_control(
			'title1',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
		);

		$this->add_control(
			'subtitle1',
			[
				'label' => esc_html__('Subtitle', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Hello world', 'elementor-addon'),
			]
		);

		$this->add_control(
			'year1',
			[
				'label' => esc_html__('Year', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html(date('Y'), 'elementor-addon'),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'Step2',
			[
				'label' => esc_html__( 'Step2', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);

		$this->add_control(
			'title2',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
		);

		$this->add_control(
			'subtitle2',
			[
				'label' => esc_html__('Subtitle', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Hello world', 'elementor-addon'),
			]
		);

		$this->add_control(
			'year2',
			[
				'label' => esc_html__('Year', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html(date('Y'), 'elementor-addon'),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'step3',
			[
				'label' => esc_html__( 'Step3', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);

		$this->add_control(
			'title3',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
		);

		$this->add_control(
			'subtitle3',
			[
				'label' => esc_html__('Subtitle', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Hello world', 'elementor-addon'),
			]
		);

		$this->add_control(
			'year3',
			[
				'label' => esc_html__('Year', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html(date('Y'), 'elementor-addon'),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'step4',
			[
				'label' => esc_html__( 'Step4', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);

		$this->add_control(
			'title4',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
		);

		$this->add_control(
			'subtitle4',
			[
				'label' => esc_html__('Subtitle', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Hello world', 'elementor-addon'),
			]
		);

		$this->add_control(
			'year4',
			[
				'label' => esc_html__('Year', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html(date('Y'), 'elementor-addon'),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'step5',
			[
				'label' => esc_html__( 'Step5', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);

		$this->add_control(
			'title5',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
		);

		$this->add_control(
			'subtitle5',
			[
				'label' => esc_html__('Subtitle', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Hello world', 'elementor-addon'),
			]
		);

		$this->add_control(
			'year5',
			[
				'label' => esc_html__('Year', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html(date('Y'), 'elementor-addon'),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'step6',
			[
				'label' => esc_html__( 'Step6', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
		);

		$this->add_control(
			'title6',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			]
		);

		$this->add_control(
			'subtitle6',
			[
				'label' => esc_html__('Subtitle', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Hello world', 'elementor-addon'),
			]
		);

		$this->add_control(
			'year6',
			[
				'label' => esc_html__('Year', 'elementor-addon'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html(date('Y'), 'elementor-addon'),
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

	.heroSectionTimeline{
        padding-top: 20vh;
        height: 40vh;
    }

    .timelineContainer{
        position: relative;
    }

    .timelineContainer .timelineBackground{
        width: 100%;
        object-fit: contain;
    }

    .step{
        position: absolute;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .step h3, .ste p{
        color: #fff;
    }

    .step h3{
        font-size: 2rem;
        font-weight: 400;
    }

    .step.left{
        justify-content: start;
        align-items: start;
    }

    .step.right{
        justify-content: end;
        align-items: end;
    }

    .step.right p{
        text-align: right;
    }

    
    .step p{
        color: #FFF;
		font-size: 20px;
		font-weight: 300;
		max-width: 700px;
    }

    .step .subtitle{
        color: rgba(255, 255, 255, 0.75);
		font-size: 24px;
		font-weight: 500;
		width: 100;
    }

    .stepOne{
        top: 13%;
        left: 22%;
    }

    .stepTwo{
        top: 23%;
        left: 12%;
        justify-content: end;
        align-items: end;
    }

    .stepThree{
        top: 33%;
        left: 33%;
    }

    .stepFour{
        top: 45%;
        left: 26%;
    }

    .stepFive{
        top: 56%;
        left: 25%;
    }

    .stepSix{
        padding: 15px;
        background: rgba(0, 0, 0, 0.50);
        top: 73%;
        left: 54%;
        transform: translateX(-50%);
    }

    .stepSix h3,
    .stepSix p{
        width: 100%;
		text-align: center;
        }
    

@media screen and (min-width: 1600px){

    .step p{
		max-width: 800px;
    }

    .stepOne{
        top: 14%;
        left: 22%;
    }

    .stepTwo{
        top: 23%;
        left: 22%;
        justify-content: end;
        align-items: end;
    }
}




@media screen and (max-width: 1050px) {
        .longTimeStep {
            padding: 25px;
        }
    }

    @media screen and (max-width: 600px) {
        .longTimeStep {
            padding: 15px;
        }
    }

	@media screen and (max-width: 768px) {
        .step h3 {
            font-size: 1.5rem; 
        }

        .step p {
            font-size: 18px; 
        }

        .step .subtitle {
            font-size: 20px; 
        }
    }
        </style>

		

<div class="heroSection heroSectionTimeline wow fadeInUp">
        <h1>
            <?php echo $settings['title']; ?>
        </h1>
        <p>
            <?php echo $settings['subtitle']; ?>
        </p>
    </div>

<div class="timelineContainer">
        <img src="http://localhost/wp-content/uploads/2023/11/Group-87.png" alt="" class="timelineBackground">
        <div class="etapsContainer">
            <div class="step stepOne left wow fadeInUp">
                <h3>
					<?php echo $settings['year1']; ?>
                </h3>
                <p class="subtitle"><?php echo $settings['title1']; ?></p>
                <p><?php echo $settings['subtitle1']; ?></p>
            </div>

            <div class="step stepTwo right wow fadeInUp">
                <h3>
				<?php echo $settings['year2']; ?>
                </h3>
                <p class="subtitle"><?php echo $settings['title2']; ?></p>
                <p><?php echo $settings['subtitle2']; ?></p>
            </div>

            <div class="step stepThree left wow fadeInUp">
                <h3>
				<?php echo $settings['year3']; ?>
                </h3>
                <p class="subtitle"><?php echo $settings['title3']; ?></p>
                <p><?php echo $settings['subtitle3']; ?></p>
            </div>

            <div class="step stepFour right wow fadeInUp">
                <h3>
				<?php echo $settings['year4']; ?>
                </h3>
                <p class="subtitle"><?php echo $settings['title4']; ?></p>
                <p><?php echo $settings['subtitle4']; ?></p>
            </div>

            <div class="step stepFive left wow fadeInUp">
                <h3>
				<?php echo $settings['year5']; ?>
                </h3>
                <p class="subtitle"><?php echo $settings['title5']; ?></p>
                <p><?php echo $settings['subtitle5']; ?></p>
            </div>

            <div class="step stepSix left wow fadeInUp">
                <h3>
				<?php echo $settings['year6']; ?>
                </h3>
                <p class="subtitle"><?php echo $settings['title6']; ?></p>
                <p><?php echo $settings['subtitle6']; ?></p>
            </div>
        </div>
    </div>

		<?php
	}
}