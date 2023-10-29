<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ORTTEH
 */

get_header();
?>

<div class="main">
			<div class="mainContainer">
				<div class="mainContent">
					<div class="mainLogoBloc">
						<img class="mainLogoBlocImg" src="<?php echo get_template_directory_uri(); ?>/inc/img/main-logo.png" alt="icon-logo">
						<p class="mainLogoBlocText">
							Підприємство Центр протезно-ортопедичної реабілітації інвалідів «ОРТТЕХ» реалізує
							державну програму із забезпечення осіб з інвалідністю допоміжними засобами
							реабілітації – що дає вам право на безкоштовне протезування, ортезування.</br>
							Насамперед вам необхідно написати заяву в Управління соціального захисту
							населення(ЦНАП,ОТГ) за місцем проживання чи перебування.
							</br>
							</br>
							До ваших послуг</br>
							- Сучасне протезування та ортезування</br>
							- Індивідуальна стратегія реабілітації</br>
							- Технологічна, інформаційна та консультаційна допомога
						</p>
						<div class="mainLogoBlocButton">
							<a href="./services.html" class="mainLogoBlocButtonLink">Послуги</a>
						</div>
					</div>
					<div class="mainHeroImgs">
						<img class="mainHeroImg" src="<?php echo get_template_directory_uri(); ?>/inc/img/hero-img.png" alt="hero-img">
					</div>
				</div>
				<div class="mainScrollingButtom">
					<a href="#partners" class="mainScrollingButtomLink">
						<img class="mainScrollingButtomLinkImg1" src="<?php echo get_template_directory_uri(); ?>/inc/img/button__anim.png" alt="point">
						<img class="mainScrollingButtomLinkImg2" src="<?php echo get_template_directory_uri(); ?>/inc/img/arrow__anim.png" alt="point">
					</a>
				</div>
				<!-- Дописать js  для плавного скролла ( видео на ютубе ) -->
			</div>
		</div>
		<div class="partners" id="partners">
			<div class="partnersContainer">
				<div class="partnersTitles">
					<h2 class="partnersTitle bigTitle">Наші Партнери</h2>
				</div>
				<div class="partnersCarousel">
					<span id="item1"></span>
					<span id="item2"></span>
					<span id="item3"></span>
					<div class="carouselItem item1">
						<a href="#item3" class="arrow-prew arrow"></a>
						<a href="#item2" class="arrow-next arrow"></a>
						<div class="carouselItemBody">
							<a class="carouselItemBodyLink" href="https://ottobock.com.ua/">
								<img class="carouselItemBodyLogo" src="<?php echo get_template_directory_uri(); ?>/inc/img/ottobock.png" alt="icon">
							</a>
							<div class="carouselItemBodyContent">
								<h3 class="carouselItemContentTitle">
									OTTOBOCK (ОттоБокк)
								</h3>
								<p class="carouselItemContentText">Фирменная группа ОТТО БОКК - всемирно известный
									ортопедический концерн, работающий на рынке более 90 лет. Головное
									предприятие фирменной группы находится в Германии (г.Дудерштадт, Нижняя Саксония), дочерние
									предприятия расположены в 35
									странах мира, в том числе и в Украине.</p>
								<a href="https://ottobock.com.ua/" target="_blank" class="carouselItemContentLink">Відвідати
									вебсайт</a>
							</div>
						</div>
					</div>

					<div class="carouselItem item2">
						<a href="#item1" class="arrow-prew arrow"></a>
						<a href="#item3" class="arrow-next arrow"></a>
						<div class="carouselItemBody">
							<a class="carouselItemBodyLink" href="https://ottobock.com.ua/">
								<img class="carouselItemBodyLogo" target="_blank" src="/img/icon/partner__logo.png" alt="icon">
							</a>
							<div class="carouselItemBodyContent">
								<h3 class="carouselItemContentTitle">
									Уля-ля !!!!!
								</h3>
								<p class="carouselItemContentText">Фирменная группа ОТТО БОКК - всемирно известный
									ортопедический концерн, работающий на рынке более 90 лет. Головное
									предприятие фирменной группы находится в Германии (г.Дудерштадт, Нижняя Саксония), дочерние
									предприятия расположены в 35
									странах мира, в том числе и в Украине.</p>
								<a target="_blank" href="https://rt.pornhub.com/pornstar/kenzie-reeves"
									class="carouselItemContentLink">Відвідати вебсайт</a>
							</div>
						</div>
					</div>
					<div class="carouselItem item3">
						<a href="#item2" class="arrow-prew arrow"></a>
						<a href="#item1" class="arrow-next arrow"></a>
						<div class="carouselItemBody">
							<a class="carouselItemBodyLink" href="https://ottobock.com.ua/">
								<img class="carouselItemBodyLogo" src="/img/icon/partner__logo.png" alt="icon">
							</a>
							<div class="carouselItemBodyContent">
								<h3 class="carouselItemContentTitle">
									Новые Ножки Подьехали
								</h3>
								<p class="carouselItemContentText">Фирменная группа ОТТО БОКК - всемирно известный
									ортопедический концерн, работающий на рынке более 90 лет. Головное
									предприятие фирменной группы находится в Германии (г.Дудерштадт, Нижняя Саксония), дочерние
									предприятия расположены в 35
									странах мира, в том числе и в Украине.</p>
								<a href="https://ottobock.com.ua/" class="carouselItemContentLink">Відвідати вебсайт</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="info">
			<div class="infoContainer">
				<div class="infoTitleBloc">
					<h2 class="infoTitleBlocTitle bigTitle">Як безкоштовно</h2>
					<h3 class="infoTitleBlocSubTitle subTitle">ОТРИМАТИ ПРОТЕЗНО-ОРТОПЕДИЧНИЙ ВИРІБ?</h3>
				</div>
				<div class="infoListBlock">
					<ul class="infoList">
						<li class="infoListItem">
							<h4 class="infoListItemTitle">ІНВАЛІДАМ ПРАЦІ</h4>
							<p class="infoListItemText">«Центр протезно-ортопедической реабилитации инвалидов «ОРТТЕХ»
								обеспечит инвалидов трудового увечья, получивших травму
								на производстве, малосложной индивидуальной ортопедической обувью и обувью на протезы.</p>
						</li>
						<li class="infoListItem">
							<h4 class="infoListItemTitle">ЧТО НУЖНО СДЕЛАТЬ ДЛЯ ЭТОГО?</h4>
							<p class="infoListItemText">Для этого необходимо обратиться в Управление труда и социальной защиты
								населения по месту своего жительства или
								проживания (прописки) инвалида.</p>
						</li>
						<li class="infoListItem">
							<h4 class="infoListItemTitle">ПОЛУЧИТЕ ПРОТЕЗНО-ОРТОПЕДИЧЕСКИЕ ИЗДЕЛИЯ БЕСПЛАТНО !!!</h4>
							<p class="infoListItemText">«Центр протезно-ортопедической реабилитации инвалидов «ОРТТЕХ»
								обеспечит инвалидов трудового увечья, получивших травму
								на производстве, малосложной индивидуальной ортопедической обувью и обувью на протезы.</p>
						</li>
						<li class="infoListItem">
							<h4 class="infoListItemTitle">ЗАЧЕМ НУЖНО ЭТО ОБРАЩЕНИЕ?</h4>
							<p class="infoListItemText">Что мне это может дать?
								<br>
								Это нужно для получения направления на приобретение протезно-ортопедических изделий за счет
								бюджетных средств и Вы
								получите своё протезно-ортопедическое изделие совершенно БЕСПЛАТНО.
							</p>
						</li>
						<li class="infoListItem">
							<h4 class="infoListItemTitle">КОМУ АДРЕСОВАНА НАША НОВОСТЬ?</h4>
							<p class="infoListItemText">Прежде всего инвалидам, лицам, нуждающимся в реабилитации после
								перенесенных травм и заболеваний. А так же их
								родственникам и членам их семей, которые желают вернуть своих родных и близких к полноценной
								жизни.
							</p>
						</li>
						<li class="infoListItem">
							<h4 class="infoListItemTitle">ЧТО НЕОБХОДИМО ДЛЯ ЭТОГО?</h4>
							<p class="infoListItemText">
								Что необходимо для этого?<br>
								Какие нужны документы?
								<br>
								Список необходимых документов, направлений и справок, Вы сможете узнать, перейдя по ссылке на
								страницу Новостей.
							</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="aboutUs">
			<div class="aboutUsContainer">
				<h2 class="aboutUsTitle bigTitle">ОРТТЕХ – ортопедичні технології.</h2>
				<div class="aboutUsContent">
					<div class="aboutUsTextBlock">
						<p class="aboutUsText">
							Саме так слід читати назву Центру протезно-ортопедичної реабілітації інвалідів.
							</br>
							</br>
							Центр «ОРТТЕХ» спеціалізується на індивідуальному виробництві протезів верхніх і нижніх кінцівок модульного типу по гіпсовому зліпку пацієнта за технологією
							OTTO BOCK(Німеччина), виготовлення ортезів (шарнірних, без шарнірних) верхніх та нижніх кінцівок для лікування захворювань опорно-рухового апарату людини
							(ДЦП, інсульт, травма і т.д.), а також виготовлення рекленирующих, корегуючих корсетів за типом Шено (компресійний перелом хребта, сколіоз);
							</br>
							</br>
							У зв'язку з воєнними діями 2014 року Центр протезно-ортопедичної реабілітації переїхав до м. Запоріжжя. Точна адреса - м. Запоріжжя, вул. Північне шосе, 30
						</p>
					</div>
					<div class="aboutUsImgsBlock">
						<img src="<?php echo get_template_directory_uri(); ?>/inc/img/orteh__img.png" alt="icon">
					</div>
				</div>
				<!-- Вынести кнопку в общие стили ! -->
				<div class="aboutUsButtom moreInfoButtom ">
					<p class="aboutUsButtomText moreInfoButtomText">Про нас</p>
					<a class="aboutUsButtomLink moreInfoButtomLink" href="./about_us.html">
						<img class="aboutUsButtomIcon moreInfoButtomIcon" src="<?php echo get_template_directory_uri(); ?>/inc/img/arrow.webp" alt="icon-arrow">
					</a>
				</div>
			</div>
		</div>
	</div>
<?php

get_footer();
