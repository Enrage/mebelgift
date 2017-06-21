<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
	protected $table = 'customers';
	protected $fillable = ['name', 'email', 'phone'];

	public function customers() {
		return $this->belongsTo('App\Order', 'id', 'customer_id');
	}
}