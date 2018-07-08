<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	protected $table = 'areas';
    protected $fillable = [
    'area_id', 'area_name', 'admin_id'
    ];
    protected $primaryKey = 'area_id';
}
