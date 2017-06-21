<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\{Product, Menu};

class CatalogController extends Controller {
  public function index($category = null, $alias = null) {
  	if ($category == null && $alias == null) {

	  	$products = Product::paginate(9);
      $cats = Menu::all()->toHierarchy();

  	} elseif ($category != null && $alias == null) {

      $category = Menu::where('alias', $category)->get();
      $cats = Menu::where('parent_id', $category[0]->id)->get();

  	} else {

      $products = Product::where('category', $alias)->paginate(6);
      $alias = Menu::where('alias', $alias)->get();
      $parent_id = $alias[0]->parent_id;
      $category = Menu::where('id', $parent_id)->get();

    }

		return view('pages.catalog', compact('products', 'alias', 'category', 'cats'));
  }
}