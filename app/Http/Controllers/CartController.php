<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\{Product, Order, Customer, OrderProduct, Menu};

class CartController extends Controller {

  public function show() {
    if (isset($_COOKIE['basket'])) { // проверяем, есть ли заказы
      $orders = $_COOKIE['basket'];
      $orders = json_decode($orders); //перекодируем строку из куки в массив с объектами

      foreach ($orders as $order) {
        $ids[] = $order->item_id;
        $amount[$order->item_id] = $order->amount;
      }

      $products = Product::whereIn('id', $ids)->get();

      foreach ($products as $product) {
        $alias = Menu::where('alias', $product->category)->get();
        $cat[] = Menu::where('id', $alias[0]->parent_id)->get();
      }
    } else {
      $orders = [];
    }
    return view('pages.cart', compact('orders', 'cat', 'alias', 'products'));
  }

  public function checkout(Request $request) {
    if (isset($_COOKIE['basket'])) { // проверяем, есть ли заказы
      $orders = $_COOKIE['basket'];
      $orders = json_decode($orders); //перекодируем строку из куки в массив с объектами
    } else {
      return redirect('/'); //если заказ пустой, то редиректим на главную страницу
    }
    $ids = []; //все идентификаторы товаров
    $amount = [];//количество товаров
    $total_cost = 0; //общая цена заказа
    $order_id = Order::latest()->first(); //получаем последний заказ
    $order_id = empty($order_id) ? 1 : $order_id->order_id + 1; //определяемся с новым заказом, увеличивая номер последнего заказа на 1
    foreach ($orders as $order) {
      $ids[] = $order->item_id;//создаем массив из id заказанных товаров
      $amount[$order->item_id] = $order->amount; //создаем массив с количеством каждого товара ['id товара'=>'количество товара']
    }

    $customer = Customer::create([
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone]);

    $products = Product::whereIn('id', $ids)->get(); //выбираем все заказанные товары из базы

    foreach ($products as $product) {
      $orders = OrderProduct::create([
        'order_id' => $order_id,
        'item_id' => $product->id,
        'amount' => $amount[$product->id],
        'title' => $product->title,
        'price' => $product->price]); //сохраняем заказ в базу
      $total_cost = $total_cost + $product->price * $amount[$product->id]; //считаем общую сумму заказа
    }

    $customers = Customer::where('id', $customer->id)->get();
    $new_customer = Order::create([
      'customer_id' => $customers[0]->id,
      'prim' => $request->prim]);

    setcookie('basket', ''); //удаляем куки
    $new_order = Order::where('order_id', $orders->order_id)->get(); //получаем только, что добавленный заказ

    $zakaz = DB::table('orders')
      ->join('order_products', 'orders.order_id', '=', 'order_products.order_id')
      ->join('customers', 'orders.customer_id', '=', 'customers.id')
      ->leftJoin('products', 'order_products.item_id', '=', 'products.id')
      ->select('orders.order_id', 'orders.customer_id', 'orders.prim', 'order_products.item_id', 'order_products.amount', 'order_products.title', 'order_products.price', 'order_products.created_at', 'customers.name', 'customers.email', 'customers.phone', 'products.menu', 'products.img_src')
      ->where('orders.order_id', $orders->order_id)->get();

    /*Mail::send('emails.order', $zakaz, function($m) use ($zakaz) {
      $m->from('remover88@mail.ru', 'Mebel-Gift');
      $m->to($zakaz[0]->email)->subject('Спасибо за заказ');
    });*/

    return view('pages.finish_order', ['orders' => $orders, 'total' => $total_cost, 'customers' => $customers, 'new_customer' => $new_customer, 'new_order' => $new_order, 'products' => $products, 'zakaz' => $zakaz]);
  }
}
