<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">		
	<title>Главная</title>
	<link rel="shortcut icon" href="images/logo2.png" type="image/png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="hc-offcanvas-nav-master/dist/hc-offcanvas-nav.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/effects.css">
</head>
<body>

	<div class="main">
			<?php 
				require_once('header.php');
			?>
		<div class="border mt-4"></div>
		<div class="container">
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
	
		<div class="container-fluid">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="4000">
				<div class="carousel-inner">
					<div class="carousel-item active bg-01" style="background-image:  url(../images/main-bg.png);">
						<div class="d-block">
							<div class="slide-01 ml-4">
								<h1>
						   			Мы приступили к производству <span class="mt-5">высококачественных респираторов класса защиты ffp1, ffp2, ffp3</span>
								</h1>
							</div>
						</div>
					</div>
					<div class="carousel-item bg-01" style="background-image: url(../images/main-bg.png);">
						<div class="d-block">
							<div class="slide-01 mt-5 ml-4">
								<h1>
						   			Мы приступили к производству <span class="mt-5">высококачественных респираторов класса защиты ffp1, ffp2, ffp3</span>
								</h1>
							</div>
						</div>
					</div>	
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
	    			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    			<span class="sr-only">Previous</span>
	  			</a>
	  			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	   				 <span class="carousel-control-next-icon" aria-hidden="true"></span>
	   				 <span class="sr-only">Next</span>
	  			</a>
			</div>
		</div>
		<div class="container service">
			<div class="row">
				<div class="col-12">
					<h2 class="ts mb-5">ТОО «Компания ECOS» предоставляет широйкий спектр услуг своим заказчикам</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-3">
					<a href="#"><span><img class="img-effect b-1"><p>Сервисное обслуживание, ремонт оборудования</p></span></a>
				</div>
				<div class="col-sm-12 col-md-3">
					<a href="#"><span><img class="img-effect b-2"><p>Техническое освидетельствование</p></span></a>
				</div>
				<div class="col-sm-12 col-md-3">
					<a href="#"><span><img class="img-effect b-3"><p>Реализация проектов под ключ</p></span></a>
				</div>
				<div class="col-sm-12 col-md-3">
					<a href="#"><span><img class="img-effect b-4"><p>Тех.обслуживание  и заправка баллонов  систем пожаротушения.</p></span></a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-3">
					<a href="#"><span><img class="img-effect b-5"><p>Поверка и калибровка  средств измерений</p></span></a>
				</div>
				<div class="col-sm-12 col-md-3">
					<a href="#"><span><img class="img-effect b-6"><p>Электротехническая  лаборатория.</p></span></a>
				</div>
				<div class="col-sm-12 col-md-3">
					<a href="#"><span><img class="img-effect b-7"><p>Аттестованная  испытательная лаборатория.</p></span></a>
				</div>
				<div class="col-sm-12 col-md-3">
					<a href="#"><span><img class="img-effect b-8"><p>Проектирование</p></span></a>
				</div>
			</div>
		</div>
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