<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function sales()
    {
        return $this->hasMany('App\Sale');
    }
    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }
}
