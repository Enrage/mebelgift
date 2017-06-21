<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Menu;

trait LeftbarController {

  public function menu() {
    // $menu = Menu::all()->load('submenu');
    // $menu = Menu::with('submenu')->get();
    $menu = Menu::where('parent_id', '0')->get();
    return compact('menu');
  }
}
