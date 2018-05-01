<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
	protected $table = 'sales';
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
