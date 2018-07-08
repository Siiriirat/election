<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
	protected $table = 'headers';
    protected $fillable = [
    'header_id', 'header_name', 'username', 'password', 'master_id', 'tel', 
    'email', 'province', 'amphoe', 'district', 'image'
    ];
    protected $primaryKey = 'header_id';
}
