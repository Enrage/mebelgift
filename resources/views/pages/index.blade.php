@extends('layout.app')

@section('content')
  <section class="content col-xs-12 col-md-8 col-lg-9">
    <div id="slider">
      <ul class="bxslider">
        <li><img src="{{asset('img/slider/slider_1.jpg')}}" alt=""></li>
        <li><img src="{{asset('img/slider/slider_2.jpg')}}" alt=""></li>
        <li><img src="{{asset('img/slider/slider_3.jpg')}}" alt=""></li>
      </ul>
    </div>

    <div class="hits container">

      <h2>Хиты продаж</h2>

      @foreach ($hits as $hit)
      <div class="product col-xs-12 col-sm-6 col-lg-4">
        <a href="/catalog/{{$cat[0]->alias}}/{{$hit->category}}/{{$hit->id}}" class="products_img"><img src="{{asset('img/products/'.$cat[0]->alias.'/'.$hit->category.'/'.$hit->img_src)}}" alt="{{$hit->title}}" class="{{$hit->category}}"></a>
        <h3 class="{{$cat[0]->alias}}"><a href="/catalog/{{$cat[0]->alias}}/{{$hit->category}}/{{$hit->id}}">{{$hit->title}}</a></h3>
        <p class="price"><span>{{$hit->price}}</span> руб</p>
        <a href="#" class="buy" id="{{$hit->id}}">Заказать</a>
        <a href="/catalog/{{$cat[0]->alias}}/{{$hit->category}}/{{$hit->id}}" class="more">Подробнее</a>
      </div>
      @endforeach
    </div>

    <div class="new_products container">
      <h2>Новинки</h2>

      @foreach ($news as $new)
      <div class="product col-xs-12 col-sm-6 col-lg-4">
        <a href="/catalog/{{$cat[0]->alias}}/{{$new->category}}/{{$new->id}}" class="products_img"><img src="{{asset('img/products/'.$cat[0]->alias.'/'.$new->category.'/'.$new->img_src)}}" alt="{{$new->title}}" class="{{$new->category}}"></a>
        <img src="img/icons/icon_new.png" alt="Новый товар" class="new_product">
        <h3 class="{{$cat[0]->alias}}"><a href="/catalog/{{$cat[0]->alias}}/{{$new->category}}/{{$new->id}}">{{$new->title}}</a></h3>
        <p class="price"><span>{{$new->price}}</span> руб</p>
        <a href="#" class="buy" id="{{$new->id}}">Заказать</a>
        <a href="/catalog/{{$cat[0]->alias}}/{{$new->category}}/{{$new->id}}" class="more">Подробнее</a>
      </div>
      @endforeach
    </div>

    <article class="about_shop">
      <h3>Магазин MebelGift</h3>
      <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Там от всех, деревни заголовок взгляд но вскоре своих, рукописи, имеет по всей семантика маленький рыбными его они текстами сих. Себя рекламных текстов обеспечивает. Парадигматическая, вопрос вершину бросил домах пояс назад даже мир дорогу силуэт возвращайся власти жаренные необходимыми, знаках запятой, собрал раз залетают предупредила журчит заглавных лучше последний. Переписывается имени подпоясал океана журчит путь, он страну по всей деревни инициал языкового предупреждал однажды которой если несколько текст свой встретил, запятых, пор до одна диких текста его использовало! Маленькая запятой рот речью домах города, снова щеке ipsum диких наш ему свой от всех запятых, единственное большого языкового даже, журчит рыбными назад?</p>
      <p>Своих несколько буквенных, что домах напоивший безопасную речью запятой знаках путь реторический безорфографичный, маленькая первую переписали. Единственное напоивший снова, рукописи курсивных над дал рыбными свое, щеке предупредила, деревни запятой которой большого предупреждал. Заманивший маленький о последний речью вскоре необходимыми рекламных ipsum инициал свой запятой на берегу точках ведущими одна языкового переулка, всеми свою моей. Рот первую взобравшись его алфавит, лучше себя приставка последний над рекламных, жизни силуэт? Маленькая рот курсивных залетают! Реторический, пустился пояс семь мир первую ее буквоград возвращайся страна выйти. Залетают гор, одна своих то снова рукопись приставка первую за встретил грамматики.</p>
    </article>
  </section>
@stop
