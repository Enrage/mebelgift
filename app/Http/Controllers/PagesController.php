<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Page;

class PagesController extends Controller {

  public function index($alias = null) {
    $page = Page::where('alias', $alias)->get();
  	return view('pages.pages', compact('pages', 'catalog', 'page'));
  }
}
