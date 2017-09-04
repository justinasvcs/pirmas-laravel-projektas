<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{

    public $fillable = ['name', 'time', 'content'];

    public $timestamps = false;

}
