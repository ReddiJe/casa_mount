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
		padding-bottom: 73px;
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

	@media screen and (min-width:1100px) {
		.site-header {
			padding-bottom: 25px;
		}
	}

	@media screen and (max-width: 600px) {
		.pcEmail {
			display: none;
		}
	}
</style>

<header id="site-header" class="site-header dynamic-header <?php echo esc_attr(hello_get_header_layout_class()); ?>" role="banner">
	<div class="logoCheckBox">
		<a href="">
			<svg width="164" height="42" viewBox="0 0 164 42" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_114_28)">
					<path d="M18.4098 25.0211H10.115L8.21585 28.9157H0L14.4188 1.92676H21.5508L27.3651 28.9126H18.9944L18.413 25.0179L18.4098 25.0211ZM17.6356 19.4322L16.5107 11.8001L12.8294 19.4322H17.6356Z" fill="#010626" />
					<path d="M50.6701 8.67551L40.0116 28.9157H32.3393L28.1523 8.67551H36.4851L37.0286 15.2672C37.1835 17.0777 37.4173 18.9669 37.4931 21.8588C38.3463 18.9669 39.0826 17.0777 39.8188 15.3426L42.5712 8.67236H50.6701V8.67551Z" fill="#010626" />
					<path d="M68.1252 20.8971H56.4587C56.8063 22.9403 58.2788 23.7513 60.7594 23.7513C63.2399 23.7513 65.1011 23.2892 67.2309 22.5568L66.2608 28.2997C63.8972 29.1107 61.6473 29.4942 59.0909 29.4942C51.5734 29.4942 48.7832 25.5618 48.7832 20.0107C48.7832 12.7621 53.3967 8.05957 60.4876 8.05957C65.6415 8.05957 68.9752 10.6026 68.9752 15.5785C68.9752 18.1215 68.4728 19.7026 68.122 20.9002L68.1252 20.8971ZM56.8853 16.5027H62.1561V16.0029C62.1561 14.6135 61.2271 14.076 59.9473 14.076C58.5917 14.076 57.5046 14.887 56.8853 16.5058V16.5027Z" fill="#010626" />
					<path d="M86.5879 8.28904L85.4251 15.5754C84.9985 15.4213 84.2243 15.3836 83.605 15.3836C82.4421 15.3836 80.1543 15.8457 79.0704 18.0838L77.3262 28.9158H69.7676L72.9844 8.67567H79.3011L79.456 10.4485C81.1623 8.75111 82.8276 8.05957 84.8057 8.05957C85.4251 8.05957 86.2024 8.13815 86.5879 8.29218V8.28904Z" fill="#010626" />
					<path d="M90.0901 0H97.6487L93.0351 28.9158H85.4766L90.0901 0Z" fill="#010626" />
					<path d="M116.422 20.8971H104.756C105.103 22.9403 106.576 23.7513 109.056 23.7513C111.537 23.7513 113.398 23.2892 115.528 22.5568L114.558 28.2997C112.194 29.1107 109.944 29.4942 107.388 29.4942C99.8703 29.4942 97.0801 25.5618 97.0801 20.0107C97.0801 12.7621 101.694 8.05957 108.785 8.05957C113.938 8.05957 117.272 10.6026 117.272 15.5785C117.272 18.1215 116.77 19.7026 116.419 20.9002L116.422 20.8971ZM105.182 16.5027H110.453V16.0029C110.453 14.6135 109.524 14.076 108.244 14.076C106.889 14.076 105.802 14.887 105.182 16.5058V16.5027Z" fill="#010626" />
					<path d="M133.218 18.9669L138.062 28.9125H130.348L127.906 23.399L124.032 28.9125H115.971L124.266 18.2722L119.576 8.67236H127.29L129.577 13.7992L133.183 8.67236H141.244L133.221 18.9669H133.218Z" fill="#010626" />
					<path d="M155.052 18.9669L159.896 28.9125H152.182L149.74 23.399L145.866 28.9125H137.805L146.1 18.2722L141.41 8.67236H149.124L151.411 13.7992L155.017 8.67236H163.078L155.055 18.9669H155.052Z" fill="#010626" />
					<path d="M0.00316001 37.6935C0.00316001 35.0027 1.53889 33.4971 4.19956 33.4971C5.04642 33.4971 5.66893 33.5851 6.13661 33.7737V35.7226C5.77953 35.5465 5.23602 35.424 4.49976 35.424C3.09674 35.424 2.34152 36.1218 2.34152 37.6149C2.34152 39.108 3.06514 39.7304 4.49976 39.7304C5.23286 39.7304 5.76689 39.5763 6.19032 39.3437V41.2926C5.69105 41.5347 4.93267 41.6918 4.13004 41.6918C1.48201 41.6918 0 40.2867 0 37.6966L0.00316001 37.6935Z" fill="#056CF2" />
					<path d="M12.7343 39.4982V41.4691H7.22656V33.7207H9.5428V39.4982H12.7375H12.7343Z" fill="#056CF2" />
					<path d="M19.1674 39.696V41.4657H13.4922V33.7173H19.1011V35.487H15.8084V36.65H18.8894V38.4198H15.8084V39.6928H19.1706L19.1674 39.696Z" fill="#056CF2" />
					<path d="M24.7304 40.3941H22.3257L21.9812 41.4691H19.5449L22.5058 33.7207H24.6103L27.5712 41.4691H25.078L24.7335 40.3941H24.7304ZM24.2058 38.7564L23.5264 36.6315L22.8471 38.7564H24.2058Z" fill="#056CF2" />
					<path d="M35.059 33.7207V41.4691H33.0556L30.3412 37.4833C30.3538 37.8259 30.3538 38.1686 30.3538 38.5143V41.4691H28.2051V33.7207H30.2085L32.9229 37.7065C32.9102 37.3419 32.9102 36.9647 32.9102 36.6V33.7207H35.059Z" fill="#056CF2" />
					<path d="M38.7537 33.7207V41.4691H36.4375V33.7207H38.7537Z" fill="#056CF2" />
					<path d="M46.9887 33.7207V41.4691H44.9853L42.2709 37.4833C42.2835 37.8259 42.2835 38.1686 42.2835 38.5143V41.4691H40.1348V33.7207H42.1382L44.8526 37.7065C44.8399 37.3419 44.8399 36.9647 44.8399 36.6V33.7207H46.9887Z" fill="#056CF2" />
					<path d="M55.0337 37.5929V41.0569C54.2216 41.4215 53.0082 41.6887 52.0855 41.6887C49.4375 41.6887 47.9902 40.1264 47.9902 37.6495C47.9902 35.1725 49.2826 33.4971 52.174 33.4971C52.8976 33.4971 53.8108 33.5977 54.6893 33.8523V35.8232C53.9088 35.556 53.2421 35.424 52.3194 35.424C50.8942 35.424 50.3286 36.2884 50.3286 37.5929C50.3286 38.8974 50.9416 39.7618 52.1329 39.7618C52.3889 39.7618 52.6448 39.7398 52.8787 39.7052V37.5897H55.0369L55.0337 37.5929Z" fill="#056CF2" />
					<path d="M58.0299 41.2363V39.1774C58.7978 39.5986 59.6763 39.7966 60.7443 39.7966C61.7113 39.7966 62.081 39.63 62.081 39.2528C62.081 38.8756 61.7808 38.7561 60.324 38.4544C58.6998 38.0992 58.0078 37.3793 58.0078 36.0403C58.0078 34.39 59.2528 33.4941 61.2562 33.4941C62.3464 33.4941 63.1364 33.6167 63.8505 33.8933V35.7982C63.0163 35.531 62.2042 35.3896 61.4458 35.3896C60.5452 35.3896 60.1218 35.4776 60.1218 35.8548C60.1218 36.1534 60.343 36.254 61.5469 36.4961C63.5156 36.9267 64.3277 37.5711 64.3277 39.0422C64.3277 40.7585 63.0827 41.6889 60.7664 41.6889C59.6099 41.6889 58.6746 41.5349 58.0299 41.2363Z" fill="#056CF2" />
					<path d="M70.9604 39.696V41.4657H65.2852V33.7173H70.8941V35.487H67.6014V36.65H70.6823V38.4198H67.6014V39.6928H70.9636L70.9604 39.696Z" fill="#056CF2" />
					<path d="M78.7274 39.6522V41.5131C78.4146 41.5917 78.0259 41.6357 77.6909 41.6357C76.8662 41.6357 76.3448 41.3591 75.9214 40.5827L75.1093 39.1116H74.3983V41.4691H72.082V33.7207H75.4C77.514 33.7207 78.5947 34.6731 78.5947 36.4649C78.5947 37.5399 78.127 38.2692 77.3591 38.6904L77.792 39.3976C77.9374 39.6397 78.127 39.7088 78.3261 39.7088C78.4493 39.7088 78.5947 39.6868 78.7274 39.6522ZM74.3983 37.3482H75.2546C75.9435 37.3482 76.3227 37.037 76.3227 36.4617C76.3227 35.9305 75.9435 35.6193 75.2546 35.6193H74.3983V37.345V37.3482Z" fill="#056CF2" />
					<path d="M86.7745 33.7207L83.8483 41.4691H81.7343L78.8398 33.7207H81.3994L82.4011 36.8861C82.5686 37.4299 82.7455 38.1026 82.8782 38.6464C83.0236 38.1026 83.2006 37.4299 83.368 36.8766L84.3476 33.7207H86.7745Z" fill="#056CF2" />
					<path d="M89.7225 33.7207V41.4691H87.4062V33.7207H89.7225Z" fill="#056CF2" />
					<path d="M90.7258 37.6935C90.7258 35.0027 92.2616 33.4971 94.9222 33.4971C95.7691 33.4971 96.3916 33.5851 96.8593 33.7737V35.7226C96.5022 35.5465 95.9587 35.424 95.2224 35.424C93.8194 35.424 93.0642 36.1218 93.0642 37.6149C93.0642 39.108 93.7878 39.7304 95.2224 39.7304C95.9555 39.7304 96.4927 39.5763 96.913 39.3437V41.2926C96.4137 41.5347 95.6553 41.6918 94.8527 41.6918C92.2047 41.6918 90.7227 40.2867 90.7227 37.6966L90.7258 37.6935Z" fill="#056CF2" />
					<path d="M103.624 39.696V41.4657H97.9492V33.7173H103.558V35.487H100.265V36.65H103.35V38.4198H100.265V39.6928H103.628L103.624 39.696Z" fill="#056CF2" />
				</g>
				<defs>
					<clipPath id="clip0_114_28">
						<rect width="163.078" height="41.6921" fill="white" />
					</clipPath>
				</defs>
			</svg>
		</a>
		<div class="checkboxHomeOffice">
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

<!-- <header id="site-header" class="site-header dynamic-header <?php echo esc_attr(hello_get_header_layout_class()); ?>" role="banner">
	<div class="header-inner">
		<div class="site-branding show-<?php echo esc_attr(hello_elementor_get_setting('hello_header_logo_type')); ?>">
			<?php if (has_custom_logo() && ('title' !== hello_elementor_get_setting('hello_header_logo_type') || $is_editor)) : ?>
				<div class="site-logo <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif;

			if ($site_name && ('logo' !== hello_elementor_get_setting('hello_header_logo_type') || $is_editor)) : ?>
				<h1 class="site-title <?php echo esc_attr(hello_show_or_hide('hello_header_logo_display')); ?>">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr__('Home', 'hello-elementor'); ?>" rel="home">
						<?php echo esc_html($site_name); ?>
					</a>
				</h1>
			<?php endif; ?>
		</div>
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

		<a href="tel:+1 234 56 78" class="phoneHeader pcEmail">+1 234 56 78</a>
	</div>
</header> -->