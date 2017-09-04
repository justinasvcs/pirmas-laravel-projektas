<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $fillable = ['filename'];

    public function friend()
    {
        return $this->belongsTo('App\Friend');
    }
}
