<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	protected $table = 'admins';
    protected $fillable = [
    'admin_id', 'admin_name', 'username', 'password', 'header_id', 'tel', 
    'email', 'image'
    ];
    protected $primaryKey = 'admin_id';
}
