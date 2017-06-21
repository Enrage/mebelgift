@extends('layout.app')

@section('content')
<section class="content col-xs-12 col-md-8 col-lg-9">
  <div class="pages">
    <h2>{{$page[0]->title}}</h2>
    {!!$page[0]->text!!}

  </div>
</section>
@stop
