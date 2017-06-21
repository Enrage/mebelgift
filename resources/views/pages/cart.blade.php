@extends('layout.app')

@section('content')
<section class="content col-xs-12 col-md-8 col-lg-9">
	<article class="my_cart">
		<h2>Ваша корзина</h2>
		@if (count($orders) <= 0)
			<p>Корзина пуста</p>
		@else
		<form action="/checkout" method="post">
			<table class="cart_table">
				<tr>
					<th>ID</th>
					<th>Наименование</th>
					<th>Изображение</th>
					<th>Цена</th>
					<th>Кол-во</th>
					<th>Сумма</th>
					<th class="delete">Удалить</th>
				</tr>
				@foreach ($orders as $order)
				<tr>
					<td>{{$order->item_id}}</td>
					<td class="title_product"><a href="/catalog/{{$order->category}}/{{$order->brand}}/{{$order->item_id}}" target="_blank" title="{{$order->title}}">{{$order->title}}</a></td>
					<td class="img_product"><a href="/catalog/{{$order->category}}/{{$order->brand}}/{{$order->item_id}}" target="_blank" title="{{$order->title}}"><img src="{{$order->img}}" alt="{{$order->title}}"></a></td>
					<td class="price_product"><span>{{$order->price}}</span> руб</td>
					<td class="qty_product"><input type="text" name="qty" value="{{$order->amount}}" class="total"></td>
					<td class="price_order">{{$order->price * $order->amount}}</td>
					<td><a href="#" class="del_order"><img src="{{asset('img/icons/del.png')}}" alt="Удалить из корзины"></a></td>
				</tr>
				@endforeach

				<tr>
					<td colspan="7" class="footer_cart">
						<a href="{{$_SERVER['HTTP_REFERER']}}" class="continue_shopping">Продолжить покупки</a>
						<p class="summa_order">Общая стоимость заказа: <span class="total_cost">0</span> руб.</p>
					</td>
				</tr>
			</table>

			<div class="info_dostavka">
				<h4>Информация для связи:</h4>
				<table class="user_data">
					<tr>
						<td class="info_title"><span>*</span> Ваше имя:</td>
						<td><input type="text" name="name" value="" placeholder="Введите имя"></td>
					</tr>
					<tr>
						<td class="info_title"><span>*</span> E-mail:</td>
						<td><input type="text" name="email" value="" placeholder="Введите E-mail"></td>
					</tr>
					<tr>
						<td class="info_title"><span>*</span> Телефон:</td>
						<td><input type="text" name="phone" value="" placeholder="Введите телефон"></td>
					</tr>
					<tr>
						<td class="info_title">&nbsp;&nbsp;Примечание:</td>
						<td><textarea name="prim"></textarea></td>
					</tr>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
				</table>
			</div>
			<input type="submit" name="order" value="Заказать" class="order">
		</form>
		@endif
	</article>

</section>
@stop