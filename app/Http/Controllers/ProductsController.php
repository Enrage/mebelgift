<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\{Requests, Controllers\Controller};
use App\{Product, Menu};

class ProductsController extends Controller {
	public function index($category = null, $alias = null, $id = null) {
		if (empty($id)) {
			echo 'NotFound';
		} else {
			$product = Product::where('id', $id)->first();
			$alias = Menu::where('alias', $product->category)->get();
			$cat = Menu::where('id', $alias[0]->parent_id)->get();
			return view('pages.product', compact('product', 'cat'));
		}
	}
}
