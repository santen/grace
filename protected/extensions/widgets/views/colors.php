<div class="pp-modal" id="pp_color">
	<div class="pp-body">
		<div class="entity-list">
			<label for="">Материалы:</label>
			<?php
				echo "<select class='form-control' id='entitylst' multiple>";
				foreach ($materials as $key => $material)
					echo "<option value=".$material["id"]."'>".$material["name"]."</option>";
				echo "</select>";
			?>
		</div>
		<div class="form-group">
			<label for="">Название:</label>
			<input type="text" class="form-control" id="material_name" placeholder="Название цвета">
		</div>
		<div class="form-group">
			<label for="">Код:</label>
			<input type="text" class="form-control" id="material_name" placeholder="Например, 4A0FD7 или F1D">
		</div>
		<div class="form-group">
			<label for="">Изображение:</label>
			<img src="https://api.fnkr.net/testimg/30x30/FFF/FFF/" id="colorimg">
			<button type="button" class="btn btn-default btn-sm" id="selectcolor">Выбрать</button>
			<input type="file" id="fcolorimg">
		</div>
		
		<button type="button" class="btn btn-default btn-sm" id="cnclmaterial">Отмена</button>
	</div>
</div>