var qvProduct = {
	id: 0,
	category: 0,
	artikul: "",
	model: "",
	price: "",
	mainImg: "",
	descr: "",
	images: new Array(),
	colors: new Array(),
	content: new Array(),
	sizes: new Array()
};

var selProduct = {
	id: 0,
	count: new Array()	
};

$(document).ready(function() {
	var uid = $.cookie("uid");
	var sid = $.cookie("sid");

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

	$(".avatar-wrap").mouseover(function(){
		$(".avatar-menu").show();
	});

	$(".avatar-wrap").mouseout(function(){
		$(".avatar-menu").hide();
	});

	$(".avatar").click(function(){
		$("#ava").attr("src", "/grace/images/avatars/4.jpg");
	});

	$(".avatar-menu").click(function(){
		$("#favatar").click();
	});

	$("#favatar").change(function(){

	});

	$(".quick-view-action").click(function(){
		var prodId = $(this).attr("id").substr(3);

		$.ajax({
			type: "GET",
			url: "index.php?r=catalog/productajax",
			data: "id=" + prodId,
			success: function(data){
				var product = JSON.parse(data);
				
				window.qvProduct.id = product.id;
				window.qvProduct.category = product.cid;
				window.qvProduct.artikul = product.artikul;
				window.qvProduct.model = product.model;
				window.qvProduct.price = product.price;
				window.qvProduct.mainImg = product.mainImg;
				window.qvProduct.descr = product.descr;

				var i;
				window.qvProduct.sizes = [];
				window.qvProduct.images = [];
				window.qvProduct.colors = [];
				window.qvProduct.content = [];
				for(i = 0; i < product.sizes.length; i++)
					window.qvProduct.sizes.push(product.sizes[i]);
				for(i = 0; i < product.images.length; i++)
					window.qvProduct.images.push(product.images[i]);
				for(i = 0; i < product.colors.length; i++)
					window.qvProduct.colors.push(product.colors[i]);
				for(i = 0; i < product.content.length; i++)
					window.qvProduct.content.push(product.content[i]);
				
				console.log(JSON.stringify(qvProduct));

				showQVProduct();

				$(".pp-quick").show();
			}
		});
	});

	function showQVProduct(){
		$("#qvModel").html(window.qvProduct.model);
		$("#qvMainImg").html(window.qvProduct.mainImg);
		$("#qvPrice").html(window.qvProduct.price + " рублей");

		var i;
		$("#qvContent").html("");
		for(i = 0; i < qvProduct.content.length; i++)
			$("#qvContent").append(window.qvProduct.content[i].percent + "% " + window.qvProduct.content[i].material + " ");

		$("#qvSizes").html("");
		for(i = 0; i < qvProduct.sizes.length; i++)
			$("#qvSizes").append("<div class='size-value'>" + window.qvProduct.sizes[i].size + "</div>");

		$(".pp-images").html("");
		for(i = 0; i < qvProduct.images.length; i++)
			$(".pp-images").append("<img src='" + window.qvProduct.images[i].img + "' class='pp-image'>");

		$(".pp-colors").html("");
		for(i = 0; i < qvProduct.colors.length; i++)
			$(".pp-colors").append("<img src='" + window.qvProduct.colors[i].mainImg + "' class='pp-image'>");
	}

	$("#toCartBtn").click(function(){
		$.ajax({
			type: "GET",
			url: "index.php?r=catalog/cartajax",
			data: "id=" + prodId,
			success: function(data){
				var order = JSON.parse(data);
			}
		});
	});
});