<?php


class Elementor_blockWithDots extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'blockWithDots';
    }

    public function get_title()
    {
        return esc_html__('Blocks with dots', 'elementor-addon');
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
            'sectionSettings',
            [
                'label' => esc_html__('Section Settings', 'elementor-addon'),
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

        $this->end_controls_section();

        $this->start_controls_section(
            'block1',
            [
                'label' => esc_html__('Block 1 Settings', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'blocksName1',
            [
                'label' => esc_html__('Names For Block', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'image1',
            [
                'label' => esc_html__('Background Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'description' => esc_html__('Select an image for your widget.', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'repeater_control1',
            [
                'label' => esc_html__('Repeater Control', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'top-number',
                        'label' => esc_html__('Top Number', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    [
                        'name' => 'left-number',
                        'label' => esc_html__('Left Number', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'block2',
            [
                'label' => esc_html__('Block 2 Settings', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'blocksName2',
            [
                'label' => esc_html__('Names For Block', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'image2',
            [
                'label' => esc_html__('Background Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'description' => esc_html__('Select an image for your widget.', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'repeater_control2',
            [
                'label' => esc_html__('Repeater Control', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'top-number',
                        'label' => esc_html__('Top Number', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    [
                        'name' => 'left-number',
                        'label' => esc_html__('Left Number', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'block3',
            [
                'label' => esc_html__('Block 3 Settings', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'blocksName3',
            [
                'label' => esc_html__('Names For Block', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'image3',
            [
                'label' => esc_html__('Background Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'description' => esc_html__('Select an image for your widget.', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'repeater_control3',
            [
                'label' => esc_html__('Repeater Control', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'top-number',
                        'label' => esc_html__('Top Number', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    [
                        'name' => 'left-number',
                        'label' => esc_html__('Left Number', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'block4',
            [
                'label' => esc_html__('Block 4 Settings', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'blocksName4',
            [
                'label' => esc_html__('Names For Block', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'image4',
            [
                'label' => esc_html__('Background Image', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'description' => esc_html__('Select an image for your widget.', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'repeater_control4',
            [
                'label' => esc_html__('Repeater Control', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'top-number',
                        'label' => esc_html__('Top Number', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    [
                        'name' => 'left-number',
                        'label' => esc_html__('Left Number', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    [
                        'name' => 'description',
                        'label' => esc_html__('Description', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
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
            .topTitle {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                padding: 25px;
                gap: 25px;
            }

            .topTitle h2 {
                font-size: 4rem;
            }

            .topTitle p {
                font-size: 1.5rem;
                max-width: 80%;
            }

            .hoverDot {
                position: absolute;
                z-index: 1;
                cursor: pointer;
            }

            .hoverDot .description {
                display: none;
                position: absolute;
                top: 0;
                left: 0;
                z-index: 5;
                padding: 10px;
                background: #fff;
                width: 300px;
                border-radius: 15px;
            }

            .hoverDot:hover .description {
                display: block;
            }

            .tab {
                overflow: hidden;
                display: flex;
                gap: 0;
                justify-content: start;
                box-sizing: border-box;
                border-bottom: 0.5px solid var(--greyForBorder);
            }

            .descriptionContainer {
                display: flex;
                flex-direction: column;
            }

            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                font-size: 17px;
                transition: all linear 300ms;
                width: 25%;
            }

            .tab button:hover {
                background-color: #fff;
                color: #000;
                box-shadow: none;
                border-bottom: 2px solid var(--greyForBorder);
            }

            .tab button.active {
                border-bottom: none;
                background: white;
                color: #056CF2;
                border-bottom: 2px #056CF2;
                box-shadow: none;
            }

            .tabcontent {
                position: relative;
                display: none;
                padding: 25px 0;
                margin: 25px 0;
            }

            .first {
                display: block;
            }


            .tabcontent a {
                color: var(--blue);
                text-decoration: underline;
            }

            .tabcontent .buttonBlackStroke {
                color: var(--blackRegular);
            }

            .tabcontent .buttonBlackStroke:hover {
                color: #fff;
            }

            .pageWidth {
                width: 100%;
                padding: 25px;
            }

            [type=button],
            [type=submit],
            button {
                color: #2c2d2c;
            }

            .tabcontent {
                height: 80vh;
                width: 100%;
                background-size: cover;
            }

            @media screen and (min-width: 1600px) {
                .pageWidth {
                    width: 100%;
                    padding: 25px 10%;
                }
            }

            @media screen and (max-width: 600px) {
                .pageWidth {
                    width: 100%;
                    padding: 15px;
                }

                .hoverDot .description {
                    width: auto;
                }

                .tab {
                    overflow-x: scroll;
                    width: 100%;
                }

                .tabcontent {
                    padding: 0px;
                    margin: 0px 0;
                }

                .tabcontent {
                    height: 30vh;
                    width: 100%;
                    background-size: cover;
                }
            }
        </style>


        <div class="topTitle">
            <h2><?php echo $settings['title'] ?></h2>
            <p><?php echo $settings['subtitle'] ?></p>
        </div>


        <div class="tab">
            <button class="tablinks active" onclick="openCity(event, 'block1')"><?php echo $settings['blocksName1'] ?></button>
            <button class="tablinks" onclick="openCity(event, 'block2')"><?php echo $settings['blocksName2'] ?></button>
            <button class="tablinks" onclick="openCity(event, 'block3')"><?php echo $settings['blocksName3'] ?></button>
            <button class="tablinks" onclick="openCity(event, 'block4')"><?php echo $settings['blocksName4'] ?></button>
        </div>

        <div class="descriptionContainer page-width pageWidth">
            <div id="block1" class="tabcontent first" style="background-image: url(<?php echo $settings['image1']['url']; ?>);">
                <?php
                foreach ($settings['repeater_control1'] as $item) {
                    $top_number = !empty($item['top-number']) ? $item['top-number'] . '%' : '50%';
                    $left_number = !empty($item['left-number']) ? $item['left-number'] . '%' : '50%';
                ?>
                    <div class="hoverDot" style="top:<?php echo esc_attr($top_number); ?>; left:<?php echo esc_attr($left_number); ?>;">
                        <div class="dot">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                <g opacity="0.7">
                                    <circle cx="17.5" cy="17.5" r="17.5" fill="white" />
                                    <circle cx="17.5" cy="17.5" r="7.5" fill="#056CF2" />
                                </g>
                            </svg>
                        </div>
                        <div class="description"><?php echo esc_html($item['description']); ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div id="block2" class="tabcontent" style="background-image: url(<?php echo $settings['image2']['url']; ?>);">
                <?php
                foreach ($settings['repeater_control2'] as $item) {
                    $top_number = !empty($item['top-number']) ? $item['top-number'] . '%' : '50%';
                    $left_number = !empty($item['left-number']) ? $item['left-number'] . '%' : '50%';
                ?>
                    <div class="hoverDot" style="top:<?php echo esc_attr($top_number); ?>; left:<?php echo esc_attr($left_number); ?>;">
                        <div class="dot">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                <g opacity="0.7">
                                    <circle cx="17.5" cy="17.5" r="17.5" fill="white" />
                                    <circle cx="17.5" cy="17.5" r="7.5" fill="#056CF2" />
                                </g>
                            </svg>
                        </div>
                        <div class="description"><?php echo esc_html($item['description']); ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div id="block3" class="tabcontent" style="background-image: url(<?php echo $settings['image3']['url']; ?>);">
                <?php
                foreach ($settings['repeater_control3'] as $item) {
                    $top_number = !empty($item['top-number']) ? $item['top-number'] . '%' : '50%';
                    $left_number = !empty($item['left-number']) ? $item['left-number'] . '%' : '50%';
                ?>
                    <div class="hoverDot" style="top:<?php echo esc_attr($top_number); ?>; left:<?php echo esc_attr($left_number); ?>;">
                        <div class="dot">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                <g opacity="0.7">
                                    <circle cx="17.5" cy="17.5" r="17.5" fill="white" />
                                    <circle cx="17.5" cy="17.5" r="7.5" fill="#056CF2" />
                                </g>
                            </svg>
                        </div>
                        <div class="description"><?php echo esc_html($item['description']); ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div id="block4" class="tabcontent" style="background-image: url(<?php echo $settings['image4']['url']; ?>);">
                <?php
                foreach ($settings['repeater_control4'] as $item) {
                    $top_number = !empty($item['top-number']) ? $item['top-number'] . '%' : '50%';
                    $left_number = !empty($item['left-number']) ? $item['left-number'] . '%' : '50%';
                ?>
                    <div class="hoverDot" style="top:<?php echo esc_attr($top_number); ?>; left:<?php echo esc_attr($left_number); ?>;">
                        <div class="dot">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                                <g opacity="0.7">
                                    <circle cx="17.5" cy="17.5" r="17.5" fill="white" />
                                    <circle cx="17.5" cy="17.5" r="7.5" fill="#056CF2" />
                                </g>
                            </svg>
                        </div>
                        <div class="description"><?php echo esc_html($item['description']); ?></div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <script>
            let sideMobNavigation = document.querySelector(".sideMobNavigation")
            let openSideNav = document.querySelector(".openSideNav")
            let closeSideNav = document.querySelector(".closeSideNav")

            let openMenu = () => {
                sideMobNavigation.classList.toggle("open")
                openSideNav.classList.toggle("open")
                closeSideNav.classList.toggle("open")
            }

            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName('tabcontent');
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = 'none';
                }
                tablinks = document.getElementsByClassName('tablinks');
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(' active', '');
                }
                document.getElementById(cityName).style.display = 'block';
                evt.currentTarget.className += ' active';
            }
        </script>
<?php
    }
}
