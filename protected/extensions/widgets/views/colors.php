<?php
$baseUrl = Yii::app()->request->baseUrl;
?>
<div class="pp-modal pp-entity-double" id="pp_color">
	<div class="pp-body">
		<div class="color-preview">
			<img src="" id="color-img">
		</div>
		<div class="row">
			<div class="col-sm-6">
				<form action="" method="POST" enctype="multipart/form-data" id="color_form" role="form">				
					<div class="form-group">
						<label for="">&nbsp;</label>
						<input type="file" id="fcolorimg" name="fcolorimg">
						<input type="text" class="form-control" id="color_name" name="color_name" placeholder="Название цвета">						
						<button type="button" class="btn btn-default btn-sm" id="select_color">Загрузить изображение</button>
					</div>
					<div class="statusbar">						
						<?php
							echo "<img src='".$baseUrl."/images/colors/no-color.png' id='sample_color'>";
						?>
					</div>
					<button type="button" class="btn btn-primary btn-sm" id="addcolor">Добавить</button>
					<button type="button" class="btn btn-default btn-sm" id="cnclmaterial">Отмена</button>
				</form>
			</div>
			<div class="col-sm-6">
				<div class="entity-list">
					<label for="">Цвета:</label>
					<input type="text" class="form-control" id="material_name" placeholder="поиск">
					<?php
						echo "<select class='form-control' id='colorlst' multiple size='18'>";
						foreach ($colors as $key => $color)
							echo "<option value=".$color["id"]."'>".$color["name"]."</option>";
						echo "</select>";
					?>
				</div>
			</div>
		</div>		
	</div>
</div>