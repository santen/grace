<?php
	echo json_encode($user);
	$imgUrl = Yii::app()->request->baseUrl."/images/avatars/";
?>
<div class="leftside-bar">
		<div class="avatar-wrap">
			<?php //echo "<img src='".$imgUrl.$user["avatar"]."'>"; ?>						
		</div>		
	</div>
	<div class="account-body">
		<div class="account-title">
			Личный кабинет
		</div>
	<div class="reg-data">
		<?php 
			/*if($user["sex"] == 0){
				echo "<p>Зарегистрирована на сайте ".$user["cdate"]."</p>";
				echo "<p>Была на сайте ".$user["last_entry"]."</p>";
			}
			else{
				echo "<p>Зарегистрирован на сайте ".$user["cdate"]."</p>";
				echo "<p>Был на сайте ".$user["last_entry"]."</p>";
			}*/
		?>
	</div>		
</div>