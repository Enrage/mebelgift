<header>
	<div class="top_menu">
		<nav class="navbar container">
			<div class="col-xs-12 col-lg-9">
	      <button class="navbar-toggler hidden-sm-up" type="button">
	          &#9776; &nbsp;Меню
	      </button>
				<div id="navbar-header">
					<ul class="nav navbar-nav">
						<li><a href="/">Главная</a></li>
						@foreach ($pages as $item)
							@if ($item->alias == 'catalog')
								<li><a href="/catalog">Каталог</a></li>
								@continue
							@endif
						<li><a href="/pages/{{$item->alias}}">{{$item->title}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-xs-2 col-lg-3 search">
				<input class="search_input" type="text" name="search" value="" placeholder="Что ищем">
				<input class="search_submit" type="submit" name="submit" value="">
			</div>
			<div class="icon_search"></div>
		</nav>
	</div>

	<section class="banner">
		<div class="container">

			<div class="logo col-xs-6 col-md-4 col-lg-3">
				<h1>Mebel<span>Gift</span></h1>
				<h2>Мебельный подарок</h2>
				<a href="/"><img src="{{asset('img/logo.png')}}" alt="Магазин мебели"></a>
			</div>

			<div class="contacts col-xs-6 col-md-4 col-lg-3">
				<p class="phone">8(800)123-45-67</p>
				<p class="mail"><a href="mailto:mebelgift@gmail.com">mebelgift@gmail.com</a></p>
			</div>

			<div class="work col-xs-6 col-md-4 col-lg-3">
				<button class="call_me">
					Заказать звонок
				</button>
				<p class="work_time">Время работы</p>
				<p>Пн - Пт: с 9.00 до 18.00</p>
			</div>

			<div class="user_block col-xs-12 col-lg-3">
				<nav class="navbar">
					<ul class="nav">
						<!-- <li><a href="#">Вход<i class="fa fa-sign-in"></i></a></li>
						<li><a href="#">Регистрация<i class="fa fa-user"></i></a></li> -->
						<li class="cart"><a href="/cart">Корзина<i class="fa fa-shopping-cart"></i></a><br>
						(Товаров: <span class="count_order">0</span>)</li>
					</ul>
				</nav>
			</div>
		</div>
	</section>
</header><!-- /header -->