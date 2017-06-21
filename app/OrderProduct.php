<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model {
	protected $table = 'order_products';
	protected $fillable = ['order_id', 'item_id', 'amount', 'title', 'price'];

	public function items() {
		return $this->belongsTo('App\Product', 'item_id', 'id');
	}
}