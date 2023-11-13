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
                'default' => esc_html__('Hello world', 'elementor-addon'),
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
    background: #314047;
    color: #fff;
    text-align: center;
    width: 100%;
    margin: 0;
}

.loginForm{
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
@media screen and (max-width: 1050px) {
.documentsContainer {
                    padding: 25px;
                    grid-template-columns: repeat(2, 1fr);
                }

.document {
                    height: 200px;
                    width: 100%;
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
                <button onclick="loginDocuments()">Open Documents</button>
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