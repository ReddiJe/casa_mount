<?php

/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (!hello_get_header_display()) {
	return;
}

$is_editor = isset($_GET['elementor-preview']);
$site_name = get_bloginfo('name');
$tagline   = get_bloginfo('description', 'display');
$header_nav_menu = wp_nav_menu([
	'theme_location' => 'menu-1',
	'fallback_cb' => false,
	'echo' => false,
]);
?>

<style>
	header a {
		background: transparent;
		color: #2c2d2c;
		font-size: 15px;
		font-style: normal;
		font-family: 'Open Sans', sans-serif;
		font-weight: 200;
	}

	.phoneHeader {
		color: #056CF2;
		font-family: 'Open Sans', sans-serif;
		font-size: 17px;
		font-style: normal;
		font-weight: 600;
		padding-right: 30px;
	}

	.site-header {
		z-index: 1000;
		width: 100vw;
		padding-bottom: 25px;
		overflow: visible;
	}

	.site-navigation-toggle i {
		color: #fff;
	}

	.site-navigation-dropdown ul.menu {
		background: rgba(26, 43, 50, 0.90);
	}

	.site-navigation-dropdown ul.menu li a {
		background: transparent;
		color: #fff;
	}

	.pcEmail {
		display: block;
	}

	.mobile {
		display: none;
	}

	.site-header {
		width: 100%;
		max-width: 100%;
		background-color: #fff;
	}

	header {
		top: 0;
		position: fixed;
		display: flex;
		width: 100%;
		padding: 25px;
		justify-content: space-between;
		align-items: center;
		background: rgba(255, 255, 255, 0.85);
		backdrop-filter: blur(2px);
		z-index: 10;
	}

	header .logo {
		height: 40px;
		object-fit: contain;
	}

	.logoCheckBox {
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 25px;
		margin-left: 25px;
	}

	.desktopNav ul {
		display: flex;
		align-items: flex-start;
		gap: 25px;
		list-style: none;
	}

	..site-navigation ul.menu li a a {
		color: #2c2d2c;
		font-size: 18px;
		font-style: normal;
		font-weight: 300;
	}

	.desktopNav ul li a {
		color: #2c2d2c;
		font-size: 15px;
		font-style: normal;
		font-weight: 300;
	}

	.desktopNav ul li a:hover {
		text-decoration: underline;
	}

	.phoneHeader {
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 5px;
		color: #056CF2;
		font-size: 18px;
		font-weight: 600;
	}

	.phoneNavContainer {
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 25px;
	}

	.checkboxHomeOffice {
		border: 1px solid var(--blueLight);
		border-radius: 10px;
		padding: 3px;
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 10px;
	}

	.checkboxInner {
		color: var(--blue);
	}

	.activeHomeOffice {
		color: #fff;
		background: var(--blueLight);
		font-weight: 600;
		padding: 3px 5px;
		border-radius: 6px;
	}

	.sideMobNavigation {
		position: fixed;
		right: 0;
		top: 90px;
		height: 100vh;
		background: #fff;
		display: none;
		justify-content: start;
		align-items: end;
		flex-direction: column;
		padding: 25px;
		background: #fff;
		z-index: 1000;
	}

	.closeSideNav,
	.openSideNav {
		display: none;
	}

	.sideMobNavigation.open,
	.closeSideNav.open,
	.openSideNav.open {
		display: flex;
	}

	.sideMobNavigation ul {
		list-style: none;
		display: flex;
		justify-content: start;
		align-items: end;
		flex-direction: column;
		gap: 25px;
	}

	.phoneNavContainer span {
		cursor: pointer;
	}

	.site-navigation ul.menu {
		padding: 0 10px;
	}


	.orderNowButoon {
		position: fixed;
		display: flex;
		justify-content: center;
		align-items: end;
		bottom: 0;
		left: 50%;
		transform: translateX(-50%);
		border-radius: 200px 200px 0rem 0rem;
		border: 1px solid #fff;
		height: 100px;
		width: 200px;
		text-align: center;
		border-bottom: none;
		z-index: 10;
	}

	.orderNowInnerButton {
		display: flex;
		justify-content: center;
		align-items: end;
		border-radius: 175px 175px 0rem 0rem;
		background: #056CF2;
		color: #fff;
		font-family: Urbanist;
		font-size: 1rem;
		font-weight: 500;
		height: 87.5px;
		width: 175px;
		text-align: center;
		padding-bottom: 15px;
		transition: all linear 300ms;
	}

	.orderNowButoon:hover .orderNowInnerButton {
		border-radius: 200px 200px 0rem 0rem;
		height: 100px;
		width: 200px;
		padding-bottom: 20px;
		background: var(--blueDark);
	}

	.phoneNavContainer span {
		display: none;
	}

	.site-navigation-dropdown ul.menu {
		display: flex;
		jusctify-content: center;
		align-items: center;
		flex-direction: column;
	}

	.menu-item a {
		text-align: center;
	}

	@media screen and (min-width:1100px) {
		.site-header {
			padding-bottom: 25px;
		}
	}

	@media screen and (max-width: 1600px) {
		.phoneHeader {
			display: none;
		}
	}

	@media screen and (max-width: 600px) {
		header {
			padding: 5px;
		}

		.phoneNavContainer span {
			display: block;
		}

		.pcEmail {
			display: none;
		}

		.checkboxHomeOffice {
			display: none;
		}

		.orderNowButoon {
			display: none;
		}
	}
</style>

<header id="site-header" class="site-header dynamic-header <?php echo esc_attr(hello_get_header_layout_class()); ?>" role="banner">
	<div class="logoCheckBox">
		<a href="averlexx.com"> <img src="<?php echo esc_url($logo_url); ?>" alt="">
		</a>
		<div class="site-branding show-<?php echo esc_attr(hello_elementor_get_setting('hello_header_logo_type')); ?>">
      <?php if (has_custom_logo() && ('title' !== hello_elementor_get_setting('hello_header_logo_type')  $is_editor)) : ?>
        <div class="site-logo <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
          <?php the_custom_logo(); ?>
        </div>
      <?php endif; ?>

		<div class="checkboxHomeOffice">
			<a href="https://averlexx.com/" class="chacboxInner activeHomeOffice">Home</a>
			<a href="https://averlexx.com/?page_id=66" class="chacboxInner">Office</a>
		</div>
	</div>

	<nav class="desktopNav">
		<?php if ($header_nav_menu) : ?>
			<nav class="site-navigation <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $header_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>
			<div class="site-navigation-toggle-holder <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
				<div class="site-navigation-toggle" role="button" tabindex="0">
					<i class="eicon-menu-bar" aria-hidden="true"></i>
					<span class="screen-reader-text"><?php echo esc_html__('Menu', 'hello-elementor'); ?></span>
				</div>
			</div>
			<nav class="site-navigation-dropdown <?php echo esc_attr(hello_show_or_hide('hello_header_menu_display')); ?>">
				<?php
				// PHPCS - escaped by WordPress with "wp_nav_menu"
				echo $header_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</nav>

		<?php endif; ?>
		</div>
	</nav>
	<div class="phoneNavContainer">
		<a href="tel:+1 234 56 78" class="phoneHeader pcEmail">
			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
				<path d="M17.0576 15.7673L16.36 15.1057L17.0576 15.7686V15.7673ZM21.4761 23.0841L20.7773 22.4213L21.4748 23.0841H21.4761ZM19.7759 23.9944L19.8708 24.9495L19.7759 23.9931V23.9944ZM1.92218 5.99531C1.91536 5.8692 1.88376 5.74567 1.8292 5.63178C1.77463 5.51788 1.69817 5.41584 1.60417 5.3315C1.51016 5.24715 1.40047 5.18214 1.28134 5.14018C1.16221 5.09822 1.03598 5.08014 0.90986 5.08695C0.78374 5.09377 0.660198 5.12536 0.546289 5.17992C0.432379 5.23448 0.330332 5.31094 0.245974 5.40493C0.161616 5.49892 0.0965989 5.6086 0.0546354 5.72772C0.0126719 5.84683 -0.00541655 5.97305 0.00140301 6.09915L1.92218 5.99531ZM3.16081 1.08111C2.99241 1.26719 2.90343 1.51172 2.91289 1.7625C2.92234 2.01328 3.02947 2.25042 3.21141 2.42329C3.39334 2.59617 3.63566 2.69108 3.88662 2.68775C4.13758 2.68442 4.3773 2.58313 4.55459 2.40549L3.16081 1.08111ZM10.7849 22.5174C10.8919 22.5863 11.0114 22.6333 11.1366 22.6557C11.2619 22.6781 11.3903 22.6754 11.5145 22.6478C11.6387 22.6202 11.7561 22.5683 11.8601 22.495C11.9641 22.4217 12.0525 22.3285 12.1201 22.2207C12.1878 22.113 12.2335 21.993 12.2544 21.8675C12.2754 21.7421 12.2712 21.6137 12.2422 21.4898C12.2132 21.366 12.1599 21.2491 12.0854 21.146C12.0108 21.0429 11.9166 20.9556 11.8081 20.8892L10.7849 22.5174ZM16.4895 22.8328C16.2398 22.7806 15.9795 22.8298 15.7659 22.9695C15.5524 23.1092 15.4031 23.3279 15.3509 23.5777C15.2987 23.8274 15.3479 24.0877 15.4876 24.3012C15.6273 24.5147 15.8461 24.664 16.0959 24.7162L16.4895 22.8328ZM17.1717 17.0455L17.7551 16.4301L16.36 15.1057L15.7766 15.7211L17.1717 17.0455ZM19.6772 16.1711L22.1262 17.5814L23.0853 15.9147L20.6363 14.5044L19.6772 16.1711ZM22.5993 20.5046L20.7773 22.4213L22.1724 23.7469L23.9931 21.8289L22.5993 20.5046ZM7.82939 17.5776C2.85948 12.3454 2.02604 7.93124 1.92218 5.99531L0.00140301 6.09915C0.129626 8.47099 1.13489 13.3224 6.43561 18.902L7.82939 17.5776ZM9.59373 9.06844L9.96045 8.68125L8.56667 7.35687L8.19867 7.74406L9.59373 9.06844ZM10.2502 3.86065L8.63335 1.57471L7.06262 2.68499L8.67822 4.97093L10.2502 3.86065ZM8.89492 8.40561C8.66415 8.18324 8.4312 7.96314 8.19611 7.74534L8.19354 7.7479L8.1897 7.75175C8.16693 7.7753 8.14553 7.80013 8.12558 7.82611C7.99989 7.99246 7.90044 8.17708 7.83067 8.37356C7.70501 8.72613 7.63834 9.1928 7.72297 9.77487C7.88965 10.9185 8.63976 12.4557 10.5977 14.5185L11.9928 13.1929C10.1618 11.2659 9.71042 10.08 9.62579 9.49537C9.58476 9.21332 9.62579 9.06588 9.64246 9.01844L9.65272 8.99408C9.64223 9.01096 9.63021 9.02684 9.61681 9.04152C9.6093 9.05022 9.6016 9.06005 9.59373 9.06844L8.89492 8.40561ZM10.5977 14.5173C12.5505 16.5737 14.0251 17.3814 15.1496 17.5648C15.7279 17.6583 16.1959 17.5827 16.5498 17.443C16.7459 17.366 16.9282 17.2577 17.0896 17.1224L17.1358 17.0789L17.1537 17.0609C17.1568 17.0584 17.1597 17.0558 17.1627 17.0532L17.1666 17.0494L17.1678 17.0468C17.1678 17.0468 17.1704 17.0455 16.4729 16.3827C15.7753 15.7211 15.7766 15.7199 15.7766 15.7186L15.7792 15.7173L15.7818 15.7134L15.7894 15.707C15.8088 15.6883 15.8289 15.6703 15.8497 15.6532C15.8613 15.6455 15.86 15.6481 15.8433 15.6545C15.8177 15.6647 15.7023 15.7057 15.4586 15.666C14.9432 15.5814 13.8302 15.1275 11.9928 13.1929L10.5977 14.5173ZM8.63335 1.57471C7.33317 -0.263789 4.73282 -0.575334 3.16081 1.08111L4.55459 2.40549C5.22519 1.70035 6.40612 1.75548 7.06262 2.68499L8.63335 1.57471ZM20.7773 22.4213C20.4196 22.7982 20.0464 23.0008 19.6823 23.0367L19.8708 24.9495C20.8286 24.8559 21.6043 24.3457 22.1724 23.7469L20.7773 22.4225V22.4213ZM9.96045 8.68125C11.2016 7.37482 11.2888 5.33119 10.2502 3.86065L8.67951 4.97093C9.22061 5.73633 9.13726 6.75686 8.56667 7.35687L9.96045 8.68125ZM22.1262 17.5814C23.1789 18.1878 23.3854 19.6776 22.5993 20.5046L23.9931 21.8289C25.6664 20.0674 25.1779 17.1199 23.0853 15.9147L22.1262 17.5814ZM17.7551 16.4301C18.2488 15.9096 19.0194 15.7929 19.6772 16.1711L20.6363 14.5044C19.2271 13.6942 17.482 13.9262 16.36 15.1057L17.7551 16.4301ZM11.8081 20.8892C10.5477 20.0969 9.20522 19.025 7.82939 17.5776L6.43561 18.902C7.9153 20.4597 9.38088 21.6353 10.7849 22.5174L11.8081 20.8892ZM19.681 23.0367C18.613 23.1304 17.5369 23.0617 16.4895 22.8328L16.0959 24.7162C17.3351 24.9846 18.6079 25.0632 19.8708 24.9495L19.6823 23.0367H19.681Z" fill="#056CF2" />
			</svg>
			+1 234 56 78
		</a>
		<span onclick="openMenu()">
			<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none" class="openSideNav open">
				<path d="M8 10H30M8 18.5H30M20.375 27H30" stroke="#056CF2" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
			<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none" class="closeSideNav">
				<g clip-path="url(#clip0_317_671)">
					<path d="M19.41 18L27.7 9.71C27.8638 9.5187 27.9494 9.27262 27.9397 9.02095C27.93 8.76927 27.8256 8.53053 27.6475 8.35244C27.4694 8.17434 27.2307 8.07001 26.979 8.06029C26.7274 8.05057 26.4813 8.13618 26.29 8.3L18 16.59L9.70997 8.29C9.52167 8.1017 9.26627 7.99591 8.99997 7.99591C8.73367 7.99591 8.47828 8.1017 8.28997 8.29C8.10167 8.47831 7.99588 8.7337 7.99588 9C7.99588 9.2663 8.10167 9.5217 8.28997 9.71L16.59 18L8.28997 26.29C8.18529 26.3796 8.10027 26.49 8.04025 26.614C7.98022 26.7381 7.94649 26.8732 7.94117 27.0109C7.93586 27.1487 7.95906 27.286 8.00934 27.4143C8.05961 27.5427 8.13587 27.6592 8.23332 27.7567C8.33078 27.8541 8.44733 27.9304 8.57565 27.9806C8.70398 28.0309 8.84131 28.0541 8.97903 28.0488C9.11675 28.0435 9.25188 28.0098 9.37594 27.9497C9.50001 27.8897 9.61033 27.8047 9.69997 27.7L18 19.41L26.29 27.7C26.4813 27.8638 26.7274 27.9494 26.979 27.9397C27.2307 27.93 27.4694 27.8257 27.6475 27.6476C27.8256 27.4695 27.93 27.2307 27.9397 26.9791C27.9494 26.7274 27.8638 26.4813 27.7 26.29L19.41 18Z" fill="#056CF2" />
				</g>
				<defs>
					<clipPath id="clip0_317_671">
						<rect width="36" height="36" fill="white" />
					</clipPath>
				</defs>
			</svg>
		</span>
	</div>
</header>

<a href="https://averlexx.com/?page_id=239" class="orderNowButoon animate__fadeInUp">
	<div class="orderNowInnerButton">
		Order</br>Cleaning Service
	</div>
</a>