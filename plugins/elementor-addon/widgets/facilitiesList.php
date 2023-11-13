<?php


class Elementor_facilitiesList extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'facilitiesList';
    }

    public function get_title()
    {
        return esc_html__('Facilities List', 'elementor-addon');
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

        $this->start_controls_section(
            'sectionFacilitiesList',
            [
                'label' => esc_html__('Facilities List', 'elementor-addon'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'facilities',
            [
                'name' => 'facilities',
                'label' => esc_html__('Facilities', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'facility_title',
                        'label' => esc_html__('Facility Title', 'elementor-addon'), // Добавляем новое поле
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                    ],
                    [
                        'name' => 'facility_description',
                        'label' => esc_html__('Facility Description', 'elementor-addon'), // Добавляем новое поле
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'label_block' => true,
                    ],
                    [
                        'name' => 'facility_image',
                        'label' => esc_html__('Choose Image', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'label_block' => true,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'facility_url',
                        'label' => esc_html__('URL', 'elementor-addon'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'input_type' => 'url',
                        'label_block' => true,
                    ],
                ],
            ]
        );
        
        

        $this->end_controls_section();

        // Style Tab End

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $facilities = $settings['facilities'];

?>

        <style>
 .ourFacilitesContainer{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 25px;
        padding: 50px;
    }

    .facilitiesContainer{
        width: 100%;
        display: flex;
        align-items: flex-start;
        align-content: flex-start;
        gap: 75px;
        flex-wrap: wrap;
    }

    .facilitiesContainer .facility{
        width: 20%;
        position: relative;
        overflow: hidden;
    }

    .facilitiesContainer .facility img{
        width: 100%;
    }

    .facilitiesContainer .facility .text{
        top: 85%;
        position: absolute;
        padding: 10px;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(4px);
        display: flex;
        justify-content: start;
        align-items: start;
        flex-direction: column;
        gap: 15px;
        transition: all linear 300ms;
    }

    .facility .text h4,
    .facility .text p{
        color: #fff;
        color: #FFF;
font-family: Open Sans;
    }

    .facility .text h4{
        font-size: 1.25rem;
        font-weight: 600;
    }

    .facility .text p{
        font-size: 1rem;
        font-weight: 300;
    }

    .facility .text .link{
        font-weight: 400;
    }

    .facilitiesContainer .facility:hover .text{
        top: 0;
    }
        </style>

<div class="ourFacilitesContainer">
        <h2><?php echo $settings['title']; ?></h2>
        <p><?php echo $settings['subtitle']; ?></p>
        <div class="facilitiesContainer">
            <?php 
            foreach ($facilities as $facility)  {
                $facility_image = $facility['facility_image']['url'];
                $facility_url = $facility['facility_url'];
                ?>
            <a href="<?php echo $facility_url; ?>" class="facility">
                <img src="<?php echo $facility_image; ?>" alt="">
                <div class="text">
                    <h4>
                    <?php echo $facility['facility_title']; ?>
                    </h4>
                    <p><?php echo $facility['facility_description']; ?></p>
                    <p class="link">More &gt;</p>
                </div>
            </a>
            <?php 
            }
            ?>
        </div>
    </div>

<?php
    }
}