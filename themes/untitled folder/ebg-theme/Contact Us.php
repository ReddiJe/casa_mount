<?php /* 
Template Name: Contact Page Template 
*/ ?>

<?php
get_header();
?>

<div class="screen">
        <h1 class="title">
            Contact us
        </h1>
        <h2 class="subTitle">
            Just call or mail us, and we will answer all your questions.
        </h2>
        <div class="contactBlock">
            <div class="oneContactBlock">
                <img src="<?php echo get_template_directory_uri();?>/inc/images/mail.webp" alt="">
                <a href="mailto:info@electricboatgroup.com" class="contactsText">info@electricboatgroup.com</a>
            </div>
            <div class="oneContactBlock">
                <img src="<?php echo get_template_directory_uri();?>/inc/images/phone.webp" alt="">
                <a href="tel:+1 (305) 330-1300" class="contactsText">+1 (305) 330-1300</a>
            </div>
            <div class="oneContactBlock">
                <img src="<?php echo get_template_directory_uri();?>/inc/images/map.webp" alt="">
                <a href="https://goo.gl/maps/Dbhe7Qek6dAKSji16" class="contactsText">2600 SW 3rd Ave, Fort Lauderdale FL 33315</a>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3583.260424006965!2d-80.14449379999999!3d26.090416299999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d90087a0e11ba3%3A0xb33bd1f51175439d!2zMjYwMCBTVyAzcmQgQXZlLCBGb3J0IExhdWRlcmRhbGUsIEZMIDMzMzE1LCDQodCo0JA!5e0!3m2!1sru!2sua!4v1654796959981!5m2!1sru!2sua" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

<?php
get_footer();
?>