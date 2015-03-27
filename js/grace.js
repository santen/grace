$(document).ready(function() {
	$("#price_slider").slider({
		min: 500,
		max: 80000,
		step: 50,
		values: [500, 80000],
		range: true,
		slide: function(event, ui){
			$("#price_min").html($("#price_slider").slider("values",0));
			$("#price_max").html($("#price_slider").slider("values",1));
		}
	});

	$("#height_slider").slider({
		min: 50,
		max: 120,
		step: 1,
		values: [50, 120],
		range: true,
		slide: function(event, ui){
			$("#height_min").html($("#height_slider").slider("values",0) + " см");
			$("#height_max").html($("#height_slider").slider("values",1) + " см");
		}
	});

	$("#eur_tab").click(function(){
		$("#rus_tab").removeClass();
		$("#eur_tab").addClass("active");

		$("#e_materials").css("display", "block");
		$("#r_materials").css("display", "none");
	});

	$("#rus_tab").click(function(){
		$("#eur_tab").removeClass();
		$("#rus_tab").addClass("active");

		$("#r_materials").css("display", "block");
		$("#e_materials").css("display", "none");
	});

	$(".product-name").click(function(){
		$(".pp-quick").show();
		$(".hidden-layout").show();
	});

	$(".hidden-layout").click(function(){
		$(".pp-quick").hide();
		$(".pp-user").hide();
		$(".hidden-layout").hide();
	});

	$("#reg_btn").click(function(){
		$(".pp-user").show();
		$("#reg_tab").click();

		$(".hidden-layout").show();
	});

	$("#entry_btn").click(function(){
		$(".pp-user").show();
		$("#entry_tab").click();

		$(".hidden-layout").show();
	});

	$("#reg_tab").click(function(){
		$("#reg_form").show();
		$("#reg_tab").addClass("active");

		$("#entry_tab").removeClass();
		$("#entry_form").hide();
	});

	$("#entry_tab").click(function(){
		$("#entry_form").show();
		$("#entry_tab").addClass("active");

		$("#reg_tab").removeClass();
		$("#reg_form").hide();
	});
});