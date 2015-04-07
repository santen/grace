<div class="pp-modal pp-entity-2" id="pp_season">
	<div class="pp-body">
		<label for="">Сезоны:</label>			
		<?php
			echo "<select class='form-control' id='seasonlst' size='12'>";
			foreach ($seasons as $key => $season)
				echo "<option value=".$season["id"]."'>".$season["name"]."</option>";
			echo "</select>";
		?>
		<div class="form-group">
			<label for="">Сезон:</label>
			<input type="text" class="form-control" id="season_val" placeholder="Демисезон">
		</div>
		<button type="button" class="btn btn-primary btn-sm" id="add_season">Добавить</button>
		<button type="button" class="btn btn-default btn-sm" id="cncl_season">Отмена</button>
	</div>
</div>