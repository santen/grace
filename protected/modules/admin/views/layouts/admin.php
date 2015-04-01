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
	
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css?5436" rel="stylesheet" type="text/css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin.js?3523" language="JavaScript"></script>
	<title>Lady Grace Система администрирования</title>
</head>

<body>
	<div class="hidden-layout"></div>
	<div class="admin-container">
		<div class="top-bar">
			<ul class="nav nav-tabs">
				<?php
					echo "<li role='presentation' class='active'><a href='".CHtml::normalizeUrl(array('catalog/index'))."'>Каталог</a></li>";
					echo "<li role='presentation'><a href='".CHtml::normalizeUrl(array('orders/index'))."'>Заказы</a></li>";
					echo "<li role='presentation'><a href='".CHtml::normalizeUrl(array('user/index'))."'>Пользователи</a></li>";
					echo "<li role='presentation'><a href='".CHtml::normalizeUrl(array('questions/index'))."'>Q&A</a></li>";
					echo "<li role='presentation'><a href='".CHtml::normalizeUrl(array('comments/index'))."'>Комментарии</a></li>";
				?>
			</ul>
		</div>
		<div class="toolbar">
			<div class="row">				
				<div class="col-lg-6 col-sm-8">
					<div class="btn-toolbar" role="toolbar" aria-label="...">
						<div class="btn-group" role="group" aria-label="...">
							<button type="button" class="btn btn-default btn-sm" id="newcat">Новая категория</button>
							<button type="button" class="btn btn-default btn-sm">Скрыть категорию</button>
						</div>
						<div class="btn-group" role="group" aria-label="...">
							<button type="button" class="btn btn-warning btn-sm" id="newprod">Добавить товар</button>
						</div>
						<div class="btn-group" role="group" aria-label="...">
							<button type="button" class="btn btn-info btn-sm">Для мужчин</button>
							<button type="button" class="btn btn-info btn-sm">Для женщин</button>
							<button type="button" class="btn btn-info btn-sm">Для детей</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $content; ?>
	</div>	
</body>
</html>