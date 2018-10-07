<?php

namespace App\shop\Entity;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class User extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $fillable = ["email","password","type","nickname"];
}