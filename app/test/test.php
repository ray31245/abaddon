<?php

namespace App\test;

use Illuminate\Database\Eloquent\Model;
use App\shop\Entity\Merchandise;
use App\shop\Entity\Transaction;
use App\Flight;

/**
* 
*/
class test extends Model
{
	
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $fillable = ["email","password","type","nickname"];

	public function ranscaction(){
		return $this->hasMany('App\shop\Entity\Transaction','user_id','id');
	}
}