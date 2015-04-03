<div class="pp-modal pp-entity-2" id="pp_brand">
	<div class="pp-body">
		<div class="entity-list">
			<label for="">Бренды:</label>
			<?php
				echo "<select class='form-control' id='entitylst' multiple>";
				foreach ($brands as $key => $brand)
					echo "<option value=".$brand["id"]."'>".$brand["name"]."</option>";
				echo "</select>";
			?>
		</div>
		<div class="form-group">
			<label for="">Название:</label>
			<input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Название бренда">				
		</div>
		<button type="button" class="btn btn-primary btn-sm" id="addbrand">Добавить</button>
		<button type="button" class="btn btn-default btn-sm" id="cnclbrand">Отмена</button>
	</div>
</div>
