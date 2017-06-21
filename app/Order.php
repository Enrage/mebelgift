<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	protected $table = 'orders';
	protected $fillable = ['customer_id', 'created_at', 'updated_at', 'status', 'prim'];

	// public function items() {
	// 	return $this->belongsTo('App\Product', 'item_id', 'id');
	// }
}