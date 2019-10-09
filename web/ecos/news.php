<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Новости</title>
	<link rel="shortcut icon" href="images/logo2.png" type="image/png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="hc-offcanvas-nav-master/dist/hc-offcanvas-nav.css">
	
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" href="css/internal.css">
	<link rel="stylesheet" type="text/css" href="css/effects.css">
</head>
<body>
	<div class="news">
		<?php
			require_once('header.php');
		?>
		<div class="border mt-4"></div>
		<div class="container mb-4">
			<div class="row">
				<div class="col-sm-12 col-md">
					<nav class="menu" id="main-nav">
						<ul>
							<li class="acting"><a href="#">главная</a></li>
							<li><a href="about.php">о компании</a></li>
							<li><a href="services.php">услуги</a></li>
							<li><a href="production-partners.php">продукция</a></li>
							<li><a href="partners.php">партнеры</a></li>
							<li><a href="question.php">вопрос-ответ</a></li>
							<li><a href="contact.php">контакты</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div class="container mt-5 mb-5">
			<div class="row">
				<div class="col-sm-12 col-md">
					<p class="main-plink"><a href="index.php">Главная </a><span>/ </span>Вопрос-ответ</p>
				</div>
			</div>
		</div>
		<div class="news-content">
			<div class="container">
				<div class="row mt-5 mb-4">
					<div class="col-sm-12 col-md">
						<h1 class="news-h1">Новости</h1>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-3">
						<img src="images/news-img_01.png">
						<h3>Офис компании переехал по новому адресу</h3>
						<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать</p>
						<a href="#" class="more">ПОДРОБНЕЕ</a>
					</div>
					<div class="col-sm-12 col-md-3">
						<img src="images/news-img_02.png">
						<h3>Офис компании переехал по новому адресу</h3>
						<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать</p>
						<a href="#" class="more">ПОДРОБНЕЕ</a>
					</div>
					<div class="col-sm-12 col-md-3">
						<img src="images/news-img_03.png">
						<h3>Офис компании переехал по новому адресу</h3>
						<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать</p>
						<a href="#" class="more">ПОДРОБНЕЕ</a>
					</div>
					<div class="col-sm-12 col-md-3">
						<img src="images/news-img_03.png">
						<h3>Офис компании переехал по новому адресу</h3>
						<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать</p>
						<a href="#" class="more">ПОДРОБНЕЕ</a>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-sm-12 col-md-3">
						<img src="images/news-img_01.png">
						<h3>Офис компании переехал по новому адресу</h3>
						<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать</p>
						<a href="#" class="more">ПОДРОБНЕЕ</a>
					</div>
					<div class="col-sm-12 col-md-3">
						<img src="images/news-img_02.png">
						<h3>Офис компании переехал по новому адресу</h3>
						<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать</p>
						<a href="#" class="more">ПОДРОБНЕЕ</a>
					</div>
					<div class="col-sm-12 col-md-3">
						<img src="images/news-img_03.png">
						<h3>Офис компании переехал по новому адресу</h3>
						<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать</p>
						<a href="#" class="more">ПОДРОБНЕЕ</a>
					</div>
					<div class="col-sm-12 col-md-3">
						<img src="images/news-img_03.png">
						<h3>Офис компании переехал по новому адресу</h3>
						<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать</p>
						<a href="#" class="more">ПОДРОБНЕЕ</a>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row mt-5 mb-4">
					<div class="col-sm-12 col-md">
						<h2 class="services-h2">Наши партнеры</h2>
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
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="hc-offcanvas-nav-master/dist/hc-offcanvas-nav.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="js/ecos.js"></script>
</body>
</html>