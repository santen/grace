$(document).ready(function() {
	$("#newcat").click(function(){
		$(".pp-category").show();
		$(".hidden-layout").show();
	});

	$(".hidden-layout").click(function(){
		$(".pp-category").hide();
		$(".pp-product").hide();
		$(".hidden-layout").hide();

		ressetProductForm();
	});

	$("#cnclbtn").click(function(){
		$(".hidden-layout").click();
	});

	$("#newprod").click(function(){		
		$(".pp-product").show();
		$(".hidden-layout").show();

		$("#step1_form").show();
	});

	$("#okbtn").click(function(){
		$("#step1").removeClass();
		$("#step2").addClass("active");

		$("#step1_form").hide();
		$("#step2_form").show();
	});

	function resetProductForm(){
		$("#step1").addClass("active");
		$("#step2").removeClass();		

		$("#step1_form").hide();
		$("#step2_form").hide();

		//$("#prod_form")
	}
});