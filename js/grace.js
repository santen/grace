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
	sizes: new Array(),
	key: ""
};

var selProduct = {
	id: 0,
	cid: 0,
	key: "",
	sizes: new Array()
};

var cart = {
	count: 0,
	sum: 0
};

$(document).ready(function() {
	var uid = $.cookie("uid");
	var sid = $.cookie("sid");

	$(".hidden-layout").click(function(){
		$(".pp-quick").hide();
		$(".pp-login").hide();
	});

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

	$("#regBtn").click(function(){
		$(".pp-login").show();
		$("#regTab").click();

		$(".hidden-layout").show();
	});

	$("#entryBtn").click(function(){
		$(".pp-login").show();
		$("#loginTab").click();

		$(".hidden-layout").show();
	});

	$("#regTab").click(function(){
		$(".form-registration").show();
		$("#regTab").addClass("active");

		$("#loginTab").removeClass();
		$(".form-login").hide();
	});

	$("#loginTab").click(function(){
		$(".form-login").show();
		$("#loginTab").addClass("active");

		$("#regTab").removeClass();
		$(".form-registration").hide();
	});

	$("#ppRegBtn").click(function(){
		if($("#rPasswd0").val() == $("#rPasswd1").val()){
			if($("#rMail").val().length > 0 && $("#rPasswd0").val().length > 0){
				var user = {
					mail: $("#rMail").val(),
					pass: $("#rPasswd0").val()
				};
				$.ajax({
					type: "POST",
					url: "index.php?r=user/addajax",
					data: "user=" + JSON.stringify(user),
					success: function(data){
						var res = JSON.parse(data);

						if(res.status > 0 && res.uid > 0)
							window.location.replace(res.route);
					}
				});
			}
		}
	});

	$("#ppLoginBtn").click(function(){
		var user = {
			mail: $("#lMail").val(),
			pass: $("#lPasswd").val()
		};

		$.ajax({
			type: "POST",
			url: "index.php?r=user/authajax",
			data: "user=" + JSON.stringify(user),
			success: function(data){
				var res = JSON.parse(data);

				if(res.status == 1 && res.uid > 0)
					window.location.replace(res.route);
			}
		});
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
				window.qvProduct.key = product.key;

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
				$(".hidden-layout").show();
			}
		});
	});

	function showQVProduct(){
		window.clearProduct();
		$("#qvModel").html(window.qvProduct.model);
		$("#qvMainImg").attr("src", window.qvProduct.mainImg);
		$("#qvPrice").html(window.qvProduct.price + " руб.");

		var i;
		$("#qvContent").html("");
		for(i = 0; i < qvProduct.content.length; i++)
			$("#qvContent").append(window.qvProduct.content[i].percent + "% " + window.qvProduct.content[i].material + " ");

		$("#qvSizes").html("");
		for(i = 0; i < qvProduct.sizes.length; i++)
			$("#qvSizes").append("<div onclick='window.addSize(this)' class='size-value' id='pSize" + window.qvProduct.sizes[i].sid +"'>" + window.qvProduct.sizes[i].size + "</div>");

		var img;
		$(".pp-images").html("");
		for(i = 0; i < qvProduct.images.length; i++){			
			img = $("<img>");
			img.attr("src", window.qvProduct.images[i].img);
			img.attr("onclick", "window.showImage(this)");
			img.addClass("pp-image");
			$("#qvImages").append(img);
		}

		if(qvProduct.colors.length == 0)
			$("#qvColors").hide();
		$(".pp-colors").html("");
		for(i = 0; i < qvProduct.colors.length; i++)
			$(".pp-colors").append("<img src='" + window.qvProduct.colors[i].mainImg + "' class='pp-image'>");
	}

	$("#toCartBtn").click(function(){
		window.setProduct();
		$.ajax({
			type: "POST",
			url: "index.php?r=order/cartajax",
			data: "cart=" + JSON.stringify(window.selProduct),
			success: function(data){
				var order = JSON.parse(data);
				switch(parseInt(order.status)){
					case 1:
						window.cart.count += order.goods;
						$("#cartCount").html(window.cart.count);
						window.cart.sum = order.price;
						break;
					case -2:
						window.showError("Ошибка авторизации", "Для оформления заказа необходимо войти");
						break;
					case -3:
						window.showError("Ошибка", "Вы не указали размер");
						break;
				}
			}
		});
	});

	$("#erOkBtn").click(function(){
		$(".pp-error").hide();
	});
});

function showImage(obj){
	$("#qvMainImg").attr("src", $(obj).attr("src"));
}

function addSize(obj){
	var sid = $(obj).attr("id").substr(5);

	for(var i = 0; i < window.selProduct.sizes.length; i++){
		if(window.selProduct.sizes[i] == sid){
			window.selProduct.sizes[i] = 0;
			$(obj).switchClass("size-active", "size-value");
			return;
		}	
	}

	window.selProduct.sizes.push(sid);
	$(obj).switchClass("size-value", "size-active");
}

function setProduct(){
	if(window.selProduct.id == 0){
		window.selProduct.id = qvProduct.id;
		window.selProduct.cid = qvProduct.category;
		window.selProduct.key = qvProduct.key;
	}
}

function clearProduct(){
	window.selProduct.id = 0;
	window.selProduct.cid = 0;
	window.selProduct.key = "";
	window.selProduct.sizes = [];
}

function showError(title, text){
	$(".pp-error").show();
	$(".pp-error-header").html(title);
	$(".pp-error-body").html(text);
}