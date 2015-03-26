<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">		
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.3.min.js"></script>

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery-ui-1.11.4.custom/jquery-ui.theme.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery-ui-1.11.4.custom/jquery-ui.min.js" language="JavaScript"></script>
	
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/grace.css?5436" rel="stylesheet" type="text/css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/grace.js" language="JavaScript"></script>

	<title>Lady Grace Интернет-магазин</title>
</head>

<body>
<body>
	<div class="hidden-layout"></div>
	<div class="main-wrap">
		<?php $this->widget('application.extensions.widgets.HeaderWidget');?>

		<div class="slide-show">
			<img src="https://api.fnkr.net/testimg/688x250/00CED1/FFF/?text=Slide-show">
			<img src="https://api.fnkr.net/testimg/688x250/00CED1/FFF/?text=Slide-show">
		</div>

		<div class="top-bar">
			<div class="top-bar-cell">
				<button type="button" class="btn btn-default btn-sm">
					Для женщин
				</button>
			</div>
			<div class="top-bar-cell">
				<button type="button" class="btn btn-default btn-sm">
					Для мужчин
				</button>
			</div>
			<div class="top-bar-cell">
				<button type="button" class="btn btn-default btn-sm">
					Для детей
				</button>
			</div>
		</div>

		<div class="body-wrap">
			<div class="leftside-bar">
				<div class="categories-bar">
					<a href="#">
						Сумки
					</a><br />
					<a href="#">
						Платья
					</a><br />
					<a href="#">
						Кофты
					</a><br />
					<a href="#">
						Брюки
					</a><br />
					<a href="#">
						Обувь
					</a><br />
				</div>
				<div class="search-bar">
					<div class="search-block">
						<div class="search-label">Цена:</div>
						<div id="price_slider"></div>
						<div class="search-slider-values">
							<div class="search-val-min">
								<div id="price_min">500</div>
							</div>
							<div class="search-val-max">
								<div id="price_max">80000</div>
							</div>
						</div>
					</div>
					<div class="search-block">
						<div class="search-label">Материал:</div>
						<div class="search-materials">
							<input type="checkbox">Натуральная кожа<br />
							<input type="checkbox">Синтетика<br />
							<input type="checkbox">Железо<br />
							<input type="checkbox">Пластик<br />
						</div>
					</div>
					<div class="search-block">
						<div class="search-label">Размеры:</div>
						<ul class="nav nav-tabs">
							<li role="presentation" id="eur_tab" class="active"><a href="#">Европа</a></li>
							<li role="presentation" id="rus_tab"><a href="#">Россия</a></li>
						</ul>
						<div class="search-materials" id="e_materials">
							<input type="checkbox">S<br />
							<input type="checkbox">M<br />
							<input type="checkbox">L<br />
							<input type="checkbox">XL<br />
							<input type="checkbox">XXL<br />
						</div>
						<div class="search-materials" id="r_materials" style="display: none;">
							<input type="checkbox">44-46<br />
							<input type="checkbox">46-48<br />
							<input type="checkbox">48-50<br />
							<input type="checkbox">52-54<br />
							<input type="checkbox">54-56<br />
						</div>
					</div>
					<div class="search-block">
						<div class="search-label">Длина:</div>
						<div id="height_slider"></div>
						<div class="search-slider-values">
							<div class="search-val-min">
								<div id="height_min">50</div>
							</div>
							<div class="search-val-max">
								<div id="height_max">120</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="products-wrap">
				<div class="products-line">
					<div class="product-line-name">
						Обувь
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/2.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1200
						</div>
					</div>
					<div class="product-cell">
						<div class="product-cell-inside">
							Быстрый просмотр
						</div>
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/2.jpg" height="100px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/2.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/3.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/1.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
				</div>
				<div class="products-line">
					<div class="product-line-name">
						Сумки
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/3.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/1.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/3.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/2.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/2.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
				</div>
				<div class="products-line">
					<div class="product-line-name">
						Платья
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/2.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/1.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/3.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/1.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/2.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
				</div>
				<div class="products-line">
					<div class="product-line-name">
						Юбки
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/1.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/2.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/3.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/3.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
					<div class="product-cell">
						<div class="product-image">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/products/2.jpg" height="120px" alt="">
						</div>
						<div class="product-name">
							Сумка женская
						</div>
						<div class="product-price">
							$1000
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer"></div>
	</div>
	<div class="pp-quick">
		<div class="pp-title">
			Платье красивое вместе с сумкой на меху
		</div>
		<div class="pp-close">
			<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
		</div>
		<div class="pp-main-image">
			<img src="https://api.fnkr.net/testimg/290x520/00CED1/FFF/?text=product">
			<div class="pp-social">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ok.png" class="social-btn" alt="">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/vk.jpg" class="social-btn" alt="">
			</div>
		</div>
		<div class="pp-properties">
			<div class="pp-price">83 809 руб.</div>
			<div class="pp-property">Длина: 95-97 см.</div>
			<div class="pp-property">Материал: хлопок, полиэстер</div>
			<div class="pp-property">
				Размеры:
			</div>
			<div class="pp-size">
				<div class="size-value">S</div>
				<div class="size-value">M</div>
				<div class="size-value">L</div>
				<div class="size-value">XL</div>
			</div>
			<div class="pp-actions">
				<div class="pp-action">
					<button type="button" id="add_btn" class="btn btn-warning btn-sm">
						Добавить в корзину
					</button>
				</div>
				<div class="pp-action">
					<button type="button" id="add_btn" class="btn btn-info btn-sm">
						Добавить в лист ожидания
					</button>
				</div>
			</div>
		</div>		
	</div>

	<div class="pp-user">
		<div class="pp-body">
			<ul class="nav nav-tabs">
				<li role="presentation" id="reg_tab" class="active"><a href="#">Регистрация</a></li>
				<li role="presentation" id="entry_tab"><a href="#">Вход</a></li>
			</ul>
			<div class="pp-form">
				<?php $this->beginWidget('CActiveForm', array('id'=>'reg_form',
															  'action' => CHtml::normalizeUrl(array('user/add')))); ?>
					<div class="form-group">
						<label for="">E-Mail:</label>
						<input type="text" class="form-control" id="" name="mail" placeholder="example@mail.ru">
					</div>
					<div class="form-group">
						<label for="">Пароль:</label>
						<input type="password" class="form-control" id="passwd1" name="passwd1">
					</div>
					<div class="form-group">
						<label for="">Повторите пароль:</label>
						<input type="password" class="form-control" id="passwd2" name="passwd1">
					</div>				
				
					<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
				<?php $this->endWidget(); ?>
				<?php $this->beginWidget('CActiveForm', array('id'=>'entry_form',
															  'action' => CHtml::normalizeUrl(array('user/entry')))); ?>				
					<div class="form-group">
						<label for="">E-Mail:</label>
						<input type="text" class="form-control" id="" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Пароль:</label>
						<input type="password" class="form-control" id="passwd">
					</div>
				
					<button type="submit" class="btn btn-primary">Войти</button>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
	<?php echo $content; ?>


</body>
</html>
