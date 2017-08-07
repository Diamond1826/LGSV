<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liegenschaft extends Model
{
    protected $fillable = [
    	'liegenschaftID',
        'name',  
        'strasse', 
        'plz', 
        'ort',
    ];
    /**
    * target table
    * @var $table
    */
    protected $table = 'liegenschaften';
}
