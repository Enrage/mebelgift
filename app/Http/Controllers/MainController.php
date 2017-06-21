<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\{Menu, Product};
use App\Http\Controllers\Controller;

class MainController extends Controller {
  public function index() {
  	$news = Product::where('news', '1')->get();
  	$hits = Product::where('hits', '1')->get();

    foreach ($news as $new) {
      $alias = Menu::where('alias', $new->category)->get();
      $parent_id = $alias[0]->parent_id;
      $cat = Menu::where('id', $parent_id)->get();
    }

    // $root1 = Menu::create(['name' => 'Кровати']);
    // $root2 = Menu::create(['name' => 'Ортопедические Матрасы']);
    // $root3 = Menu::create(['name' => 'Наматрасники']);
    // $root4 = Menu::create(['name' => 'Чехлы на матрасы']);
    // $root5 = Menu::create(['name' => 'Одеяла']);
    // $root6 = Menu::create(['name' => 'Ортопедические подушки']);
    // $root7 = Menu::create(['name' => 'Основания для матрасов']);
    // $root8 = Menu::create(['name' => 'Мебель для спальни']);
    //
    // $child1 = $root1->children()->create(['name' => 'Орматек']);
    // $child2 = $root1->children()->create(['name' => 'Аскона']);
    // $child3 = $root1->children()->create(['name' => 'Дрим Лайн']);
    // $child4 = $root1->children()->create(['name' => 'Сонбери']);
    // $child5 = $root1->children()->create(['name' => 'Мистер матрас']);
    // $child6 = $root1->children()->create(['name' => 'Бьюти сон']);
    // $child7 = $root1->children()->create(['name' => 'Перина']);

		return view('pages.index', compact('news', 'hits', 'cat'));
  }
}