<?php

namespace App\analysze;

use Illuminate\Database\Eloquent\Model;

class guestip extends Model
{
protected $table = 'guestip';
protected $primarykey = 'id';
protected $fillable = [
"HTTP_CLIENT_IP",
"HTTP_X_FORWARDED_FOR",
"REMOTE_ADDR",
];
}