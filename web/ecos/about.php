<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>О компании</title>
	<link rel="shortcut icon" href="images/logo2.png" type="image/png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="hc-offcanvas-nav-master/dist/hc-offcanvas-nav.css">

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" href="css/internal.css">
	<link rel="stylesheet" type="text/css" href="css/effects.css">
	<script>
		function showPage(shown, hidden1, hidden2,hidden3) {
  			document.getElementById(shown).style.display='block';
			document.getElementById(hidden1).style.display='none';
			document.getElementById(hidden2).style.display='none';
			document.getElementById(hidden3).style.display='none';
  			return false;
		}
	</script>
</head>
<body>
	<div class="about">
		<?php 
			require_once('header.php');
		?>
		<div class="border mt-4"></div>
		<div class="container mb-4">
			<div class="row">
				<div class="col-sm-12 col-md">
					<nav class="menu" id="main-nav">
						<ul>
							<li><a href="index.php">главная</a></li>
							<li class="acting"><a href="#">о компании</a></li>
							<li><a href="services.php">услуги</a></li>
							<li><a href="production.php">продукция</a></li>
							<li><a href="partners.php">партнеры</a></li>
							<li><a href="question.php">вопрос-ответ</a></li>
							<li><a href="contact.php">контакты</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div class="block img"></div>
		<div class="container mt-5 mb-5">
			<div class="row">
				<div class="col-sm-12 col-md">
					<p class="main-plink"><a href="index.php">Главная </a><span>/ </span>О компании</p>
				</div>
			</div>
		</div>
	<div class="about-content">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-12 col-md">
					<h1 class="about-h1">О компании</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md">
					<nav class="sw-pages-menu">
						<ul>
							<li class="acting-sw-link"><a href="#" onclick="return showPage('sw-page_01','sw-page_02','sw-page_03','sw-page_04');">Общая информация</a></li>
							<li><a href="#" onclick="return showPage('sw-page_02','sw-page_01','sw-page_03','sw-page_04');">Политика качества</a></li>
							<li><a href="#" onclick="return showPage('sw-page_03','sw-page_01','sw-page_02','sw-page_04');">Сертификаты</a></li>
							<li><a href="#" onclick="return showPage('sw-page_04','sw-page_01','sw-page_02','sw-page_03');">Вакансии</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="row">
				<div id="sw-page_01" class="col-sm-12 col-md">
					<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>
					<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом.</p>
					<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>
					<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div id="sw-page_02" class="col-sm-12 col-md" >
					<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div id="sw-page_03" class="col-sm-12 col-md">
					<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div id="sw-page_04" class="col-sm-12 col-md">
					<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>
				</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row mt-5 mb-4">
				<div class="col-sm-12 col-md">
					<h2 class="about-h2">Наши партнеры</h2>
				</div>
			</div>
		</div>
		
		<?php
			require_once('partner_slider.php');
		?>
		
		<div class="border mt-4"></div>
		<?php 
			require_once('footer.php');
		?> 
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="hc-offcanvas-nav-master/dist/hc-offcanvas-nav.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="js/ecos.js"></script>
</body>
</html>