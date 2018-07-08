<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
	protected $table = 'scores';
    protected $fillable = [
    'score_id', 'score', 'admin_id', 'master_id','area_id','date'
    ];
    protected $primaryKey = 'score_id';
}
