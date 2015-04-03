<div class="pp-modal pp-entity-2" id="pp_material">
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
			<input type="text" class="form-control" id="material_name" placeholder="Название материала">
		</div>
		<button type="button" class="btn btn-primary btn-sm" id="addmaterial">Добавить</button>
		<button type="button" class="btn btn-default btn-sm" id="cnclmaterial">Отмена</button>
	</div>
</div>