<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wohnung extends Model
{
    protected $fillable = [
    	'wohnungsID',
        'name', 
        'miete',
        'liegenschaftID', 
    ];
    /**
    * target table
    * @var $table
    */
    protected $table = 'wohnungen';
}
