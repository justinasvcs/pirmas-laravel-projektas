<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public $fillable = ['name', 'birthday', 'phone', 'photo', 'sex', 'city'];

    public function photo()
    {
        return $this->hasOne('App\Photo');
    }
}
