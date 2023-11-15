<?php


class Elementor_docsBlocks extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'docsBlocks';
    }

    public function get_title()
    {
        return esc_html__('Documents Page', 'elementor-addon');
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

        $this->end_controls_section();

        $this->start_controls_section(
            'docs_section',
            [
                'label' => esc_html__('Documents Section', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'documents',
            [
                'label' => esc_html__('Documents', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'title',
                        'label' => esc_html__('Title', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                    ],
                    [
                        'name' => 'image',
                        'label' => esc_html__('Choose Image', 'textdomain'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'label_block' => true,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'url',
                        'label' => esc_html__('URL', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'input_type' => 'url',
                        'label_block' => true,
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_password',
            [
                'label' => esc_html__('Password', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'password_input',
            [
                'label' => esc_html__('Enter Password', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
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
        $documents = $settings['documents'];

?>

        <style>
            * {
                box-sizing: border-box;
                padding: 0;
                margin: 0;
            }

            .title {
                text-align: center;
                padding: 10px 0px;
            }

            .documentsContainer {
                display: grid;
                width: 100%;
                grid-template-columns: repeat(3, 1fr);
                grid-gap: 25px;
                position: relative;
            }

            .document {
                height: 350px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                border-radius: 15px;
                overflow: hidden;
                overflow: hidden;
                text-decoration: none;
            }

            .document img {
                height: 100%;
                width: 100%;
                object-fit: cover;
            }

            .document p {
                padding: 10px;
                /* background: #314047; */
                color: #2c2d2c;
                text-align: center;
                width: 100%;
                margin: 0;
            }

            .loginForm {
                position: absolute;
                height: 100%;
                width: 100%;
                background: white;
                z-index: 3;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 15px;
            }

            .inputContainer {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                gap: 15px;
            }

            .inputContainer label {
                color: var(--Black, #2C2D2C);
                font-size: 1rem;
                font-weight: 600;
            }

            button {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 15px;
                margin-top: 30px;
                color: #2c2d2c;
                border: none;
                font-family: Urbanist;
                font-size: 24px;
                font-weight: 300;
                letter-spacing: 0em;
                text-align: left;
                transition: all linear 200ms;
            }

            [type=button]:focus,
            [type=button]:hover,
            [type=submit]:focus,
            [type=submit]:hover,
            button:focus,
            button:hover {
                color: #2c2d2c;
                background-color: #fff;
                text-decoration: none
            }

            button:hover {
                gap: 25px;
            }

            .inputContainer input,
            .inputContainer textarea {
                border: none;
                border-bottom: 1px solid #2c2d2c;
                width: 15rem;
                padding: 10px;
            }

            @media screen and (min-width: 1600px) {
                .documentsContainer {
                    padding: 0 10%;
                }
            }

            @media screen and (max-width: 600px) {
                .documentsContainer {
                    padding: 15px;
                    grid-template-columns: repeat(1, 1fr);
                }
            }
        </style>


        <div>
            <h2 class="title"><?php echo $settings['title']; ?></h2>
        </div>

        <div class="documentsContainer">
            <div class="loginForm">
                <h3>Login to see Documents</h3>
                <form method="post">
                    <div class="inputContainer">
                        <label for="passwordForInvestors">Password</label>
                        <input type="password" name="password" id="passwordForInvestors" placeholder="Password">
                    </div>
                    <button onclick="loginDocuments()">Open Documents <svg width="35" height="34" viewBox="0 0 35 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.4391 26.2861C18.3016 26.1489 18.2244 25.963 18.2244 25.7691C18.2244 25.5753 18.3016 25.3894 18.4391 25.2522L25.9938 17.7227L6.23406 17.7227C6.03938 17.7227 5.85266 17.6456 5.715 17.5084C5.57734 17.3713 5.5 17.1852 5.5 16.9912C5.5 16.7972 5.57734 16.6111 5.715 16.474C5.85266 16.3368 6.03938 16.2597 6.23406 16.2597L25.9938 16.2597L18.4391 8.73017C18.3094 8.59151 18.2388 8.4081 18.2422 8.21859C18.2455 8.02908 18.3226 7.84827 18.4571 7.71425C18.5916 7.58023 18.773 7.50346 18.9632 7.50011C19.1534 7.49677 19.3374 7.56711 19.4766 7.69632L28.2853 16.4743C28.4228 16.6114 28.5 16.7974 28.5 16.9912C28.5 17.185 28.4228 17.371 28.2853 17.5081L19.4766 26.2861C19.3389 26.4231 19.1524 26.5 18.9578 26.5C18.7633 26.5 18.5767 26.4231 18.4391 26.2861Z" fill="#2C2D2C" />
                            <path d="M18.475 8.69539L26.0291 16.2243L26.1148 16.3097L25.9938 16.3097L6.23406 16.3097C6.05258 16.3097 5.87857 16.3815 5.7503 16.5094C5.62203 16.6372 5.55 16.8105 5.55 16.9912C5.55 17.1719 5.62203 17.3452 5.7503 17.473C5.87857 17.6009 6.05258 17.6727 6.23406 17.6727L25.9938 17.6727L26.1148 17.6727L26.0291 17.7581L18.4744 25.2876C18.4744 25.2876 18.4744 25.2876 18.4744 25.2876C18.3463 25.4154 18.2744 25.5886 18.2744 25.7691C18.2744 25.9497 18.3463 26.1228 18.4744 26.2506C18.6026 26.3783 18.7765 26.45 18.9578 26.45C19.1391 26.45 19.313 26.3783 19.4413 26.2507L18.475 8.69539ZM18.475 8.69539C18.3546 8.56626 18.2891 8.39569 18.2922 8.21948C18.2953 8.04298 18.3671 7.87454 18.4924 7.74967C18.6177 7.62479 18.7868 7.55322 18.9641 7.55011C19.141 7.54699 19.3123 7.61235 19.4419 7.73237L28.25 16.5097C28.25 16.5097 28.25 16.5097 28.25 16.5097C28.3781 16.6375 28.45 16.8107 28.45 16.9912C28.45 17.1717 28.3781 17.3449 28.25 17.4727L19.4413 26.2506L18.475 8.69539Z" stroke="white" stroke-opacity="0.15" stroke-width="0.1" />
                        </svg></button>
                </form>
            </div>
            <?php foreach ($documents as $document) { ?>
                <a href="<?php echo esc_url($document['url']); ?>" class="document" download>
                    <img src="<?php echo esc_url($document['image']['url']); ?>">
                    <p><?php echo esc_html($document['title']); ?></p>
                </a>
            <?php } ?>
        </div>




        <script>
            let loginContainer = document.querySelector(".loginForm")
            let passwordInput = document.getElementById("passwordForInvestors")
            loginDocuments = () => {
                if (passwordInput.value === "<?php echo $settings['password_input']; ?>") {
                    loginContainer.style.display = "none";
                }

            }
        </script>

<?php
    }
}
