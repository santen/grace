<div class="periods">
	<?php
		echo "<ul class='nav nav-pills nav-stacked'>";
		$i = 1;
		foreach($periods as $period){
			if($i == $current)
				echo "<li role='presentation' class='active'>
						<a href='".CHtml::normalizeUrl(array("order/orders", "p" => $i++))."'>".$period."<span class='badge'>14</span></a>
					  </li>";
			else
				echo "<li role='presentation'>
						<a href='".CHtml::normalizeUrl(array("order/orders", "p" => $i++))."'>".$period."<span class='badge'>21</span></a>
					  </li>";
		}
		echo "</ul>";
	?>
</div>