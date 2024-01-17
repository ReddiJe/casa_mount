<?php


class Elementor_contactUs extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'contactUs';
    }

    public function get_title()
    {
        return esc_html__('Contact Us', 'elementor-addon');
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
            'left-section',
            [
                'label' => esc_html__('Left Section', 'elementor-addon'),
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
            'email',
            [
                'label' => esc_html__('E-mail', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'textForSocial',
            [
                'label' => esc_html__('Text For Social', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'url-for-facebook',
            [
                'label' => esc_html__('Facebook URL', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'url-for-instagram',
            [
                'label' => esc_html__('Instagram URL', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'url-for-linkedIn',
            [
                'label' => esc_html__('linkedln URL', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'elementor-addon'),
            ]
        );

        $this->add_control(
            'phone',
            [
                'label' => esc_html__('Insert your phone', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'adress',
            [
                'label' => esc_html__('Insert Your Adress', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'right-section',
            [
                'label' => esc_html__('Right Section', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image for background', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'http://localhost/wp-content/uploads/2023/11/pexels-oliver-sjostrom-931018-1.png',
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
            .contactsContainer {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                width: 100%;
                grid-column-gap: 24px;
                height: 80vh;
            }

            .contactsContainer .side {
                width: 100%;
                /* height: 100%; */
                display: flex;
                gap: 25px;
            }

            .leftContainer {
                flex-direction: column;
                margin-top: 20px;
                margin-left: 15px;
            }

            .leftContainer h1 {
                width: 100%;
                color: var(--black);
                font-size: 3.5rem;
                font-weight: 300;

            }

            .contacts {
                height: 360px;
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: start;
                flex-direction: column;
            }

            .socialAndAdress {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;

            }

            .social,
            .adress {
                display: flex;
                justify-content: start;
                align-items: start;
                gap: 15px;
                flex-direction: column;
            }

            .socialLinks {
                display: flex;
                gap: 15px;
            }

            .social p,
            .tel {
                color: var(--black);
                font-size: 1.125rem;
                font-weight: 700;
            }

            a.adress,
            a.email {
                color: #656565;
                font-size: 1.125rem;
                font-weight: 300;
            }

            .rightContainer {
                background-size: cover;
                width: 100%;
                margin-top: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 25px;
            }

            .rightContainer .wpforms-container {
                display: flex;
                width: 100%;
                height: 100%;
            }

            .rightContainer .wpforms-container form {
                display: flex;
                justify-content: center;
                align-items: start;
                flex-direction: column;
                gap: 10px;
            }

            .rightContainer .wpforms-container form .wpforms-field-container {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
            }

            .rightContainer .wpforms-container div.wpforms-field {
                width: 45%;
            }

            .rightContainer .wpforms-container input,
            .wpforms-container input.wpforms-field-medium,
            .wpforms-container select.wpforms-field-medium,
            .wpforms-submit,
            div.wpforms-container-full .wpforms-form textarea.wpforms-field-medium {
                width: 100% !important;
                max-width: 100% !important;
                background: transparent !important;
                outline: none !important;
                border: none !important;
                border-bottom: 1px solid white !important;
                color: white !important;
            }

            .wpforms-submit {
                font-family: 'Open Sans', sans-serif !important;
                font-size: 28px;
                font-weight: 300;
            }

            .wpforms-field-label {
                color: #FFF !important;
                font-size: 16px !important;
                font-style: normal !important;
                font-weight: 700 !important;
                font-family: 'Open Sans', sans-serif !important;
            }

            .wpforms-container input,
            ::placeholder {
                color: #FFF !important;
                font-family: 'Open Sans', sans-serif !important;
                font-size: 16px !important;
                font-style: normal !important;
                font-weight: 300 !important;
            }

            .wpforms-description {
                color: #FFF !important;
                font-size: 42px !important;
                font-style: normal !important;
                font-weight: 300 !important;
            }

            @media screen and (min-width: 1600px) {
                .contactsContainer .side {
                    padding: 0px 10%;
                }
            }

            @media screen and (max-width: 600px) {
                .contactsContainer {
                    grid-template-columns: repeat(1, 1fr);
                    padding: 15px;
                    grid-gap: 0;
                    height: auto;
                }

                .contacts {
                    height: 300px;
                }

                .side {
                    width: 100%;
                }

                .inputContainer {
                    padding-left: 5px;
                    max-width: 80vw;
                }

                .rightContainer form {
                    justify-content: start;
                    align-items: start;
                    flex-wrap: no-wrap;
                }

                .socialAndAdress {
                    justify-content: start;
                    align-items: start;
                    flex-direction: column;
                    width: 100%;
                }

                .adress {
                    max-width: 100%;
                }

                .rightContainer {
                    padding-bottom: 30px;
                }

                .rightContainer form {
                    width: 100%;
                }

                .rightContainer form .inputContainer {
                    width: 100%;
                }

                .wpforms-container input {
                    width: 100%;
                    max-width: 100%;
                }

                .wpforms-container input,
                ::placeholder {
                    color: #FFF !important;
                    font-family: 'Open Sans', sans-serif !important;
                    font-size: 14px !important;
                    font-style: normal !important;
                    font-weight: 300 !important;
                }

                .rightContainer .wpforms-container div.wpforms-field {
                    width: 100%;
                }

                .wpforms-field-label {
                    margin-bottom: 0px !important;
                }

                .rightContainer .wpforms-container form .wpforms-field-container {
                    gap: 30px !important;
                }

                .wpforms-submit {
                    width: 100% !important;
                    margin: 0 auto !important;
                }

                .contactsContainer.heroSection {
                    margin-bottom: 30px !important;
                }
            }

            @media screen and (max-width: 600px) {
                .heroText {
                    
                }
                .contactsContainer .side {
                    min-width: 49%;
                    max-width: 100%;
                    width: 100%;
                }

                .rightContainer {
                    padding: 50px 0;
                }
            }
        </style>

        <div class="contactsContainer heroSection">
            <div class="leftContainer side">
                <h1><?php echo $settings['title'] ?></h1>
                <div class="contacts">
                    <a href="mailto:<?php echo $settings['email'] ?>" class="email"><?php echo $settings['email'] ?></a>
                    <div class="socialAndAdress">
                        <div class="social">
                            <p><?php echo $settings['textForSocial'] ?></p>
                            <div class="socialLinks">
                                <a href="<?php echo $settings['url-for-facebook'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M21 11.0251C21 5.49123 16.52 1 11 1C5.48 1 1 5.49123 1 11.0251C1 15.8772 4.44 19.9173 9 20.8496V14.0326H7V11.0251H9V8.5188C9 6.58396 10.57 5.01003 12.5 5.01003H15V8.01754H13C12.45 8.01754 12 8.46867 12 9.02005V11.0251H15V14.0326H12V21C17.05 20.4987 21 16.2281 21 11.0251Z" stroke="#656565" />
                                    </svg></a><a href="<?php echo $settings['url-for-instagram'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M12.028 1.00123C12.7577 0.99843 13.4874 1.00576 14.2169 1.02323L14.4109 1.03023C14.6349 1.03823 14.8559 1.04823 15.1229 1.06023C16.1868 1.11023 16.9128 1.27822 17.5497 1.52521C18.2097 1.7792 18.7657 2.12319 19.3216 2.67917C19.83 3.17876 20.2234 3.78308 20.4746 4.45011C20.7216 5.08709 20.8896 5.81407 20.9396 6.87803C20.9516 7.14402 20.9616 7.36601 20.9696 7.59001L20.9756 7.784C20.9933 8.51317 21.001 9.24255 20.9986 9.97193L20.9996 10.7179V12.0279C21.002 12.7576 20.9943 13.4873 20.9766 14.2168L20.9706 14.4108C20.9626 14.6348 20.9526 14.8558 20.9406 15.1227C20.8906 16.1867 20.7206 16.9127 20.4746 17.5497C20.2242 18.2174 19.8307 18.8222 19.3216 19.3216C18.8216 19.8299 18.217 20.2233 17.5497 20.4746C16.9128 20.7216 16.1868 20.8896 15.1229 20.9396C14.8559 20.9516 14.6349 20.9616 14.4109 20.9696L14.2169 20.9756C13.4874 20.9933 12.7577 21.001 12.028 20.9986L11.282 20.9996H9.97312C9.24342 21.002 8.51372 20.9943 7.78423 20.9766L7.59024 20.9706C7.35286 20.9619 7.11554 20.9519 6.87828 20.9406C5.81433 20.8906 5.08837 20.7206 4.4504 20.4746C3.78312 20.2239 3.1787 19.8304 2.67949 19.3216C2.17056 18.8219 1.77676 18.2172 1.52555 17.5497C1.27856 16.9127 1.11057 16.1867 1.06057 15.1227C1.04944 14.8855 1.03944 14.6481 1.03058 14.4108L1.02558 14.2168C1.00714 13.4873 0.998807 12.7576 1.00058 12.0279V9.97193C0.997786 9.24255 1.00512 8.51317 1.02258 7.784L1.02958 7.59001C1.03758 7.36601 1.04757 7.14402 1.05957 6.87803C1.10957 5.81307 1.27756 5.08809 1.52455 4.45011C1.77591 3.78276 2.17048 3.1786 2.68049 2.68017C3.17936 2.17094 3.7834 1.77678 4.4504 1.52521C5.08837 1.27822 5.81333 1.11023 6.87828 1.06023L7.59024 1.03023L7.78423 1.02523C8.51337 1.0068 9.24274 0.998469 9.97212 1.00023L12.028 1.00123ZM11.0001 6.00106C10.3376 5.99169 9.67989 6.11408 9.06514 6.36112C8.45039 6.60815 7.89087 6.97491 7.41909 7.44007C6.94732 7.90523 6.57269 8.45951 6.31699 9.07072C6.06129 9.68192 5.92962 10.3379 5.92962 11.0004C5.92962 11.6629 6.06129 12.3189 6.31699 12.9301C6.57269 13.5413 6.94732 14.0956 7.41909 14.5607C7.89087 15.0259 8.45039 15.3926 9.06514 15.6397C9.67989 15.8867 10.3376 16.0091 11.0001 15.9997C12.3261 15.9997 13.5978 15.473 14.5354 14.5353C15.4731 13.5977 15.9998 12.3259 15.9998 10.9999C15.9998 9.67385 15.4731 8.40213 14.5354 7.46448C13.5978 6.52683 12.3261 6.00106 11.0001 6.00106ZM11.0001 8.00099C11.3986 7.99365 11.7945 8.06579 12.1648 8.21319C12.5351 8.3606 12.8723 8.58031 13.1567 8.85951C13.4412 9.1387 13.6671 9.47177 13.8214 9.83927C13.9756 10.2068 14.0551 10.6013 14.0552 10.9999C14.0552 11.3984 13.9759 11.793 13.8217 12.1606C13.6676 12.5281 13.4418 12.8613 13.1574 13.1406C12.8731 13.4198 12.536 13.6397 12.1657 13.7872C11.7955 13.9347 11.3996 14.007 11.0011 13.9998C10.2055 13.9998 9.44243 13.6837 8.87985 13.1211C8.31727 12.5585 8.00122 11.7955 8.00122 10.9999C8.00122 10.2043 8.31727 9.44123 8.87985 8.87864C9.44243 8.31605 10.2055 7.99999 11.0011 7.99999L11.0001 8.00099ZM16.2498 4.50111C15.9272 4.51402 15.6221 4.65126 15.3984 4.88407C15.1748 5.11688 15.0498 5.42721 15.0498 5.75007C15.0498 6.07292 15.1748 6.38326 15.3984 6.61607C15.6221 6.84888 15.9272 6.98611 16.2498 6.99903C16.5813 6.99903 16.8992 6.86733 17.1336 6.63292C17.368 6.39851 17.4997 6.08058 17.4997 5.74907C17.4997 5.41756 17.368 5.09963 17.1336 4.86522C16.8992 4.6308 16.5813 4.49911 16.2498 4.49911V4.50111Z" stroke="#656565" />
                                    </svg></a><a href="<?php echo $settings['url-for-linkedIn'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M19.5211 1.00014H2.47887C2.2873 0.997495 2.09708 1.03239 1.91908 1.10282C1.74108 1.17326 1.57878 1.27786 1.44145 1.41065C1.30412 1.54344 1.19445 1.70181 1.1187 1.87674C1.04296 2.05166 1.00262 2.2397 1 2.43012V19.5699C1.00262 19.7603 1.04296 19.9483 1.1187 20.1233C1.19445 20.2982 1.30412 20.4566 1.44145 20.5894C1.57878 20.7221 1.74108 20.8267 1.91908 20.8972C2.09708 20.9676 2.2873 21.0025 2.47887 20.9999H19.5211C19.7127 21.0025 19.9029 20.9676 20.0809 20.8972C20.2589 20.8267 20.4212 20.7221 20.5586 20.5894C20.6959 20.4566 20.8056 20.2982 20.8813 20.1233C20.957 19.9483 20.9974 19.7603 21 19.5699V2.43012C20.9974 2.2397 20.957 2.05166 20.8813 1.87674C20.8056 1.70181 20.6959 1.54344 20.5586 1.41065C20.4212 1.27786 20.2589 1.17326 20.0809 1.10282C19.9029 1.03239 19.7127 0.997495 19.5211 1.00014ZM7.0664 17.7399H4.04829V8.74003H7.0664V17.7399ZM5.55734 7.48005C5.14111 7.48005 4.74192 7.31569 4.4476 7.02314C4.15328 6.73059 3.98793 6.3338 3.98793 5.92007C3.98793 5.50634 4.15328 5.10955 4.4476 4.817C4.74192 4.52445 5.14111 4.36009 5.55734 4.36009C5.77837 4.33518 6.00219 4.35695 6.21416 4.42398C6.42613 4.491 6.62147 4.60178 6.78738 4.74905C6.95329 4.89632 7.08604 5.07676 7.17693 5.27856C7.26782 5.48036 7.31481 5.69897 7.31481 5.92007C7.31481 6.14117 7.26782 6.35978 7.17693 6.56158C7.08604 6.76338 6.95329 6.94382 6.78738 7.09109C6.62147 7.23836 6.42613 7.34914 6.21416 7.41617C6.00219 7.48319 5.77837 7.50496 5.55734 7.48005ZM17.9517 17.7399H14.9336V12.91C14.9336 11.7 14.501 10.91 13.4044 10.91C13.0651 10.9125 12.7346 11.0183 12.4576 11.2132C12.1806 11.4081 11.9703 11.6827 11.8551 12C11.7764 12.235 11.7423 12.4826 11.7545 12.73V17.7299H8.73642V8.73003H11.7545V10C12.0287 9.52713 12.4275 9.13755 12.9079 8.87323C13.3883 8.60892 13.9322 8.47989 14.4809 8.50003C16.493 8.50003 17.9517 9.79002 17.9517 12.56V17.7399Z" stroke="#656565" />
                                    </svg></a>
                            </div>
                        </div>
                        <div class="adress">
                            <a href="tel:<?php echo $settings['phone'] ?>" class="tel"><?php echo $settings['phone'] ?></a>
                            <a href="#" class="adress"><?php echo $settings['adress']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightContainer side" style="background-image: url(<?php echo $settings['image']['url']; ?>);">
                <?php echo do_shortcode('[wpforms id="420" description="true"]'); ?>
            </div>
        </div>


<?php
    }
}
