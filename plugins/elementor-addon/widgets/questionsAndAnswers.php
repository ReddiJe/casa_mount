<?php


class Elementor_questionsAndAnswers extends \Elementor\Widget_Base
{

  public function get_name()
  {
    return 'questionsAndAnswers';
  }

  public function get_title()
  {
    return esc_html__('Frequently Asked Questions', 'elementor-addon');
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
      'Title-for-section',
      [
        'label' => esc_html__('Title for section', 'elementor-addon'),
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
      'section_title',
      [
        'label' => esc_html__('Questions', 'elementor-addon'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'qa_section',
      [
        'label' => esc_html__('Q&A Section', 'elementor-addon'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'question',
            'label' => esc_html__('Question', 'elementor-addon'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
          ],
          [
            'name' => 'answer',
            'label' => esc_html__('Answer', 'elementor-addon'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'label_block' => true,
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
      .containerQuestions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: -20px;
      }

      .questions {
        background-color: #fff;
        padding: 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        display: flex;

        justify-content: start;
        align-items: start;
        flex-direction: column;
        gap: 10px;
        font-family: 'Open Sans', sans-serif;

        min-width: 50%;
        padding-right: 25px;
      }

      .question {
        display: flex;
        justify-content: start;
        align-items: start;
        gap: 15px;
        padding: 24px 12px;

        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        font-family: 'Open Sans', sans-serif;
        width: 100%;
        transition: color 0.3s linear;
        cursor: pointer;
      }

      .question:hover {
        background: #FAFBFF;
      }

      .question.active {
        display: flex;
        justify-content: start;
        align-items: start;
        gap: 15px;
        padding: 24px 12px;
        color: #000;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        font-family: 'Open Sans', sans-serif;
      }

      .question .circle {
        width: 24px;
        height: 24px;
        border-radius: 12px;
        background: #668387;
      }

      .question.active .circle {
        width: 24px;
        height: 24px;
        border-radius: 12px;
        background: #0a0a0a;
      }

      .answers {
        color: var(--text-gray-900, #18191F);
        font-feature-settings: 'salt' on, 'liga' off;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        font-family: 'Open Sans', sans-serif;


        line-height: 28px;
        background-color: #FAFBFF;
        padding: 40px;
        margin-left: -20px;
        border-radius: 5px;
        box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.15);
        z-index: -1;
        min-width: 50%;
      }

      .answer {
        color: #000;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        font-size: 16px;
        margin: 0;
        padding: 0;
        font-family: 'Open Sans', sans-serif;
        display: none;
        max-width: 90%;
      }

      .answer.active {
        display: block;
      }

      .section-title {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: bold;
        color: #000;
        font-family: NewYork;
        font-size: 48px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
      }

      .desktop {
        display: block;
      }

      .mobile {
        display: none;
      }

      @media screen and (max-width: 600px) {
        details {
          max-width: 960px;
          margin: 1rem auto;
          background-color: #fff;
          border-radius: 1rem;
          box-shadow: 0 .25rem 1rem rgba(0, 0, 0, 0.1);
        }

        &:not([open]) {
          animation-name: fold-in;
          animation-duration: .2s;
        }

        summary {
          display: flex;
          align-items: center;
          justify-content: space-between;
          font-weight: 600;
          padding: 1.5rem;
        }

        summary::-webkit-details-marker,
        summary::marker {
          content: "";
          display: none;
        }

        summary::after {
          content: "+";
          font-size: 1.5rem;
          font-weight: 400;
          line-height: 1;
          margin-right: 1rem;
          cursor: pointer;
        }

        .content {
          padding: 0 1.5rem 1.5rem;
        }

        details[open] {

          summary::after {
            content: "-";
          }

          .content {
            animation-name: fold-out;
            animation-duration: .2s;
          }
        }

        @keyframes fold-out {
          0% {
            opacity: 0;
            margin-top: -1rem;
          }

          100% {
            opacity: 1;
            margin-top: 0;
          }
        }

        @keyframes fold-in {
          0% {
            padding-bottom: 1rem;
          }

          100% {
            padding-bottom: 0;
          }
        }

        /* .question {
          padding: 15px 10px;
        }

        .answers {
          width: 100%;
        }

        .question,
        .answer {
          font-size: 16px;
          font-weight: 400;
          line-height: 24px;
        }

        .questions,
        .answers {
          background: transparent;
          border: none;
          border-radius: 0;
          box-shadow: none;
        } */

        .answer {
          font-family: Urbanist;
          font-size: 14px;
          font-weight: 400;
          line-height: 17px;
          letter-spacing: 0em;
          text-align: left;

        }

        .question {
          font-family: Urbanist;
          font-size: 16px;
          font-weight: 400;
          line-height: 24px;
          letter-spacing: 0em;
          text-align: left;
        }

        .desktop {
          display: none;
        }

        .mobile {
          display: block;
        }
      }
    </style>

    <div class="section-title">
      <h2><?php echo esc_html($settings['title']); ?></h2>
    </div>


    <div class="desktop">
      <div class="containerQuestions">
        <div class="questions">
          <?php foreach ($settings['qa_section'] as $index => $item) : ?>
            <span id="<?php echo 'qa_' . $index; ?>" class="question <?php echo ($index === 0) ? 'active' : ''; ?>" onclick="openAnswer('<?php echo 'qa_' . $index; ?>'); this.classList.add('active')">
              <div class="circle"></div>
              <?php echo esc_html($item['question']); ?>
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 4L16 12L8 20" stroke="#1B2C34" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
          <?php endforeach; ?>

        </div>
        <div class="answers">
          <?php foreach ($settings['qa_section'] as $index => $item) : ?>
            <div class="answer <?php echo ($index === 0) ? 'active' : ''; ?>" id="<?php echo 'qa_' . $index; ?>">
              <h3><?php echo esc_html($item['question']); ?></h3>

              <p><?php echo esc_html($item['answer']); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="mobile">
      <div class="containerQuestions">
        <div class="content">
          <?php foreach ($settings['qa_section'] as $index => $item) : ?>
            <details id="<?php echo 'qa_' . $index; ?>" class="question">
              <summary>
                <?php echo esc_html($item['question']); ?>
              </summary>
              <div class="content">
                <p><?php echo esc_html($item['answer']); ?></p>
              </div>
            </details>
          <?php endforeach; ?>
        </div>
      </div>
    </div>


    <script>
      let questionsContainer = document.querySelector(".questions")
      let answersContainer = document.querySelector(".answers")

      function openAnswer(answerId) {
        let answer = answersContainer.querySelector('#' + answerId)
        let activeNow = answersContainer.querySelector(".active")
        if (activeNow && activeNow !== answer) {
          activeNow.classList.remove("active")
        }

        answer.classList.add("active")

        let questions = questionsContainer.children

        for (let i = 0; i < questions.length; i++) {
          questions[i].classList.remove('active')
        }
      }
    </script>



<?php
  }
}
