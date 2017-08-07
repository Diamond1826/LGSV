<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WohnungMieter extends Model
{
    protected $fillable = [
    	'wohnungsID',
        'mieterID', 
    ];
    /**
    * target table
    * @var $table
    */
    protected $table = 'wohnungenMieter';
}
