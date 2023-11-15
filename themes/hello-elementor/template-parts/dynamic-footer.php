<?php

/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$is_editor = isset($_GET['elementor-preview']);
$site_name = get_bloginfo('name');
$tagline   = get_bloginfo('description', 'display');
$footer_class = did_action('elementor/loaded') ? esc_attr(hello_get_footer_layout_class()) : '';
$footer_nav_menu = wp_nav_menu([
    'theme_location' => 'menu-2',
    'fallback_cb' => false,
    'echo' => false,
]);
?>
<style>
    .footerLogoContainer {
        margin-left: 25px;
        margin-top: 20px;
    }

    .footer {
        position: absolute;
        width: 100%;
        background-position: center bottom;
        background-size: cover;
        display: flex;
        background-image: url(http://casamounthomesja.com/wp-content/uploads/2023/11/Group-88-scaled.webp);
        justify-content: start;
        align-items: start;
        flex-direction: column;
        gap: 10px;
    }

    .footer h3,
    .footer a {
        color: white;
    }

    .footer ul {
        display: flex;
        width: 50rem;
        align-items: flex-start;
        align-content: flex-start;
        gap: 1.5rem 8rem;
        flex-wrap: wrap;
        list-style: none;
    }

    .footer h3 {
        font-size: 2rem;
        gap: 25px;
        padding-left: 25px;
    }

    .footer ul li a {
        font-size: 1.125rem;
        text-decoration: none;
        color: #fff;
        padding-bottom: 10px;
    }

    .footer ul li a:hover {
        text-decoration: underline;
    }

    .socialNetworksFooter {
        width: 100%;
        max-width: 100%;
        padding-left: 50px;
        padding-bottom: 10px;
        padding-top: 10px;
        padding: 10px 50px 10px 50px;
        display: flex;
        justify-content: start;
        align-items: start;
        gap: 35px;
    }

    .emailFooterContainer {
        display: flex;
        align-items: center;
        font-size: 20px;
        gap: 15px;
        padding: 10px 50px 10px 50px;
    }

    .site-navigation ul.menu {
        padding: 10px 30px 10px 30px;
    }

    .footer h3 {
        padding: 10px 40px 10px 40px;
    }


    @media screen and (max-width: 600px) {
        .footer-inner {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 15px;
            width: 100%;
            max-width: 100%;
        }

        .site-navigation ul.menu {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            max-width: 100%;
        }

        .socialNetworksFooter {
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 100%;
            padding: 0px 0px 5px 0px;
        }
    }
</style>
<footer id="site-footer" class="footer <?php echo esc_attr($footer_class); ?>" role="contentinfo">
    <div class="footer-inner">


        <div class="footerLogoContainer">
            <img src="/logo.png" alt="">
            <?php the_custom_logo(); ?>
        </div>
        <h3>Website Map</h3>
        <!-- <ul class="menuFooterContainer">
            <li><a href="#" class="active">Homepage</a></li>
            <li><a href="./Gallery.html">Gallery</a></li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./investors.html">Investors</a></li>
            <li><a href="./timeline.html">Timeline</a></li>
            <li><a href="./accommodation.html">Accommodation</a></li>
            <li><a href="./faq.html">FAQ</a></li>
            <li><a href="./facilities.html">Facilities</a></li>
            <li><a href="./collaboration.html">Colloboration</a></li>
            <li><a href="./Contacts.html">Contacts</a></li>
        </ul> -->
        <?php if ($footer_nav_menu) : ?>
            <nav class="site-navigation <?php echo esc_attr(hello_show_or_hide('hello_footer_menu_display')); ?>">
                <?php
                // PHPCS - escaped by WordPress with "wp_nav_menu"
                echo $footer_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                ?>
            </nav>
        <?php endif; ?>
        <div class="emailFooterContainer">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 20C3.45 20 2.979 19.804 2.587 19.412C2.195 19.02 1.99934 18.5493 2 18V6C2 5.45 2.196 4.979 2.588 4.587C2.98 4.195 3.45067 3.99934 4 4H20C20.55 4 21.021 4.196 21.413 4.588C21.805 4.98 22.0007 5.45067 22 6V18C22 18.55 21.804 19.021 21.412 19.413C21.02 19.805 20.5493 20.0007 20 20H4ZM12 13L4 8V18H20V8L12 13ZM12 11L20 6H4L12 11ZM4 8V6V18V8Z" fill="white" />
            </svg>
            <a class="email" href="mailto:">info@casamounthomesja.com</a>
        </div>
        <div class="socialNetworksFooter">
            <a href="www.facebook.com">
                <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M32.0833 17.6389C32.0833 9.58894 25.55 3.0556 17.5 3.0556C9.44996 3.0556 2.91663 9.58894 2.91663 17.6389C2.91663 24.6973 7.93329 30.5744 14.5833 31.9306V22.0139H11.6666V17.6389H14.5833V13.9931C14.5833 11.1785 16.8729 8.88894 19.6875 8.88894H23.3333V13.2639H20.4166C19.6145 13.2639 18.9583 13.9202 18.9583 14.7223V17.6389H23.3333V22.0139H18.9583V32.1494C26.3229 31.4202 32.0833 25.2077 32.0833 17.6389Z" fill="white" />
                </svg>
            </a>
            <a href="www.instagram.com">
                <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.9991 3.05703C20.0633 3.05295 21.1275 3.06364 22.1914 3.08911L22.4743 3.09932C22.801 3.11099 23.1233 3.12557 23.5127 3.14307C25.0643 3.21599 26.1231 3.46099 27.052 3.8212C28.0145 4.19161 28.8254 4.69328 29.6362 5.50411C30.3776 6.23271 30.9514 7.11404 31.3177 8.08682C31.6779 9.01578 31.9229 10.076 31.9958 11.6277C32.0133 12.0156 32.0279 12.3393 32.0395 12.666L32.0483 12.9489C32.0742 14.0123 32.0854 15.076 32.0818 16.1397L32.0833 17.2277V19.1381C32.0869 20.2023 32.0757 21.2665 32.0497 22.3304L32.041 22.6133C32.0293 22.9399 32.0147 23.2622 31.9972 23.6516C31.9243 25.2033 31.6764 26.262 31.3177 27.191C30.9526 28.1648 30.3786 29.0469 29.6362 29.7752C28.907 30.5165 28.0252 31.0902 27.052 31.4566C26.1231 31.8168 25.0643 32.0618 23.5127 32.1347C23.1233 32.1522 22.801 32.1668 22.4743 32.1785L22.1914 32.1872C21.1275 32.2132 20.0633 32.2243 18.9991 32.2208L17.9112 32.2222H16.0022C14.938 32.2258 13.8738 32.2147 12.8099 32.1887L12.527 32.18C12.1808 32.1674 11.8347 32.1528 11.4887 32.1362C9.93703 32.0633 8.87828 31.8154 7.94786 31.4566C6.97469 31.0911 6.09321 30.5172 5.36515 29.7752C4.62293 29.0464 4.04861 28.1645 3.68224 27.191C3.32203 26.262 3.07703 25.2033 3.00411 23.6516C2.98787 23.3056 2.97329 22.9595 2.96036 22.6133L2.95307 22.3304C2.92618 21.2665 2.91403 20.2023 2.91661 19.1381V16.1397C2.91254 15.076 2.92324 14.0123 2.9487 12.9489L2.9589 12.666C2.97057 12.3393 2.98515 12.0156 3.00265 11.6277C3.07557 10.0745 3.32057 9.01724 3.68078 8.08682C4.04736 7.11356 4.62281 6.23247 5.36661 5.50557C6.09417 4.76292 6.9751 4.18807 7.94786 3.8212C8.87828 3.46099 9.93557 3.21599 11.4887 3.14307L12.527 3.09932L12.8099 3.09203C13.8733 3.06516 14.9371 3.053 16.0008 3.05557L18.9991 3.05703ZM17.4999 10.3487C16.5338 10.335 15.5746 10.5135 14.678 10.8738C13.7815 11.2341 12.9655 11.7689 12.2774 12.4473C11.5894 13.1257 11.043 13.9341 10.6701 14.8254C10.2972 15.7168 10.1052 16.6734 10.1052 17.6396C10.1052 18.6059 10.2972 19.5625 10.6701 20.4538C11.043 21.3452 11.5894 22.1536 12.2774 22.832C12.9655 23.5103 13.7815 24.0452 14.678 24.4055C15.5746 24.7657 16.5338 24.9442 17.4999 24.9306C19.4338 24.9306 21.2885 24.1623 22.6559 22.7949C24.0234 21.4274 24.7916 19.5728 24.7916 17.6389C24.7916 15.705 24.0234 13.8504 22.6559 12.4829C21.2885 11.1155 19.4338 10.3487 17.4999 10.3487ZM17.4999 13.2654C18.0811 13.2547 18.6586 13.3599 19.1986 13.5748C19.7386 13.7898 20.2304 14.1102 20.6452 14.5174C21.0601 14.9246 21.3896 15.4103 21.6146 15.9463C21.8395 16.4822 21.9554 17.0576 21.9555 17.6389C21.9556 18.2201 21.8399 18.7956 21.6151 19.3316C21.3903 19.8676 21.061 20.3535 20.6463 20.7608C20.2316 21.1681 19.7399 21.4887 19.2 21.7039C18.66 21.919 18.0826 22.0244 17.5014 22.0139C16.3411 22.0139 15.2283 21.553 14.4078 20.7325C13.5873 19.912 13.1264 18.7992 13.1264 17.6389C13.1264 16.4786 13.5873 15.3658 14.4078 14.5453C15.2283 13.7248 16.3411 13.2639 17.5014 13.2639L17.4999 13.2654ZM25.1562 8.1612C24.6857 8.18003 24.2408 8.38017 23.9146 8.7197C23.5884 9.05923 23.4062 9.51181 23.4062 9.98266C23.4062 10.4535 23.5884 10.9061 23.9146 11.2456C24.2408 11.5851 24.6857 11.7853 25.1562 11.8041C25.6397 11.8041 26.1033 11.6121 26.4452 11.2702C26.7871 10.9283 26.9791 10.4647 26.9791 9.9812C26.9791 9.49773 26.7871 9.03406 26.4452 8.6922C26.1033 8.35034 25.6397 8.15828 25.1562 8.15828V8.1612Z" fill="white" />
                </svg>
            </a>
            <a href="www.linkedin.com">
                <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M29.8521 3.05556H5.1479C4.8702 3.05171 4.59446 3.10259 4.33643 3.20531C4.0784 3.30803 3.84313 3.46057 3.64406 3.65423C3.44499 3.84788 3.28602 4.07885 3.17622 4.33395C3.06642 4.58905 3.00795 4.86328 3.00415 5.14098V30.1368C3.00795 30.4145 3.06642 30.6887 3.17622 30.9438C3.28602 31.1989 3.44499 31.4299 3.64406 31.6236C3.84313 31.8172 4.0784 31.9698 4.33643 32.0725C4.59446 32.1752 4.8702 32.2261 5.1479 32.2222H29.8521C30.1298 32.2261 30.4055 32.1752 30.6635 32.0725C30.9216 31.9698 31.1568 31.8172 31.3559 31.6236C31.555 31.4299 31.7139 31.1989 31.8237 30.9438C31.9335 30.6887 31.992 30.4145 31.9958 30.1368V5.14098C31.992 4.86328 31.9335 4.58905 31.8237 4.33395C31.7139 4.07885 31.555 3.84788 31.3559 3.65423C31.1568 3.46057 30.9216 3.30803 30.6635 3.20531C30.4055 3.10259 30.1298 3.05171 29.8521 3.05556ZM11.7979 27.4681H7.4229V14.3431H11.7979V27.4681ZM9.6104 12.5056C9.00703 12.5056 8.42838 12.2659 8.00173 11.8392C7.57509 11.4126 7.3354 10.8339 7.3354 10.2306C7.3354 9.6272 7.57509 9.04854 8.00173 8.6219C8.42838 8.19525 9.00703 7.95556 9.6104 7.95556C9.93079 7.91923 10.2552 7.95097 10.5625 8.04873C10.8698 8.14648 11.1529 8.30803 11.3934 8.5228C11.6339 8.73757 11.8264 9.00072 11.9581 9.29502C12.0899 9.58931 12.158 9.90812 12.158 10.2306C12.158 10.553 12.0899 10.8718 11.9581 11.1661C11.8264 11.4604 11.6339 11.7236 11.3934 11.9383C11.1529 12.1531 10.8698 12.3146 10.5625 12.4124C10.2552 12.5102 9.93079 12.5419 9.6104 12.5056ZM27.5771 27.4681H23.2021V20.4243C23.2021 18.6597 22.575 17.5076 20.9854 17.5076C20.4935 17.5112 20.0144 17.6656 19.6129 17.9498C19.2113 18.234 18.9065 18.6345 18.7396 19.0972C18.6254 19.44 18.576 19.801 18.5937 20.1618V27.4535H14.2187V14.3285H18.5937V16.1806C18.9912 15.4909 19.5692 14.9228 20.2656 14.5373C20.962 14.1519 21.7504 13.9637 22.5458 13.9931C25.4625 13.9931 27.5771 15.8743 27.5771 19.9139V27.4681Z" fill="white" />
                </svg>
            </a>
        </div>

    </div>
</footer>