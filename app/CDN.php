<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CDN extends Model
{
    public $table = 'cdns';
    
    protected $fillable = [
        'file_name',
        'file_type',
        'url',
        'current_version',
        'created_by_user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by_user_id');
    }
}
