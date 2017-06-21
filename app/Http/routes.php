<?php
use App\{Menu, Page};

Route::get('/', 'MainController@index');

// View::share('left_menu', Menu::with('submenu')->get());
View::share('node', Menu::all()->toHierarchy());
View::share('pages', Page::all());

// View::share('left_menu', Menu::where('parent_id', '0')->get());
  // return compact('menu');
// });
// View::share('left_menu', DB::table('menu')->load('submenu'));
// View::share('left_menu', DB::table('menu')->get());

Route::get('/catalog', 'CatalogController@index');
Route::get('/catalog/{category}', 'CatalogController@index', function($category) {
  return view('pages.catalog');
});
Route::get('/catalog/{category}/{alias}', 'CatalogController@index', function($category, $alias) {
  return view('pages.catalog');
});
Route::get('/catalog/{category}/{alias}/{id}', 'ProductsController@index', function($category, $alias, $id) {
  return view('pages.product');
});

Route::get('/pages/{alias}', 'PagesController@index', function($alias) {
  return view('pages.pages');
});

Route::get('/cart', 'CartController@show');
Route::post('/checkout', 'CartController@checkout');
