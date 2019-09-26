<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">		
	<title>Контакты</title>
	<link rel="shortcut icon" href="images/logo2.png" type="image/png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="hc-offcanvas-nav-master/dist/hc-offcanvas-nav.css">
	
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" href="css/internal.css">
	<link rel="stylesheet" type="text/css" href="css/effects.css">
	<script>
		function showPage(shown, hidden1, hidden2, hidden3, hidden4) {
  			document.getElementById(shown).style.display='block';
			document.getElementById(hidden1).style.display='none';
			document.getElementById(hidden2).style.display='none';
			document.getElementById(hidden3).style.display='none';
			document.getElementById(hidden4).style.display='none';
  			return false;
		}
	</script>
</head>
<body>
	<div class="contact">
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
							<li><a href="production.php">продукция</a></li>
							<li><a href="partners.php">партнеры</a></li>
							<li><a href="question.php">вопрос-ответ</a></li>
							<li class="acting"><a href="#">контакты</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div class="container mt-5 mb-5">
			<div class="row">
				<div class="col-sm-12 col-md">
					<p class="main-plink"><a href="index.php">Главная </a><span>/ </span>Контакты</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row mt-5 mb-4">
				<div class="col-sm-12 col-md">
					<h2 class="contact-h2">Наши контакты</h2>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-2 jc-c">
					<a href="#" onclick="return showPage('sw-page_01','sw-page_02','sw-page_03','sw-page_04', 'sw-page_05');" class="inner-btn">Офис в г. Алматы</a>
				</div>
				<div class="col-sm-12 col-md-2 jc-c">
					<a href="#" onclick="return showPage('sw-page_02','sw-page_01','sw-page_03','sw-page_04', 'sw-page_05');" class="inner-btn">Сервисный центр</a>
				</div>
				<div class="col-sm-12 col-md-3 jc-c">
					<a href="#" onclick="return showPage('sw-page_03','sw-page_01','sw-page_02','sw-page_04', 'sw-page_05');" class="inner-btn">Коммерческий департамент</a>
				</div>
				<div class="col-sm-12 col-md-2 jc-c">
					<a href="#" onclick="return showPage('sw-page_04','sw-page_01','sw-page_02','sw-page_03', 'sw-page_05');" class="inner-btn">Отдел “Восток”</a>
				</div>
				<div class="col-sm-12 col-md-3 jc-c">
					<a href="#" onclick="return showPage('sw-page_05','sw-page_01','sw-page_02','sw-page_03','sw-page_04');" class="inner-btn">Департамент проектирования</a>
				</div>
			</div>
		</div>

		<div id="sw-page_01" class="container contact-info">
			<div class="row mt-5">
				<div class="col-sm-12 col-md-4">
					<h4 class="mb-3">
						Республика Казахстан, г.Алматы, Бостандыкский район, Жарокова 210А
					</h4>
					<a href="tel:+7(727)356-33-56">+ 7 (727)356-33-56</a>
					<a href="mailto:ecos@ecos.kz" class="mt-3 mb-3">ecos@ecos.kz</a>

					<p>
						По вопросам поставок  оборудования инжиниринга,  проектирования
					</p>
					<a href="mailto:sales@ecos.kz" class="mb-3">sales@ecos.kz</a>
					<p>
						По вопросам сервисного обслуживания  
					</p>
					<a href="mailto:services@ecos.kz">services@ecos.kz</a>
				</div>
				<div class="col-sm-12 col-md-8">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2004.4750201025731!2d30.295912711552873!3d59.84125101596982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46963ace33ec5f4d%3A0x4c8b35b3b9005fc6!2z0JrRg9Cx0LjQvdGB0LrQsNGPINGD0LsuLCA3NSwgMTExLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywg0KDQvtGB0YHQuNGPLCAxOTYyNDA!5e0!3m2!1sru!2skz!4v1568570398777!5m2!1sru!2skz"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
		<div id="sw-page_02" style="display: none;" class="container contact-info">
			<div class="row mt-5">
				<div class="col-sm-12 col-md-4">
					<h4 class="mb-3">
						050010, г.Алматы, ул.Радлова, 146
					</h4>
					<a href="tel:+7(727)396-63-97">+7 (727)396-63-97</a>
					<a href="tel:+7(727)396-64-06">+7 (727)396-64-06</a>
					<a href="tel:+7(727)396-64-15">+7 (727)396-64-15</a>
					<a href="tel:+7(727)356-13-04">+7 (727)356-13-04</a>
					<p>
						По вопросам сервисного обслуживания  
					</p>
					<a href="mailto:services@ecos.kz">services@ecos.kz</a>
				</div>
				<div class="col-sm-12 col-md-8">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2004.4750201025731!2d30.295912711552873!3d59.84125101596982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46963ace33ec5f4d%3A0x4c8b35b3b9005fc6!2z0JrRg9Cx0LjQvdGB0LrQsNGPINGD0LsuLCA3NSwgMTExLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywg0KDQvtGB0YHQuNGPLCAxOTYyNDA!5e0!3m2!1sru!2skz!4v1568570398777!5m2!1sru!2skz"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
		<div id="sw-page_03" style="display: none;" class="container contact-info">
			<div class="row mt-5">
				<div class="col-sm-12 col-md-4">
					<h4 class="mb-3">
						Республика Казахстан, г.Алматы, Бостандыкский район, Жарокова 210А
					</h4>
					<a href="tel:+7(727)356-33-56">+ 7 (727)356-33-56</a>
					<p>
						По вопросам поставок  оборудования инжиниринга,  проектирования
					</p>
					<a href="mailto:sales@ecos.kz" class="mt-3 mb-3">sales@ecos.kz</a>
				</div>
				<div class="col-sm-12 col-md-8">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2004.4750201025731!2d30.295912711552873!3d59.84125101596982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46963ace33ec5f4d%3A0x4c8b35b3b9005fc6!2z0JrRg9Cx0LjQvdGB0LrQsNGPINGD0LsuLCA3NSwgMTExLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywg0KDQvtGB0YHQuNGPLCAxOTYyNDA!5e0!3m2!1sru!2skz!4v1568570398777!5m2!1sru!2skz"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
		<div id="sw-page_04" style="display: none;" class="container contact-info">
			<div class="row mt-5">
				<div class="col-sm-12 col-md-4">
					<h4 class="mb-3">
						Республика Казахстан, г.Алматы, Бостандыкский район, Жарокова 210А
					</h4>
					<a href="tel:+7(727)356-33-56">+ 7 (727)356-33-56</a>
					<a href="mailto:baurzhan.syrymbetov@ecos.kz" class="mt-3 mb-3">baurzhan.syrymbetov@ecos.kz</a>

				</div>
				<div class="col-sm-12 col-md-8">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2004.4750201025731!2d30.295912711552873!3d59.84125101596982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46963ace33ec5f4d%3A0x4c8b35b3b9005fc6!2z0JrRg9Cx0LjQvdGB0LrQsNGPINGD0LsuLCA3NSwgMTExLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywg0KDQvtGB0YHQuNGPLCAxOTYyNDA!5e0!3m2!1sru!2skz!4v1568570398777!5m2!1sru!2skz"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
		<div id="sw-page_05" style="display: none;" class="container contact-info">
			<div class="row mt-5">
				<div class="col-sm-12 col-md-4">
					<h4 class="mb-3">
						Республика Казахстан, г.Алматы, Бостандыкский район, Жарокова 210А
					</h4>
					<a href="tel:+7(727)356-33-56">+7 (727)356-33-56</a>

					<p>
						По вопросам поставок  оборудования инжиниринга,  проектирования
					</p>
					<a href="mailto:sales@ecos.kz" class="mb-3">sales@ecos.kz</a>
				</div>
				<div class="col-sm-12 col-md-8">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2004.4750201025731!2d30.295912711552873!3d59.84125101596982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46963ace33ec5f4d%3A0x4c8b35b3b9005fc6!2z0JrRg9Cx0LjQvdGB0LrQsNGPINGD0LsuLCA3NSwgMTExLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywg0KDQvtGB0YHQuNGPLCAxOTYyNDA!5e0!3m2!1sru!2skz!4v1568570398777!5m2!1sru!2skz"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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

	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="hc-offcanvas-nav-master/dist/hc-offcanvas-nav.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="js/ecos.js"></script>
</body>
</html>