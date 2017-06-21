@extends('layout.app')

@section('content')
<section class="content col-xs-12 col-md-8 col-lg-9">

	<section class="sorting">
		<p><span>Сортировать по:</span>&nbsp;&nbsp;&nbsp; <a href="#">цене</a>&nbsp;&nbsp;&nbsp; <a href="#">названию</a>&nbsp;&nbsp;&nbsp; <a href="#">дате добавления</a></p>
	</section>

	<div class="products_grid container">

	@if (is_null($category) && is_null($alias))
		<h2>Каталог товаров</h2>
		@foreach ($cats as $item)
		<div class="col-xs-12 col-sm-6 col-lg-4">
			<a href="/catalog/{{$item->alias}}">{{$item->name}}</a>
		</div>
		@endforeach

	@elseif (!is_null($category) && is_null($alias))
		<h2>{{$category[0]->name}}</h2>
		@foreach ($cats as $item)
		<div class="col-xs-12 col-sm-6 col-lg-4">
			<a href="/catalog/{{$category[0]->alias}}/{{$item->alias}}">{{$item->name}}</a>
		</div>
		@endforeach

	@else
		<div class="paginat">
			{{ $products->appends([])->render() }}
		</div>
		<h2>{{$category[0]->name}} {{$alias[0]->name}}</h2>
		@foreach ($products as $product)
		<div class="product col-xs-12 col-sm-6 col-lg-4">
			<a href="/catalog/{{$category[0]->alias.'/'.$product->category.'/'.$product->id}}" class="products_img"><img src="{{asset('img/products/'.$category[0]->alias.'/'.$product->category.'/'.$product->img_src)}}" alt="{{$product->title}}" class="{{$product->category}}"></a>
			<h3 class="{{$category[0]->alias}}"><a href="/catalog/{{$category[0]->alias.'/'.$product->category.'/'.$product->id}}">{{$product->title}}</a></h3>
			<p class="price"><span class="product_price">{{$product->price}}</span> руб</p>
			<a href="#" class="buy" id="{{$product->id}}">Заказать</a>
			<a href="/catalog/{{$category[0]->alias.'/'.$product->category.'/'.$product->id}}" class="more">Подробнее</a>
		</div>
		@endforeach

		<div class="paginat">
			{{ $products->appends([])->render() }}
		</div>
	@endif

	</div> <!-- .products_grid -->

	<!-- <div class="pagination">
		<a href="#"><<</a>
		<a href="#"><</a>
		<a href="#">1</a>
		<a href="#" class="active_page">2</a>
		<a href="#">3</a>
		<a href="#">></a>
		<a href="#">>></a>
	</div> -->
</section> <!-- .content -->
@stop