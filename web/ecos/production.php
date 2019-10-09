<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>Продукция</title>
	<link rel="shortcut icon" href="images/logo2.png" type="image/png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<link rel="stylesheet" href="hc-offcanvas-nav-master/dist/hc-offcanvas-nav.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" href="css/internal.css">
	<link rel="stylesheet" type="text/css" href="css/effects.css">
	
</head>
<body>
<div class="production">
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
							<li><a href="about.php">о компании</a></li>
							<li><a href="services.php">услуги</a></li>
							<li class="acting"><a href="production-partners.php">продукция</a></li>
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
					<p class="main-plink"><a href="index.php">Главная </a><span>/ </span><a href="production-partners.php">Продукция партнеров </a><span>/ </span>Продукция</p>
				</div>
			</div>
		</div>
		<div class="production-content">
			<div class="container">
			<div class="row mt-5 mb-4">
				<div class="col-sm-12 col-md">
					<h1 class="production-h1">Продукция</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-1 jc-c">
					<input id="f1" type="checkbox" class="hide">
					<label for="f1" class="inner-btn">Все</label>
				</div>
				<div class="col-sm-12 col-md-3 jc-c">
					<div class="dropdown">
						<button class="inner-btn first-btn" type="button" data-toggle="dropdown">Производитель
						</button>
						<ul class="dropdown-menu">
    						<li>
								<input id="f2" type="checkbox" class="hide">
								<label for="f2" class="category">АО “Тульский завод”</label>
    						</li>
    						<li>
    							<input id="f3" type="checkbox" class="hide">
    							<label for="f3" class="category">ООО “Металликум”</label>
    						</li>
    						<li>
    							<input id="f4" type="checkbox" class="hide">
    							<label for="f4" class="category">ООО “Стройцветмет”</label>
    						</li>
  						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-2 jc-c">
					<div class="dropdown">
						<button class="inner-btn second-btn" type="button" data-toggle="dropdown">Категории товара
						</button>
						<ul class="dropdown-menu">
    						<li>
    							<input id="f5" type="checkbox" class="hide">
    							<label for="f5" class="category">Категория 1</label>
    						</li>
    						<li>
    							<input id="f6" type="checkbox" class="hide">
    							<label for="f6" class="category">Категория 2</label>
    						</li>
    						<li>
    							<input id="f7" type="checkbox" class="hide">
    							<label for="f7" class="category">Категория 3</label>
    						</li>
  						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-3 jc-c">
					<div class="dropdown">
						<button class="inner-btn third-btn" type="button" data-toggle="dropdown">Подкатегории товара
						</button>
						<ul class="dropdown-menu">
    						<li>
    							
    							<input id="f8" type="checkbox" class="hide">
    							<label for="f8" class="category">Податегория 1</label>
    						</li>
    						<li>
    							<input id="f9" type="checkbox" class="hide">
    							<label for="f9" class="category">Податегория 2</label>
    						</li>
    						<li>
    							<input id="f10" type="checkbox" class="hide">
    							<label for="f10" class="category">Податегория 3</label>
    						</li>
  						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-3 jc-c">
					<input class="search" type="search" placeholder="Поиск">
				</div>
			</div>
		</div>
		<div class="container mt-5">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="container production-border">
						<div class="row">
							<div class="col-sm-12 col-md-5">
								<img src="images/production-img.png">
							</div>
							<div class="col-sm-12 col-md-7">
								<h4 class="h4">
									Газоанализатор OMRON  NE-C300 Complete
								</h4>
								<p class="p">
									Газоанализаторы с инфракрасным  сенсором
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md mt-3 pr-5">
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке... 
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md">
								<a href="card.php" class="more">ПОДРОБНЕЕ</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="container production-border">
						<div class="row">
							<div class="col-sm-12 col-md-5">
								<img src="images/production-img.png">
							</div>
							<div class="col-sm-12 col-md-7">
								<h4 class="h4">
									Газоанализатор OMRON  NE-C300 Complete
								</h4>
								<p class="p">
									Газоанализаторы с инфракрасным  сенсором
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md mt-3 pr-5">
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке... 
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md">
								<a href="card.php" class="more">ПОДРОБНЕЕ</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-sm-12 col-md-6">
					<div class="container production-border">
						<div class="row">
							<div class="col-sm-12 col-md-5">
								<img src="images/production-img.png">
							</div>
							<div class="col-sm-12 col-md-7">
								<h4 class="h4">
									Газоанализатор OMRON  NE-C300 Complete
								</h4>
								<p class="p">
									Газоанализаторы с инфракрасным  сенсором
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md mt-3 pr-5">
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке... 
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md">
								<a href="card.php" class="more">ПОДРОБНЕЕ</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="container production-border">
						<div class="row">
							<div class="col-sm-12 col-md-5">
								<img src="images/production-img.png">
							</div>
							<div class="col-sm-12 col-md-7">
								<h4 class="h4">
									Газоанализатор OMRON  NE-C300 Complete
								</h4>
								<p class="p">
									Газоанализаторы с инфракрасным  сенсором
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md mt-3 pr-5">
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке... 
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md">
								<a href="card.php" class="more">ПОДРОБНЕЕ</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-sm-12 col-md-6">
					<div class="container production-border">
						<div class="row">
							<div class="col-sm-12 col-md-5">
								<img src="images/production-img.png">
							</div>
							<div class="col-sm-12 col-md-7">
								<h4 class="h4">
									Газоанализатор OMRON  NE-C300 Complete
								</h4>
								<p class="p">
									Газоанализаторы с инфракрасным  сенсором
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md mt-3 pr-5">
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке... 
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md">
								<a href="card.php" class="more">ПОДРОБНЕЕ</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="container production-border">
						<div class="row">
							<div class="col-sm-12 col-md-5">
								<img src="images/production-img.png">
							</div>
							<div class="col-sm-12 col-md-7">
								<h4 class="h4">
									Газоанализатор OMRON  NE-C300 Complete
								</h4>
								<p class="p">
									Газоанализаторы с инфракрасным  сенсором
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md mt-3 pr-5">
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке... 
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md">
								<a href="card.php" class="more">ПОДРОБНЕЕ</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container mt-5">
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
	
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="hc-offcanvas-nav-master/dist/hc-offcanvas-nav.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script src="js/ecos.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="hc-offcanvas-nav-master/dist/hc-offcanvas-nav.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script src="js/ecos.js"></script>
</div>
</body>
</html>