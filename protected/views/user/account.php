
	<div class="leftside-bar">
		<div class="avatar-wrap">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/avatars/no-thumb.png" id="ava">
			<div class="avatar-menu">Загрузить изображение</div>
			<input type="file" id="favatar">
		</div>
		<div class="features">
			<a href="#">Моя корзина</a><br />
			<a href="#">Лист ожидания</a><br />
			<a href="#">Мои отзывы</a><br />
			<a href="#">Мои вопросы</a><br />
		</div>
	</div>
	<div class="account-body">
		<div class="account-title">
			Личный кабинет
		</div>
		<div class="reg-data">
			<p>Вы зарегистрированы в системе под логином <b><?php echo $user["mail"] ?></b></p>
		</div>
		<div class="functions">
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-3">
					<div class="account-orders">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">Мои заказы</h3>
							</div>
							<div class="panel-body">
								Здесь можно можно посмотреть информацию о заказах
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2"></div>
				<div class="col-lg-3">
					<div class="account-subscriptions">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">Мои рассылки</h3>
							</div>
							<div class="panel-body">
								Здесь можно посмотреть информацию о расслыках
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2"></div>
			</div>
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Мои настройки</h3>
						</div>
						<div class="panel-body">Здесь можно изменить настройки профиля</div>
					</div>
				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
	</div>