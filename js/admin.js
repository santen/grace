$(document).ready(function() {
	$("#newcat").click(function(){
		$(".pp-category").show();
		$(".hidden-layout").show();
	});

	$(".hidden-layout").click(function(){
		$(".pp-category").hide();
		$("#pp_product").hide();
		$("#pp_brand").hide();
		$("#pp_material").hide();
		$("#pp_size").hide();
		$(".hidden-layout").hide();		

		ressetProductForm();
	});

	$("#cnclbtn").click(function(){
		$(".hidden-layout").click();
	});

	$("#newprod").click(function(){		
		$("#pp_product").show();
		$(".hidden-layout").show();

		$("#step1_form").show();
	});

	$("#okbtn").click(function(){
		$("#step1").removeClass();
		$("#step2").addClass("active");

		$("#step1_form").hide();
		$("#step2_form").show();

		$("#addprodbtn").show();
		$("#okbtn").hide();
	});

	$("#step1").click(function(){
		//$("#step1").addClass("active");
		//$("#step2").removeClass();

		$("#step1_form").show();
		$("#step2_form").hide();
	});

	$("#step2").click(function(){
		//$("#step2").addClass("active");
		//$("#step1").removeClass();

		$("#step1_form").hide();
		$("#step2_form").show();
	});

	$("#step3").click(function(){
		//$("#step3").addClass("active");
		//$("#step2").removeClass();
		//$("#step1").removeClass();

		$("#step1_form").hide();
		$("#step2_form").hide();
		$("#step3_form").show();
	});

	$("#step4").click(function(){
		//$("#step3").addClass("active");
		//$("#step2").removeClass();
		//$("#step1").removeClass();

		$("#step1_form").hide();
		$("#step2_form").hide();
		$("#step3_form").hide();
		$("#step4_form").show();
	});

	function resetProductForm(){
		$("#step1").addClass("active");
		$("#step2").removeClass();		

		$("#step1_form").hide();
		$("#step2_form").hide();

		//$("#prod_form")
	}

	$("#division").change(function(){
		$.ajax({
			type: "GET",
			url: "index.php?r=admin/catalog/categoriesajax",
			data: "div=" + $("#division").val(),
			success: function(data){
				$("#category").find("option").remove();
				$("#category").append("<option value='0'></option>");

				var categories = JSON.parse(data);
				for(var i = 0; i < categories.length; i++)
					$("#category").append("<option value='" + categories[i].id + "'>" + categories[i].name + "</option>");
			}
		});
	});

	$("#addprodbtn").mouseover(function(){
		var state = 1;
		if($("#model").val().length == 0)
			state *= 0;
		else
			state *= 1;

		console.log("state = " + state);

		if($("#price").val().length == 0)
			state *= 0;
		else
			state *= 1;

		console.log("state = " + state);

		if($("#category").val() != 0)
			state *= 1;
		else
			state *= 0;

		console.log("category = " + $("#category").val());
		console.log("state = " + state);

		if($("#division").val() != 0)
			state *= 1;
		else
			state *= 0;

		console.log("division = " + $("#division").val());
		console.log("state = " + state);

		if(state == 0)
			$("#addprodbtn").attr("disabled", true);
			
	});

	$(".form-group").click(function(){
		$("#addprodbtn").attr("disabled", false);
	});

	//for BrandWidget
	$("#brands").click(function(){
		$("#pp_brand").show();
		$(".hidden-layout").show();
	});

	$("#cnclbrand").click(function(){
		$(".hidden-layout").click();
	});

	//for MaterialWidget
	$("#materials").click(function(){
		$("#pp_material").show();
		$(".hidden-layout").show();
	});

	$("#cnclmaterial").click(function(){
		$(".hidden-layout").click();
	});

	//for SizeWidget
	$("#sizes").click(function(){
		$("#pp_size").show();
		$(".hidden-layout").show();
	});

	$("#cnclsize").click(function(){
		$("#size_val").val("");
		$(".hidden-layout").click();
	});

	$(".form-control").change(function(){
		$("select option:selected").each(function(){
			$(this).attr("selected", false);
		});
	});

	$("#addsize").click(function(){
		$.ajax({
			type: "POST",
			url: "index.php?r=admin/catalog/sizeajax",
			data: "size=" + JSON.stringify({'val':$("#size_val").val(), 'std':$("#standard").val()}),
			success: function(data){
				var size = JSON.parse(data);
				if(size.status == 1){
					$("#sizelst").prepend("<option value='" + size.sizeid + "'>" + size.val + "</option>");
					$("#size_val").val("");
				}
				else{
					$(".error").fadeIn();
					setTimeout(function(){
						$(".error").fadeOut();
					}, 10000);
				}

			}
		});		
	});

	$("#addmaterial").click(function(){
		$.ajax({
			type: "POST",
			url: "index.php?r=admin/catalog/materialajax",
			data: "material=" + JSON.stringify({'name':$("#material_name").val()}),
			success: function(data){
				var material = JSON.parse(data);
				if(material.status == 1){
					$("#materiallst").prepend("<option value='" + material.materialid + "'>" + material.name + "</option>");
					$("#material_name").val("");
				}
				else{
					$(".error").fadeIn();
					setTimeout(function(){$(".error").fadeOut();}, 10000);
				}
			}
		});
	});

	$("#addbrand").click(function(){
		$.ajax({
			type: "POST",
			url: "index.php?r=admin/catalog/brandajax",
			data: "brand=" + JSON.stringify({'name':$("#brand_name").val()}),
			success: function(data){
				var brand = JSON.parse(data);
				if(brand.status == 1){
					$("#brandlst").prepend("<option value='" + brand.brandid + "'>" + brand.name + "</option>");
					$("#brand_name").val("");
				}
				else{
					$(".error").fadeIn();
					setTimeout(function(){$(".error").fadeOut();}, 10000);
				}
			}
		});
	});
});