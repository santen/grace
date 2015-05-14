<ul class="nav nav-tabs">
	<?php
		$active = "class='active'";
		$i = 0;
		foreach($divisions as $division => $route){
			if($i < 4){
				$link = CHtml::normalizeUrl(array($route."/category", 'div' => $i + 1));
				if($div == $i + 1)
					echo "<li role='presentation' ".$active."><a href='".$link."'>".$division."</a></li>";
				else
					echo "<li role='presentation'><a href='".$link."'>".$division."</a></li>";
			}
			else{
				$link = CHtml::normalizeUrl(array($route."/index"));
				if($controller == $route)
					echo "<li role='presentation' ".$active."><a href='".$link."'>".$division."</a></li>";
				else
					echo "<li role='presentation' ><a href='".$link."'>".$division."</a></li>";
			}

			$i++;
		}
	?>
</ul>