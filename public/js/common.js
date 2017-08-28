$(document).ready(function() {
	var $window = $(window);

	$('.sub > a').click(function() {
		let ul = $(this).next(),
			clone = ul.clone().css({'height': 'auto'}).appendTo('.catalog'),
			height = ul.css('height') === '0px' ? ul[0].scrollHeight + 'px' : '0px';
		clone.remove();
		ul.animate({'height': height});
		return false;
	});
	$('.catalog > ul > li > a').click(function() {
		$('.sub a').removeClass('active');
		$(this).addClass('active');
	}),
	$('.sub ul li a').click(function(){
		$('.sub ul li a').removeClass('active');
		$(this).addClass('active');
	});

	if ($window.width() > 991) {
		$('.sign_in').click(function() {
			$('.enter_form').animate({width: 'toggle'}, 140);
		});
	} else if ($window.width() < 992) {
		$('.sign_in').click(function() {
			$('.enter_form').fadeToggle(400);
		});
	}

	$('.bxslider').bxSlider({
		mode: 'fade',
		captions: true,
		responsive: true,
		adaptiveHeight: true,
		auto: true,
		pause: 3000,
		speed: 1500
	});

	$('.navbar-toggler').click(function() {
		$('.navbar-nav').fadeToggle(200);
	});

	// Поведение верхнего меню и поиска при изменении ширины
	$window.resize(function() {
		if ($window.width() > 991 || $window.width() < 544) {
			$('.search').css('display', 'block');
			$('.icon_search').css('display', 'none');
		} else if ($window.width() < 992 || $window.width() > 543) {
			$('.search').css('display', 'none');
			$('.icon_search').css('display', 'block');
		}

		if ($window.width() > 543) {
			$('.navbar-nav').css('display', 'block');
		} else if ($window.width() < 544) {
			$('.navbar-nav').css('display', 'none');
		}
	});

	if ($window.width() > 543 && $window.width() < 977) {
		$('.search').css('display', 'none');
	}

	$('.icon_search').click(function() {
		$('.search').slideToggle(200);
	});

	// Переключение вкладок
	$('dl.tabs dt').click(function() {
		$(this).siblings().removeClass('active').end().next('dd').andSelf().addClass('active');
	});

	$('.buy').click(function() {
		let item_id = parseInt($(this).attr('id')); //получаем id товара
		let price = parseFloat($(this).prev().children('span').html()); //получаем цену товара и преобразуем значение в число parseInt
		let img = $(this).parent().children('a').find('img').attr('src'); //получаем ссылку на изображение, что бы отразить в корзине
		if (!img) img = $(this).parent().parent().children('.product_images').find('img').attr('src');
		let title = $(this).parent().children('h3').find('a').html(); //название товара
		if (!title) title = $(this).parent().children('h2').text();
		//теперь нужно узнать есть ли в куках уже такой товар
		let brand = $(this).parent().children('a.products_img').find('img').attr('class');
		if (!brand) brand = $(this).parent().children('h2').attr('id');
		let category = $(this).parent().children('h3').attr('class');
		if (!category) category = $(this).parent().children('h2').attr('class');

		let order = $.cookie('basket'); //получаем куки с именем basket
		!order ? order = []: order = JSON.parse(order);
		if (order.length == 0) {
			order.push({'item_id': item_id, 'price': price,'amount': 1,'img': img,'title': title, brand: brand, category: category});//добавляем объект к пустому массиву
		} else {
			let flag = false; //флаг, который указывает, что такого товара в корзине нет
			for (var i = 0; i < order.length; i++) { //перебираем массив в поисках наличия товара в корзине
				if (order[i].item_id == item_id) {
					order[i].amount = order[i].amount + 1; //если товар уже в корзине, то добавляем +1 к количеству (amount)
					flag = true; //поднимаем флаг, что такой товар есть и с ним делать ничего не нужно
				}
			}
			if (!flag) {//если флаг опущен, значит товара в корзине нет и его надо добавить.
				order.push({'item_id': item_id, 'price': price,'amount': 1,'img': img,'title': title, brand: brand, category: category}); //добавляем к существующему массиву новый объект
			}
		}
		$.cookie('basket', JSON.stringify(order), {
			path: '/'
		}); // переделываем массив с объектами в строку и сохраняем в куки
		count_order(); //запускаем функция для отображения количества заказов, текст функции напишу ниже.
	});

	function count_order() {
		let order = $.cookie('basket'); //получаем куки
		order ? order = JSON.parse(order): order = []; //если заказ есть, то куки переделываем в массив с объектами
		let count = 0; // количество товаров
		if (order.length>0) {
			for (var i = 0; i < order.length; i++) {
				count = count + parseInt(order[i].amount);
			}
		}
		$('.count_order').html(count);// отображаем количество товаров корзине.
	}
	count_order();//запускаем функцию при загрузке страницы

	$('.total').bind('change keyup', function() {
		let value = $(this).val(); //получаем введенное значение
		if (value.match(/[^0-9]/g) || value <= 0) { //проверяем, что введенно число, что оно не равно нулю и не отрицательное.
			$(this).val('1'); //если условие выше не выполняется, то значение равно 1
		}
		let price = $(this).parent().prev().find('span').html(); //получаем цену товара
		$(this).parent().next().html(value * price); //пересчитываем общую цену за товар
		let item_id = $(this).parent().parent().children().first().html(); //получаем id товара
		set_amount(item_id, value); //сохраняем новое количество товара в куки
		insert_cost();
	});

	function set_amount(item_id, amount) {
		let order = JSON.parse($.cookie('basket')); //получаем куки и переделываем в массив с объектами
		for (var i = 0; i < order.length; i++) { //перебераем весь массив с объектами
			if (order[i].item_id == item_id) { //ищем нужный id
				order[i].amount = amount; // устанавливаем количество товара
			}
		}
		$.cookie('basket', JSON.stringify(order)); // сохраняем все в куки
		count_order(); //не забываем обновлять количество товаров в корзине
	}

	$('.del_order').click(function() {
		let string = $(this).parent().parent();// выбираем всю строку в таблице
		let item_id = $(this).parent().parent().children().first().html();//получаем id товара
		string.remove();// удаляем строку
		let order = JSON.parse($.cookie('basket'));//получаем массив с объектами из куки
		for (var i = 0; i < order.length; i++) {
			if (order[i].item_id == item_id) {
				order.splice(i, 1); //удаляем из массива объект
			}
		}
		$.cookie('basket', JSON.stringify(order));//сохраняем объект в куки
		count_order(); //обновляем корзину
		insert_cost();
		let all_order = $('tr'); //получаем все строки таблицы
		if (all_order.length <= 2) {
			document.location.href = '/';
		} //если нет ни одного заказа, то перезагружаем страницу
	});

	function total_cost() {
		let order = JSON.parse($.cookie('basket'));
		let total = 0;
		for (var i = 0; i < order.length; i++) {
			total = total + (order[i].amount * order[i].price);
		}
		return total;
	}

	function insert_cost() {
		$('.total_cost').html(total_cost());
	}

	insert_cost();

	$('.gallery').fancybox({
		maxWidth: 1100,
		maxHeight: 800,
		autoSize: true,
		closeClick: true,
		openEffect: 'elastic',
		openSpeed: 250,
		closeEffect: 'elastic',
		closeSpeed: 50
	});
});