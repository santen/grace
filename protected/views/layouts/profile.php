<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.3.min.js"></script>

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery-ui-1.11.4.custom/jquery-ui.theme.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery-ui-1.11.4.custom/jquery-ui.min.js" language="JavaScript"></script>
	
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/grace.css?5436" rel="stylesheet" type="text/css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/grace.js?0890" language="JavaScript"></script>

	<title>Lady Grace Интернет-магазин</title>
</head>
<body>
	<div class="hidden-layout"></div>
	<div class="main-wrap">
		<?php $this->widget('application.extensions.widgets.HeaderWidget');?>
		
		<div class="body-wrap">
			<?php echo $content; ?>
		</div>
	</div>
	
</body>
</html>