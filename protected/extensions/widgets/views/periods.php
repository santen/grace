<div class="periods">
	<?php
		echo "<ul class='nav nav-pills nav-stacked'>";
		$i = 1;
		foreach($periods as $key => $period){
			if($i == 1)
				echo "<li role='presentation' class='active' id='oPeriod".$i++."'>
						<a href='#'>".$key."<span class='badge'>14</span></a>
					  </li>";
			else
				echo "<li role='presentation' id='oPeriod".$i++."'>
						<a href='#'>".$key."<span class='badge'>21</span></a>
					  </li>";
		}
		echo "</ul>";
	?>
</div>