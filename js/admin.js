$(document).ready(function() {
	$("#newcat").click(function(){
		$(".pp-category").show();
		$(".hidden-layout").show();
	});

	$(".hidden-layout").click(function(){
		$(".pp-category").hide();
		$(".hidden-layout").hide();
	});

	$("#cnclcat").click(function(){
		$(".hidden-layout").click();
	});
});