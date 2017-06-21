<aside class="leftbar col-xs-12 col-md-4 col-lg-3">
	<nav class="catalog mini-menu">
		<h3>Каталог товаров</h3>
		<ul class="nav">
		@foreach ($node as $item)
			<li class="sub">
				<a href="/catalog/{{$item->alias}}">{{$item->name}}</a>
				@if (!empty($item->children))
				<ul>
					@foreach ($item->children as $sub_item)
					<li><a href="/catalog/{{$item->alias}}/{{$sub_item->alias}}">{{$sub_item->name}}</a></li>
					@endforeach
				</ul>
				@endif
			</li>
		@endforeach
		</ul>
	</nav>

	<section class="sales">
		<a href=""><img src="{{asset('img/sales_bed.jpg')}}" alt="Sales"></a>
	</section>

	<div class="partners">
		<h3>Наши поставщики</h3>
		<ul>
			<li><a href=""><img src="{{asset('img/partners/ormatek.png')}}" alt="Орматек"></a></li>
			<li><a href=""><img src="{{asset('img/partners/askona.png')}}" alt="Аскона"></a></li>
			<li><a href=""><img src="{{asset('img/partners/dreamline.png')}}" alt="DreamLine"></a></li>
			<li><a href=""><img src="{{asset('img/partners/sonberry.jpg')}}" alt="Sonberry"></a></li>
			<li><a href=""><img src="{{asset('img/partners/beautyson.png')}}" alt="BeautySon"></a></li>
			<li><a href=""><img src="{{asset('img/partners/mr_mattress.png')}}" alt="Mr.Mattress"></a></li>
			<li><a href=""><img src="{{asset('img/partners/perrino.png')}}" alt="perrino"></a></li>
			<li><a href=""><img src="{{asset('img/partners/togas.jpg')}}" alt="Togas"></a></li>
		</ul>
	</div>
</aside>
