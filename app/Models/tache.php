<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tache extends Model
{
   
    protected $table = 'tache';

    protected $fillable = [
        'title',
        'description',
        'completed',
    ];

    public $timestamps = true;

}
