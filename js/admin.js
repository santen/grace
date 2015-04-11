var currentStep = 1;
var newProduct = {
	model: "",
	category: 0,
	price: 0,
	artikul: "",
	mainImage: "",
	brief: "",
	content: new Array(),
	sizes: new Array(),
	otherImages: new Array()
}

$(document).ready(function() {
	$("#newcat").click(function(){
		$(".pp-category").show();
		$(".hidden-layout").show();
	});

	$(".hidden-layout").click(function(){
		$(".pp-category").hide();		
		$(".hidden-layout").hide();		

		resetProductForm();
		$(".pp-modal").hide();
	});

	$("#cnclbtn").click(function(){
		$(".hidden-layout").click();
	});

	$(".btn-xs").click(function(){
		$.cookie();
	});

	// ProductWidget
	$("#newprod").click(function(){
		getSizes();
		$("#pp_product").show();
		$(".hidden-layout").show();
		$("#step1").click();
	});

	$("#okbtn").click(function(){
		$("#step" + window.currentStep).switchClass("step-active", "step");
		$('#step' + window.currentStep + "_form").hide();

		window.currentStep++;
		$("#step" + window.currentStep).switchClass("step", "step-active");
		$('#step' + window.currentStep + "_form").show();

		if(window.currentStep == 4){
			$("#add_prod").show();
			$("#okbtn").hide();
		}
	});

	$(".step").click(function(){
		var step = $(this).attr("id");		
		$("#" + step).switchClass("step", "step-active");
		$("#step" + window.currentStep).switchClass("step-active", "step");
		//скрываем предыдущую часть формы...
		$("#step" + window.currentStep + "_form").hide();
		window.currentStep = step[4];
		// и показываем текущую часть
		$("#step" + window.currentStep + "_form").show();
	});

	$("#step1").click(function(){		
		$("#step" + window.currentStep).switchClass("step-active", "step");
		$("#step" + window.currentStep + "_form").hide();

		$("#step1").switchClass("step", "step-active");
		window.currentStep = 1;
		$("#step1_form").show();
	});

	$("#pCategory").change(function(){
		window.newProduct.category = $("#pCategory").val();
	});

	$("#pModel").change(function(){
		window.newProduct.model = $("#pModel").val();
	});

	$("#pArtikul").change(function(){
		window.newProduct.artikul = $("#pArtikul").val();
	});

	$("#pPrice").change(function(){
		window.newProduct.price = $("#pPrice").val();
	});

	$("#pAddSize").click(function(){
		var pSize = $("#prod_sizes option:selected").text();
		var pSizeCount = $("#size_count").val();
		var sizesCount = $("#p_sizes").size();

		$("#p_sizes").append("<option value='" + sizesCount + "'>" + pSizeCount + " - " + pSize + "</option>");
		window.newProduct.sizes.push(pSizeCount + "-" + pSize);

		$("#size_count").val("");
		$("#prod_sizes").prop('selectedIndex',0);
	});

	$("#pAddMaterial").click(function(){
		var matPercent = $("#pMatPercent").val();
		var material = $("#pMaterials option:selected").text();
		var contentSize = $("#pContent").size();

		window.newProduct.content.push(matPercent + "-" + material);
		$("#pContent").append("<option value='" + contentSize + "'>" + matPercent + " " + material + "</option>");

		$("#pMatPercent").val("");
		$("#pMaterials").prop('selectedIndex',0);
	});

	function resetProductForm(){		
		$("#add_prod").hide();
		$("#okbtn").show();
	}

	function getSizes(){
		//$("#sizelst").find("option").remove();
		var sizes = $("#sizelst > option").clone();

		//$("#prod_sizes").append("<option value='0'>Размеры</option>");
		for(var i = 0; i < sizes.length; i++)
			$("#prod_sizes").append(sizes[i]);
	}

	function getCategories(){
		$("#sizelst").find("option").remove();
		var sizes = $("#sizelst > option").clone();

		$("#prod_sizes").append("<option value='0'>Размеры</option>");
		for(var i = 0; i < sizes.length; i++)
			$("#prod_sizes").append(sizes[i]);
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

	$("#prod_img").click(function(){
		$("#fmain_img").click();
	});

	$("#fmain_img").change(function(){
		var prodImg = $("#fmain_img")[0].files[0];

		readImage(prodImg, "#main_img");

		window.newProduct.mainImage = $("#fmain_img").val();
	});

	$("#add_other_img").click(function(){
		$("#prod_images").click();
	});

	$("#prod_images").change(function(){
		var files = $("#prod_images")[0].files;

		for(var i = 0; i < files.length; i++){
			readImage(files[i], "#prod_img" + i);

			window.newProduct.otherImages.push(files[i]);
		}
	});

	function readImage(img, objId){
		var imgReader = new FileReader();

		imgReader.onload = function(){
			$(objId).attr("src", imgReader.result);
		}

		imgReader.readAsDataURL(img);
	}

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

	// end ProductWidget

	$("#cnclbrand").click(function(){
		$(".hidden-layout").click();
	});

	// SizeWidget
	$("#sizes").click(function(){
		$("#pp_size").show();
		$(".hidden-layout").show();
	});

	$("#cnclsize").click(function(){
		$("#size_val").val("");
		$(".hidden-layout").click();
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
	// end SizeWidget

	// MaterialWidget
	$("#materials").click(function(){
		$("#pp_material").show();
		$(".hidden-layout").show();
	});

	$("#cnclmaterial").click(function(){
		$(".hidden-layout").click();
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
	// end MaterialWidget

	//for BrandWidget
	$("#brands").click(function(){
		$("#pp_brand").show();
		$(".hidden-layout").show();
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
	// end BrandWidget

	// ColorWidget
	$("#colors").click(function(){
		$("#pp_color").show();
		$(".hidden-layout").show();
	});

	$("#select_color").click(function(){
		$("#fcolorimg").click();
	});

	$("#addcolor").click(function(){
		var formData = new FormData();
		formData.append("color_name", $("#color_name").val());
		formData.append("fcolorimg", $("#fcolorimg")[0].files[0]);		

		$.ajax({
			type: "POST",
			url: "index.php?r=admin/catalog/addcolorajax",
			processData: false,
			contentType: false,
			data: formData,
			success: function(data){
				var color = JSON.parse(data);
				if(color.status == 1){
					$("#colorlst").prepend("<option value='" + color.colorid + "'>" + color.name + "</option>");
					$("#sample_color").attr("src", color.img);
					$("#color_name").val("");
				}
				else{
					$(".error").fadeIn();
					setTimeout(function(){$(".error").fadeOut();}, 10000);
				}
			}
		});
	});

	$("#colorlst").click(function(e){
		var id = $("#colorlst").val();						
		$(".color-preview").offset({ top: e.pageY, left: e.pageX + 20 });

		$.ajax({
			type: "GET",
			url: "index.php?r=admin/catalog/getcolorajax&id=" + id,
			success: function(data){
				var color = JSON.parse(data);
				$("#color-img").attr("src", color.img);
				$(".color-preview").fadeIn();
				setTimeout(function(){$(".color-preview").fadeOut();}, 3000);
			}
		});
	});	
	// end ColorWidget

	// SeasonWidget
	$("#seasons").click(function(){
		$("#pp_season").show();
		$(".hidden-layout").show();
	});

	$("#add_season").click(function(){
		$.ajax({
			type: "POST",
			url: "index.php?r=admin/catalog/addseasonajax",
			data: "season=" + JSON.stringify({'name':$("#season_val").val()}),
			success: function(data){
				var season = JSON.parse(data);
				if(season.status == 1){
					$("#seasonlst").prepend("<option value='" + season.seasonid + "'>" + season.name + "</option>");
					$("#season_name").val("");
				}
				else{
					$(".error").fadeIn();
					setTimeout(function(){$(".error").fadeOut();}, 10000);
				}
			}
		});
	});
	// end SeasonWidget
});