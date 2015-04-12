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
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/orders.css?5436" rel="stylesheet" type="text/css" />
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
				<div class="col-lg-12">
					<div class="btn-toolbar">
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-sm" id="oTmpUsersBtn" title="Временные пользователи">
								<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-default btn-sm" id="oTmpUsersBtn" id="oUsersBtn" title="Постоянные пользователи">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							</button>
						</div>					
						<div class="btn-toolbar">
							<div class="btn-group">
								<button type="button" class="btn btn-default btn-sm" id="oTmpUsersBtn" id="oHistoryBtn">
									История заказов
								</button>
							</div>
						</div>
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