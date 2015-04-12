<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">		
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.3.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookie.js"></script>

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
	<div class="error">Server error</div>
	<div class="hidden-layout"></div>
	<div class="admin-container">
		<div class="top-bar">
			<?php
				$div = 0;
				if(Yii::app()->controller->getId() == "catalog")
					$div = Yii::app()->controller->getDivision();
				
				$this->widget('application.extensions.widgets.MainMenuWidget', array("div" => $div));
			?>
		</div>
		<div class="toolbar">
			<div class="row">
				<div class="btn-toolbar">
					<div class="btn-group" id="oTmpUsersBtn">Временные пользователи</div>
					<div class="btn-group" id="oUsersBtn">Постоянные пользователи</div>
				</div>
				<div class="btn-toolbar">
					<div class="btn-group" id="oHistoryBtn">История заказов</div>
				</div>
			</div>
		</div>
		<?php echo $content; ?>
	</div>
	<?php
		//widgets
	?>
</body>
</html>