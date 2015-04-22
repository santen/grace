<div class="header">
	<div class="row">
		<div class="col-lg-2">
			<div class="logo-wrap">Lady Grace</div>
		</div>
		<div class="col-lg-8"></div>
		<div class="col-lg-2">
			<div class="actions">
			<?php
				if($settings["uid"] == 0 || count($settings["sid"]) == 0)
				{
			?>
					<div class="site-actions">
						<button type="button" id="regBtn" class="btn btn-warning btn-sm">
							Регистрация
						</button>
						<button type="button" id="entryBtn" class="btn btn-default btn-sm">
							Вход
						</button>
					</div>
			<?php
				}
				else
					echo "<a href='".CHtml::normalizeUrl(array('user/account'))."'>".$settings["uname"]."</a>";
			?>
						<div class="cart-actions">
							<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
							<a href="#">Корзина</a><div id="cartCount">0</div>
						</div>
					</div>
			
		</div>				
	</div>
</div>

<div class="slide-show">
	<img src="https://api.fnkr.net/testimg/688x250/00CED1/FFF/?text=Slide-show">
	<img src="https://api.fnkr.net/testimg/688x250/00CED1/FFF/?text=Slide-show">
</div>

<div class="top-bar">
	<div class="top-bar-cell">
		<button type="button" class="btn btn-default btn-sm">
			Для женщин
		</button>
	</div>
	<div class="top-bar-cell">
		<button type="button" class="btn btn-default btn-sm">
			Для мужчин
		</button>
	</div>
	<div class="top-bar-cell">
		<button type="button" class="btn btn-default btn-sm">
			Для детей
		</button>
	</div>
</div>