<?php

namespace App\shop\Entity;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Transaction extends Model
{
	
	protected $table = 'transaction';

	public function Merchandise(){
		return $this->hasOne('App\Shop\Entity\Merchandise','id','merchandise_id');
	}

	protected $primaryKey = 'id';

	protected $fillable = [
	"id",
	"user_id",
	"merchandise_id",
	"price",
	"buy_count",
	"total_price",
	];
}