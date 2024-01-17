<?php


class Elementor_calculator extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'calculator';
    }

    public function get_title()
    {
        return esc_html__('Calculator', 'elementor-addon');
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
            'main-section',
            [
                'label' => esc_html__('Section Control', 'elementor-addon'),
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
            'titleUpperPrice',
            [
                'label' => esc_html__('Title Upper Price', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'minSqFt',
            [
                'label' => esc_html__('Minimal sq.ft. for project', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 1000,
                'step' => 100,
                'default' => 500,
            ]
        );

        $this->add_control(
            'maxSqFt',
            [
                'label' => esc_html__('Maximal sq.ft. for project', 'textdomain'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1000,
                'max' => 5000,
                'step' => 100,
                'default' => 2000,
            ]
        );

        $this->add_control(
            'repeater_control',
            [
                'label' => esc_html__('Repeater Control', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'price',
                        'label' => esc_html__('Price', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 50,
                        'max' => 1000,
                        'step' => 10,
                        'default' => 100,
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
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <style>
            .calculatorPageContainer {
                padding: 150px 25px 25px 25px;
                width: 100%;
            }

            .calculatorContainer {
                display: flex;
                justify-content: space-between;
                align-items: start;
                gap: 25px;
            }

            .chooseTheService,
            .repetetivePostal {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: end;
            }

            .allData {
                width: 55%;
                padding: 25px 0;
                display: flex;
                justify-content: start;
                align-items: start;
                flex-direction: column;
                gap: 25px;
            }

            .repetetivePostal .inputContainer {
                width: 15%;
            }

            .rangeSqFt {
                width: 100%;
                display: flex;
                justify-content: start;
                align-items: start;
                flex-direction: column;
                gap: 15px;
            }

            .rangerContainer {
                width: 100%;
                display: flex;
                justify-content: start;
                align-items: start;
                flex-direction: column;
                gap: 15px;
            }

            .allData label {
                color: var(--black);
            }

            .allData .inputContainer select,
            .allData .inputContainer input {
                border: 1px solid var(--blueLight);
                color: var(--black);
                padding: 5px 10px;
                border-radius: 5px;
            }

            .allData .inputContainer input::placeholder {
                color: var(--black);
            }

            .rangerContainer .range {
                width: 100%;
            }

            .range {
                -webkit-appearance: none;
                width: 100%;
                height: 5px;
                border-radius: 5px;
                background: rgba(3, 57, 217, 0.25);
                ;
                outline: none;
                opacity: 1;
                -webkit-transition: .2s;
                transition: opacity .2s;
            }

            .range::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background: var(--blueLight);
                cursor: pointer;
            }

            .minMax {
                display: flex;
                justify-content: space-between;
                width: 100%;
            }

            .additionalServicesCal {
                width: 100%;
                display: flex;
                justify-content: start;
                align-items: start;
                flex-direction: column;
            }

            .adServicesContainer {
                position: relative;
                display: flex;
                width: 100%;
                align-items: center;
                align-content: center;
                gap: 1.1875rem 0.9375rem;
                flex-wrap: wrap;
            }

            .serviceCheckbox {
                position: relative;
            }

            .serviceCheckbox label {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 5px;
            }

            .adServicesContainer label {
                background: rgba(5, 108, 242, 0.10);
                color: var(--blue);
                padding: 5px 10px;
                border-radius: 12px;
            }

            .adServicesContainer label svg {
                display: none;
            }

            .open label {
                background: var(--blue);
                color: white;
                padding: 5px 10px;
                border-radius: 12px;
            }

            .open label svg {
                display: block;
            }

            .adServicesContainer input {
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                position: absolute;
                opacity: 0;
                z-index: 1;
                cursor: pointer;
            }

            .valueSq {
                color: var(--blue);
                font-size: 1.5rem;
                font-weight: 600;
            }

            .valueSq b {
                font-size: 3.5rem;
            }

            .additionalServicesCal {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .outputContainer {
                width: 40%;
                position: relative;
            }

            .outputContainerInner {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 50px;
                padding: 50px;
                background-color: #FAFBFF;
                border-radius: 50px;
                box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
            }

            .outputContainerInner h3 {
                width: 100%;
            }

            .taxesAndOthersContainer {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .valueOfMoney {
                display: flex;
            }

            .valueOfMoney {
                display: flex;
                justify-content: start;
                align-items: start;
                color: var(--blue);
                font-size: 2.5rem;
                font-weight: 600;
                gap: 10px;
            }

            #valueOfMoney {
                font-size: 3.8rem;
            }

            .valueOfMoney strong {
                height: 3.8rem;
                display: flex;
                justify-content: end;
                align-items: end;
                font-weight: 400;
                color: var(--black);
                font-size: 1.2rem;
            }

            .orderNowButtonCalc {
                position: absolute;
                z-index: 2;
                font-size: 2rem;
                font-weight: 800;
                padding: 10px 25px;
                background: var(--blueLight);
                color: #fff;
                border-radius: 25px;
                bottom: -25px;
                right: 50px;
                box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
                transition: all linear 300ms;
            }

            .orderNowButtonCalc:hover {
                background: var(--blue);
            }

            @media screen and (min-width: 1600px) {
                width: 80%;
            }

            @media screen and (max-width: 600px) {
                .calculatorPageContainer {
                    padding: 100px 10px 10px 10px;
                }

                .calculatorContainer {
                    flex-direction: column;
                    padding-bottom: 50px;
                }

                .allData,
                .outputContainer {
                    width: 100%;
                }

                .checkboxHomeOffice {
                    display: none;
                }

                #valueOfMoney {
                    font-size: 3.2rem;
                }
            }
        </style>

        <div class="calculatorPageContainer">
            <div class="titleCOntainer">
                <h1><?php echo $settings['title'] ?></h1>
                <p><?php echo $settings['subtitle'] ?></p>
            </div>
            <div class="calculatorContainer">
                <div class="allData">
                    <div class="chooseTheService">
                        <div class="inputContainer">
                            <label for="service">Choose the service:</label>
                            <select name="service" id="service">
                                <option value="Deep">Sdandard Cleaning</option>
                                <option value="Deep">Deep Cleaning</option>
                                <option value="Move">Move In/Out Cleaning</option>
                            </select>
                        </div>
                        <div class="c">
                            <a href="#" class="chacboxInner activeHomeOffice">Home</a>
                            <a href="#" class="chacboxInner">Office</a>
                        </div>
                    </div>
                    <div class="rangeSqFt">
                        <p class="title">Project area (in sq.ft.)</p>
                        <div class="rangerContainer">
                            <p class="valueSq">
                                sq.ft.<b id="valueSq">120</b>
                            </p>
                            <input type="range" min="500" max="5000" value="500" class="range" id="sqRange">
                            <div class="minMax">
                                <div class="min">
                                    <<?php echo $settings['minSqFt'] ?>sq.ft. </div>
                                        <div class="max">
                                            ><?php echo $settings['maxSqFt'] ?>sq.ft.
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="repetetivePostal">
                            <div class="chackboxContainer">
                                <input type="checkbox" name="repetetive" id="repetetive">
                                <label for="repetetive">This is a repetitive cleaning</label>
                            </div>
                            <div class="inputContainer">
                                <label for="postal" class="invisible"></label>
                                <input type="text" placeholder="Postal Code" id="postal">
                            </div>
                        </div>
                        <div class="additionalServicesCal">
                            <p class="title">
                                Additional services:
                            </p>
                            <div class="adServicesContainer">
                                <?php
                                foreach ($settings['repeater_control'] as $item) {
                                ?>
                                    <div class="serviceCheckbox">
                                        <label for="windows"><?php echo esc_html($item['title']); ?> <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" title="<?php echo esc_html($item['price']); ?>">
                                                <path d="M1 1L11 11M1 11L11 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg></label>
                                        <input type="checkbox" name="windows" id="windows" class="additionalServiceCheckbox" title="<?php echo esc_html($item['price']); ?>">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="outputContainer">
                        <div class="outputContainerInner">
                            <h3>
                                <?php echo $settings['titleUpperPrice'] ?>
                            </h3>

                            <p class="valueOfMoney">
                                ~$<b id="valueOfMoney">250</b>
                                <strong class="once">Once</strong>
                            </p>

                            <div class="taxesAndOthersContainer">
                                <div class="oneTaxContainer">
                                    <p class="label">Services</p>
                                    <p class="amount">$1200</p>
                                </div>
                                <div class="oneTaxContainer">
                                    <p class="label">Taxes</p>
                                    <p class="amount">$1200</p>
                                </div>
                                <div class="oneTaxContainer">
                                    <p class="label">Fuel</p>
                                    <p class="amount">$1200</p>
                                </div>
                            </div>
                        </div>
                        <a href="./contactUs.html" class="orderNowButtonCalc">Order Now</a>
                    </div>
                </div>
            </div>


            <script>
                let valueSq = document.getElementById("valueSq");
                let valueFromRange = document.getElementById("sqRange")
                let additionalCheckBox = document.querySelectorAll(".additionalServiceCheckbox")
                let finalMoney = document.getElementById("valueOfMoney")

                valueSq.innerHTML = valueFromRange.value;

                let howMuchMoney = () => {
                    let finalAmount = 0;
                    let fromSq = valueFromRange.value * 0.5;
                    finalAmount = fromSq;



                    additionalCheckBox.forEach(child1 => {
                        if (child1.checked == true) {
                            finalAmount = finalAmount + Number(child1.title)
                        }
                    });


                    finalMoney.innerHTML = finalAmount;


                }

                valueFromRange.oninput = function() {
                    valueSq.innerHTML = this.value;
                    howMuchMoney();
                }




                additionalCheckBox.forEach(child1 => {
                    child1.addEventListener('click', () => {
                        const parent = child1.parentNode;
                        parent.classList.toggle('open');


                        howMuchMoney();
                        console.log(additionalCheckBox)
                    });
                });
            </script>
    <?php
    }
}
