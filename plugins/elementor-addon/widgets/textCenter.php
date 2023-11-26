<?php


class Elementor_textCenter extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'textCenter';
    }

    public function get_title()
    {
        return esc_html__('Center Text', 'elementor-addon');
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
            .textCenter {
                width: 100%;
                padding: 150px;
                text-align: center;
                font-size: 1.25rem;
                color: var(--black);
                font-weight: 300;
            }

            @media screen and (min-width: 1600px) {
                .pageWidth {
                    padding: 25px 15%;
                }

                .pageWidth.heroSectionColumn {
                    padding: 150px 15%;
                }

                .pageWidth.oneArticleContainerInner {
                    padding-top: 200px;
                }
            }

            @media screen and (max-width: 600px) {
                .textCenter {
                    padding: 25px;
                    font-size: 1.15rem;
                    font-weight: 400;
                }
            }
        </style>

        <p class="textCenter pageWidth">
            <?php echo $settings['title']; ?>
        </p>

<?php
    }
}
