@extends('layout.app')

@section('content')
<section class="content col-xs-12 col-md-8 col-lg-9">

	<!-- <section class="bread_crumbs">
		<p><a href="#">Мебель для спальни</a> >> <a href="#">Мебель для спальни</a> >> <a href="#">Кровати</a> >> <span>Кровать N1</span></p>
	</section> -->

	<div class="products container">
		<div class="product row col-sm-12 col-md-12">
			<div class="product_images col-sm-12 col-md-5">
				<a href="{{asset('img/products/'.$cat[0]->alias.'/'.$product->category.'/'.$product->img_src)}}" rel="gallery" class="gallery"><img src="{{asset('img/products/'.$cat[0]->alias.'/'.$product->category.'/'.$product->img_src)}}" alt="{{$product->title}}"></a>
			</div> <!-- .product_images -->

			<div class="features col-sm-12 col-md-7">

				<h2 class="{{$cat[0]->alias}}" id="{{$product->category}}">{{$product->title}}</h2>

				<table class="product_features">
					<tr>
						<td>Страна:</td>
						<td>Россия</td>
					</tr>
					<tr>
						<td>Брэнд:</td>
						<td>Beds</td>
					</tr>
					<tr>
						<td>Размеры:</td>
						<td>2000х1500х900</td>
					</tr>
					<tr>
						<td>Материал:</td>
						<td>Дерево</td>
					</tr>
					<tr>
						<td>Цвет:</td>
						<td>Коричневый</td>
					</tr>
				</table>
				<p class="price"><span class="product_price">{{$product->price}}</span> руб</p>
				<a href="#" class="buy" id="{{$product->id}}">Заказать</a>
			</div> <!-- .features -->
		</div> <!-- .product -->

		<div class="detail_info col-md-12">
			<dl class="tabs">
		    <dt class="active">Детальное описание</dt>

		    <dd class="active">
			    <div>
			    	Здесь содержится детальное описание товара
			    </div>
				</dd>

		    <dt>Отзывы</dt>

		    <dd>

			    <div class="review">
				    <div class="clearfix">
				    	<p class="review_name">User1</p>
				    	<p class="review_date">25.04.2016</p>
				    </div>
				    <p class="review_text">Спасибо за доставку!</p>
			    </div>

			    <div class="review">
				    <div class="clearfix">
				    	<p class="review_name">User1</p>
				    	<p class="review_date">22.04.2016</p>
				    </div>
				    <p class="review_text">Спасибо за доставку!</p>
			    </div>
		    </dd>
			</dl>
		</div> <!-- .detail_info -->
	</div> <!-- .products -->

</section> <!-- .content -->
@stop