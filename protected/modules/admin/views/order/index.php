<?php
	$imgUrl = Yii::app()->request->baseUrl."/images/avatars/";
?>
<div class="leftside-bar">
	<div class="periods">
		<?php
			$this->widget('application.extensions.widgets.PeriodsWidget');
		?>
	</div>
	<div class="orders-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Пользователь</td>
					<td>Статус</td>
					<td>Комментарий пользователя</td>
					<td>Сумма</td>
					<td>Способ доставки</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$url = CHtml::normalizeUrl(array('user/category'));

					foreach($orders as $order){
						$nextStatus = $order["status_id"] + 1;

						if($order["is_visitor"] == 0){
							echo "<tr class='success'><td>".$order["oid"]."</td>";
							echo "<td><img src='".$imgUrl.$order["avatar"]."'><br />
									  <a href='#' id='".$order["uid"]."'>".$order["nickname"]."</a></td>";
							echo "<td>".$order["status"]."
									<button type='button' class='btn btn-info btn-sm'>
										<span class='glyphicon glyphicon-arrow-right' aria-hidden='true' id='oStatus".$order["id"]."'></span>
										".$statuses[$nextStatus]["status"]."
									</button>";
							echo "</td><td>".$order["user_comment"]."</td>";
							echo "<td>".$order["sum"]."</td>";
							echo "<td>".$order["m_name"]."</td></tr>";
						}
						else{
							echo "<tr class='warning'><td>".$order["oid"]."</td>";
							echo "<td><img src='".$imgUrl.$order["avatar"]."'><br />
									  <a href='#' id='".$order["uid"]."'>".$order["nickname"]."</a></td>";
							echo "<td>".$order["status"]."
									<button type='button' class='btn btn-info btn-sm'>
										<span class='glyphicon glyphicon-arrow-right' aria-hidden='true' id='oStatus".$order["id"]."'></span>
										".$statuses[$nextStatus]["status"]."
									</button>";
							echo "</td><td>".$order["user_comment"]."</td>";
							echo "<td>".$order["sum"]."</td>";
							echo "<td>".$order["m_name"]."</td></tr>";
						}
					}
				?>
			</tbody>
		</table>
	</div>
</div>