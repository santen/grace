<div class="pp-modal pp-entity-double" id="pp_product">
	<div class="pp-body">
		<?php $this->beginWidget('CActiveForm', array('id'=>'prod_form',
													  'action' => CHtml::normalizeUrl(array('catalog/addprod')),
													  'htmlOptions'=>array('enctype'=>'multipart/form-data'))); ?>
			<input type="hidden" id="newProduct" name="newProduct" value="0">
			<legend>Добавление товара</legend>
			<div class="steps">
				<div class="step-active" id="step1">1</div>
				<div class="step-arrow"></div>
				<div class="step" id="step2">2</div>
				<div class="step-arrow"></div>
				<div class="step" id="step3">3</div>
				<div class="step-arrow"></div>
				<div class="step" id="step4">4</div>
			</div>
			
			<div class="step-form" id="step1_form">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Выберите категорию:</label>
							<select name="pCategory" id="pCategory" class="form-control" required="required">
								<option value="0"></option>
								<?php
									foreach($categories as $key => $category)
										echo "<option value='".$category["id"]."'>".$category["name"]."</option>";
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Модель:</label>
							<input type="text" name="pModel" id="pModel" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Цена:</label>
							<input type="text" name="pPrice" id="pPrice" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Артикул:</label>
							<input type="text" name="pArtikul" id="pArtikul" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Основное изображение:</label>
							<input type="file" id="fmain_img" name="fmain_img" class="input-file">
							<button type="button" class="btn btn-default" id="prod_img">Добавить изображение</button>							
						</div>
					</div>
					<div class="col-sm-6">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=NO-IMAGE" class="prod-img" id="main_img">
					</div>
				</div>
			</div>
			
			<div id="step2_form">
				<div class="form-group">
					<label for="">Краткое описание:</label>
					<textarea name="pBrief" id="pBrief" class="form-control"></textarea>
				</div>
				<div class="form-inline">
					<div class="form-group">
						<label for="">Состав:</label>
						<input type="text" name="pMatPercent" id="pMatPercent" class="form-control" placeholder="47%">
						<select name="pMaterials" id="pMaterials" class="form-control" required="required">
							<option value=""></option>
							<?php
								foreach($materials as $key => $material)
									echo "<option value='".$material["id"]."'>".$material["name"]."</option>";
							?>
						</select>
						<button type="button" class="btn btn-default btn-sm" id="pAddMaterial">Добавить</button>
					</div>
				</div>				
				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-7">
						<select name="pContent" id="pContent" class="form-control" size="5" multiple="">
							<option value=""></option>
						</select>
					</div>
				</div>				
			</div>

			<div id="step3_form">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Размеры:</label>
						<input type="text" name="size_count" id="size_count" class="form-control" placeholder="Количество">
						<select class="form-control" id="prod_sizes">
							<option value="0">Размер</option>
						</select>
						<button type="button" class="btn btn-default" id="pAddSize">Добавить</button>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">&nbsp;</label>
						<select name="p_sizes" id="p_sizes" class="form-control" size="7" multiple="">							
						</select>
					</div>
				</div>				
			</div>

			<div id="step4_form">
				<div class="form-group">
					<label for="">Изображения:</label>
					<input type="file" class="input-file" id="prod_images" name="prod_images[]" multiple>
					<button type="button" class="btn btn-default btn-sm" id="add_other_img">Добавить изображение</button>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=1" class="prod-img" id="prod_img0">
					</div>
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=2" class="prod-img" id="prod_img1">
					</div>
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=3" class="prod-img" id="prod_img2">
					</div>
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=4" class="prod-img" id="prod_img3">
					</div>
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=5" class="prod-img" id="prod_img4">
					</div>
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=6" class="prod-img" id="prod_img5">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=7" class="prod-img" id="prod_img6">
					</div>
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=8" class="prod-img" id="prod_img7">
					</div>
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=9" class="prod-img" id="prod_img8">
					</div>
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=10" class="prod-img" id="prod_img9">
					</div>
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=11" class="prod-img" id="prod_img10">
					</div>
					<div class="col-sm-2">
						<img src="https://api.fnkr.net/testimg/88x80/00CED1/FFF/?text=12" class="prod-img" id="prod_img11">
					</div>
				</div>
			</div>
			
			<div class="product-buttons">
				<div class="btn-group" role="group" aria-label="...">
					<button type="submit" class="btn btn-warning" id="add_prod">Добавить</button>
					<button type="button" class="btn btn-success" id="okbtn">Ok</button>
					<button type="button" class="btn btn-default" id="cnclbtn">Отмена</button>
				</div>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>