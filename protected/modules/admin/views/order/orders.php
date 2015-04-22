<div class="leftside-bar">
	<div class="periods">
		<?php $this->widget('application.extensions.widgets.PeriodsWidget', array("period" => $period)); ?>
	</div>
</div>
<div class="orders-body">
	<table class="table table-condensed">
		<thead>
			<tr>
				<td>#</td>
				<td>
					Дата
					<span class="glyphicon glyphicon-calendar" aria-hidden="true" title="Дата"></span>
				</td>
				<td>
					Пользователь
					<span class="glyphicon glyphicon-user" aria-hidden="true" title="Пользователь"></span>
				</td>
				<td>
					Статус
					<span class="glyphicon glyphicon-scale" aria-hidden="true" title="Статус"></span>			
				</td>
				<td>
					Изменение статуса
					<span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true" title="Изменение статуса"></span>
				</td>
				<td>
					Сумма
					<span class="glyphicon glyphicon-piggy-bank" aria-hidden="true" title="Сумма"></span>
				</td>
				<td>
					Комментарий
					<span class="glyphicon glyphicon-comment" aria-hidden="true" title="Комментарий пользователя"></span>
				</td>			
				<td>
					Способ доставки
					<span class="glyphicon glyphicon-plane" aria-hidden="true" title="Способ доставки"></span>
				</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$imgUrl = Yii::app()->request->baseUrl."/images/avatars/";
				foreach ($orders as $order){
					echo "<tr ";
					if($order["is_visitor"] == 1)
						echo "class='success'>";
					else
						echo "class='warning'>";

					echo "<td>".$order["oid"]."</td>";
					echo "<td>".$order["odate"]."</td>";

					echo "<td><img src='".$imgUrl.$order["avatar"]."' width='50px'><br />";
					echo "<a href='#' id='uid".$order["uid"]."'>";
					if($order["nickname"] != null)
						echo $order["nickname"];
					else
						echo $order["mail"];
					echo "</a></td>";

					echo "<td>".$order["status"]."</td>";
					echo "<td>".$order["ch_status"]."</td>";
					echo "<td>".$order["sum"]."</td>";
					echo "<td>".$order["sum"]."</td>";
					echo "<td>".$order["method_id"]."</td></tr>";
				}
			?>
		</tbody>
	</table>
</div>