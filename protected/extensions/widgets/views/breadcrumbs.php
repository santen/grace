<?php
//если это не корневая категория то показываем хлебные крошки
if(count($categories) != 1){
?>
	<ol class="breadcrumb">
		<?php
		$url = CHtml::normalizeUrl(array('catalog/category'));
		for($i = count($categories[1]) - 1; $i >= 0; $i--){
			if($i != 0)
				echo "<li><a href='".$url."&cat=".$categories[1][$i]["id"]."'>".$categories[1][$i]["name"]."</a></li>";			
			else
				echo "<li class='active'>".$categories[1][$i]["name"]."</li>";
			
		}
		?>
	</ol>
<?php
}
?>