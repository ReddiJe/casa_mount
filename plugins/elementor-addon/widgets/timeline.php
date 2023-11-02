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


.longTimeline{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 100px 25px;
    gap: 15px;
}

.longTimeStep{
    height: 490px;
    padding: 25px;
}

.longTimeStep h3, .longTimeStep p{
    color: #fff;
}

.longTimeStep h3{
font-size: 32px;
font-weight: 400;
}

.longTimeStep p{
    font-size: 20px;
font-weight: 300;
}

.longTimeStep .subtitle{
    font-size: 24px;
font-weight: 500;
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
        <img src="./image/timelineBg.png" alt="" class="timelineBackground">
        <div class="etapsContainer">
            <div class="step stepOne left wow fadeInUp">
                <h3>
                    2019
                </h3>
                <p class="subtitle">Founding Year</p>
                <p>It all began with a dream. In 2019, we embarked on our journey to create a haven of luxury and serenity in the heart of the Caribbean.</p>
            </div>

            <div class="step stepTwo right wow fadeInUp">
                <h3>
                    2023
                </h3>
                <p class="subtitle">Land Acquisition</p>
                <p>Securing the perfect location was a crucial step. In 2023, we acquired the breathtaking land that would become the canvas for our paradise.</p>
            </div>

            <div class="step stepThree left wow fadeInUp">
                <h3>
                    2024
                </h3>
                <p class="subtitle">Planning and Design</p>
                <p>Our vision took shape through meticulous planning and design. 2024 marked the inception of the architectural marvels that grace our residence.</p>
            </div>

            <div class="step stepFour right wow fadeInUp">
                <h3>
                    2025
                </h3>
                <p class="subtitle">Construction Commencement</p>
                <p>The first shovel hit the ground in 2025, signaling the start of our exciting journey toward creating the Caribbean's most coveted private residence.</p>
            </div>

            <div class="step stepFive left wow fadeInUp">
                <h3>
                    2026
                </h3>
                <p class="subtitle">Mid construction</p>
                <p>This year we plan to complete the construction of critical infrastructure and a separate entertainment segment for launch and additional attraction of resources.</p>
            </div>

            <div class="step stepSix left wow fadeInUp">
                <h3>
                    2027
                </h3>
                <p class="subtitle">A Dream Realized, A Journey Begins</p>
                <p>In 2027, CasaMountHouse reached an incredible milestone as we proudly announced the end of the construction phase and the dawn of a new era — the commencement of sales. This pivotal moment marked the transformation of our vision into reality and the opening of our doors to a world of discerning travelers seeking an unparalleled Jamaican experience.</p>
            </div>
        </div>
    </div>

    <div class="longTimeline wow fadeInUp">
        <div class="longTimeStep" style="background-image: url(./image/longTime1.png);">
            <h3>
                Private residence
            </h3>
            <p class="subtitle">
                1st step
            </p>
            <p>
                CasaMountHouse was conceived as more than just a residence; it was envisioned as a sanctuary. Nestled amidst the lush landscapes of Jamaica, our private residence emerged as a testament to luxury and serenity. Every element of CasaMountHouse was meticulously designed to create a haven where tranquility meets extravagance. From the meticulously landscaped gardens to the opulent interiors, it was clear from the beginning that we were crafting an oasis like no other.
            </p>
        </div>
        <div class="longTimeStep" style="background-image: url(./image/longTime2.png);">
            <h3>
                Small Town
        </h3>
            <p class="subtitle">
                2nd step
        </p>
            <p>
                We set our sights on a charming Jamaican small town, recognizing its untapped potential as the perfect backdrop for CasaMountHouse. This quaint and culturally rich locale offered the ideal setting to complement our vision of an exclusive retreat. We embraced the vibrant local community, becoming a part of its fabric, and in doing so, CasaMountHouse became more than a private residence; it became a cherished neighbor, contributing to the area's growth while preserving its authentic character.
        </p>
        </div>
        <div class="longTimeStep" style="background-image: url(./image/longTime3.png);">
            <h3>
                Dubai Of Caribbean
        </h3>
            <p class="subtitle">
                3rd step
        </p>
            <p>
                CasaMountHouse expanded its horizons and introduced a touch of Caribbean luxury to the dynamic landscape of Dubai. The fusion of Caribbean charm and Middle Eastern opulence was a vision brought to life in the heart of Dubai. Known as 'Dubai Caribbean,' this ambitious project exemplified our commitment to delivering world-class hospitality experiences. With breathtaking architecture, immersive experiences, and unparalleled service, Dubai Caribbean symbolized a global extension of the CasaMountHouse legacy.
        </p>
        </div>
    </div>


		<?php
	}
}