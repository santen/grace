<div class="pp-modal pp-entity-3" id="pp_size">
	<div class="pp-body">
		<ul class="nav nav-tabs">
			<li role="presentation" class="active"><a href="#">Все</a></li>
			<li role="presentation"><a href="#">Россия</a></li>
			<li role="presentation"><a href="#">Европа</a></li>
		</ul>
			<label for="">Размеры:</label>			
			<?php
				echo "<select class='form-control' id='sizelst' size='11'>";
				foreach ($sizes as $key => $size)
					echo "<option value='".$size["id"]."'>".$size["name"]."</option>";
				echo "</select>";
			?>
		<div class="form-group">
			<label for="">Значение размера:</label>
			<input type="text" class="form-control" id="size_val" placeholder="Значение размера">
		</div>
		<div class="form-group">
			<label for="">Стандарт:</label>
			<select class="form-control" name="standard" id="standard">
				<option value="1" selected>Россия</option>
				<option value="2">Европа</option>
			</select>
		</div>
		<button type="button" class="btn btn-primary btn-sm" id="addsize">Добавить</button>
		<button type="button" class="btn btn-default btn-sm" id="cnclsize">Отмена</button>
	</div>
</div>
