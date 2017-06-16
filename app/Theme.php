<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public $table = 'themes';
    
    protected $fillable = [
        'name',
        'url',
        'used',
    ];
    
    public $timestamps = false;
}
