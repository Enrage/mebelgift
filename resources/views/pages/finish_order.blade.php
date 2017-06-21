@extends('layout.app')

@section('content')
<section class="content col-xs-12 col-md-8 col-lg-9">
	<article class="my_cart">
		<h2>Ваш заказ принят</h2>
		<table class="cart_table">
			<tr>
				<th>ID</th>
				<th>Название</th>
				<th>Изображение</th>
				<th>Цена</th>
				<th>Кол-во</th>
				<th>Сумма</th>
			</tr>
			@foreach ($zakaz as $order)
			<tr>
				<td>{{$order->item_id}}</td>
				<td>{{$order->title}}</td>
				<td class="img_product"><img src="{{asset('files/products_img/'.$order->category.'/'.$order->img_src)}}" alt="{{$order->title}}"></a></td>
				<td>{{$order->price}} руб</td>
				<td>{{$order->amount}}</td>
				<td>{{$order->price * $order->amount}}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="6" class="total_cost">Общая сумма заказа: <span>{{$total}}</span> руб.</td>
			</tr>
		</table>
		<p class="info_order">Информация для связи с Вами:</p>
		<p class="info_data_order">
			Ваше имя: <span>{{$zakaz[0]->name}}</span><br>
			Ваш Email: <span>{{$zakaz[0]->email}}</span><br>
			Ваш телефон: <span>{{$zakaz[0]->phone}}</span>
		</p>
		<p class="success_order">Спасибо за Ваш заказ. Мы свяжемся с Вами в течение 15 минут.</p>
	</article>
</section>
@stop